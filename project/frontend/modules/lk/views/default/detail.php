<div class="lk-default-index">
    <?php
    use miloschuman\highcharts\Highcharts;

    echo Highcharts::widget([
        'options' => [
            'title' => ['text' =>  Yii::t('view/lk-detail','Balance visualisation')],
            'xAxis' => [
                'title' => ['text' =>  Yii::t('view/lk-detail','Transactions')]
            ],
            'yAxis' => [
                'title' => ['text' =>  Yii::t('view/lk-detail','Balance')]
            ],
            'series' => [
                ['name' =>  Yii::t('view/lk-detail','Balance'), 'data' => $data],
            ]
        ]
    ]);
    echo Highcharts::widget([
        'options' => [
            'title' => ['text' =>  Yii::t('view/lk-detail','Comissions visualisation')],
            'xAxis' => [
                'title' => ['text' =>  Yii::t('view/lk-detail','Transactions')]
            ],
            'yAxis' => [
                'title' => ['text' =>  Yii::t('view/lk-detail','Cost')]
            ],
            'series' => [
                ['name' =>  Yii::t('view/lk-detail','Comissions'), 'data' => $datacom],
            ]
        ]
    ]);

    ?>
</div>
