<?php
/**
 * Created by PhpStorm.
 * User: buuug7
 * Date: 2016/6/22
 * Time: 17:40
 * Desc:
 */

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FriendLinks */

$this->title = Yii::t('common', 'Update {modelClass}: ', [
    'modelClass' => Yii::t('common', 'Friend Links'),
  ]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Friend Links'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');

?>

<div class="friend-links-update">
  <?php echo $this->render('_form', [
    'model' => $model,
  ]) ?>
</div>
