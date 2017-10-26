<?php

namespace muhiddin\meditor\controllers;

use muhiddin\meditor\ImageUpload;
use yii\web\Controller;
use Yii;

/**
 * Default controller for the `meditor` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionImageUpload()
    {
        $file = new ImageUpload($_FILES['file']);
        $result = $file->Upload();
        if ($result['status'] == 'success') {
            $response = new \StdClass;
            $response->link = $result['file_base'];
            echo stripslashes(json_encode($response));
            exit;
        }
        echo "error";
    }

    public function actionRemoveImage()
    {
        if (!empty(Yii::$app->request->post('src'))) {
            $HomeUrl = Yii::getAlias(ImageUpload::$imageUploadPath . ImageUpload::MAIN_FOLDER);
            $file_name_url = Yii::$app->request->post('src');
            $file_name = end(explode('/', $file_name_url));
            if (file_exists($HomeUrl . '/' . $file_name)) {
                @unlink($HomeUrl . '/' . $file_name);
            }
        }
    }
}
