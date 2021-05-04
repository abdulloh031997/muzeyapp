<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%collection}}`.
 */
class m210503_170322_add_image_column_to_collection_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('collection', 'image', $this->string('255'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
