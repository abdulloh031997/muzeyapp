<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cours_category".
 *
 * @property int $id
 * @property string|null $name_uz
 * @property string|null $name_en
 * @property string|null $name_ru
 * @property int|null $status
 *
 * @property Cours[] $cours
 */
class CoursCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cours_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'default', 'value' => null],
            [['status'], 'integer'],
            [['name_uz', 'name_en', 'name_ru'], 'string', 'max' => 255],
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
            'name_en' => 'Name En',
            'name_ru' => 'Name Ru',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Cours]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCours()
    {
        return $this->hasMany(Cours::className(), ['category_id' => 'id']);
    }
}
