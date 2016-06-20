<?php
/* @var $this yii\web\View */
$this->title = Yii::$app->name;

?>

<div class="container content">

  <div class="title-box">
    <div class="title-box-text">如何在线申请宽带安装 , 宽带维护 , 更多...</div>
    <p>第一次使用,首先<a href="#">注册账号</a> , <a href="">登录</a>之后选择您想要办理的<a href="#">业务</a>,填写表单,您要做的就这么多,剩下我们帮你完成</p>
  </div>

  <div class="row">
    <div class="col-md-4">
      <div class="promo-box">
        <i class="fa fa-rocket color-sea"></i>
        <strong>专业+快速</strong>

        <p>我们拥有专业的团队,礼拜一到礼拜天随时都可以上门服务,及时为您解决宽带安装维护问题</p>
      </div>
    </div>

    <div class="col-md-4">
      <div class="promo-box">
        <i class="fa fa-cog color-blue"></i>
        <strong>故障及时处理</strong>

        <p>宽带故障?您不仅可以通过电话联系我们,还可以使用网站提供的宽带故障处理服务,我们会及时处理您的烦恼</p>
      </div>
    </div>

    <div class="col-md-4">
      <div class="promo-box">
        <i class="fa fa-lock color-orange"></i>
        <strong>安全+定制</strong>

        <p>宽带被人蹭?网速不给力?不用担心,我们已经为您提供了最安全最快速的解决方案</p>
      </div>
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
                <!--                --><? /*= \yii\helpers\Html::img(Yii::$app->glide->createSignedUrl([
                  'glide/index',
                  'path' => $article->thumbnail_path,
                ], true), ['class' => 'img-responsive']) */ ?>
                <img class="img-responsive" src="/assets2/img/main/img1.jpg" alt="">
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
              ], true)) ?>

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
      <h2>员工相册/商品相册</h2>
    </div>
    <div class="col-md-4">
      <img alt="" src="/assets2/img/main/img22.jpg" class="img-responsive">

      <h2>推荐产品</h2>

      <p>eleniti atque corrupti quos dolores vero eosetaet quas</p>
    </div>
    <div class="col-md-4 md-margin-bottom-40">
      <!--<iframe width="100%" height="227" frameborder="0" allowfullscreen="" mozallowfullscreen="" webkitallowfullscreen="" src=""></iframe>-->
      <iframe height=227 width=100% src="http://player.youku.com/embed/XMTU0MTMxNjcxMg==" frameborder=0
              allowfullscreen=""></iframe>
      <h2>魔兽曝光终极预告 打斗场面逼真激烈</h2>

      <p>s on all major web browsers, tablets and phone. Lorem sequat ipsum dolor</p>
    </div>
  </div>

  <div class="row margin-bottom-20">
    <!-- Latest Shots -->
    <div class="col-md-4 md-margin-bottom-20">
      <div class="headline"><h2>员工相册</h2></div>
      <div id="myCarousel2" class="carousel slide carousel-v1">
        <div class="carousel-inner">
          <?php foreach (\common\models\Album::getRecentAlbumsByCategorySlug('yuan-gong-xiang-ce') as $k => $album): ?>
            <div class="item <?= $k == 0 ? 'active' : '' ?>">
              <?= \yii\helpers\Html::img(Yii::$app->glide->createSignedUrl([
                'glide/index',
                'path' => $album->thumbnail_path,
              ], true)) ?>

              <div class="carousel-caption">
                <p><?= $album->description ?></p>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

        <div class="carousel-arrow">
          <a class="left carousel-control" href="#myCarousel2" data-slide="prev">
            <i class="fa fa-angle-left"></i>
          </a>
          <a class="right carousel-control" href="#myCarousel2" data-slide="next">
            <i class="fa fa-angle-right"></i>
          </a>
        </div>
      </div>
    </div>
    <!--/col-md-4-->

    <!-- Welcome Block -->
    <div class="col-md-8 md-margin-bottom-40">
      <div class="headline"><h2>最新产品/视频here</h2></div>
      <div class="row">
        <div class="col-sm-4">
          <img class="img-responsive margin-bottom-20" src="/assets2/img/main/img12.jpg" alt="">
        </div>
        <div class="col-sm-8">
          <p>Unify is an incredibly beautiful responsive Bootstrap Template for corporate and creative professionals. It
            works on all major web browsers, tablets and phone.</p>
          <ul class="list-unstyled margin-bottom-20">
            <li><i class="fa fa-check color-green"></i> Donec id elit non mi porta gravida</li>
            <li><i class="fa fa-check color-green"></i> Corporate and Creative</li>
            <li><i class="fa fa-check color-green"></i> Responsive Bootstrap Template</li>
            <li><i class="fa fa-check color-green"></i> Corporate and Creative</li>
          </ul>
        </div>
      </div>

      <blockquote class="hero-unify">
        <p>
          我从来不装逼 ( I Never Installed B )
        </p>
        <small>CEO, 赵总</small>
      </blockquote>
    </div>
    <!--/col-md-8-->
  </div>
</div>
</div>


<!--<div class="site-index">
<div class="row">
  <div class="col-1g-12">
    <?php /*echo \common\widgets\DbCarousel::widget([
      'key' => 'index',
      'options' => [
        'class' => 'slide', // enables slide effect
      ],
    ]) */ ?>
  </div>
</div>


  <div class="jumbotron">
    <h1>Congratulations!</h1>

    <p class="lead">You have successfully created your Yii-powered application.</p>

    <?php /*echo common\widgets\DbMenu::widget([
      'key' => 'frontend-index',
      'options' => [
        'tag' => 'p'
      ]
    ]) */ ?>

  </div>

  <div class="body-content">

    <div class="row">
      <div class="col-lg-4">
        <h2>Heading</h2>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
          dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
          ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
          fugiat nulla pariatur.</p>

        <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
      </div>
      <div class="col-lg-4">
        <h2>Heading</h2>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
          dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
          ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
          fugiat nulla pariatur.</p>

        <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
      </div>
      <div class="col-lg-4">
        <h2>Heading</h2>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
          dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
          ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
          fugiat nulla pariatur.</p>

        <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
      </div>
    </div>

  </div>
</div>-->
