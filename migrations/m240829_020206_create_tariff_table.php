<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tariff}}`.
 */
class m240829_020206_create_tariff_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tariff}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'price' => $this->decimal(10, 2)->notNull(),
            'speed' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tariff}}');
    }
}
