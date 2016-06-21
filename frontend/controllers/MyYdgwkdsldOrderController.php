<?php
/**
 * Created by PhpStorm.
 * User: buuug7
 * Date: 2016/6/20
 * Time: 9:40
 * Desc:
 */

namespace frontend\controllers;


use common\models\Ydgwkdsld;
use frontend\models\search\YdgwkdsldSearch;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

class MyYdgwkdsldOrderController extends Controller
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

    $searchModel = new YdgwkdsldSearch();
    $searchModel->id = \Yii::$app->user->getId();
    $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);

    $dataProvider->sort = [
      'defaultOrder' => ['id' => SORT_DESC,]
    ];

    $dataProvider->pagination = [
      'pageSize' => '10',
    ];

    return $this->render('index', [
      'searchModel' => $searchModel,
      'dataProvider' => $dataProvider,
    ]);
  }

  /**
   * @param $id
   * @return string
   * @throws NotFoundHttpException
   */
  public function actionView($id)
  {
    return $this->render('view', [
      'model' => $this->findModel($id),
    ]);
  }


  /**
   * @param $id
   * @return null|static
   * @throws NotFoundHttpException
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
