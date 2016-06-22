<?php
/**
 * Created by PhpStorm.
 * User: buuug7
 * Date: 2016/6/22
 * Time: 16:31
 * Desc:
 */

namespace backend\controllers;


use backend\models\search\FriendLinksSearch;
use common\models\FriendLinks;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class FriendLinksController extends Controller
{

  public function actionIndex()
  {
    $searchModel = new FriendLinksSearch();
    $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);
    $dataProvider->sort = [
      'defaultOrder' => ['sort' => SORT_ASC,],
    ];
    return $this->render('index', [
      'searchModel' => $searchModel,
      'dataProvider' => $dataProvider,
    ]);
  }

  public function actionCreate()
  {
    $model = new FriendLinks();
    if ($model->load(\Yii::$app->request->post()) && $model->save())
    {
      return $this->redirect(['view', 'id' => $model->id,]);
    } else
    {
      return $this->render('create', [
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

  public function actionUpdate($id)
  {
    $model = $this->findModel($id);
    if ($model->load(\Yii::$app->request->post()) && $model->save())
    {
      return $this->redirect(['view', 'id' => $model->id,]);
    } else
    {
      return $this->render('update', [
        'model' => $model,

      ]);
    }
  }

  public function actionDelete($id)
  {
    $this->findModel($id)->delete();
    return $this->redirect(['index']);
  }

  /**
   * @param integer $id
   * @return FriendLinks the loaded model
   * @throws NotFoundHttpException if the model cannot be found
   */
  protected function findModel($id)
  {
    if (($model = FriendLinks::findOne($id)) != null)
    {
      return $model;
    } else
    {
      throw new NotFoundHttpException('The requested page does not exist.');
    }
  }

}
