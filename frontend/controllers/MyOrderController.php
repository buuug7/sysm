<?php
/**
 * Created by PhpStorm.
 * User: buuug7
 * Date: 2016/6/20
 * Time: 11:28
 * Desc:
 */

namespace frontend\controllers;


use yii\web\Controller;

class MyOrderController extends Controller
{

  public function actionIndex()
  {
    return $this->render('index');
  }

}
