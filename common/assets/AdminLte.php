<?php
/**
 * Created by PhpStorm.
 * User: zein
 * Date: 8/2/14
 * Time: 11:40 AM
 */

namespace common\assets;

use yii\web\AssetBundle;

class AdminLte extends AssetBundle
{
    public $sourcePath = '@bower/admin-lte/dist';
    public $js = [
        'js/app.min.js'
    ];

  /*
   * 由于该css文件中附带了google fonts ,
   * 而好多时候都被国内的防火墙拦截,所以重写了该css,去掉google fonts
   * 该资源包含在BackendAsset.php中
   * */
    public $css = [
       // 'css/AdminLTE.min.css',
      //  'css/skins/_all-skins.min.css'
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\jui\JuiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'common\assets\FontAwesome',
        'common\assets\JquerySlimScroll'
    ];
}
