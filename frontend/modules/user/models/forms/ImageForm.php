<?php

namespace frontend\modules\user\models\forms;

use yii\base\Model;

class ImageForm extends Model
{
    public $image;

    public function  rules()
    {
        return [
            [['image'], 'file', 'extensions' => ['jpg', 'png', 'svg', 'webp'],
                'checkExtensionByMimeType' => true],
        ];
    }

    public function save(){
        return 1;
    }
}