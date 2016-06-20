<?php
/* @var $this yii\web\View */
$this->title = '公司动态';

$this->params['breadcrumbs'][] = $this->title;
?>

<!--=== Blog Posts ===-->
<div class="container content-md">
  <div class="row">
    <!-- Blog All Posts -->
    <div class="col-md-9">
      <?php echo \yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        'layout' => "{items}",
        'pager' => [
          'hideOnSinglePage' => true,
        ],
        'itemView' => '_item'
      ]) ?>

      <style>
        .pager.pager-v3 li.active a {
          background-color: #72c02c;
          color:#fff;
        }
      </style>
      <?= \yii\widgets\LinkPager::widget([
        'pagination' => $dataProvider->pagination,
        'options' => [
          'class' => 'pager pager-v3 pager-sm no-margin-bottom',
        ],
        'maxButtonCount' => '5',
        'prevPageCssClass' => 'previous',
        'prevPageLabel' => '←',
        'nextPageLabel' => '→',
      ]) ?>

    </div>
    <!-- End Blog All Posts -->

    <!-- Blog Sidebar -->
    <div class="col-md-3">

      <!-- 分类  v2 -->
      <div class="headline-v2 bg-color-light"><h2>分类</h2></div>
      <ul class="list-inline tags-v2 margin-bottom-50">
        <?php foreach (\common\models\ArticleCategory::find()->all() as $articleCat): ?>
          <li><?php echo \yii\helpers\Html::a($articleCat->title, ['index', 'ArticleSearch[category_id]' => $articleCat->id]) ?></li>
        <?php endforeach; ?>
      </ul>
      <!-- End Tags v2 -->

      <div class="headline-v2 bg-color-light"><h2>最新资讯</h2></div>
      <!-- 最新资讯 -->
      <ul class="list-unstyled blog-trending margin-bottom-50">
        <?php foreach (\common\models\Article::getRecentArticles(5) as $article): ?>
          <li>
            <h3><?= \yii\bootstrap\Html::a($article->title, ['view', 'slug' => $article->slug]) ?></h3>
            <small><?= Yii::$app->formatter->asRelativeTime($article->published_at) ?></small>
          </li>
        <?php endforeach; ?>
      </ul>
      <!-- End Trending -->
    </div>
    <!-- End Blog Sidebar -->
  </div>
</div>
<!--=== End Blog Posts ===-->

<!--<div id="article-index">
    <h1><?php /*echo Yii::t('frontend', 'Articles') */ ?></h1>
    <?php /*echo \yii\widgets\ListView::widget([
        'dataProvider'=>$dataProvider,
        'pager'=>[
            'hideOnSinglePage'=>true,
        ],
        'itemView'=>'_item'
    ])*/ ?>
</div>-->
