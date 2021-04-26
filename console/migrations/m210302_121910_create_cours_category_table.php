<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cours_category}}`.
 */
class m210302_121910_create_cours_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cours_category}}', [
            'id' => $this->primaryKey(),
            'name_uz' =>$this->string('255'),
            'name_en' =>$this->string('255'),
            'name_ru' =>$this->string('255'),
            'status' =>$this->integer()->defaultValue(1)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%cours_category}}');
    }
}
