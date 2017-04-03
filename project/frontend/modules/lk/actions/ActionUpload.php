<?php
namespace frontend\modules\lk\actions;

use common\models\Files;
use Yii;
use common\forms\UploadFile;
use yii\web\UploadedFile;

trait ActionUpload{
    public function actionUpload(){
        if (Yii::$app->request->isPost) {
            $model = new UploadFile();
            $model->file = UploadedFile::getInstance($model, 'file');
            if (($filename = $model->upload()) == TRUE) {
                $row = new Files();
                $row->file_name =  $model->file->name;
                $row->file_path = $model->filePath().$filename;
                $row->user_id = Yii::$app->user->id;
                if($row->validate()){
                    $model->addError('file', Yii::t('form/UploadFile','Unknown type'));
                };
                if(!$row->save()){
                    $model->addError('file', Yii::t('form/UploadFile','Unknown type'));
                }
                Yii::$app->session->setFlash('success', Yii::t('form/uploadFile',"File is uploaded successfully"));
                $this->redirect('/lk');
            }
        }else{
            return false;
        }
    }
}