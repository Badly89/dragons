<?php

use kartik\datetime\DateTimePicker;
use yii\bootstrap\Html;

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

    <style>
        td {
            padding: 5px
        }
    </style>

    <script>
        Date.prototype.addHours = function (h) {
            this.setTime(this.getTime() + (h * 60 * 60 * 1000));
            return this;
        }

        function calc() {
            let el = document.getElementById('picker');
            if (el.value != null && el.value !== '') {
                let totalItems = document.getElementById('total_items').innerText;
                for (let i = 0; i < totalItems; i++) {
                    let readyTime = document.getElementById('readyTime_' + i).innerText;
                    let result = new Date(el.value);
                    result.addHours(-1 * readyTime)
                    let resTime = document.getElementById('resTime_' + i);
                    if (result < new Date) {
                        resTime.innerText = "Уже никак не успеть :(";
                    } else {
                        var options = {
                            weekday: 'long',
                            month: 'long',
                            day: 'numeric',
                            hour: 'numeric',
                            minute: 'numeric'
                        };
                        resTime.innerText = result.toLocaleDateString("ru-RU", options);
                    }

                }
            }
        }
    </script>

    <div class="row">
        <div class="col-sm-4">
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
        <br/><br/>
        <table border="1" style="width: 100%">
            <tr>
                <td>
                    Вид растения
                </td>
                <td>
                    Бонус
                </td>
                <td>
                    Время до роста/порчи
                </td>
                <td>
                    При посадке сейчас<br/>вырастет/испортится
                </td>
                <td>
                    Когда нужно посадить,<br/>чтобы выросло к выбранному времени
                </td>
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
                    echo "<tr>";
                    echo "<td>$arr[0]</td>";
                    echo "<td>$arr[1]</td>";
                    echo "<td>$arr[2]ч / $arr[3]ч</td>";
                    echo "<td>" . weekDaysReplace($ready_time) . " / " . weekDaysReplace($trash_time) . "</td>";
                    echo "<td id='resTime_$i'>выберите время кнопкой выше</td>";
                    echo "</tr>";
                    echo "<span style='display: none' id='readyTime_$i'>$arr[2]</span>";
                    $i++;
                }
                echo "<span style='display: none' id='total_items'>$i</span>";
                ?>
            </tr>
        </table>
    </div>
<?php

function weekDaysReplace($input)
{
    $ru_weekdays = array('Пн', 'Вт', 'Ср', 'Чn', 'Пт', 'Ср', 'Вc');
    $en_weekdays = array('Mon', 'Tue', 'Wed', 'Thursday', 'Fri', 'Sat', 'Sun');
    return str_replace($en_weekdays, $ru_weekdays, $input);
}

?>