<?php

namespace common\models;

use app\components\UploadBehavior;
use Yii;

/**
 * This is the model class for table "cours".
 *
 * @property int $id
 * @property string|null $name_uz
 * @property string|null $name_ru
 * @property string|null $name_en
 * @property string|null $image
 * @property int|null $status
 * @property int|null $category_id
 *
 * @property CoursBlock[] $coursBlocks
 */
class Cours extends \yii\db\ActiveRecord
{
    public $addresses;
    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cours';
    }
    public function behaviors(){
        return [
            [
                'class' => UploadBehavior::className(),
                'imageFile' => 'file',
                'photo' => 'image',
                'path' => 'uploads/cours',
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status','category_id','addresses'], 'integer'],
            [['name_uz', 'name_ru', 'name_en', 'image'], 'string', 'max' => 255],
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
            'name_uz' => 'Name Uz',
            'name_ru' => 'Name Ru',
            'name_en' => 'Name En',
            'image' => 'Image',
            'category_id' => 'Category',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[CoursBlocks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCoursBlocks()
    {
        return $this->hasMany(CoursBlock::className(), ['cours_id' => 'id']);
    }
    public function getCoursCategory()
    {
        return $this->hasOne(CoursCategory::className(), ['id' => 'category_id']);
    }
    public function getLogo()
    {
        return ($this->image) ? '@fronted_domain/' . $this->image : '@fronted_domain/uploads/no-image.png';
    }
}
