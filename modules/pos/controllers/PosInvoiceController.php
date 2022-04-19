<?php

namespace logicent\pos\controllers;

use logicent\accounts\controllers\base\BaseTransactionController;
use crudle\setup\enums\Status_Transaction;
use crudle\setup\enums\Type_Permission;
use crudle\setup\models\Setup;
use logicent\stock\models\Item;
use logicent\stock\models\ItemWarehouse;
use logicent\pos\models\PosProfileForm;
use logicent\pos\models\PosInvoice;
use logicent\pos\models\PosInvoiceItem;
use logicent\pos\models\PosInvoicePayment;
use logicent\accounts\models\SalesInvoice;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Html;
use yii\helpers\Url;

class PosInvoiceController extends BaseTransactionController
{
    public function init()
    {
        $this->itemModelClass = PosInvoiceItem::class;
        $this->paymentModelClass = PosInvoicePayment::class;

        return parent::init();
    }

    public function modelClass(): string
    {
        return PosInvoice::class;
    }

    public function searchModelClass(): string
    {
        return SalesInvoiceSearch::class;
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index', 'on-hold-sale', 'cancel-sale'],
                'rules' => [
                    [
                        'actions' => ['index', 'on-hold-sale', 'cancel-sale'],
                        'allow' => true,
                        // 'roles' => [ Type_Permission::Create .' '. Type_Model::SalesInvoice ],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'on-hold-sale' => ['POST'],
                    'cancel-sale' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex($id = null)
    {
        if ($id) {
            $this->model = PosInvoice::findOne($id);
            $this->detailModels = $this->model->links;
        }
        else {
            $this->model = new PosInvoice();
            $this->detailModels = [
                'pos_receipt_item' => [],
                'pos_receipt_payment' => [],
            ];
        }

        // 1a. autosuggest id value if applicable
        if ( $this->model->autoSuggestIdValue() )
            $this->model->{$this->model->autoSuggestAttribute()} = $this->model->autoSuggestId();
    
        // 1b. save if request is via post
        if ( Yii::$app->request->isPost )
            return $this->saveModel();

        // 2. render the index page
        // return $this->loadView();
        return $this->render('index');
    }

    // Default Sale Type (check POS profile)
    public function actionDefaultSaleType()
    {
        if (Yii::$app->request->isAjax)
        {
            $profile = Setup::getSettings(PosProfileForm::class);
            $labels = PosInvoice::getSaleLabelsBy($profile->default_sale_type);
            $values = PosInvoice::getSaleValuesBy($profile->default_sale_type);

            return $this->asJson(array_merge($labels, $values));
        }
        // else
        Yii::$app->end();
    }

    // Sale Type (check user selection)
    public function actionChangeSaleType()
    {
        if (Yii::$app->request->isAjax)
        {
            $saleType = Yii::$app->request->get('saleType');
            $labels = PosInvoice::getSaleLabelsBy($saleType);
            $values = PosInvoice::getSaleValuesBy($saleType);

            return $this->asJson(array_merge($labels, $values));
        }
        // else
        Yii::$app->end();
    }

    // On Hold Sale (query SalesInvoice with Draft status)
    public function actionOnHoldSale()
    {
        if (Yii::$app->request->isAjax)
        {
            $sales = SalesInvoice::find()->where(['status' => Status_Transaction::Draft])->all();

            return $this->renderAjax('cart/_sale_on_hold', [
                        'sales' => $sales
                    ]);
        }
        // else
        Yii::$app->end();
    }

    // Cancel Sale (clear POST and refresh the UI)
    public function actionCancelSale($id = null)
    {
        if ($id)
            SalesInvoice::findOne($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionItemSearch()
    {
        if (Yii::$app->request->isAjax)
        {
            // $pos_receipt = new PosInvoice();
            // $itemGroups = $pos_receipt->posProfile->itemGroups;
            $items = (new \yii\db\Query())
                        ->select(['i.id', 'i.name'])
                        ->from('item_warehouse iw')
                        ->join('RIGHT JOIN', 'item i', 'i.id = iw.item_id')
                        ->where([
                            'i.inactive' => false,
                            'i.is_sales_item' => true,
                            'iw.warehouse_id' => Yii::$app->request->get('itemWarehouse')
                        ])
                        //   ->andWhere(['in', 'i.item_group', $itemGroups])
                          ->andWhere(['like', 'i.barcode', Yii::$app->request->get('itemSearch')])
                        //   ->limit(100)
                          ->all();
            if (empty($items))
                $items = (new \yii\db\Query())
                            ->select(['i.id', 'i.name'])
                            ->from('item_warehouse iw')
                            ->join('RIGHT JOIN', 'item i', 'i.id = iw.item_id')
                            ->where([
                                'i.inactive' => false,
                                'i.is_sales_item' => true,
                                'iw.warehouse_id' => Yii::$app->request->get('itemWarehouse')
                            ])
                            ->andWhere(['like', 'item_id', Yii::$app->request->get('itemSearch')])
                            // ->limit(100)
                            ->all();
            if (empty($items))
                $items = (new \yii\db\Query())
                            ->select(['i.id', 'i.name'])
                            ->from('item_warehouse iw')
                            ->join('RIGHT JOIN', 'item i', 'i.id = iw.item_id')
                            ->where([
                                'i.inactive' => false,
                                'i.is_sales_item' => true,
                                'iw.warehouse_id' => Yii::$app->request->get('itemWarehouse')
                            ])
                            ->andWhere(['like', 'i.name', Yii::$app->request->get('itemSearch')])
                            // ->limit(100)
                            ->all();
            $results = [];
            foreach ($items as $item) {
                $results[] =
                    Html::a(
                        Html::tag('div', $item['id'], ['class' => 'right floated content']) .
                            Html::tag('div', $item['name'], ['class' => 'content']),
                        Url::to(['pos/add-cart-item', 'id' => $item['id']]),
                        [
                            'class' => 'item',
                            'id' => $item['id'],
                        ]);
            }

            return $this->asJson(['result' => $results]);
		}
    }

    public function actionItemGroupFilter()
    {
        if (Yii::$app->request->isAjax)
        {
            $items = Item::find()
                        ->where(['inactive' => false, 'is_sales_item' => true])
                        // ->andWhere(['item_group' => Yii::$app->request->get('group_id')])
                        // ->asArray()
                        ->all();
            $selectOptionTags = '';
            foreach ($items as $item) {
                $selectOptionTags .= Html::tag('option', $item->name, ['value' => $item->id]);
            }
            return $selectOptionTags;
        }
        // else
        Yii::$app->end();
    }

    public function actionAddNewCustomer()
    {
        if (Yii::$app->request->isAjax)
        {
            return $this->renderAjax('/cart/_add_customer');
        }
        // else
        Yii::$app->end();
    }

    public function actionAddCartItem()
    {
        if ( Yii::$app->request->isAjax )
        {
            $stock_item = Item::findOne(Yii::$app->request->post('itemId'));

            $pos_item = new PosInvoiceItem();
            $pos_item->item_id = $stock_item->id;
            $pos_item->warehouse_id = Yii::$app->request->post('warehouseId');
            $pos_item->item_name = $stock_item->name;
            $pos_item->unit_price = $stock_item->standard_rate;
            $pos_item->quantity = 1; // default value
            $pos_item->tax_percent = $stock_item->tax_rate;
            $pos_item->total_amount = $pos_item->unit_price * $pos_item->quantity;

            $pos_receipt = new PosInvoice();

            $image = $this->renderAjax('cart/item/_image', [
                'stock_item' => $stock_item,
                'pos_receipt_item' => $pos_item,
                'pos_profile' => $pos_receipt->posProfile,
                'rowId' => Yii::$app->request->post('nextRowId')
            ]);

            $item = $this->renderAjax('cart/item//_form', [
                'stock_item' => $stock_item,
                'pos_receipt_item' => $pos_item,
                'pos_profile' => $pos_receipt->posProfile,
                'rowId' => Yii::$app->request->post('nextRowId')
            ]);

            return $this->asJson(['item' => $item, 'image' => $image]);
        }
        // else
        Yii::$app->end();
    }

    public function actionDeleteCartItem()
    {
        if ( Yii::$app->request->isAjax )
        {
            return $this->renderAjax('cart/item/_no_item');
        }
        // else
        Yii::$app->end();
    }

    public function showViewHeader(): bool
    {
        return false;
    }

    public function showViewSidebar(): bool
    {
        return false;
    }

    public function detailModels(): array
    {
        return $this->detailModels;
    }
}
