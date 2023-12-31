<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Loan */

$this->title = 'Create Loan';
$this->params['breadcrumbs'][] = ['label' => 'Loans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
