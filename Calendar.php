<?php

/**
 * This class is used to embed Bootstrap JQuery Plugin for Yii2 Projects
 * @copyright Mir Adnan - www.miradnan.com
 * @link http://www.miradnan.com
 * @author Mir Adnan <contact@miradnan.com>
 *
 */

namespace miradnan\bootstrap;

use yii\bootstrap\Widget;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\helpers\ArrayHelper;

class Calendar extends Widget {

    public $viewPath = '@vendor/miradnan/yii2-bootstrap-calendar/tmpls/';

    /**
     * @var array clientOptions the HTML attributes for the widget container tag.
     */
    public $clientOptions = [
        'weekends' => true,
        'default' => 'month',
        'editable' => false,
    ];
    public $source;

    /**
     * Holds an array of Event Objects
     * */
    public $events = [];

    /**
     * Define the look n feel for the calendar header, known placeholders are left, center, right
     * @var array header format
     */
    public $header = [
        'center' => 'title',
        'left' => 'prev,next today',
        'right' => 'month,agendaWeek'
    ];

    public function init() {
        parent::init();
    }

    /**
     * 
     * @param string $config
     * @return type
     */
    public function run($config = []) {
        $id = $this->getId();
        CalendarAsset::register($this->getView());

        if (!empty($config['id'])) {
            $id = $config['id'];
        }

        if (!empty($config['source'])) {
            $this->source = $config['source'];
        }

        if (!isset($config['class'])) {
            $config['class'] = 'calendar-holder';
        }

        $content = Html::tag('div', null, [
                    'id' => $id
        ]);

        switch (gettype($this->source)) {
            case 'object':
            case 'array':
                $this->source = ArrayHelper::toArray($this->source);
                $this->source = json_encode($this->source, true);
                break;
        }

        $js = new JsExpression("$(document).ready(function(e){var calendar = $('#" . $id . "').calendar({events_source: " . $this->source . " }); });");

        $content .= Html::tag('script', $js, ['type' => 'text/javascript']);

        $this->registerPlugin(__CLASS__);

        return Html::tag('div', $content, [
                    'class' => $config['class']
        ]);
    }

}
