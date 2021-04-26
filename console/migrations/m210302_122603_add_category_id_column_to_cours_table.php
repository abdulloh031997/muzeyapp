<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%cours}}`.
 */
class m210302_122603_add_category_id_column_to_cours_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('cours', 'category_id', $this->integer());
        $this->createIndex(
            'idx-cours-category_id',
            'cours',
            'category_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-cours-category_id',
            'cours',
            'category_id',
            'cours_category',
            'id',
            'CASCADE'
        );
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-cours-category_id',
            'cours'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            'idx-cours-category_id',
            'cours'
        );
    }
}
