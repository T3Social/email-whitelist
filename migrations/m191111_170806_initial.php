<?php

use humhub\components\Migration;

/**
 * Class m191111_170806_initial
 */
class m191111_170806_initial extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->safeAddColumn('group', 'enterprise_email_map', $this->text()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191111_170806_initial cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191111_170806_initial cannot be reverted.\n";

        return false;
    }
    */
}
