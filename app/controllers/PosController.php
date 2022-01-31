<?php

namespace app\controllers;

use app\controllers\base\BaseTransactionController;
use app\enums\Type_Model;
use app\enums\Type_Permission;
use app\enums\Status_Transaction;
use app\models\Item;
use app\models\PosProfileForm;
use app\models\PosReceipt;
use app\models\PosReceiptItem;
use app\models\PosReceiptPayment;
use app\models\SalesInvoice;
use app\models\Setup;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Html;

class PosController extends BaseTransactionController
{
    public function init()
    {
        $this->modelClass = PosReceipt::class;
        $this->modelSearchClass = SalesInvoiceSearch::class;
        $this->itemModelClass = PosReceiptItem::class;
        $this->paymentModelClass = PosReceiptPayment::class;

        return parent::init();
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
                        'roles' => [ Type_Permission::Create .' '. Type_Model::SalesInvoice ],
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
            $this->model = PosReceipt::findOne($id);
            $this->detailModels = $this->model->links;
        }
        else {
            $this->model = new PosReceipt();
            $this->detailModels = [
                'pos_receipt_item' => [],
                'pos_receipt_payment' => [],
            ];
        }

        $this->sidebar = false;

        // 1a. autosuggest id value if applicable
        if ( $this->model->autoSuggestIdValue() )
            $this->model->{$this->model->autoSuggestAttribute()} = $this->model->autoSuggestId();
    
        // 1b. save if request is via post
        if ( Yii::$app->request->isPost )
            return $this->saveModel();

        // 2. render the index page
        return $this->loadView();
    }

    // Default Sale Type (check POS profile)
    public function actionDefaultSaleType()
    {
        if (Yii::$app->request->isAjax)
        {
            $profile = Setup::getSettings(PosProfileForm::class);
            $labels = PosReceipt::getSaleLabelsBy($profile->default_sale_type);
            $values = PosReceipt::getSaleValuesBy($profile->default_sale_type);

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
            $labels = PosReceipt::getSaleLabelsBy($saleType);
            $values = PosReceipt::getSaleValuesBy($saleType);

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
            $stock_item = Item::find()
                            // ->where(['inactive' => false, 'is_sales_item' => true])
                            ->orWhere(['id' => Yii::$app->request->get('itemId')])
                            // ->orWhere(['item_group' => Yii::$app->request->get('itemGroupId')])
                            // ->orWhere(['like', 'name', Yii::$app->request->get('itemId')])
                            // ->asArray()
                            ->one();
            $pos_item = new PosReceiptItem();
            $pos_item->item_id = $stock_item->id;
            $pos_item->item_name = $stock_item->name;
            $pos_item->unit_price = $stock_item->standard_rate;
            $pos_item->quantity = 1;
            $pos_item->tax_percent = $stock_item->tax_rate;
            $pos_item->total_amount = $pos_item->unit_price * $pos_item->quantity;

            $pos_receipt = new PosReceipt();
		}

        $image = $this->renderAjax('cart/item/_image', [
            'stock_item' => $stock_item,
            'pos_receipt_item' => $pos_item,
            'pos_profile' => $pos_receipt->posProfile,
            'rowId' => Yii::$app->request->get('nextRowId')
        ]);

		$item = $this->renderAjax('cart/item/_form', [
            'stock_item' => $stock_item,
            'pos_receipt_item' => $pos_item,
            'pos_profile' => $pos_receipt->posProfile,
            'rowId' => Yii::$app->request->get('nextRowId')
        ]);

        return $this->asJson(['item' => $item, 'image' => $image]);
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
            return $this->renderAjax('cart/item/_form');
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
}
