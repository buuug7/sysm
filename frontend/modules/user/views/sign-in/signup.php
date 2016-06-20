<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \frontend\modules\user\models\SignupForm */

$this->title = '用户注册';
$this->params['breadcrumbs'][] = $this->title;
?>

<!--=== Content Part ===-->
<div class="container content">
  <div class="row">
    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">

      <?php $form = ActiveForm::begin([
        'id' => 'form-signup',
        'options' => [
          'class' => 'reg-page',
        ],
      ]); ?>

      <div class="reg-header">
        <h2>注册新账号</h2>

        <p>已经拥有账号? 点击
          <?= Html::a('登录', ['login'], ['class' => 'color-green',]) ?> 登录你的账号
        </p>
      </div>

      <p>
        <?= $form->errorSummary($model) ?>
      </p>

      <?php echo $form->field($model, 'username', [
        'template' => '{label} {input}',
      ]) ?>
      <?php echo $form->field($model, 'email', [
        'template' => '{label} {input}',
      ]) ?>
      <?php echo $form->field($model, 'password', [
        'template' => '{label} {input}',
      ])->passwordInput() ?>

      <div class="row">
        <div class="col-lg-6 checkbox">
          <label>
            <input type="checkbox">
            我已经阅读 <a href="page_terms.html" class="color-green">注册须知</a>
          </label>
        </div>
        <div class="col-lg-6 text-right">
          <?php echo Html::submitButton(Yii::t('frontend', 'Signup'), ['class' => 'btn-u', 'name' => 'signup-button']) ?>
        </div>
      </div>
      <?php ActiveForm::end(); ?>
    </div>
  </div>
</div><!--/container-->
<!--=== End Content Part ===-->
