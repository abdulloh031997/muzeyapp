<?php

namespace common\models;

use common\components\UploadBehavior;
use Yii;

/**
 * This is the model class for table "collection".
 *
 * @property int $id
 * @property int|null $collection_category_id
 * @property string|null $language
 * @property int|null $content_id
 * @property string|null $author
 * @property string|null $technique
 * @property string|null $materials
 * @property string|null $size
 * @property int|null $status
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $image
 *
 * @property CollectionCategory $collectionCategory
 */
class Collection extends \yii\db\ActiveRecord
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
        return 'collection';
    }
    public function behaviors(){
        return [
            
            [
                'class' => UploadBehavior::className(),
                'imageFile' => 'file',
                'photo' => 'image',
                'path' => 'uploads/collection',
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['collection_category_id', 'content_id', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['language', 'author', 'technique', 'materials','image', 'size','name'], 'string', 'max' => 255],
            [['collection_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => CollectionCategory::className(), 'targetAttribute' => ['collection_category_id' => 'id']],
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
            'collection_category_id' => 'Collection Category ID',
            'language' => 'Language',
            'content_id' => 'Content ID',
            'name' => 'Name',
            'author' => 'Author',
            'technique' => 'Technique',
            'materials' => 'Materials',
            'size' => 'Size',
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
        $name = (!empty($getValue->name)) ? $getValue->name : '';
        $author = (!empty($getValue->author)) ? $getValue->author : '';
        $technique = (!empty($getValue->technique)) ? $getValue->technique : '';
        $materials = (!empty($getValue->materials)) ? $getValue->materials : '';
        $collection_category_id = (!empty($getValue->collection_category_id)) ? $getValue->collection_category_id : '';
        $size = (!empty($getValue->size)) ? $getValue->size : '';
        return [
            'name' => $name,
            'author' => $author,
            'technique' => $technique,
            'materials' => $materials,
            'collection_category_id' => $collection_category_id,
            'size' => $size,
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
    public static function getListCollection($lang = null){
        
        if (is_null($lang)) {
            $lang = current_lang();
        }
        return self::find()->where(['status'=>1])->andWhere(['language'=>$lang])->select("name")
            ->indexBy('id')->column();
    }

    /**
     * Gets query for [[CollectionCategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCollectionCategory()
    {
        return $this->hasOne(CollectionCategory::className(), ['id' => 'collection_category_id']);
    }
    public function getLogo()
    {
        return ($this->image) ? '@fronted_domain/' . $this->image : '@fronted_domain/uploads/no-image.png';
    }

}
