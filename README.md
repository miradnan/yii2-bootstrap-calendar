yii2-bootstrap-calendar
=================

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/). Check the [composer.json](https://github.com/miradnan/yii2-bootstrap-calendar/blob/master/composer.json) for this extension's requirements and dependencies.

To install, either run

```
$ php composer.phar require miradnan/yii2-bootstrap-calendar "*"
```

or add

```
"miradnan/yii2-bootstrap-calendar": "*"
```

to the ```require``` section of your `composer.json` file.

## Usage

use miradnan\bootstrap\Calendar;

echo Calendar::widget([
    'id' => 'my-calender',
    'class' => 'calendar-holder',
    'source' => $events
]);
```

## License

**yii2-bootstrap-calendar** is released under the BSD 3-Clause License. See the bundled `LICENSE.md` for details.
