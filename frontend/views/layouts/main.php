<?php
/* @var $this \yii\web\View */
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;

/* @var $content string */

$this->beginContent('@frontend/views/layouts/base.php')
?>

<?php if (Yii::$app->requestedRoute == ""): ?>
<?php else: ?>
  <!--=== Breadcrumbs ===-->
  <div class="breadcrumbs">
    <div class="container">
      <h1 class="pull-left"><?= $this->title ?></h1>
      <?php echo Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        'options' => ['class' => 'pull-right breadcrumb',],]) ?>
    </div>
    <!--/container-->
  </div><!--/breadcrumbs-->
  <!--=== End Breadcrumbs ===-->
<?php endif; ?>

<?php if (Yii::$app->session->hasFlash('alert')): ?>
  <div class=" container" style="padding-top:15px">
    <?php echo \yii\bootstrap\Alert::widget(['body' => ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'body'),
      'options' => ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'options'),]) ?>
  </div>
<?php endif; ?>


<!-- Example of your ads placing -->
<?php echo \common\widgets\DbText::widget(['key' => 'ads-example']) ?>

<?php echo $content ?>


<?php $this->endContent() ?>
