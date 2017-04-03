<div class="lk-default-index">
    <?php
    use yii\widgets\ActiveForm;
    use \common\forms\UploadFile;

    $model = new UploadFile();
    ?>
    <?php $form = ActiveForm::begin(['action'=>'lk/default/upload','options' => ['enctype' => 'multipart/form-data']]) ?>
    <?= $form->field($model, 'file')->fileInput() ?>
    <button>Submit</button>
    <?php ActiveForm::end() ?>
    <?php
    echo \yii\grid\GridView::widget([
        'dataProvider'=>$data,
        'columns'=>[
            ['class' => 'yii\grid\SerialColumn',
                'headerOptions' => ['style' => ''],
            ],
            [
                'attribute' => 'file_name',
                'label' => Yii::t('view/lk-index','Document'),
                'headerOptions' => ['style' => ''],
                'contentOptions' => function ($model, $key, $index, $column) {
                    return ['class' => ''];
                },
                'content' => function ($data) {
                    return $data->file_name;
                }
            ],
            [
                'attribute' => 'file_type',
                'label' => Yii::t('view/lk-index','Document type'),
                'headerOptions' => ['style' => ''],
                'header' =>Yii::t('view/lk-index','Document type'),
                'contentOptions' => function ($model, $key, $index, $column) {
                    return ['class' => ''];
                },
                'content' => function ($data) {
                    return (pathinfo($data->file_name))['extension'];
                }
            ],
            ['class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['style' => ''],
                'template' => '{view}',
                'header' => Yii::t('view/lk-index','Actions'),
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        $viewroute = 'view-'.(pathinfo($model->file_name))['extension'];
                        $url =  \yii\helpers\Url::toRoute([$viewroute, 'id'=>$key]);
                        return '<a  class="fa fa-eye" href="'.$url.'"></a>';
                    },
                ],
            ]
        ]
    ]);
    ?>
</div>
