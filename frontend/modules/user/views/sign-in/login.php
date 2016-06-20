<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \frontend\modules\user\models\LoginForm */

$this->title = '用户登录';
$this->params['breadcrumbs'][] = $this->title;
?>

<!--=== Content Part ===-->
<div class="container content">
  <div class="row">
    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">

      <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => [
          'class' => 'reg-page',
        ],
      ]); ?>
      <div class="reg-header">
        <h2><?= $this->title ?></h2>
      </div>

      <p>
        <?php echo $form->errorSummary($model); ?>
      </p>

      <div class="input-group margin-bottom-20">
        <span class="input-group-addon"><i class="fa fa-user"></i></span>
        <?php echo $form->field($model, 'identity', [
          'template' => '{input}',
        ])->textInput(['placeholder' => '请输入你的邮箱或用户名',]) ?>
      </div>

      <div class="input-group margin-bottom-20">
        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
        <?php echo $form->field($model, 'password', [
          'template' => '{input}',
        ])->passwordInput(['placeholder' => '请输入密码',]) ?>
      </div>

      <div class="row">
        <div class="col-md-6 checkbox">
          <?php echo $form->field($model, 'rememberMe')->checkbox() ?>
        </div>
        <div class="col-md-6">
          <?php echo Html::submitButton(Yii::t('frontend', 'Login'), ['class' => 'btn-u pull-right', 'name' => 'login-button']) ?>
        </div>
      </div>
      <div class="form-group">
        <?php echo Html::a(Yii::t('frontend', 'Need an account? Sign up.'), ['signup']) ?>
      </div>

      <hr>

      <h4>忘记密码 ?</h4>

      <p>
        <?php echo Yii::t('frontend', 'If you forgot your password you can reset it <a href="{link}">here</a>', [
          'link' => yii\helpers\Url::to(['sign-in/request-password-reset'])
        ]) ?>
      </p>

      <?php ActiveForm::end(); ?>

    </div>
  </div>
  <!--/row-->
</div><!--/container-->
<!--=== End Content Part ===-->
