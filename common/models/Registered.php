<?php

namespace common\models;

use Yii;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;

/**
 * This is the model class for table "registered".
 *
 * @property int $id
 * @property string $name
 * @property string $lastname
 * @property string $fname
 * @property string $pser
 * @property string $pnum
 * @property string $phone
 * @property int|null $region_id
 * @property int|null $type
 * @property int|null $lang_id
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $user_id
 * @property int $invoice
 * @property int $paid
 */
class Registered extends \yii\db\ActiveRecord
{
    public $codecap;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'registered';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'lastname', 'fname', 'pser', 'pnum', 'phone'], 'required'],
            [['region_id', 'user_id','type', 'lang_id', 'status', 'invoice', 'paid'], 'integer'],
            [['name'], 'string', 'max' => 32],
            [['name','lastname','fname'], 'match', 'pattern' => '/^[a-zA-Z0-9.\',\-\/\s]+$/'],
            [['lastname', 'fname', 'pser', 'pnum', 'phone','workplace'], 'string', 'max' => 255],
            [['pser', 'pnum'], 'unique', 'targetAttribute' => ['pser', 'pnum']],
            [['created_at', 'updated_at'], 'default', 'value' => time()],
            [['codecap'], 'captcha', 'captchaAction' => '/registered/captcha']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Ismingiz',
            'lastname' => 'Familiyangiz',
            'fname' => 'Otangizning ismi',
            'pser' => 'Pasport seriyasi (guvohnoma seriyasi)',
            'pnum' => 'Pasport raqami (guvohnoma raqami)',
            'phone' => 'Telefon raqami ',
            'region_id' => 'Tug\'ilgan joyingiz',
            'type' => 'Kurs turi',
            'lang_id' => 'Ta\'lim tilini tanlang',
            'status' => 'Status',
            'codecap' => 'Tekshiruv kodi',
            'workplace' => 'Ish joyi',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    private $arrContextOptions=array(
        "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
        ),
    );
    public $summ;
    public function beforeSave($insert)
    {

        if (empty($this->invoice)) {
            $s = CoursBlock::find()->where(['id' =>$this->type])->one();
            $summ = $s->cost;
            $full = $this->lastname.' '.$this->name.' '.$this->fname;
            $fio = cleartext($full);
            $phone = substr(str_replace(' ', '', $this->phone), -9);
            $data = json_decode(file_get_contents("https://billing.dtm.uz/site/invoys?psser=$this->pser&psnum=$this->pnum&fio=$fio&phone=$phone&list=$this->type&type=9&summa=$summ", false, stream_context_create($this->arrContextOptions)));
            $this->invoice = $data->serial;
        }
        if (parent::beforeSave($insert)) {
            $this->name = self::purifier($this->name);
            $this->lastname = self::purifier($this->lastname);
            $this->fname = self::purifier($this->fname);
            $this->pser = self::purifier($this->pser);
            $this->pnum = self::purifier($this->pnum);
            return true;
        } else {
            return false;
        }
    }
    public function paidCheck() {
        if (empty($this->invoice))
            return;
        $data = json_decode(file_get_contents("https://billing.dtm.uz/upay/paid?serial=$this->invoice", false, stream_context_create($this->arrContextOptions)));
        if ($data->paid == 'PAID') {
            $this->paid = 1;
            $this->save();
        }
        $this->summ = $data->remain;
    }
    public static function purifier($text)
    {
        $pr = new HtmlPurifier;
        return $pr->process($text);
    }
    public function getRegion()
    {
        return $this->hasOne(Region::className(), ['id' => 'region_id']);
    }
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
    public function getCoursBlock()
    {
        return $this->hasOne(CoursBlock::className(), ['id' => 'type']);
    }
    public function getCours()
    {
        return $this->hasOne(CoursBlock::className(), ['id' => 'type']);
    }
    public function getLang()
    {
        return $this->hasOne(Language::className(), ['id' => 'lang_id']);
    }
}
