<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%collection}}`.
 */
class m210502_194712_create_collection_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%collection_category}}', [
            'id' => $this->primaryKey(),
            'language'=> $this->string('255'),
            'content_id'=> $this->integer(),
            'name'=>$this->string('255'),
            'image'=>$this->string('255'),
            'status' =>$this->integer()->defaultValue(1),
            'created_at' => $this->timestamp()->null()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->null()

        ]);
        $this->createTable('{{%collection}}', [
            'id' => $this->primaryKey(),
            'collection_category_id'=> $this->integer(),
            'language'=> $this->string('255'),
            'content_id'=> $this->integer(),
            'author'=> $this->string('255'),
            'technique'=> $this->string('255'),
            'materials'=> $this->string('255'),
            'size'=> $this->string('255'),
            'status' =>$this->integer()->defaultValue(1),
            'created_at' => $this->timestamp()->null()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->null()
        ]);
        $this->createIndex(
            'idx-collection-collection_category_id',
            'collection',
            'collection_category_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-collection-collection_category_id',
            'collection',
            'collection_category_id',
            'collection_category',
            'id',
            'CASCADE'
        );
        $this->createTable('{{%logo}}', [
            'id' => $this->primaryKey(),
            'language'=> $this->string('255'),
            'content_id'=> $this->integer(),
            'name'=>$this->string('255'),
            'image'=>$this->string('255'),
            'status' =>$this->integer()->defaultValue(1),
            'created_at' => $this->timestamp()->null()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->null()

        ]);
        $this->createTable('{{%about}}', [
            'id' => $this->primaryKey(),
            'language'=> $this->string('255'),
            'content_id'=> $this->integer(),
            'name'=>$this->string('255'),
            'image'=>$this->string('255'),
            'status' =>$this->integer()->defaultValue(1),
            'created_at' => $this->timestamp()->null()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->null()

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%collection}}');
    }
}
