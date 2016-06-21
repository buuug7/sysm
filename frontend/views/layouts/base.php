<?php

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\helpers\Html;


/* @var $this \yii\web\View */
/* @var $content string */

$this->beginContent('@frontend/views/layouts/_clear.php');
?>
<div class="wrapper">

  <!--=== Header v2 ===-->
  <div class="header-v2 header-sticky">
    <div class="container container-space">
      <!-- Topbar v2 -->
      <div class="topbar-v2">
        <div class="row">
          <div class="col-sm-8">
            <ul class="list-inline top-v2-contacts">
              <li>电子邮件: <a href="mailto:info@htmlstream.com"><?=Yii::$app->keyStorage->get('mail_support')?></a></li>
              <li>电话: <?=Yii::$app->keyStorage->get('site_phone')?></li>
            </ul>
          </div>
          <div class="col-sm-4">
            <div class="topbar-buttons pull-right">
              <?php if (Yii::$app->user->isGuest): ?>
                  <a class="btn-u btn-brd btn-brd-hover btn-u-light" href="<?php echo Url::to(['/user/sign-in/login']) ?>">登录 / 注册</a>
              <?php else: ?>
                  <a class="btn-u  margin-right-5" href="<?= Url::to(['/user/default/index']) ?>">
                    <?= Yii::$app->user->identity->getPublicIdentity() ?>
                  </a>
                  <a class="btn-u btn-brd btn-brd-hover btn-u-light" href="<?= Url::to(['/user/sign-in/logout']) ?>" data-method="post">退出</a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
      <!-- End Topbar v2 -->
    </div>

    <!-- Navbar -->
    <div class="navbar navbar-default mega-menu" role="navigation">
      <div class="container container-space">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="fa fa-bars"></span>
          </button>
          <a class="navbar-brand brand-style" href="/">
            <img id="logo-header" src="/assets2/sysimg/logo-nav.png" width="85" height="32" alt="Logo">
          </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-responsive-collapse">
          <ul class="nav navbar-nav">
            <!-- 首页 -->
            <li class="">
              <a href="<?php echo Url::to(['/']) ?>">首页</a>
            </li>

            <!-- 公司动态 -->
            <li class="">
              <a href="<?php echo Url::to(['/article/index']) ?>">公司动态</a>
            </li>

            <!-- 核心业务 -->
            <li class="">
              <a href="<?php echo Url::to(['/business-handing/index']) ?>">核心业务</a>
            </li>

            <!-- 公司制度 -->
            <li class="">
              <a href="<?php echo Url::to(['/page/view', 'slug' => 'gong-si-zhi-du']) ?>">公司制度</a>
            </li>

            <!-- 互动平台 -->
            <li class="dropdown">
              <a href="<?php echo Url::to(['/page/view', 'slug' => 'gong-si-zhi-du']) ?>">互动平台</a>
              <ul class="dropdown-menu pull-right">
                <li><?= Html::a('查询订单', ['/my-order/index']) ?></li>
                <li><?= Html::a('意见反馈', ['/site/contact']) ?></li>
              </ul>
            </li>
          </ul>
        </div>
        <!--/navbar-collapse-->
      </div>
    </div>
    <!-- End Navbar -->
  </div>
  <!--=== End Header v2 ===-->

  <?php if (Yii::$app->requestedRoute == ''): ?>
    <style>
      @media (min-width: 992px) {
        .interactive-slider-v2 {
          padding: 200px 0 150px 0 !important;
        }

        .interactive-slider-v2 .bn a {
          margin-right: 5px;
          margin-left: 5px;;
        }
      }

      @media (max-width: 991px) {
        .interactive-slider-v2 {
          padding: 30px 0 30px 0 !important;
        }

        .interactive-slider-v2 .bn a {
          display: block;
          width: 150px;
          margin: 0 auto;
          margin-top: 10px;
        }
      }
    </style>
    <!-- Image Gradient -->
    <div class="interactive-slider-v2">
      <div class="container">
        <div class="bn">

          <?= Html::a('宽带安装', ['/ydgwkdsld/index',], ['class' => 'btn-u btn-u-blue btn-u-lg',]) ?>

          <?= Html::a('宽带维护', ['/fan-kui/index',], ['class' => 'btn-u btn-u-red btn-u-lg',]) ?>

          <?= Html::a('安防监控', ['/ydgwkdsld/index',], ['class' => 'btn-u btn-u-orange btn-u-lg',]) ?>

        </div>

        <p>为您提供专业的移动光网宽带安装维护解决方案</p>
      </div>
    </div>
    <!-- End Image Gradient -->
  <?php else: ?>
    <style>
      @media (min-width: 992px) {
        .interactive-slider-v2 {
          padding: 100px 0 80px 0;
        }
      }

      @media (max-width: 991px) {
        .interactive-slider-v2 {
          padding: 50px 0 50px 0;
        }
      }

    </style>
    <!-- Image Gradient -->
    <div class="interactive-slider-v2">
    </div>
    <!-- End Image Gradient -->
  <?php endif; ?>


  <?php echo $content ?>


  <!--=== Footer v2 ===-->
  <div id="footer-v2" class="footer-v2">
    <div class="footer">
      <div class="container">
        <div class="row">
          <!-- About -->
          <div class="col-md-3 md-margin-bottom-40">
            <a href="#"><img id="logo-footer" class="footer-logo" src="/assets2/sysimg/logo-nav.png" alt=""></a>

            <p class="margin-bottom-20">
              <?=Yii::$app->keyStorage->get('site_description')?>
            </p>
          </div>
          <!-- End About -->

          <!-- Link List -->
          <div class="col-md-3 md-margin-bottom-40">
            <div class="headline"><h2 class="heading-sm">友情链接</h2></div>
            <ul class="list-unstyled link-list">
              <li><a href="http://www.gsyd.com">甘肃移动官网</a><i class="fa fa-angle-right"></i></li>
            </ul>
          </div>
          <!-- End Link List -->

          <!-- Latest Tweets -->
          <div class="col-md-3 md-margin-bottom-40">
            <div class="latest-tweets">
              <div class="headline"><h2 class="heading-sm">最新动态</h2></div>
              <?php foreach (\common\models\Article::getRecentArticles(4) as $article): ?>
                <div class="latest-tweets-inner">
                  <p>
                    <a
                      href="<?= Url::to(['/article/view', 'slug' => $article->slug]) ?>"><?= \yii\helpers\StringHelper::truncate($article->title, 25) ?></a>
                    <small
                      class="twitter-time"><?= Yii::$app->formatter->asRelativeTime($article->published_at) ?></small>
                  </p>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
          <!-- End Latest Tweets -->

          <!-- Address -->
          <div class="col-md-3 md-margin-bottom-40">
            <div class="headline"><h2 class="heading-sm">联系我们</h2></div>
            <address class="md-margin-bottom-40">
              <i class="fa fa-home"></i><?=Yii::$app->keyStorage->get('site_address')?> <br/>
              <i class="fa fa-phone"></i>电话:<?= Yii::$app->keyStorage->get('site_phone')?> <br/>
              <i class="fa fa-envelope"></i>Email: <a href="mailto:info@anybiz.com"><?=Yii::$app->keyStorage->get('mail_support')?></a>
            </address>

            <!-- Social Links -->
            <ul class="social-icons">
              <li><a href="#" data-original-title="Facebook" class="rounded-x social_facebook"></a></li>
              <li><a href="#" data-original-title="Twitter" class="rounded-x social_twitter"></a></li>
              <li><a href="#" data-original-title="Goole Plus" class="rounded-x social_googleplus"></a></li>
              <li><a href="#" data-original-title="Linkedin" class="rounded-x social_linkedin"></a></li>
            </ul>
            <!-- End Social Links -->
          </div>
          <!-- End Address -->
        </div>
      </div>
    </div>
    <!--/footer-->

    <div class="copyright">
      <div class="container">
        <p class="text-center">2016 &copy; <?= Yii::$app->name ?>版权所有 by <a target="_blank" href="#">buuug7</a>
        </p>
      </div>
    </div>
    <!--/copyright-->
  </div>
  <!--=== End Footer v2 ===-->
</div>

<?php $this->endContent() ?>
