<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "team".
 *
 * @property int $id
 * @property string|null $language
 * @property int|null $content_id
 * @property string|null $fio
 * @property string|null $image
 * @property string|null $position
 * @property string|null $about
 * @property string|null $twitter
 * @property string|null $facebook
 * @property string|null $instagram
 * @property string|null $linkedin
 * @property string|null $telegram
 * @property int|null $status
 */
class Team extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'team';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content_id', 'status'], 'integer'],
            [['about', 'twitter', 'facebook', 'instagram', 'linkedin', 'telegram'], 'string'],
            [['language', 'fio'], 'string', 'max' => 255],
            [['image', 'position'], 'string', 'max' => 250],
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
            'fio' => 'Fio',
            'image' => 'Image',
            'position' => 'Position',
            'about' => 'About',
            'twitter' => 'Twitter',
            'facebook' => 'Facebook',
            'instagram' => 'Instagram',
            'linkedin' => 'Linkedin',
            'telegram' => 'Telegram',
            'status' => 'Status',
        ];
    }
}
