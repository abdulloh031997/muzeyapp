<?php

namespace common\models;

use Yii;
use app\components\UploadBehavior;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $body
 * @property string|null $image
 * @property int|null $status
 */
class Post extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }
    public function behaviors(){
        return [
            [
                'class' => UploadBehavior::className(),
                'imageFile' => 'file',
                'photo' => 'image',
                'path' => 'uploads/post',
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['body'], 'string'],
            [['status'], 'integer'],
            [['title', 'description', 'image'], 'string', 'max' => 255],
            ['file', 'image', 'skipOnEmpty' => $this->image ? true: false, 'extensions' => 'png, jpeg, jpg', 'maxSize' => 1024*1024*5], // 5 mb
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
            'description' => 'Description',
            'body' => 'Body',
            'image' => 'Image',
            'status' => 'Status',
        ];
    }
}
