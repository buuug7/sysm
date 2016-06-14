<?php

use yii\db\Migration;

class m160613_105245_successful_case extends Migration
{

  public function up()
  {
    $tableOptions = null;
    if ($this->db->driverName === 'mysql')
    {
      $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
    }

    $this->createTable('{{%successful_case}}', [
      'id' => $this->primaryKey(),
      'name' => $this->string(64),
      'url' => $this->string(1024),
      'thumbnail_base_url' => $this->string(1024),//缩略图
      'thumbnail_path' => $this->string(1024),//缩略图地址
      'slug' => $this->string(),//游戏名字的拼音
      'status' => $this->smallInteger()->notNull(),//status_in_user=>使用中,status_not_userd停用,
      'created_at' => $this->integer()->notNull(),
      'updated_at' => $this->integer()->notNull(),
    ]);

  }

  public function down()
  {
    $this->dropTable('{{%successful_case}}');
  }

}
