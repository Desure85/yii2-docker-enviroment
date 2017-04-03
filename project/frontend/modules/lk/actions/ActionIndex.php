<?php
namespace frontend\modules\lk\actions;

use common\models\Files;
use Yii;
use yii\data\ActiveDataProvider;


trait ActionIndex{
    public function actionIndex()
    {
        $model = Files::find()->where('user_id = :id', [':id' => Yii::$app->user->id]);
        $data = new ActiveDataProvider([
            'query' => $model,
            'pagination' => [
            ]
        ]);
        return $this->render('index',['data'=>$data]);
    }
}