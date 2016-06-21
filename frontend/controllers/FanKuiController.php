<?php
/**
 * Created by PhpStorm.
 * User: buuug7
 * Date: 2016/6/16
 * Time: 16:13
 * Desc:
 */

namespace frontend\controllers;


use yii\web\Controller;
use yii\filters\VerbFilter;
use frontend\models\FanKui;
use Yii;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;

class FanKuiController extends Controller
{

  public function behaviors()
  {
    return [
      'access' => [
        'class' => AccessControl::className(),
        'rules' => [
          [
            'actions' => ['index', 'view'],
            'allow' => true,
            'roles' => ['@'],
          ]
        ]
      ],
      'verbs' => [
        'class' => VerbFilter::className(),
        'actions' => [
          'delete' => ['post'],
        ],
      ],
    ];
  }


  public function actionIndex()
  {
    $model = new Fankui();
    $model->setSN();
    $model->user_id = Yii::$app->user->identity->getId();
    $model->status = Fankui::STATUS_IN_USE;

    if ($model->load(Yii::$app->request->post()) && $model->save())
    {
      $model->sendEmail();
      Yii::$app->getSession()->setFlash('alert', [
        'body' => '您的宽带维护申请已经成功提交,请保持您的手机畅通,我们会及时与您联系,检查您的邮箱,一封关于该申请的反馈邮件已近发送到您的邮箱',
        'options' => ['class' => 'alert-success']
      ]);

      return $this->redirect(['view', 'id' => $model->id]);
    } else
    {
      return $this->render('index', [
        'model' => $model,
      ]);
    }
  }


  public function actionView($id)
  {

    return $this->render('view', [
      'model' => $this->findModel($id),
    ]);
  }


  protected function findModel($id)
  {
    if (($model = Fankui::findOne($id)) !== null)
    {
      return $model;
    } else
    {
      throw new NotFoundHttpException('The requested page does not exist.');
    }
  }


}
