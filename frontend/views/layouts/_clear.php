<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

\frontend\assets\FrontendAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?php echo Yii::$app->language ?>">
<head>
  <meta charset="<?php echo Yii::$app->charset ?>"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?php echo $this->title; ?> | <?= Yii::$app->keyStorage->get('seo_title') ?></title>
  <meta name="keywords" content="<?= Yii::$app->keyStorage->get('seo_keywords') ?>">
  <meta name="description" content="<?= Yii::$app->keyStorage->get('seo_description') ?>">

  <?php $this->head() ?>
  <!-- CSS Global Compulsory -->
  <!--  <link rel="stylesheet" href="/assets2/plugins/bootstrap/css/bootstrap.min.css">-->
  <link rel="stylesheet" href="/assets2/css/style.css">

  <!-- CSS Header and Footer -->
  <link rel="stylesheet" href="/assets2/css/headers/header-v2.css">
  <link rel="stylesheet" href="/assets2/css/footers/footer-v2.css">

  <!-- CSS Implementing Plugins -->
  <link rel="stylesheet" href="/assets2/plugins/animate.css">
  <link rel="stylesheet" href="/assets2/plugins/line-icons/line-icons.css">
  <link rel="stylesheet" href="/assets2/plugins/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="/assets2/plugins/owl-carousel/owl-carousel/owl.carousel.css">
  <!--  <link rel="stylesheet" href="/assets2/plugins/vegas/vegas.min.css">-->

  <!-- CSS Theme -->
  <?php
  $theme = Yii::$app->keyStorage->get('frontend.theme') ? Yii::$app->keyStorage->get('frontend.theme') : 'default';
  ?>
  <link rel="stylesheet" href="<?= "/assets2/css/theme-colors/$theme.css" ?>">

  <!-- CSS Customization -->
  <link rel="stylesheet" href="/assets2/css/custom.css">

  <?php echo Html::csrfMetaTags() ?>
</head>
<body class="header-fixed">
<?php $this->beginBody() ?>
<?php echo $content ?>
<?php $this->endBody() ?>
<!-- JS Global Compulsory -->
<!--<script src="/assets2/plugins/jquery/jquery.min.js"></script>-->
<script src="/assets2/plugins/jquery/jquery-migrate.min.js"></script>
<!--<script src="/assets2/plugins/bootstrap/js/bootstrap.min.js"></script>-->

<!-- JS Implementing Plugins -->
<script src="/assets2/plugins/back-to-top.js"></script>
<script src="/assets2/plugins/smoothScroll.js"></script>
<script src="/assets2/plugins/owl-carousel/owl-carousel/owl.carousel.js"></script>

<!--<script src="/assets2/plugins/vegas/vegas.min.js"></script>-->

<!-- JS Customization -->
<script type="text/javascript" src="/assets2/js/custom.js"></script>

<!-- JS Page Level -->
<script src="/assets2/js/plugins/owl-recent-works.js"></script>
<script src="/assets2/js/plugins/owl-carousel.js"></script>
<script src="/assets2/js/app.js"></script>
<script>
  jQuery(document).ready(function () {
    App.init();
    //OwlCarousel.initOwlCarousel();
    OwlRecentWorks.initOwlRecentWorksV2();
  });
</script>

<!--[if lt IE 9]>
<script src="/assets2/plugins/respond.js"></script>
<script src="/assets2/plugins/html5shiv.js"></script>
<script src="/assets2/plugins/placeholder-IE-fixes.js"></script>
<![endif]-->
</body>
</html>
<?php $this->endPage() ?>
