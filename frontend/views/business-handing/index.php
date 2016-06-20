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

<div class="container content">
  <div class="row margin-bottom-40">
    <div class="col-md-3 col-sm-6">
      <div class="service-block service-block-default">
        <i class="icon-custom rounded-x icon-bg-dark fa fa-lightbulb-o"></i>
        <h2 class="heading-md"><?= Html::a('宽带安装', ['ydgwkdsld/index',]) ?></h2>
        <p>Donec id elit non mi porta gravida at eget metus id elit mi egetine. Fusce dapibus</p>
      </div>
    </div>
    <div class="col-md-3 col-sm-6">
      <div class="service-block service-block-default">
        <i class="icon-custom rounded-x icon-bg-dark fa fa-compress"></i>
        <h2 class="heading-md"><?= Html::a('宽带维护', ['fan-kui/index']) ?></h2>
        <p>Donec id elit non mi porta gravida at eget metus id elit mi egetine. Fusce dapibus</p>
      </div>
    </div>
    <div class="col-md-3 col-sm-6">
      <div class="service-block service-block-default">
        <i class="icon-custom rounded-x icon-bg-dark icon-line icon-rocket"></i>
        <h2 class="heading-md"><?= Html::a('安防监控', ['index']) ?></h2>
        <p>Donec id elit non mi porta gravida at eget metus id elit mi egetine. Fusce dapibus</p>
      </div>
    </div>
    <div class="col-md-3 col-sm-6">
      <div class="service-block service-block-default">
        <i class="icon-custom rounded-x icon-bg-dark icon-line icon-support"></i>
        <h2 class="heading-md"><?= Html::a('魔百盒安装') ?></h2>
        <p>Donec id elit non mi porta gravida at eget metus id elit mi egetine usce dapibus elit nondapibus</p>
      </div>
    </div>
  </div>
</div>
