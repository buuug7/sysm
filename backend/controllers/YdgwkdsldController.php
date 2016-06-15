<?php

namespace backend\controllers;

use Yii;
use common\models\Ydgwkdsld;
use backend\models\search\YdgwkdsldSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * YdgwkdsldController implements the CRUD actions for Ydgwkdsld model.
 */
class YdgwkdsldController extends Controller
{

  public function behaviors()
  {
    return [
      'verbs' => [
        'class' => VerbFilter::className(),
        'actions' => [
          'delete' => ['post'],
        ],
      ],
    ];
  }

  /**
   * Lists all Ydgwkdsld models.
   * @return mixed
   */
  public function actionIndex()
  {
    $searchModel = new YdgwkdsldSearch();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    return $this->render('index', [
      'searchModel' => $searchModel,
      'dataProvider' => $dataProvider,
    ]);
  }

  /**
   * Displays a single Ydgwkdsld model.
   * @param integer $id
   * @return mixed
   */
  public function actionView($id)
  {
    return $this->render('view', [
      'model' => $this->findModel($id),
    ]);
  }

  /**
   * Creates a new Ydgwkdsld model.
   * If creation is successful, the browser will be redirected to the 'view' page.
   * @return mixed
   */
  public function actionCreate()
  {
    $model = new Ydgwkdsld();
    $model->setSN();

    if ($model->load(Yii::$app->request->post()) && $model->save())
    {
      return $this->redirect(['view', 'id' => $model->id]);
    } else
    {
      return $this->render('create', [
        'model' => $model,
      ]);
    }
  }

  /**
   * Updates an existing Ydgwkdsld model.
   * If update is successful, the browser will be redirected to the 'view' page.
   * @param integer $id
   * @return mixed
   */
  public function actionUpdate($id)
  {
    $model = $this->findModel($id);

    if ($model->load(Yii::$app->request->post()) && $model->save())
    {
      return $this->redirect(['view', 'id' => $model->id]);
    } else
    {
      return $this->render('update', [
        'model' => $model,
      ]);
    }
  }

  /**
   * Deletes an existing Ydgwkdsld model.
   * If deletion is successful, the browser will be redirected to the 'index' page.
   * @param integer $id
   * @return mixed
   */
  public function actionDelete($id)
  {
    $this->findModel($id)->delete();

    return $this->redirect(['index']);
  }

  /*
   * 打印表单
   * */
  public function actionPrint($id){
    $model=$this->findModel($id);
    $messages=$model->printBiaoDan();
    Yii::$app->getSession()->setFlash('alert', [
      'body' => '表单生成完毕,点击下面的按钮进行下载',
      'options' => ['class' => 'alert-info']
    ]);

    return $this->render('print',[
      'model' => $model,
      'messages' => $messages,
    ]);
  }

  /**
   * Finds the Ydgwkdsld model based on its primary key value.
   * If the model is not found, a 404 HTTP exception will be thrown.
   * @param integer $id
   * @return Ydgwkdsld the loaded model
   * @throws NotFoundHttpException if the model cannot be found
   */
  protected function findModel($id)
  {
    if (($model = Ydgwkdsld::findOne($id)) !== null)
    {
      return $model;
    } else
    {
      throw new NotFoundHttpException('The requested page does not exist.');
    }
  }
}
