<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cours}}`.
 */
class m210226_070723_create_cours_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cours}}', [
            'id' => $this->primaryKey(),
            'name_uz'=> $this->string('255'),
            'name_ru'=> $this->string('255'),
            'name_en'=> $this->string('255'),
            'image' => $this->string('255'),
            'status' =>$this->integer()->defaultValue(1),
        ]);
        $this->createTable('{{%cours_block}}', [
            'id' => $this->primaryKey(),
            'cours_id' =>$this->integer(),
            'name_uz'=> $this->string('255'),
            'name_ru'=> $this->string('255'),
            'name_en'=> $this->string('255'),
            'status' =>$this->integer()->defaultValue(1),
        ]);
        $this->createIndex(
            'idx-cours_block-cours_id',
            'cours_block',
            'cours_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-cours_block-cours_id',
            'cours_block',
            'cours_id',
            'cours',
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
            'fk-cours_block-cours_id',
            'cours_block'
        );

        // drops index for column `cours_id`
        $this->dropIndex(
            'idx-cours_block-cours_id',
            'cours_block'
        );
        $this->dropTable('{{%cours}}');
        
    }
}
