<?php
/**
 * Created by PhpStorm.
 * User: buuug7
 * Date: 2016/6/14
 * Time: 14:21
 * Desc:
 */


namespace backend\controllers;

use backend\models\search\AlbumCategorySearch;
use Yii;
use common\models\AlbumCategory;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * AlbumCategoryController implements the CRUD actions for AlbumCategory model.
 */
class AlbumCategoryController extends Controller
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
   * Lists all AlbumCategory models.
   * @return mixed
   */
  public function actionIndex()
  {
    $searchModel = new AlbumCategorySearch();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    return $this->render('index', [
      'searchModel' => $searchModel,
      'dataProvider' => $dataProvider,
    ]);
  }

  /**
   * Displays a single AlbumCategory model.
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
   * Creates a new AlbumCategory model.
   * If creation is successful, the browser will be redirected to the 'view' page.
   * @return mixed
   */
  public function actionCreate($id = null)
  {
    $categories = AlbumCategory::find()->all();
    $model = new AlbumCategory();
    $model->parent_id = $id;

    if ($model->load(Yii::$app->request->post()) && $model->save())
    {
      return $this->redirect(['view', 'id' => $model->id]);
    } else
    {
      return $this->render('create', [
        'model' => $model,
        'categories' => $categories,
      ]);
    }
  }

  /**
   * Updates an existing AlbumCategory model.
   * If update is successful, the browser will be redirected to the 'view' page.
   * @param integer $id
   * @return mixed
   */
  public function actionUpdate($id)
  {
    $categories = AlbumCategory::find()->all();
    $model = $this->findModel($id);

    if ($model->load(Yii::$app->request->post()) && $model->save())
    {
      return $this->redirect(['view', 'id' => $model->id]);
    } else
    {
      return $this->render('update', [
        'model' => $model,
        'categories' => $categories,
      ]);
    }
  }

  /**
   * Deletes an existing AlbumCategory model.
   * If deletion is successful, the browser will be redirected to the 'index' page.
   * @param integer $id
   * @return mixed
   */
  public function actionDelete($id)
  {
    $this->findModel($id)->delete();

    return $this->redirect(['index']);
  }

  /**
   * Finds the AlbumCategory model based on its primary key value.
   * If the model is not found, a 404 HTTP exception will be thrown.
   * @param integer $id
   * @return AlbumCategory the loaded model
   * @throws NotFoundHttpException if the model cannot be found
   */
  protected function findModel($id)
  {
    if (($model = AlbumCategory::findOne($id)) !== null)
    {
      return $model;
    } else
    {
      throw new NotFoundHttpException('The requested page does not exist.');
    }
  }
}
