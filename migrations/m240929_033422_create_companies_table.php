<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%companies}}`.
 */
class m240929_033422_create_companies_table extends Migration
{
     /**
      * {@inheritdoc}
      */
     public function safeUp()
     {
          $this->createTable('{{%companies}}', [
               'id' => $this->primaryKey(),
               'name' => $this->string()->notNull(),
               'address' => $this->string()->notNull(),
               'email' => $this->string()->null(),
               'status' => $this->string()->defaultValue('inactive'),
               'created_at' => $this->dateTime(),
               'updated_at' => $this->dateTime(),
          ]);
     }

     /**
      * {@inheritdoc}
      */
     public function safeDown()
     {
          $this->dropTable('{{%companies}}');
     }
}
