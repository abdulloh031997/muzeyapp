<?php

use yii\db\Migration;

/**
 * Class m210509_161959_add_value_to_column_setting_table
 */
class m210509_161959_add_value_to_column_setting_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('setting', 'value', $this->text());
        $this->addColumn('post', 'user_id', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210509_161959_add_value_to_column_setting_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210509_161959_add_value_to_column_setting_table cannot be reverted.\n";

        return false;
    }
    */
}
