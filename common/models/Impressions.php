<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "impressions".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $language
 * @property int|null $content_id
 * @property string|null $description
 * @property string|null $body
 * @property string|null $image
 * @property int|null $status
 * @property string|null $date
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Impressions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'impressions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content_id', 'status'], 'integer'],
            [['body'], 'string'],
            [['date', 'created_at', 'updated_at'], 'safe'],
            [['title', 'language', 'description', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'language' => 'Language',
            'content_id' => 'Content ID',
            'description' => 'Description',
            'body' => 'Body',
            'image' => 'Image',
            'status' => 'Status',
            'date' => 'Date',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
