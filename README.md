# yii2-meditor
Yii2 publish editor using froala jquery  

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require muhiddingithub/yii2-meditor "dev-master"
```

or add

```
"muhiddingithub/yii2-meditor": "dev-master"
```

to the require section of your `composer.json` file.

[Jquery source](https://www.froala.com/wysiwyg-editor)

Usage
-----
with ActiveForm

```
$form->field($model, 'body')->widget(\muhiddin\meditor\FroalaEditor::className(), [
        'options' => [
            'height' => '400px',
            'imageManagerPageSize' => 2
        ]
    ])
```
Simple Usage
-----

```
echo \muhiddin\meditor\FroalaEditor::widget([
        'name'=>'name',
        'value'=>'',
        'form'=>$form,// if has $form ActiveForm, else not set
        'model'=>$model, // if has $model extend Model, else not set
        'options' => [
            'height' => '400px',
            'imageManagerPageSize' => 2
        ]
    ])
```
config
-----
```
'components' => [
  ...
    'modules'=>[
      ...
      'meditor' => [
            'class' => 'muhiddin\meditor\Module',
        ]
      ...
    ]
  ...
  ]
```
