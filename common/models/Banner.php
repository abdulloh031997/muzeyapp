<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "banner".
 *
 * @property int $id
 * @property string|null $language
 * @property int|null $content_id
 * @property string|null $name
 * @property string|null $image
 * @property int|null $sort
 * @property int|null $status
 */
class Banner extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'banner';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content_id', 'sort', 'status'], 'integer'],
            [['language', 'name'], 'string', 'max' => 255],
            [['image'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'language' => 'Language',
            'content_id' => 'Content ID',
            'name' => 'Name',
            'image' => 'Image',
            'sort' => 'Sort',
            'status' => 'Status',
        ];
    }
}
