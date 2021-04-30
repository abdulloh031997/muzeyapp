<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "language".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $lang_code
 * @property string|null $locale
 * @property int|null $rtl
 * @property int|null $default
 * @property int|null $sort
 * @property int|null $status
 */
class Language extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'language';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rtl', 'default', 'sort', 'status'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['lang_code'], 'string', 'max' => 10],
            [['locale'], 'string', 'max' => 50],
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
            'lang_code' => 'Lang Code',
            'locale' => 'Locale',
            'rtl' => 'Rtl',
            'default' => 'Default',
            'sort' => 'Sort',
            'status' => 'Status',
        ];
    }
    public function updateStatus($id, $status = 0)
    {
        $item = Language::findOne(['id' => $id]);

        if ($item && is_numeric($status)) {
            $item->status = $status;
            $item->update(false);

            return $item;
        }

        return false;
    }
}
