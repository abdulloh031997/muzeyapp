<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%registred}}`.
 */
class m210511_113048_create_registred_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%registred}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string('255'),
            'fname'=>$this->string('255'),
            'email' =>$this->string('255'),
            'phone' => $this->string('255'),
            'date_of_visit' =>$this->dateTime(),
            'number_of_visit' =>$this->integer(),
            'institution_name' =>$this->string('255'),
            'type' =>$this->integer(),
            'lang' =>$this->integer(),
            'status' => $this->integer()->defaultValue(0),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%registred}}');
    }
}
