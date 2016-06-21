<?php
/**
 * Created by PhpStorm.
 * User: buuug7
 * Date: 2016/6/21
 * Time: 14:20
 * Desc:
 */

namespace backend\controllers;


use common\components\keyStorage\FormModel;
use yii\web\Controller;
use Yii;

class IndexCustomController extends Controller
{

  /*
 * video settings
 * */
  public function actionCustomOneSettings()
  {
    $model = new FormModel([
      'keys' => [
        'block_one_title' => [
          'label' => '区块一标题',
          'type' => FormModel::TYPE_TEXTINPUT
        ],
        'block_one_description' => [
          'label' => '区块一简介',
          'type' => FormModel::TYPE_TEXTAREA,
        ],

        'block_two_title' => [
          'label' => '区块二标题',
          'type' => FormModel::TYPE_TEXTINPUT
        ],
        'block_two_description' => [
          'label' => '区块二简介',
          'type' => FormModel::TYPE_TEXTAREA,
        ],

        'block_three_title' => [
          'label' => '区块三标题',
          'type' => FormModel::TYPE_TEXTINPUT
        ],
        'block_three_description' => [
          'label' => '区块三简介',
          'type' => FormModel::TYPE_TEXTAREA,
        ],

      ]
    ]);

    if ($model->load(Yii::$app->request->post()) && $model->save())
    {
      Yii::$app->session->setFlash('alert', [
        'body' => Yii::t('backend', 'Settings was successfully saved'),
        'options' => ['class' => 'alert alert-success']
      ]);
      return $this->refresh();
    }

    return $this->render('custom-one-settings', ['model' => $model]);
  }

}
