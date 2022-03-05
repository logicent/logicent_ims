<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cake_flavour".
 *
 * @property int $id
 * @property string $updated_by
 * @property int $idx
 * @property string $_assign
 * @property string $_comments
 * @property string $_user_tags
 * @property string $_liked_by
 * @property string $created_by
 * @property string $resourcing
 * @property string $name
 * @property int $item_group
 * @property string $decoration
 * @property string $thumbnail
 * @property int $has_variants
 * @property string $description
 * @property string $created_at
 * @property string $image
 * @property int $show_in_website
 * @property int $slideshow
 * @property int $disabled
 * @property string $website_image
 * @property string $updated_at
 */
class CakeFlavour extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cake_flavour';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idx', 'item_group', 'slideshow'], 'integer'],
            [['_assign', '_comments', '_user_tags', '_liked_by', 'resourcing', 'decoration', 'description', 'image', 'website_image'], 'string'],
            [['name'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['updated_by', 'created_by'], 'string', 'max' => 20],
            [['name', 'thumbnail'], 'string', 'max' => 140],
            [['has_variants', 'show_in_website', 'disabled'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'idx' => Yii::t('app', 'Idx'),
            '_assign' => Yii::t('app', 'Assign'),
            '_comments' => Yii::t('app', 'Comments'),
            '_user_tags' => Yii::t('app', 'User Tags'),
            '_liked_by' => Yii::t('app', 'Liked By'),
            'created_by' => Yii::t('app', 'Created By'),
            'resourcing' => Yii::t('app', 'Resourcing'),
            'name' => Yii::t('app', 'Name'),
            'item_group' => Yii::t('app', 'Item Group'),
            'decoration' => Yii::t('app', 'Decoration'),
            'thumbnail' => Yii::t('app', 'Thumbnail'),
            'has_variants' => Yii::t('app', 'Has Variants'),
            'description' => Yii::t('app', 'Description'),
            'created_at' => Yii::t('app', 'Created At'),
            'image' => Yii::t('app', 'Image'),
            'show_in_website' => Yii::t('app', 'Show In Website'),
            'slideshow' => Yii::t('app', 'Slideshow'),
            'disabled' => Yii::t('app', 'Disabled'),
            'website_image' => Yii::t('app', 'Website Image'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
