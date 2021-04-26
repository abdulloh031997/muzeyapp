<?php

use yii\db\Migration;

/**
 * Class m210226_111331_add_phone_to_column_registered_table
 */
class m210226_111331_add_phone_to_column_registered_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('registered','phone', $this->string('255'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // echo "m210226_111331_add_phone_to_column_registered_table cannot be reverted.\n";

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210226_111331_add_phone_to_column_registered_table cannot be reverted.\n";

        return false;
    }
    */
}
