<?php

use yii\db\Migration;

class m160621_083412_alter_table_artile extends Migration
{

  public function up()
  {
    $this->addColumn('{{%article}}', 'recommend', $this->smallInteger()->defaultValue(0));
    $this->addColumn('{{%article}}', 'description', $this->text());

  }

  public function down()
  {
    $this->dropColumn('{{%article}}', 'recommend');
    $this->dropColumn('{{%article}}', 'description');
  }
}
