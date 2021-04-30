<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $language
 * @property int|null $content_id
 * @property int|null $parent_id
 * @property string|null $link
 * @property string|null $c_order
 * @property int|null $target_blank
 * @property int|null $visible_top
 * @property string|null $slug
 * @property int|null $status
 */
class Menu extends \yii\db\ActiveRecord
{
    const ACTIVE = 1;
    const BANNED = 5;
    const PENDING = 0;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content_id', 'parent_id', 'target_blank', 'visible_top', 'status'], 'integer'],
            [['name', 'language', 'link', 'c_order', 'slug'], 'string', 'max' => 255],
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
            'language' => 'Language',
            'content_id' => 'Content ID',
            'parent_id' => 'Parent ID',
            'link' => 'Link',
            'c_order' => 'C Order',
            'target_blank' => 'Target Blank',
            'visible_top' => 'Visible Top',
            'slug' => 'Slug',
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
        $name = (!empty($getValue->name)) ? $getValue->name : '';
        return ['name' => $name];
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
    public static function getListMenu($lang = null){
        
        if (is_null($lang)) {
            $lang = current_lang();
        }
        return self::find()->where(['status'=>1])->andWhere(['language'=>$lang])->select("name")
            ->indexBy('id')->column();
    }
}
