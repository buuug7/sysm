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

class VideoController extends Controller
{

  /*
 * video settings
 * */
  public function actionVideoSettings()
  {
    $model = new FormModel([
      'keys' => [
        'video_title' => [
          'label' => '视频标题',
          'type' => FormModel::TYPE_TEXTINPUT
        ],
        'video_description' => [
          'label' => '视频简介',
          'type' => FormModel::TYPE_TEXTAREA,
        ],
        'video_url' => [
          'label' => '视频URL',
          'type' => FormModel::TYPE_TEXTINPUT,
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

    return $this->render('video-settings', ['model' => $model]);
  }

}
