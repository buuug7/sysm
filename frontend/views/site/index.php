<?php
/* @var $this yii\web\View */
$this->title = Yii::$app->name;

?>

<div class="container content">

  <div class="title-box">
    <div class="title-box-text">如何在线申请宽带安装 , 宽带维护 , 更多...</div>
    <p>第一次使用,首先<a href="/user/sign-in/login">注册账号</a> , <a href="/user/sign-in/login">登录</a>之后选择您想要办理的<a href="#">业务</a>,填写表单,您要做的就这么多,剩下我们帮你完成</p>
  </div>

  <div class="row">
    <div class="col-md-4">
      <?php echo \common\widgets\DbText::widget([
        'key' => 'index-text-block-1',
      ]) ?>
    </div>

    <div class="col-md-4">
      <?php echo \common\widgets\DbText::widget([
        'key' => 'index-text-block-2',
      ]) ?>
    </div>

    <div class="col-md-4">
      <?php echo \common\widgets\DbText::widget([
        'key' => 'index-text-block-1',
      ]) ?>
    </div>
  </div>


  <!-- Recent Works -->
  <div class="owl-carousel-v1 owl-work-v1 margin-bottom-40">
    <div class="headline"><h2 class="pull-left">最近动态</h2>

      <div class="owl-navigation">
        <div class="customNavigation">
          <a class="owl-btn prev-v2"><i class="fa fa-angle-left"></i></a>
          <a class="owl-btn next-v2"><i class="fa fa-angle-right"></i></a>
        </div>
      </div>
      <!--/navigation-->
    </div>

    <div class="owl-recent-works-v1">
      <?php foreach (\common\models\Article::getRecentArticles(15) as $article): ?>
        <?php if ($article->thumbnail_path != ''): ?>
          <div class="item">
            <a href="<?= \yii\helpers\Url::to(['article/view', 'slug' => $article->slug,]) ?>">
              <em class="overflow-hidden">
                <?= \yii\helpers\Html::img(Yii::$app->glide->createSignedUrl([
                  'glide/index',
                  'path' => $article->thumbnail_path,
                ], true), ['class' => 'img-responsive']) ?>
              </em>
              <span>
                <i><?= $article->title ?></i>
              </span>
            </a>
          </div>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  </div>

  <div class="row service-v1 margin-bottom-40">
    <div class="col-md-4 md-margin-bottom-40">
      <div id="myCarousel" class="carousel slide carousel-v1">
        <div class="carousel-inner">

          <?php foreach (\common\models\Album::getRecentAlbumsByCategorySlug('yuan-gong-xiang-ce') as $k => $album): ?>
            <div class="item <?= $k == 0 ? 'active' : '' ?>">
              <?= \yii\helpers\Html::img(Yii::$app->glide->createSignedUrl([
                'glide/index',
                'path' => $album->thumbnail_path,
              ], true), ['class' => 'img-responsive', 'style' => 'width:100%',]) ?>
              <div class="carousel-caption">
                <p><?= $album->description ?></p>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

        <div class="carousel-arrow">
          <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
          </a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
          </a>
        </div>
      </div>
      <h2>员工相册 / 商品相册</h2>
    </div>

    <!--推荐产品-->
    <?php
    $recomendProduct = \common\models\Article::getRecommendArticlesByCategorySlug('chan-pin-dong-tai')
    ?>
    <?php if ($recomendProduct): ?>
      <div class="col-md-4">
        <?= \yii\helpers\Html::img(Yii::$app->glide->createSignedUrl([
          'glide/index',
          'path' => $recomendProduct->thumbnail_path,
        ], true), ['class' => 'img-responsive', 'style' => 'width:100%',]) ?>

        <h2>
          <a
            href="<?= \yii\helpers\Url::to(['/article/view', 'slug' => $recomendProduct->slug,]) ?>">
            <?= $recomendProduct->title ?>
          </a>
        </h2>

        <p><?= \yii\helpers\StringHelper::truncate($recomendProduct->description, 50) ?></p>
      </div>
    <?php endif; ?>

    <!--视频-->
    <div class="col-md-4 md-margin-bottom-40">
      <!--      <iframe height=200 width=100% src="<? /*= Yii::$app->keyStorage->get('video_url') */ ?>" frameborder=10
              allowfullscreen=""></iframe>
      <h2><? /*= Yii::$app->keyStorage->get('video_title') */ ?></h2>
      <p><? /*= Yii::$app->keyStorage->get('video_description') */ ?></p>-->

      <?php foreach (\common\models\Video::getLatestVideo(1) as $video): ?>
        <video width="530" height="298" controls>
          <source src="<?= $video->getVideoUrl() ?>" type="video/mp4">
          <object data="<?= $video->getVideoUrl() ?>" width="100%" height="100%">
            <embed src="<?= $video->getVideoUrl() ?>" width="100%" height="100%">
          </object>
        </video>
        <h2><?=$video->name?></h2>
      <?php endforeach; ?>
    </div>
  </div>
</div>
