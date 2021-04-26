<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $language
 * @property int|null $content_id
 * @property int|null $parent_id
 * @property string|null $link
 * @property string|null $c_order
 * @property int|null $target_blank
 * @property int|null $visible_top
 * @property string|null $slug
 * @property int|null $status
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content_id', 'parent_id', 'target_blank', 'visible_top', 'status'], 'integer'],
            [['name', 'language', 'link', 'c_order', 'slug'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'language' => 'Language',
            'content_id' => 'Content ID',
            'parent_id' => 'Parent ID',
            'link' => 'Link',
            'c_order' => 'C Order',
            'target_blank' => 'Target Blank',
            'visible_top' => 'Visible Top',
            'slug' => 'Slug',
            'status' => 'Status',
        ];
    }
}
