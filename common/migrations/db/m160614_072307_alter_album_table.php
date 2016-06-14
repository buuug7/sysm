<?php

use yii\db\Migration;

class m160614_072307_alter_album_table extends Migration
{
  public function up()
  {
    $this->addColumn('{{%album}}', 'description', $this->text());

  }

  public function down()
  {
    $this->dropColumn('{{%album}}', 'description');
  }
}
