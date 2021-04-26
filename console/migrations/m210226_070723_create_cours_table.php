<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post}}`.
 */
class m210226_070723_create_cours_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%banner}}', [
            'id' => $this->primaryKey(),
            'language'=> $this->string('255'),
            'content_id'=> $this->integer(),
            'name' => $this->string(255),
            'image' => $this->string(50),
            'sort' => $this->integer()->defaultValue(0),
            'status' => $this->integer()->defaultValue(0),
        ]);
        $this->createTable('{{%impressions}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string('255'),
            'language'=> $this->string('255'),
            'content_id'=> $this->integer(),
            'description' => $this->string('255'),
            'body' => $this->text(),
            'image' => $this->string('255'),
            'status' => $this->integer()->defaultValue(1),
            'date' => $this->datetime(),
            'created_at' => $this->timestamp()->null()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->null()
        ]);
        $this->createTable('{{%partner}}', [
            'id' => $this->primaryKey(),
            'language'=> $this->string('255'),
            'content_id'=> $this->integer(),
            'name' => $this->string(255),
            'image' => $this->string(250),
            'status' => $this->integer()->defaultValue(0),
        ]);
        $this->createTable('{{%team}}', [
            'id' => $this->primaryKey(),
            'language'=> $this->string('255'),
            'content_id'=> $this->integer(),
            'fio' => $this->string(255),
            'image' => $this->string(250),
            'position' => $this->string(250),
            'about' => $this->text(),
            'twitter' => $this->text(),
            'facebook' => $this->text(),
            'instagram' => $this->text(),
            'linkedin' => $this->text(),
            'telegram' => $this->text(),
            'status' => $this->integer()->defaultValue(0),
        ]);
        $this->createTable('{{%language}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100),
            'lang_code' => $this->string(10),
            'locale' => $this->string(50),
            'rtl' => $this->smallInteger()->defaultValue(0),
            'default' => $this->smallInteger()->defaultValue(0),
            'sort' => $this->integer()->defaultValue(0),
            'status' => $this->integer()->defaultValue(0),
        ]);

        // creates index for column `lang_code`
        $this->createIndex(
            'idx-setting-lang_code',
            'language',
            'lang_code'
        );

        $this->insert('{{%language}}', [
            'name' => 'Deutsch',
            'lang_code' => 'de',
            'locale' => 'de_DE',
            'rtl' => 0,
            'status' => 0,
        ]);

        $this->insert('{{%language}}', [
            'name' => 'English',
            'lang_code' => 'en',
            'locale' => 'en_GB',
            'rtl' => 0,
            'status' => 1,
        ]);

        $this->insert('{{%language}}', [
            'name' => 'Español',
            'lang_code' => 'es',
            'locale' => 'es_ES',
            'rtl' => 0,
            'status' => 0,
        ]);

        $this->insert('{{%language}}', [
            'name' => 'Français',
            'lang_code' => 'fr',
            'locale' => 'fr_FR',
            'rtl' => 0,
            'status' => 0,
        ]);

        $this->insert('{{%language}}', [
            'name' => 'Italiano',
            'lang_code' => 'it',
            'locale' => 'it_IT',
            'rtl' => 0,
            'status' => 0,
        ]);

        $this->insert('{{%language}}', [
            'name' => 'O\'zbekcha',
            'lang_code' => 'uz',
            'locale' => 'uz_UZ',
            'rtl' => 0,
            'status' => 0,
        ]);

        $this->insert('{{%language}}', [
            'name' => 'Türkçe',
            'lang_code' => 'tr',
            'locale' => 'tr_TR',
            'rtl' => 0,
            'status' => 0,
        ]);

        $this->insert('{{%language}}', [
            'name' => 'Русский',
            'lang_code' => 'ru',
            'locale' => 'ru_RU',
            'rtl' => 0,
            'status' => 0,
        ]);
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'name' =>$this->string('255'),
            'language'=> $this->string('255'),
            'content_id'=> $this->integer(),
            'status' =>$this->integer()->defaultValue(1),
        ]);
        $this->createTable('{{%post}}', [
            'id' => $this->primaryKey(),
            'category_id' =>$this->integer(),
            'title' => $this->string('255'),
            'language'=> $this->string('255'),
            'content_id'=> $this->integer(),
            'description' => $this->string('255'),
            'body' => $this->text(),
            'image' => $this->string('255'),
            'status' => $this->integer()->defaultValue(1),
            'created_at' => $this->timestamp()->null()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->null()
        ]);
        $this->createTable('{{%menu}}', [
            'id' => $this->primaryKey(),
            'name' =>$this->string('255'),
            'language'=> $this->string('255'),
            'content_id'=> $this->integer(),
            'parent_id'=> $this->integer(),
            'link'=> $this->string('255'),
            'c_order'=> $this->string('255'),
            'target_blank'=> $this->integer(),
            'visible_top'=> $this->integer(),
            'slug'=> $this->string('255'),
            'status' =>$this->integer()->defaultValue(1),
        ]);
        $this->createIndex(
            'idx-post-category_id',
            'post',
            'category_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-post-category_id',
            'post',
            'category_id',
            'category',
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
            'fk-post-category_id',
            'post'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            'idx-post-category_id',
            'post'
        );
        $this->dropTable('{{%post}}');
        
    }
}
