<?php

namespace common\models;

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
 *
 * @property CollectionCategory $collectionCategory
 */
class Collection extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'collection';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['collection_category_id', 'content_id', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['language', 'author', 'technique', 'materials', 'size'], 'string', 'max' => 255],
            [['collection_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => CollectionCategory::className(), 'targetAttribute' => ['collection_category_id' => 'id']],
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
            'author' => 'Author',
            'technique' => 'Technique',
            'materials' => 'Materials',
            'size' => 'Size',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
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
}
