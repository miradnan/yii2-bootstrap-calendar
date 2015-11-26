<?php

namespace miradnan\bootstrap;

use Yii;
use yii\web\AssetBundle;

/**
 * @link http://www.frenzel.net/
 * @author Philipp Frenzel <philipp@frenzel.net> 
 */
class CalendarAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/calendar.min.css',
    ];
    public $js = [
        'js/calendar.min.js',
        'js/underscore-min.js'
    ];

    /**
     * [$depends on Jquery]
     * @var array
     */
    public $depends = [
        'yii\bootstrap\BootstrapAsset',
            //  'yii\jui\JuiAsset'
    ];
    public $jsOptions = array(
        'position' => \yii\web\View::POS_HEAD
    );

    public function init() {
        $this->basePath = __DIR__ . '/assets';
        list(, $url) = Yii::$app->assetManager->publish(__DIR__ . '/assets');
        $this->baseUrl = $url;
        parent::init();
    }

}
