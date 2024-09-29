<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%post}}`.
 */
class m240907_063508_add_imageFile_column_to_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
            $this->addColumn('{{%post}}', 'imageFile', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
            $this->dropColumn('{{%post}}', 'imageFile');
    }
}
