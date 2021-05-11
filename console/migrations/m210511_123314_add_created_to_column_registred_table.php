<?php

use yii\db\Migration;

/**
 * Class m210511_123314_add_created_to_column_registred_table
 */
class m210511_123314_add_created_to_column_registred_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('registred','created_at', $this->timestamp()->null()->defaultExpression('CURRENT_TIMESTAMP'));
        $this->addColumn('registred','updated_at', $this->timestamp()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // echo "m210511_123314_add_created_to_column_registred_table cannot be reverted.\n";

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210511_123314_add_created_to_column_registred_table cannot be reverted.\n";

        return false;
    }
    */
}
