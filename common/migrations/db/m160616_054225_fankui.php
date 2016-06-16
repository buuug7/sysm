<?php

use yii\db\Migration;

class m160616_054225_fankui extends Migration
{

  /*意见反馈与报修*/
  public function up()
  {
    $tableOptions = null;
    if ($this->db->driverName === 'mysql')
    {
      $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
    }
    $this->createTable('{{%fankui}}', [
      'id' => $this->primaryKey(),
      'user_id' => $this->integer()->notNull(), //对应user的user_id
      'sn' => $this->string(64), // 编号
      'customer_name' => $this->string(64)->notNull(), //客户姓名
      'customer_phone' => $this->string()->notNull(), //客户联系电话
      'address' => $this->string(512), //住宅小区
      'address_detail' => $this->string(512)->notNull(), // 详细地址
      'error_code' => $this->string(64)->notNull(), // 错误代码
      'red_light_flashing' => $this->smallInteger()->notNull(), // 红灯闪烁,0=>为闪烁,1=>闪烁
      'detail_description' => $this->text()->notNull(), //错误详情描述
      'customer_confirm_name' => $this->string(64)->notNull(), // 客户确认签字
      'customer_confirm_time' => $this->integer()->notNull(), // 客户确认时间
      'business_person_name' => $this->string(64), //办理人员姓名
      'business_person_phone' => $this->string(64), //办理人员电话

      'created_at' => $this->integer()->notNull(),
      'updated_at' => $this->integer()->notNull(),
      'progress' => $this->smallInteger()->notNull(), //申请进度 0=>新提交,1=>正在处理,2=>完成处理
      'status' => $this->smallInteger()->notNull(), //状态,0=>可用,1=>不可用
    ], $tableOptions);

    $this->addForeignKey('fk-fankui-user_id', '{{%fankui}}', 'user_id', '{{%user}}', 'id', 'CASCADE');

  }

  public function down()
  {
    $this->dropTable('{{%fankui}}');
  }

}
