<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use backend\models\User;
use yii\helpers\ArrayHelper;
use backend\models\FundraiserScheme;
$user = User::find()->where(['status'=>1])->andWhere(['role'=>'campaigner'])->all();
$fundraiser = FundraiserScheme::find()->where(['status'=>1])->all();
$userList = ArrayHelper::map($user,'id','name');
$fundraiserList = ArrayHelper::map($fundraiser,'id','title');

/* @var $this yii\web\View */
/* @var $model backend\models\FundraiserCommentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<style>
.datepicker {
    top: 252.2px;
    left: 889.6px;
    z-index: 9999 !important;
    display: block;
}
</style>
<div class="fundraiser-comment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'receiver_id')->dropdownList($userList,['prompt'=>'Select..']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'message') ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'fundraiser_id')->dropdownList($fundraiserList,['prompt'=>'Select One...']) ?>
        </div>
    </div>
    <div class="row">
    <?php 
        if($model->from_date){
            $model->from_date = date('d-m-Y',strtotime($model->from_date));
        }
        if($model->to_date){
            $model->to_date = date('d-m-Y',strtotime($model->to_date));
        }
        ?>
        <div class="col-md-3">
            <?php echo $form->field($model, 'from_date')->widget(DatePicker::classname(), [
                    'options' => ['placeholder' => 'Select Date...'],
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'format' => 'dd-mm-yyyy',
                        'endDate' => 'd'
                    ]
            ]); ?>
        </div>
        <div class="col-md-3">
            <?php echo $form->field($model, 'to_date')->widget(DatePicker::classname(), [
                    'options' => ['placeholder' => 'Select Date...'],
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'format' => 'dd-mm-yyyy',
                        'endDate' => 'd'
                    ]
            ]); ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Reset', ['index'], ['class' => 'btn btn-danger','style'=>'color: black']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
