<?php

use yii\db\Migration;

class m160614_060800_album_and_album_category_table extends Migration
{
  public function up()
  {
    $tableOptions=null;
    if($this->db->driverName === 'mysql'){
      $tableOptions='CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
    }

    $this->createTable('{{%album_category}}', [
      'id' => $this->primaryKey(),
      'parent_id' => $this->integer(),
      'title' => $this->string()->notNull(),
      'slug' => $this->string()->notNull(),
    ], $tableOptions);
    $this->addForeignKey('fk-album_category-parent_id', '{{%album_category}}', 'parent_id', '{{%album_category}}', 'id', 'CASCADE');

    $this->createTable('{{%album}}',[
      'id'=>$this->primaryKey(),
      'category_id' => $this->integer()->notNull(),
      'name' => $this->string(64),
      'thumbnail_base_url' => $this->string(1024),
      'thumbnail_path' => $this->string(1024),
      'url'=>$this->string(1024),
      'created_at'=>$this->integer()->notNull(),
      'updated_at'=>$this->integer()->notNull(),
      'status'=>$this->integer()->notNull(),
    ],$tableOptions);
    $this->addForeignKey('fk-album-category_id', '{{%album}}', 'category_id', '{{%album_category}}', 'id', 'CASCADE');
  }
  public function down()
  {
    $this->dropTable('{{%album}}');
    $this->dropTable('{{%album_category}}');
  }
}
