<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "slider".
 *
 * @property int $id
 * @property string|null $language
 * @property int|null $content_id
 * @property int|null $user_id
 * @property string|null $title
 * @property string|null $image
 * @property string|null $body
 * @property int|null $status
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Slider extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slider';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content_id', 'user_id', 'status'], 'integer'],
            [['body'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['language', 'title', 'image'], 'string', 'max' => 255],
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
            'user_id' => 'User ID',
            'title' => 'Title',
            'image' => 'Image',
            'body' => 'Body',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
