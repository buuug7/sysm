<?php

use yii\db\Schema;
use common\rbac\Migration;

class m160616_074619_new_permission extends Migration
{

  public function up()
  {
    // 删除权限deletePermission赋予 ROLE_ADMINISTRATOR
    $adminstratorRole = $this->auth->getRole(\common\models\User::ROLE_ADMINISTRATOR);
    $deletPermission = $this->auth->createPermission('deletePermission');
    $this->auth->add($deletPermission);
    $this->auth->addChild($adminstratorRole, $deletPermission);

    // 强制更新权限forceUpdatePermission 赋予 ROLE_ADMINISTRATOR
    $forceUpdatePermission=$this->auth->createPermission('forceUpdatePermission');
    $this->auth->add($forceUpdatePermission);
    $this->auth->addChild($adminstratorRole,$forceUpdatePermission);

  }

  public function down()
  {
    // 删除deletePermission权限
    $this->auth->remove($this->auth->getPermission('deletePermission'));

    // 删除forceUpdatePermission权限
    $this->auth->remove($this->auth->getPermission('forceUpdatePermission'));
  }
}
