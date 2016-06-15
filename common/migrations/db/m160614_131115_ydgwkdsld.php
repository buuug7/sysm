<?php

use yii\db\Migration;

class m160614_131115_ydgwkdsld extends Migration
{

  public function up()
  {
    $tableOptions = null;
    if ($this->db->driverName === 'mysql')
    {
      $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
    }
    // 中国移动光网宽带受理单
    $this->createTable('{{%ydgwkdsld}}', [
      'id' => $this->primaryKey(),
      'user_id' => $this->integer()->notNull(), //对应user的user_id
      'sn' => $this->string(64)->notNull(), //编号
      'customer_name' => $this->string(64)->notNull(), //客户姓名
      'customer_phone' => $this->string(64)->notNull(), //客户联系电话
      'address' => $this->string(512)->notNull(), //住宅小区
      'address_detail' => $this->string(512), //详细地址
      'package_price' => $this->string(512)->notNull(), //套餐资费
      'primary_phone_number' => $this->string(64)->notNull(), // 主号
      'secondly_phone_number_1' => $this->string(64), //副号1
      'secondly_phone_number_2' => $this->string(64), //副号2
      'secondly_phone_number_3' => $this->string(64), //副号3
      'customer_confirm_name' => $this->string(64)->notNull(), //客户签字确认
      'customer_confirm_time' => $this->integer()->notNull(), //客户签字确认时间
      'business_person_name' => $this->string(64), //业务办理人员
      'business_person_phone' => $this->string(64), //业务办理人员联系电话
      'created_at' => $this->integer()->notNull(),
      'updated_at' => $this->integer()->notNull(),
      'progress' => $this->smallInteger()->notNull(), //申请进度 0=>新提交,1=>正在处理,2=>完成处理
      'status' => $this->smallInteger()->notNull(), //状态,0=>可用,1=>不可用
    ], $tableOptions);

    $this->addForeignKey('fk-ydgwkdsld-user_id', '{{%ydgwkdsld}}', 'user_id', '{{%user}}', 'id', 'CASCADE');
  }

  public function down()
  {
    $this->dropTable("{{%ydgwkdsld}}");
  }

}
