<?php

use trntv\filekit\widget\Upload;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\base\MultiModel */
/* @var $form yii\widgets\ActiveForm */

$this->title = Yii::t('frontend', 'User Settings');

$this->params['breadcrumbs'][] = $this->title;

?>

<div class="container content">
  <div class="row">
    <div class="col-md-4">
      <div class="user-profile-form">
        <?php $form = ActiveForm::begin(); ?>

        <br>
        <div class="headline"><h2><?php echo Yii::t('frontend', 'Profile settings') ?></h2></div>

        <?php echo $form->field($model->getModel('profile'), 'picture')->widget(
          Upload::classname(),
          [
            'url' => ['avatar-upload']
          ]
        ) ?>

        <?php echo $form->field($model->getModel('profile'), 'firstname')->textInput(['maxlength' => 255]) ?>

        <?php /*echo $form->field($model->getModel('profile'), 'middlename')->textInput(['maxlength' => 255]) */ ?>

        <?php /*echo $form->field($model->getModel('profile'), 'lastname')->textInput(['maxlength' => 255]) */ ?>

        <?php /*echo $form->field($model->getModel('profile'), 'locale')->dropDownlist(Yii::$app->params['availableLocales']) */ ?>

        <?php echo $form->field($model->getModel('profile'), 'gender')->dropDownlist([
          \common\models\UserProfile::GENDER_FEMALE => Yii::t('frontend', 'Female'),
          \common\models\UserProfile::GENDER_MALE => Yii::t('frontend', 'Male')
        ], ['prompt' => '']) ?>

        <br>
        <div class="headline"><h2><?php echo Yii::t('frontend', 'Account Settings') ?></h2></div>

        <?php echo $form->field($model->getModel('account'), 'username') ?>

        <?php echo $form->field($model->getModel('account'), 'email') ?>

        <br>
        <div class="headline"><h2><?php echo Yii::t('common', 'Change Password') ?></h2></div>

        <?php echo $form->field($model->getModel('account'), 'password',['template' => "<label class='control-label'>新密码</label>{input}\n{hint}\n{error}",])->passwordInput() ?>

        <?php echo $form->field($model->getModel('account'), 'password_confirm')->passwordInput() ?>

        <div class="form-group">
          <?php echo Html::submitButton(Yii::t('frontend', 'Update'), ['class' => 'btn-u']) ?>
        </div>

        <?php ActiveForm::end(); ?>

      </div>
    </div>
  </div>

</div>
