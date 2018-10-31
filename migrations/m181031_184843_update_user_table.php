<?php

use yii\db\Migration;

/**
 * Class m181031_184843_update_user_table
 */
class m181031_184843_update_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'access_token', $this->string()->unique()->after('auth_key'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'access_token');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181031_184843_update_user_table cannot be reverted.\n";

        return false;
    }
    */
}
