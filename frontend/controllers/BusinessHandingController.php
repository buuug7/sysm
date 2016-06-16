<?php
/**
 * Created by PhpStorm.
 * User: buuug7
 * Date: 2016/6/16
 * Time: 11:45
 * Desc:
 */

namespace frontend\controllers;


use yii\web\Controller;

class BusinessHandingController extends Controller
{

  public function actionIndex()
  {
    return $this->render('index', []);
  }

}
