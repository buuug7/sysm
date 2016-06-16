<?php
/**
 * Created by PhpStorm.
 * User: buuug7
 * Date: 2016/6/16
 * Time: 17:06
 * Desc:
 */

namespace frontend\models;


class FanKui extends \common\models\Fankui
{

  public $captcha;

  public function rules()
  {
    $rules=parent::rules();
    $rules[] = ['captcha', 'required'];
    $rules[] = ['captcha', 'captcha'];
    return $rules;
  }

  public function attributeLabels()
  {
    $labels=parent::attributeLabels();
    $labels['captcha']=\Yii::t('common','captcha');
    return $labels;
  }

}
