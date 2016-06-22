<?php

use yii\db\Migration;

/**
 * Handles the creation for table `table_links`.
 */
class m160622_025005_create_table_links extends Migration
{

  /**
   * @inheritdoc
   */
  public function up()
  {
    $tableOptions = null;
    if ($this->db->driverName === 'mysql')
    {
      $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
    }

    $this->createTable('{{%friend_links}}', [
      'id' => $this->primaryKey(),
      'category_id' => $this->smallInteger()->notNull(),
      'name' => $this->string()->notNull(),
      'url' => $this->string()->notNull(),
      'slug' => $this->string()->notNull(),
      'sort' => $this->smallInteger()->defaultValue(0),
      'created_at' => $this->integer()->notNull(),
      'updated_at' => $this->integer()->notNull(),
      'status' => $this->smallInteger()->defaultValue(0),
    ], $tableOptions);
  }

  /**
   * @inheritdoc
   */
  public function down()
  {
    $this->dropTable('{{%friend_links}}');
  }
}
