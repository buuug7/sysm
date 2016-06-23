<?php

use yii\db\Migration;

/**
 * Handles the creation for table `video`.
 */
class m160623_033046_create_video extends Migration
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

    $this->createTable('{{%video}}', [
      'id' => $this->primaryKey(),
      'name' => $this->string(1024)->notNull(),
      'slug' => $this->string(1024)->notNull(),
      'path' => $this->string()->notNull(),
      'base_url' => $this->string(),
      'type' => $this->string(),
      'size' => $this->integer(),
      'created_at' => $this->integer()->notNull(),
      'updated_at' => $this->integer()->notNull(),
      'status' => $this->smallInteger()->defaultValue(1),
    ], $tableOptions);
  }

  /**
   * @inheritdoc
   */
  public function down()
  {
    $this->dropTable('{{%video}}');
  }
}
