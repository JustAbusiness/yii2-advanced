<?php

use yii\db\Migration;

/**
 * Class m240929_024956_add_column_author_id_to_post_table
 */
class m240929_024956_add_column_author_id_to_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
            $this->addColumn('post', 'author_id', $this->integer()->null());
            $this->addForeignKey('fk-post-author_id-user-id', 'post', 'author_id', 'user', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
            $this->dropForeignKey('fk-post-author_id-user-id', 'post');
            $this->dropColumn('post', 'author_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240929_024956_add_column_author_id_to_post_table cannot be reverted.\n";

        return false;
    }
    */
}
