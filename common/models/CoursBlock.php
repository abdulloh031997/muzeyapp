<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cours_block".
 *
 * @property int $id
 * @property int|null $cours_id
 * @property string|null $name_uz
 * @property string|null $name_ru
 * @property string|null $name_en
 * @property string|null $cost
 * @property int|null $status
 *
 * @property Cours $cours
 */
class CoursBlock extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cours_block';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cours_id', 'status'], 'integer'],
            [['name_uz', 'name_ru', 'name_en','cost'], 'string', 'max' => 255],
            [['cours_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cours::className(), 'targetAttribute' => ['cours_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cours_id' => 'Cours ID',
            'name_uz' => 'Name Uz',
            'name_ru' => 'Name Ru',
            'name_en' => 'Name En',
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
        return $this->hasOne(Cours::className(), ['id' => 'cours_id']);
    }
}
