<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%banches}}`.
 */
class m240929_034230_create_banches_table extends Migration
{
     /**
      * {@inheritdoc}
      */
     public function safeUp()
     {
          $this->createTable('{{%banches}}', [
               'id' => $this->primaryKey(),
               'company_id' => $this->integer()->notNull(),
               'name' => $this->string()->notNull(),
               'address' => $this->string()->notNull(),
               'status' => $this->string()->defaultValue('inactive'),
               'created_at' => $this->dateTime(),
               'updated_at' => $this->dateTime(),
          ]);

          $this->createIndex('idx_banches_company_id', '{{%banches}}', 'company_id');
          $this->addForeignKey('fk_banches_company_id', '{{%banches}}', 'company_id', '{{%companies}}', 'id', 'CASCADE', 'CASCADE');

     }

     /**
      * {@inheritdoc}
      */
     public function safeDown()
     {
          $this->dropForeignKey('fk_banches_company_id', '{{%banches}}');
          $this->dropIndex('idx_banches_company_id', '{{%banches}}');
          $this->dropTable('{{%banches}}');
     }
}
