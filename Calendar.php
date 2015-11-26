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

    /**
     * @var array clientOptions the HTML attributes for the widget container tag.
     */
    public $clientOptions = [
    ];

    /**
     * Define the look n feel for the calendar header, known placeholders are left, center, right
     * @var array header format
     */
    public $header = [
        'center' => 'title',
        'left' => 'prev,next today',
        'right' => 'month,agendaWeek'
    ];

    /**
     * This contains all calendar options
     * @var type 
     */
    public $options = [
        'language' => 'en',
    ];

    /**
     * 
     */
    public function init() {
        parent::init();
    }

    /**
     * 
     * @param string $config
     * @return type
     */
    public function run() {
        $id = $this->getId();
        CalendarAsset::register($this->getView());


        if (!isset($this->clientOptions['class'])) {
            $config['class'] = 'calendar-holder';
        } else {
            $config['class'] = $this->clientOptions['class'];
        }

        if (!empty($config['language'])) {
            $this->options['language'] = $config['language'];
        }

        $content = Html::tag('div', null, [
                    'id' => $id
        ]);

        switch (gettype($this->clientOptions['events_source'])) {
            case 'object':
            case 'array':
                $this->clientOptions['events_source'] = ArrayHelper::toArray($this->clientOptions['events_source']);

                break;
        }

        $this->clientOptions['events_source'] = (array) $this->clientOptions['events_source'];

        $js = new JsExpression("$(document).ready(function(e){var calendar = $('#" . $id . "').calendar(" . json_encode($this->clientOptions) . "); });");

        $content .= Html::tag('script', $js, ['type' => 'text/javascript']);

        $this->registerPlugin(__CLASS__);

        return Html::tag('div', $content, [
                    'class' => $config['class']
        ]);
    }

}
