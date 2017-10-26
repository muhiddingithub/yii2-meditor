<?php
namespace common\widgets\meditor;

use Yii;
use yii\helpers\Url;

class ImageUpload
{
    public $_file;
    public static $imageUploadPath = '@frontend/web/images';
    const MAIN_FOLDER = 'meditor';

    function __construct($file, $baseFolderName = NULL)
    {
        $this->_file = $file;
        if (!is_null($baseFolderName)) {
            $this->_baseFolderName = $baseFolderName;
        }
    }

    public function Upload()
    {
        $file = $this->_file;
        $tmp = $file['tmp_name'];
        $HomeUrl = Yii::getAlias(self::$imageUploadPath . '/' . self::MAIN_FOLDER);
        if (!is_dir($HomeUrl)) {
            mkdir($HomeUrl, 0775, true);
        }
        $tofile = $file['name'];
        $ext = explode('.', $tofile);
        $ext = end($ext);
        $newName = 'meditor_file_' . strtotime(date('Y-m-d H:i:s')) . '.' . $ext;
        if (move_uploaded_file($tmp, $HomeUrl . '/' . $newName)) {
            $result['status'] = 'success';
            $result['file_base'] = '/images/' . self::MAIN_FOLDER . '/' . $newName;
            $result['file_path'] = $HomeUrl . $newName;
        } else {
            $result['status'] = 'error';
        }
        return $result;
    }
}