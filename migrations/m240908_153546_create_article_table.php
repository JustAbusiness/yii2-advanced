<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%article}}`.
 */
class m240908_153546_create_article_table extends Migration
{
     /**
      * {@inheritdoc}
      */
     public function safeUp()
     {
          $this->createTable('{{%article}}', [
               'id' => $this->primaryKey(),
               'title' => $this->string()->notNull(),
               'slug' => $this->string(128),
               'body' => $this->text()->notNull(),
               'created_at' => $this->integer(),
               'updated_at' => $this->integer(),
               'created_by' => $this->integer(),
               'updated_by' => $this->integer(),
          ]);

          $this->createIndex(
               'idx-article-created_by',
               'article',
               'created_by'
          );
          $this->addForeignKey(
               'fk-article-created_by',
               'article',
               'created_by',
               'user',
               'id',
               'CASCADE'
          );

          $this->createIndex(
               'idx-article-updated_by',
               'article',
               'updated_by'
          );
          $this->addForeignKey(
               'fk-article-updated_by',
               'article',
               'updated_by',
               'user',
               'id',
               'CASCADE'
          );

     }

     /**
      * {@inheritdoc}
      */
     public function safeDown()
     {
          $this->dropForeignKey('fk-article-created_by', 'article');
          $this->dropIndex('idx-article-created_by', 'article');
          $this->dropForeignKey('fk-article-updated_by', 'article');
          $this->dropIndex('idx-article-updated_by', 'article');

          $this->dropTable('{{%article}}');
     }
}
