<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \frontend\modules\user\models\PasswordResetRequestForm */

$this->title = Yii::t('frontend', 'Request password reset');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container content">
  <div class="site-request-password-reset">
    <blockquote class="hero">
      请填写你注册账号时候的电子邮件,一封重置密码的链接会发送到你的邮箱
    </blockquote>

    <?php $form = ActiveForm::begin([
      'id' => 'request-password-reset-form',
      'options' => [
        'class' => 'form-inline',
      ],
    ]); ?>

    <?php echo $form->field($model, 'email', [
      'template' => '{label} {input}',
    ]) ?>
    <?php echo Html::submitButton('发送', ['class' => 'btn btn-primary']) ?>

    <p>
      <?php echo $form->errorSummary($model); ?>
    </p>
    <?php ActiveForm::end(); ?>
  </div>
</div>

