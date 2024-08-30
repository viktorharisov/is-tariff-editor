<?php

use app\models\Tariff;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Тарифы';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="tariff-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать тариф', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
<!--ajax-->
<script>
    function updateSpeed(element) {
        var id = $(element).data('id');
        var speed = $(element).val();
        $.ajax({
            url: 'index.php?r=tariff/update-speed',
            type: 'POST',
            data: {id: id, speed: speed},
            success: function (response) {
                $.pjax.reload({container: '#pjax-container'});
            }
        });
    }
</script>
<?php
    Pjax::begin();
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'name',
            'price',
            [
                'attribute' => 'speed',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::input('text', 'speed', $model->speed, [
                        'class' => 'form-control',
                        'data-id' => $model->id,
                        'onchange' => 'updateSpeed(this)',
                    ]);
                },
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    Pjax::end();



