<?php
/**
 * Created by PhpStorm.
 * User: buuug7
 * Date: 2016/6/16
 * Time: 11:46
 * Desc:
 */


use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */


$this->title = '核心业务';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="business-handing">
  <h2> <?= Html::a('宽带安装', ['ydgwkdsld/index',]) ?></h2>

  <h2><?= Html::a('宽带维护', ['fan-kui/index']) ?></h2>

  <h2><?= Html::a('安防监控', ['index']) ?></h2>

  <h2><?= Html::a('魔百盒安装') ?></h2>
</div>
