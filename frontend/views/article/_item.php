<?php
/**
 * @var $this yii\web\View
 * @var $model common\models\Article
 */
use yii\helpers\Html;

?>

<!-- News v3 -->
<div class="row margin-bottom-20">
  <?php if ($model->thumbnail_path == ''): ?>
  <?php else: ?>
    <div class="col-sm-4 sm-margin-bottom-20">
      <?= \yii\helpers\Html::img(Yii::$app->glide->createSignedUrl([
        'glide/index',
        'path' => $model->thumbnail_path,
      ], true),['class' => 'img-responsive',]) ?>
    </div>
  <?php endif; ?>

  <div class="<?= $model->thumbnail_path == '' ? 'col-sm-12 news-v3' : 'col-sm-8 news-v3' ?>">
    <div class="news-v3-in-sm no-padding">
      <ul class="list-inline posted-info">
        <li>By <?= $model->author->username ?></li>
        <li>
          <?php echo Html::a(
            $model->category->title,
            ['index', 'ArticleSearch[category_id]' => $model->category_id]
          ) ?>
        </li>
        <li><?php echo Yii::$app->formatter->asDatetime($model->published_at) ?></li>
      </ul>
      <h2>
        <?= Html::a($model->title, ['view', 'slug' => $model->slug]) ?>
      </h2>

      <p>
        <?= \yii\helpers\StringHelper::truncate($model->body, ($model->thumbnail_path == '' ? 120 : 50), '...', null, false) ?>
      </p>

      <!--TODO: add ding-->
      <!--<ul class="post-shares">
        <li>
          <a href="#">
            <i class="rounded-x icon-speech"></i>
            <span>5</span>
          </a>
        </li>
        <li><a href="#"><i class="rounded-x icon-share"></i></a></li>
        <li><a href="#"><i class="rounded-x icon-heart"></i></a></li>
      </ul>-->
    </div>
  </div>
</div>
<!--/end row-->
<!-- End News v3 -->

<div class="clearfix margin-bottom-20">
  <hr>
</div>
