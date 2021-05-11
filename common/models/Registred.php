<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "registred".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $fname
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $date_of_visit
 * @property int|null $number_of_visit
 * @property string|null $institution_name
 * @property int|null $type
 * @property int|null $lang
 * @property int|null $status
 */
class Registred extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'registred';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_of_visit'], 'safe'],
            [['number_of_visit', 'type', 'lang', 'status'], 'integer'],
            [['name', 'fname', 'email', 'phone', 'institution_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Исм',
            'fname' => 'Фамилия',
            'email' => 'Email',
            'phone' => 'Телефон',
            'date_of_visit' => 'Ташриф куни ва Ташриф соати',
            'number_of_visit' => 'Ташрифчилар сони',
            'institution_name' => 'Муассаса номи',
            'type' => 'Экскурсия тури',
            'lang' => 'Экскурсия тили',
            'status' => 'Status',
        ];
    }
}
