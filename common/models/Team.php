<?php

namespace common\models;

use common\components\UploadBehavior;
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
    const ACTIVE = 1;
    const BANNED = 5;
    const PENDING = 0;
    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'team';
    }
    public function behaviors(){
        return [
            
            [
                'class' => UploadBehavior::className(),
                'imageFile' => 'file',
                'photo' => 'image',
                'path' => 'uploads/team',
            ],
        ];
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
            ['file', 'image', 'skipOnEmpty' => $this->image ? false: true, 'extensions' => 'png, jpeg, jpg, gif', 'maxSize' => 1024*1024*10], // 10 mb
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
    public function getContent()
    {
        return $this->hasOne(SiteContent::className(), ['id' => 'content_id']);
    }
    public static function getValue($id,$lang_code)
    {
        $getValue = self::findOne(['content_id' => $id, 'language' => $lang_code]);
        $fio = (!empty($getValue->fio)) ? $getValue->fio : '';
        $about = (!empty($getValue->about)) ? $getValue->about : '';
        $position = (!empty($getValue->position)) ? $getValue->position : '';
        return [
            'fio' => $fio,
            'about' => $about,
            'position' => $position,
        ];
    }
    public static function getTranslatedLanguages($content_id)
    {
        $model = self::findAll(['content_id' => $content_id]);
        $langs = array();
        foreach ($model as $mode) {
            $langs[] = $mode->language;
        }
        return implode(' / ',$langs);

    }
    public function statusArray($key = null)
    {
        $array = [
            self::ACTIVE => 'Active',
            self::PENDING => 'Pending',
            self::BANNED => 'Blocked',
        ];

        if (isset($array[$key])) {
            return $array[$key];
        }

        return $array;
    }
    public function getLanguageName()
    {
        return $this->hasOne(Language::className(), ['lang_code' => 'language']);
    }
    public static function getListTeam($lang = null){
        
        if (is_null($lang)) {
            $lang = current_lang();
        }
        return self::find()->where(['status'=>1])->andWhere(['language'=>$lang])->select("fio")
            ->indexBy('id')->column();
    }
    public function getLogo()
    {
        return ($this->image) ? '@fronted_domain/' . $this->image : '@fronted_domain/uploads/no-image.png';
    }
}
