<?php
namespace frontend\modules\lk\actions;

use common\forms\UploadFile;
use common\lib\classes\parser\ParseHtml;
use common\models\Files;
use Yii;

trait ActionViewHtml{
    public function actionViewHtml($id){
        $file = Files::find()->where(['user_id'=>Yii::$app->user->id, 'id'=>$id])->asArray()->one();
        $file = Yii::getAlias('@uploads').DIRECTORY_SEPARATOR.$file['file_path'];
        $parser = new ParseHtml();
        $parser->load($file);
        $data = $parser->parseBalance();
        $datacom = $parser->parseCommision();
        return $this->render('detail',['data'=>$data, 'datacom'=>$datacom]);
    }
}