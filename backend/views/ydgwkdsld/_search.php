<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\YdgwkdsldSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="ydgwkdsld-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id') ?>

    <?php echo $form->field($model, 'user_id') ?>

    <?php echo $form->field($model, 'sn') ?>

    <?php echo $form->field($model, 'customer_name') ?>

    <?php echo $form->field($model, 'customer_phone') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'address_detail') ?>

    <?php // echo $form->field($model, 'package_price') ?>

    <?php // echo $form->field($model, 'primary_phone_number') ?>

    <?php // echo $form->field($model, 'secondly_phone_number_1') ?>

    <?php // echo $form->field($model, 'secondly_phone_number_2') ?>

    <?php // echo $form->field($model, 'secondly_phone_number_3') ?>

    <?php // echo $form->field($model, 'customer_confirm_name') ?>

    <?php // echo $form->field($model, 'customer_confirm_time') ?>

    <?php // echo $form->field($model, 'business_person_name') ?>

    <?php // echo $form->field($model, 'business_person_phone') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'update_at') ?>

    <?php // echo $form->field($model, 'progress') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('common', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton(Yii::t('common', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
