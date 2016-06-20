<?php
/* @var $this yii\web\View */
/* @var $model common\models\Article */
$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('frontend', 'Articles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<!--=== Blog Posts ===-->
<div class="bg-color-light">
  <div class="container content-sm">
    <div class="row">
      <!-- Blog All Posts -->
      <div class="col-md-9">
        <!-- News v3 -->
        <div class="news-v3 bg-color-white margin-bottom-30">
          <?php if ($model->thumbnail_path): ?>
            <?php echo \yii\helpers\Html::img(
              Yii::$app->glide->createSignedUrl([
                'glide/index',
                'path' => $model->thumbnail_path,
                //'w' => 200
              ], true),
              ['class' => 'img-responsive full-width']
            ) ?>
          <?php endif; ?>

          <div class="news-v3-in">
            <ul class="list-inline posted-info">
              <li>By <?= $model->author->username ?></li>
              <li>
                <?php echo \yii\bootstrap\Html::a(
                  $model->category->title,
                  ['index', 'ArticleSearch[category_id]' => $model->category_id]
                ) ?>
              </li>
              <li><?php echo Yii::$app->formatter->asDatetime($model->published_at) ?></li>
            </ul>
            <h2><a href="#"><?php echo $model->title ?></a></h2>
            <?php echo $model->body ?>

            <?php if (!empty($model->articleAttachments)): ?>
              <h3><?php echo Yii::t('frontend', 'Attachments') ?></h3>
              <ul id="article-attachments">
                <?php foreach ($model->articleAttachments as $attachment): ?>
                  <li>
                    <?php echo \yii\helpers\Html::a(
                      $attachment->name,
                      ['attachment-download', 'id' => $attachment->id])
                    ?>
                    (<?php echo Yii::$app->formatter->asSize($attachment->size) ?>)
                  </li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>

            <ul class="post-shares post-shares-lg">
              <li>
                <a href="javascript:volid(0);">
                  <i class="rounded-x icon-share"></i>
                  <span>355</span>
                </a>
              </li>
              <li>
                <a href="javascript:volid(0);">
                  <i class="rounded-x icon-heart"></i>
                  <span>107</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <!-- End News v3 -->

        <!-- Blog Post Author -->
        <div class="blog-author margin-bottom-30">
          <img src="/assets2/img/team/img1-md.jpg" alt="">

          <div class="blog-author-desc">
            <div class="overflow-h">
              <h4>buuug7</h4>
              <ul class="list-inline">
                <li><a href="#"><i class="fa fa-qq"></i></a></li>
                <li><a href="#"><i class="fa fa-weixin"></i></a></li>
                <li><a href="#"><i class="fa fa-weibo"></i></a></li>
              </ul>
            </div>
            <p>
              I Am A Desiner for Web Applications!
            </p>
          </div>
        </div>
        <!-- End Blog Post Author -->
      </div>
      <!-- End Blog All Posts -->

      <!-- Blog Sidebar -->
      <div class="col-md-3">

        <!-- 分类  v2 -->
        <div class="headline-v2"><h2>分类</h2></div>
        <ul class="list-inline tags-v2 margin-bottom-50">
          <?php foreach (\common\models\ArticleCategory::find()->all() as $articleCat): ?>
            <li><?php echo \yii\helpers\Html::a($articleCat->title, ['index', 'ArticleSearch[category_id]' => $articleCat->id]) ?></li>
          <?php endforeach; ?>
        </ul>
        <!-- End Tags v2 -->

        <div class="headline-v2"><h2>最新资讯</h2></div>
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
  <!--/end container-->
</div>
<!--=== End Blog Posts ===-->
