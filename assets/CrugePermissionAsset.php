<?php
namespace cruge\assets;

use yii\web\AssetBundle;

class CrugePermissionAsset extends AssetBundle
{
    public $sourcePath = '@vendor/freesoftwarefactory/cruge/';
    public $js = [
        'assets/cruge_permission.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];

    /*
    public function init()
    {
        parent::init();
        $this->publishOptions['forceCopy'] = false;
    }*/
}
