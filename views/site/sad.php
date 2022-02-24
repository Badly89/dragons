<?php

use kartik\datetime\DateTimePicker;

$this->title = 'Садовод';
$this->params['breadcrumbs'][] = $this->title;

echo '<label class="control-label">Event Time</label>';
echo DateTimePicker::widget([
    'name' => 'dp_1',
    'type' => DateTimePicker::TYPE_INPUT,
    'value' => '23-Feb-1982 10:10',
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'dd-M-yyyy hh:ii'
    ]
]);
