<?php

namespace common\models;

use common\components\UploadBehavior;
use Yii;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property int|null $category_id
 * @property string|null $title
 * @property string|null $language
 * @property int|null $content_id
 * @property string|null $description
 * @property string|null $body
 * @property string|null $image
 * @property int|null $status
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Category $category
 */
class Post extends \yii\db\ActiveRecord
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
            [['category_id', 'content_id', 'status'], 'integer'],
            [['body'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'language', 'description', 'image'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
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
            'category_id' => 'Category ID',
            'title' => 'Title',
            'language' => 'Language',
            'content_id' => 'Content ID',
            'description' => 'Description',
            'body' => 'Body',
            'image' => 'Image',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public function getContent()
    {
        return $this->hasOne(SiteContent::className(), ['id' => 'content_id']);
    }
    public static function getValue($id,$lang_code)
    {
        $getValue = self::findOne(['content_id' => $id, 'language' => $lang_code]);
        $title = (!empty($getValue->title)) ? $getValue->title : '';
        $description = (!empty($getValue->description)) ? $getValue->description : '';
        $body = (!empty($getValue->body)) ? $getValue->body : '';
        return [
            'title' => $title,
            'description' => $description,
            'body' => $body,
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
    public static function getListCategory($lang = null){
        
        if (is_null($lang)) {
            $lang = current_lang();
        }
        return self::find()->where(['status'=>1])->andWhere(['language'=>$lang])->select("name")
            ->indexBy('id')->column();
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
    public function getLogo()
    {
        return ($this->image) ? '@fronted_domain/' . $this->image : '@fronted_domain/uploads/no-image.png';
    }
}
