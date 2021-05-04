<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%collection}}`.
 */
class m210504_062433_add_name_column_to_collection_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('collection', 'name', $this->string('255'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
