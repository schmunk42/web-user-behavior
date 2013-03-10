web-user-behavior
=================

This extension provides methods to ensure compatiblity for [rights](http://www.yiiframework.com/extension/rights) and
[yii-user](http://www.yiiframework.com/extension/yii-user/).

Features
--------

Yii Behavior, which implments features from WebUser from mishamx/yii-user to avoid errors when using both extensions
mentioned above together.


Installation
------------

* via composer
  * include the repository `http:://packages.phundament.com`
  * `composer.phar require schmunk42/web-user-behavior`


Download
--------

[Via github](https://github.com/schmunk42/web-user-behavior/tags)


Usage
-----

Download

Extract and place it into your application

Configure:

    'user' => array(
        'class' => 'RWebUser',
        'behaviors' => array(
            'vendor.schmunk42.web-user-behavior.WebUserBehavior'
        ),
    ),
    
Attaches methods needed by yii-user module to your RWebUser class from rights.    


Resources
---------

 * Availble via [Phundament 3](http://phundament.com) Composer Package Repository http://packages.phundament.com
 * [Fork on github](https://github.com/schmunk42/web-user-behavior)
 * [View at Yii Extensions](http://www.yiiframework.com/extension/web-user-behavior/)
