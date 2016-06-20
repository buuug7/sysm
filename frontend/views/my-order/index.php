<?php
/**
 * Created by PhpStorm.
 * User: buuug7
 * Date: 2016/6/20
 * Time: 11:29
 * Desc:
 */

/* @var $this yii\web\View */
use yii\bootstrap\Html;
use yii\helpers\Url;

$this->title = "我的订单";
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container content-sm">
  <!-- Large Boxes -->
  <div class="row content-boxes-v1 margin-bottom-40">
    <div class="col-sm-3 sm-margin-bottom-40">
      <h2 class="heading-sm">
        <a href="<?= Url::to(['/my-ydgwkdsld-order/index']) ?>">
          <i class="icon-custom icon-md icon-bg-u fa fa-lightbulb-o"></i>
          <span>查询宽带办理订单</span>
        </a>
      </h2>
    </div>
    <div class="col-sm-3 sm-margin-bottom-40">
      <h2 class="heading-sm">
        <a href="<?= Url::to(['/my-fan-kui-order/index']) ?>">
          <i class="icon-custom icon-md icon-bg-blue fa fa-bullhorn"></i>
          <span>查询宽带维护订单</span>
        </a>
      </h2>
    </div>
  </div>
  <!-- End Large Boxes -->
</div>
