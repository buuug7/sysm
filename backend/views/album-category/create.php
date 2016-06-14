<?php
/**
 * Created by PhpStorm.
 * User: buuug7
 * Date: 2016/6/14
 * Time: 14:32
 * Desc:
 */

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\AlbumCategory */

$this->title = Yii::t('common', 'Create {modelClass}', [
  'modelClass' => Yii::t('common', 'Album Category'),
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Album Category'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="album-category-create">

  <?php echo $this->render('_form', [
    'model' => $model,
    'categories' => $categories,
  ]) ?>

</div>

