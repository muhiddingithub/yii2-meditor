<?php
namespace common\widgets\meditor;

use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\View;
use common\widgets\meditor\FroalaAssets;

class FroalaEditor extends Widget
{

    public $cssClass = 'froala_editor';
    public $name;
    public $options;
    public $model;
    public $attribute;
    public $htmlOptions;

    public function init()
    {
        if (!isset($this->htmlOptions['class'])) {
            $this->htmlOptions['class'] = $this->cssClass;
        }
        if (!isset($this->options['imageUploadURL']))
            $this->options['imageUploadURL'] = Url::toRoute('/meditor/default/image-upload');
        if (!isset($this->options['imageDeleteURL']))
            $this->options['imageDeleteURL'] = Url::toRoute('/meditor/default/remove-image');

        $this->cssClass = $this->htmlOptions['class'];
    }

    public function run()
    {
        $options = $this->options;
        $options['language'] = 'ru';
        $options = Json::encode($options);
        if (isset($this->form)) {
            echo $this->form->field($this->model, $this->attribute, $this->htmlOptions);
        } else {
            if (isset($this->model)) {
                echo Html::activeTextArea($this->model, $this->attribute, $this->htmlOptions);
            } else {
                echo Html::textArea($this->name, $this->value, $this->htmlOptions);
            }
        }
        $view = $this->getView();
        FroalaAssets::register($view);
        $view->registerJs('
					$(function(){
				      $(".' . $this->cssClass . '").froalaEditor(' . $options . ').on(\'froalaEditor.image.removed\', function (e, editor, $img) {
                        $.ajax({
                          // Request method.
                          method: "POST",
                
                          // Request URL.
                          url: $(".' . $this->cssClass . '").data("remove-url"),
                
                          // Request params.
                          data: {
                            src: $img.prop(\'src\')
                          }
                        })
                        .done (function (data) {
                          console.log (\'image was deleted\');
                        })
                        .fail (function () {
                          console.log (\'image delete problem\');
                        })
                      });
                   
                        $(".fr-box a[href=\'https://froala.com/wysiwyg-editor\'").remove();
				    });
				', View::POS_END, "editor");
    }

}

?>