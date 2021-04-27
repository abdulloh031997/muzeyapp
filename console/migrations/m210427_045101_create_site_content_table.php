<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%site_content}}`.
 */
class m210427_045101_create_site_content_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%site_content}}', [
            'id' => $this->primaryKey(),
            'type' => $this->string('255'),
            'status' => $this->integer(),
            'created_by' => $this->integer(),
        ]);
        // creates index for column `created_by`
        $this->createIndex(
            'idx-site_content-created_by',
            'site_content',
            'created_by'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-site_content-created_by',
            'site_content',
            'created_by',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-site_content-created_by',
            'site_content'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            'idx-site_content-created_by',
            'site_content'
        );
        $this->dropTable('{{%site_content}}');
    }
}
