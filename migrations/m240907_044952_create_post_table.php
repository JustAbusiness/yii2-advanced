<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post}}`.
 */
class m240907_044952_create_post_table extends Migration
{
     /**
      * {@inheritdoc}
      */
     public function safeUp()
     {
          $this->createTable('{{%post}}', [
               'id' => $this->primaryKey(),
               'content' => $this->text()
          ]);
     }

     /**
      * {@inheritdoc}
      */
     public function safeDown()
     {
          $this->dropTable('{{%post}}');
     }
}
