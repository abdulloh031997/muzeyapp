<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pages}}`.
 */
class m210507_191304_create_pages_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%page}}', [
            'id' => $this->primaryKey(),
            'language'=> $this->string('255'),
            'content_id'=> $this->integer(),
            'user_id' => $this->integer(),
            'title' => $this->string('255'),
            'image' => $this->string('255'),
            'body' => $this->text(),
            'status' => $this->integer()->defaultValue(1),
            'created_at' => $this->timestamp()->null()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->null()
        ]);
        $this->createTable('{{%title_lang}}', [
            'id' => $this->primaryKey(),
            'language'=> $this->string('255'),
            'content_id'=> $this->integer(),
            'user_id' => $this->integer(),
            'title' => $this->string('255'),
            'image' => $this->string('255'),
            'body' => $this->text(),
            'status' => $this->integer()->defaultValue(1),
            'created_at' => $this->timestamp()->null()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->null()
        ]);
        $this->createTable('{{%slider}}', [
            'id' => $this->primaryKey(),
            'language'=> $this->string('255'),
            'content_id'=> $this->integer(),
            'user_id' => $this->integer(),
            'title' => $this->string('255'),
            'image' => $this->string('255'),
            'body' => $this->text(),
            'status' => $this->integer()->defaultValue(1),
            'created_at' => $this->timestamp()->null()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->null()
        ]);
        $this->createTable('{{%setting}}', [
            'id' => $this->primaryKey(),
            'key'=> $this->string('255'),
            'language'=> $this->string('255'),
            'content_id'=> $this->integer(),
            'user_id' => $this->integer(),
            'title' => $this->string('255'),
            'image' => $this->string('255'),
            'status' => $this->integer()->defaultValue(1),
            'created_at' => $this->timestamp()->null()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->null()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%pages}}');
    }
}
