<?php
/*
* Есть строка $string = 'яблоко черешня вишня вишня черешня груша яблоко черешня вишня яблоко вишня вишня черешня груша
* яблоко черешня черешня вишня яблоко вишня вишня черешня вишня черешня груша яблоко черешня черешня вишня яблоко вишня
* вишня черешня черешня груша яблоко черешня вишня';
*
* Подсчитайте, сколько раз каждый фрукт встречается в этой строке. Выведите в виде списка в порядке уменьшения
* количества:
*
* Пример вывода:
* яблоко – 12
* черешня – 8
* груша – 5
* слива - 3
*/

function CountArrayWords($a)
{
    $arr = explode(' ', $a);
    $arr = array_count_values($arr);
    arsort($arr);
    return $arr;

}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $text = filter_input(INPUT_POST, 'text1', FILTER_SANITIZE_STRING);

    if ($text) {
        $result = CountArrayWords($text);
    } else {
        $fail = 'Введите текст.';
    }

}

?>


<div>

    <?php if (isset($fail)): ?>
        <p><?= htmlentities($fail) ?></p>
    <?php endif; ?>
    <?php if (isset($result)): ?>
        <p>
            <?php foreach ($result as $key => $value): ?>
                <?= htmlentities($key) . ' – ' . htmlentities($value) . '<br>' ?>
            <?php endforeach; ?>
        </p>

    <?php endif; ?>


    <form action="" method="post">
        <div class="form">
            <label for="text1">Текст</label>
            <textarea name="text1" id="text1" class="form" rows="3"
                      required><?= isset($text) ? htmlentities($text) : '' ?></textarea>
        </div>
        <button type="submit" class="butt">Ок</button>
    </form>
</div>



