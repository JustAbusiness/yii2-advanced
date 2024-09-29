<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%departments}}`.
 */
class m240929_034322_create_departments_table extends Migration
{
     /**
      * {@inheritdoc}
      */
     public function safeUp()
     {
          $this->createTable('{{%departments}}', [
               'id' => $this->primaryKey(),
               'branch_id' => $this->integer()->notNull(),
               'name' => $this->string()->notNull(),
               'company_id' => $this->integer()->notNull(),
               'status' => $this->string()->defaultValue('inactive'),
               'created_at' => $this->dateTime(),
               'updated_at' => $this->dateTime(),
          ]);

          $this->createIndex('idx_departments_branch_id', '{{%departments}}', 'branch_id');
          $this->addForeignKey('fk_departments_branch_id', '{{%departments}}', 'branch_id', '{{%banches}}', 'id', 'CASCADE', 'CASCADE');

          $this->createIndex('idx_departments_company_id', '{{%departments}}', 'company_id');
          $this->addForeignKey('fk_departments_company_id', '{{%departments}}', 'company_id', '{{%companies}}', 'id', 'CASCADE', 'CASCADE');

     }

     /**
      * {@inheritdoc}
      */
     public function safeDown()
     {
          $this->dropForeignKey('fk_departments_branch_id', '{{%departments}}');
          $this->dropIndex('idx_departments_branch_id', '{{%departments}}');
          $this->dropForeignKey('fk_departments_company_id', '{{%departments}}');
          $this->dropIndex('idx_departments_company_id', '{{%departments}}');
          $this->dropTable('{{%departments}}');
     }
}
