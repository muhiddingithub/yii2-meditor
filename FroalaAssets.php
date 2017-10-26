<?php

namespace muhiddin\meditor;

use yii\base\View;
use yii\web\AssetBundle;

class FroalaAssets extends AssetBundle
{
    public $sourcePath = '@muhiddin/meditor/web';
//    public $baseUrl = '@web/extensions/meditor/assets';
    public $css = [
        'css/froala_editor.css',
        'css/froala_style.css',
        'css/plugins/code_view.css',
        'css/plugins/colors.css',
        'css/plugins/emoticons.css',
        'css/plugins/image_manager.css',
        'css/plugins/image.css',
        'css/plugins/line_breaker.css',
        'css/plugins/table.css',
        'css/plugins/char_counter.css',
        'css/plugins/video.css',
        'css/plugins/fullscreen.css',
        'css/plugins/file.css',
        'css/plugins/quick_insert.css',
    ];
    public $js = [
        'js/froala_editor.min.js',
        'js/languages/ru.js',
        'js/plugins/align.min.js',
        'js/plugins/char_counter.min.js',
        'js/plugins/code_beautifier.min.js',
        'js/plugins/code_view.min.js',
        'js/plugins/colors.min.js',
        'js/plugins/draggable.min.js',
        'js/plugins/emoticons.min.js',
        'js/plugins/entities.min.js',
//        'js/plugins/file.min.js',
        'js/plugins/font_size.min.js',
        'js/plugins/font_family.min.js',
        'js/plugins/fullscreen.min.js',
        'js/plugins/image.min.js',
        'js/plugins/line_breaker.min.js',
        'js/plugins/inline_style.min.js',
        'js/plugins/link.min.js',
        'js/plugins/lists.min.js',
        'js/plugins/paragraph_format.min.js',
        'js/plugins/paragraph_style.min.js',
        'js/plugins/quick_insert.min.js',
        'js/plugins/quote.min.js',
        'js/plugins/table.min.js',
        'js/plugins/save.min.js',
        'js/plugins/url.min.js',
        'js/plugins/video.min.js',
    ];

    /* public $depends = [
         'yii\web\YiiAsset',
         'yii\bootstrap\BootstrapAsset',
     ];*/

    public function init()
    {
        $this->jsOptions['position'] = \yii\web\View::POS_END;

    }
//    public $jsOptions = ['position' => \yii\web\View::POS_END];
}