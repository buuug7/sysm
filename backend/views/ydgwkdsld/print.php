<?php
/**
 * Created by PhpStorm.
 * User: buuug7
 * Date: 2016/6/15
 * Time: 16:44
 * Desc:
 */

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use common\models\Ydgwkdsld;

/* @var $this yii\web\View */
/* @var $model common\models\Ydgwkdsld */

$this->title = "打印表单";
$this->params['breadcrumbs'][] = ['label' => '移动光网宽带受理单', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


?>

<div class="ydgwkdsld-print">
  <p>
    <?php echo Html::a('重新生成', ['print', 'id' => $model->id,], ['class' => 'btn btn-warning btn-flat',]) ?>
  </p>
  <?php include_once "./phpword/print.php"; ?>
</div>

