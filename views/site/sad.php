<?php

use kartik\datetime\DateTimePicker;
use yii\helpers\Html;

$this->title = 'Садовод';
$this->params['breadcrumbs'][] = $this->title;

$fruits = array(
    'Картофель&25 очков жизни&24&8',
    'Огурцы&25 очков маны&24&8',
    'Помидоры&50 очков жизни&27&9',
    'Капуста&50 очков маны&27&9',
    'Клубника&Сложение + 10&36&10',
    'Малина&Сила + 10&36&10',
    'Ежевика&Ловкость + 10&36&10',
    'Земляника&Удача + 10&36&10',
    'Шиповник&Реакция + 10&36&10',
    'Крыжовник&Злость + 10&36&10',
    'Яблоко&Оберег уворота + 50 %&54&12',
    'Груша&Оберег удачи + 50 %&54&12',
    'Вишня&Оберег ответа + 50 %&54&12',
    'Абрикос&Оберег крита + 50 %&54&12',
    'Чеснок&500 очков жизни&54&12',
    'Имбирь&500 очков маны&54&12',
    'Грейпфрут&300 астрала&60&14',
    'Лайм&-50% уворота противника&60&15',
    'Инжир&-50% удачи противника&60&15',
    'Киви&-50% ответа противника&60&15',
    'Гранат&-50% крита противника&60&15'
);
?>

<script>
Date.prototype.addHours = function(h) {
    this.setTime(this.getTime() + (h * 60 * 60 * 1000));
    return this;
}

function calc() {
    let el = document.getElementById('picker');
    if (el.value != null && el.value !== '') {
        let totalItems = document.getElementById('total_items').innerText;
        for (let i = 0; i < totalItems; i++) {
            var cardFruit = document.getElementById('cardFruit_' + i);
            let readyTime = document.getElementById('readyTime_' + i).innerText;
            let result = new Date(el.value);
            result.addHours(-1 * readyTime)
            let resTime = document.getElementById('resTime_' + i);

            if (result < new Date) {
                resTime.innerText = "Уже никак не успеть: (";
                cardFruit.classList.add('border-danger');
                resTime.classList.add('text-danger');
            } else {
                var options = {
                    weekday: 'long',
                    month: 'long',
                    day: 'numeric',
                    hour: 'numeric',
                    minute: 'numeric'
                };
                resTime.classList.add('text-success');
                resTime.innerText = result.toLocaleDateString("ru-RU", options);
                cardFruit.classList.add('border-success');

            }

        }
    } else {
        let totalItems = document.getElementById('total_items').innerText;
        for (let i = 0; i < totalItems; i++) {
            let cardFruit = document.getElementById('cardFruit_' + i);
            let resTime = document.getElementById('resTime_' + i);
            cardFruit.classList.remove('border-success');
            cardFruit.classList.remove('border-danger');
            resTime.innerText = "выберите время вверху страницы";
            resTime.classList.remove(...resTime.classList);

        }
    }
}
</script>

<div class="row">
    <div class="col-xl-4 col-md-6 col-sm-12">
        <div align="center" style="margin-top: 20px; width: 100%">
            <div class="row" style="margin-bottom: 8px">
                <div class="col-sm-10">
                    <?=
                        DateTimePicker::widget([
                            'id' => 'picker',
                            'readonly' => 'true',
                            'name' => 'date_in_modal_1',
                            'options' => ['placeholder' => 'Время созревания...', 'onChange' => 'calc()'],
                            'pluginOptions' => ['autoclose' => true],

                        ]); ?>
                </div>
                <?php
                    Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']);
                    ?>
            </div>
        </div>
    </div>
</div>
<div>
    <div class="row">


        <?php
            $i = 0;
            foreach ($fruits as $item) {
                $arr = explode("&", $item);

                //ready time
                $objDateTime = new DateTime('NOW');
                $objDateTime->modify('+' . $arr[2] . ' hours');
                $ready_time = $objDateTime->format('D d h:i');

                //trash time
                $objDateTimeTrash = new DateTime('NOW');
                $objDateTimeTrash->modify('+' . ($arr[2] + $arr[3]) . ' hours');
                $trash_time = $objDateTimeTrash->format('D d h:i');


                echo "<div class=\"col-xl-4 col-md-6 col-sm-12 mb-3\">";
                echo "<div class=\"card card-fruit\" id=\"cardFruit_$i\">";
                echo "<div class=\"card-header d-flex justify-content-between align-items-center\">";
                echo "<h5 class=\"card-title m-0\">$arr[0]</h5>";
                echo "<p class=\"card-text\">Бонус: $arr[1]</p>";
                echo "</div>";
                echo "<div class=\"card-body p-2\">";
                echo "<div class=\"d-flex justify-content-between align-items-center flex-wrap\">";
                echo "<p class=\"card-text\">Время до роста/порчи: </p>";
                echo "<p class=\"card-text\">$arr[2] ч / $arr[3] ч</p>";
                echo "</div>";
               
                echo "<div class=\"d-flex justify-content-between flex-wrap\">" ;
                 echo "<p class=\"card-text \" style='font-size: 14px;'>Посадим сейчас вырастет/испортится:<br>";
                echo "</p>";
                echo "<p class=\"card-text \" style='font-size: 14px'>" . weekDaysReplace($ready_time) . " / " . weekDaysReplace($trash_time) ;
                echo "</p>";
                echo "</div>";
               
                echo "</div>";
                echo "<div class=\"card-footer\">";
                echo "<p class=\"card-text\"><small class=\"text-muted\">Чтобы выросло в нужное время:<br></small>";
                echo "<p id='resTime_$i' class=\"resTime\">выберите время вверху страницы</p>";
                echo "<span class=\"text-success'\" style='display: none;'  id='readyTime_$i' >$arr[2]</span>";
                echo "</p>";
                echo "</div>";
                echo "</div>";
                echo "</div>";

                $i++;

            }
            echo " <span style='display: none' id='total_items'>$i</span>";
            ?>


    </div>


    <?php

function weekDaysReplace($input)
{
    $ru_weekdays = array('Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Ср', 'Вc');
    $en_weekdays = array('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun');
    return str_replace($en_weekdays, $ru_weekdays, $input);
}

?>