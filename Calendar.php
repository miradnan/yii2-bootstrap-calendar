<?php

namespace miradnan\bootstrap;

use yii\bootstrap\Widget;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\helpers\ArrayHelper;

class Calendar extends Widget {
    
    public $viewPath = '@vendor/miradnan/yii2-bootstrap-calendar/tmpls/';

    public function init() {
        parent::init();
    }

    public static function widget($config = []) {
        
        $id = 'miradnan-bootstrap-calendar';
        $source = null;

        if (!empty($config['id'])) {
            $id = $config['id'];
        }

        if (!empty($config['source'])) {
            $source = $config['source'];
        }

        if (!isset($config['class'])) {
            $config['class'] = 'calendar-holder';
        }

        $content = Html::tag('div', null, [
                    'id' => $id
        ]);

        switch (gettype($source)) {
            case 'object':
            case 'array':
                $source = ArrayHelper::toArray($source);
                $source = json_encode($source, true);
                break;
        }

        $js = new \yii\web\JsExpression("var calendar = $('#" . $id . "').calendar({events_source: " . sprintf('[%s]', $source) . " });");

        $content .= Html::tag('script', $js, ['type' => 'text/javascript']);


        return Html::tag('div', $content, [
                    'class' => $config['class']
        ]);
    }

}
