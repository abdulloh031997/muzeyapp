<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%registered}}`.
 */
class m210303_043037_add_worksheep_column_to_registered_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('registered', 'workplace', $this->string('255'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
