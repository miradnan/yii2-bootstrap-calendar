yii2-bootstrap-calendar
=================

This extension contains a couple of useful widgets. The `Alert` widget extends the `\yii\bootstrap\Calendar` widget with more easy styling and auto fade out options. In addition, it includes a `AlertBlock` widget that groups multiple `\miradnan\widget\Calendar` widgets in one single block and renders them stacked vertically on the current page. 

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/). Check the [composer.json](https://github.com/miradnan/yii2-bootstrap-calendar/blob/master/composer.json) for this extension's requirements and dependencies. Read this [web tip /wiki](http://webtips.krajee.com/setting-composer-minimum-stability-application/) on setting the `minimum-stability` settings for your application's composer.json.

To install, either run

```
$ php composer.phar require miradnan/yii2-bootstrap-calendar "*"
```

or add

```
"miradnan/yii2-bootstrap-calendar": "*"
```

to the ```require``` section of your `composer.json` file.

## Latest Release

> NOTE: The latest version of the module is v1.1.0 released on 19-Nov-2014. Refer the [CHANGE LOG](https://github.com/miradnan/yii2-bootstrap-calendar/blob/master/CHANGE.md) for details.

## Demo

You can refer detailed documentation and demos for [Calendar](http://demos.miradnan.com/widget-details/yii2-bootstrap-calendar) widgets on usage of the extension.

## Usage

use miradnan\bootstrap\Calendar;

echo Calendar::widget([
	'type' => Alert::TYPE_INFO,
	'title' => 'Note',
	'titleOptions' => ['icon' => 'info-sign'],
	'body' => 'This is an informative alert'
]);
```

## License

**yii2-bootstrap-calendar** is released under the BSD 3-Clause License. See the bundled `LICENSE.md` for details.