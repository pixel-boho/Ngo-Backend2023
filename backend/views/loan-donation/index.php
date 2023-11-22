<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\LoanDonationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Loan Donations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loan-donation-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'exportConfig' => [
            GridView::CSV => ['label' => 'Export as CSV', 'filename' => 'Lend-'.date('d-M-Y')],
            GridView::HTML => ['label' => 'Export as HTML', 'filename' => 'Lend -'.date('d-M-Y')],
            GridView::EXCEL=> ['label' => 'Export as EXCEL', 'filename' => 'Lend -'.date('d-M-Y')],
            GridView::TEXT=> ['label' => 'Export as TEXT', 'filename' => 'Lend -'.date('d-M-Y')],
            GridView::PDF => [
                'filename' => 'Lend -'.date('d-M-Y'),
                'config' => [
                    'options' => [
                        'title' => 'Lend -'.date('d-M-Y'),
                        'subject' =>'Lend -'.date('d-M-Y'),
                        'keywords' => 'pdf, export, other, keywords, here'
                    ],
                ]
            ],
        ],
        'containerOptions' => ['style'=>'overflow: auto'],
        'toolbar' =>  [
            '{export}',
            '{toggleData}'
        ],
        'pjax' => false,
        'bordered' => true,
        'striped' => false,
        'condensed' => false,
        'responsive' => true,
        'hover' => true,
        'floatHeader' => true,
        'floatHeaderOptions' => ['scrollingTop' => 10],
        'showPageSummary' => true,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY
        ],
        'pager' => [
            'firstPageLabel' => 'First',
            'lastPageLabel'  => 'Last'
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' =>'loan_id',
                'format' => 'raw',
                'value'=>function ($model) {
                    return $model->getLoan();
                },
            ],
            [
                'attribute' =>'donated_by',
                'format' => 'raw',
                'value'=>function ($model) {
                    return $model->getUser();
                },
            ],
            'amount',
            [
                'attribute' =>'created_at',
                'format' => 'raw',
                'value'=>function ($model) {
                    return date('d M Y',strtotime($model->created_at));
                },
            ],
        ],
    ]); ?>


</div>
