<?php
/*Написать функцию, которая в качестве аргумента принимает строку, и форматирует ее таким образом, что предложения идут в обратном порядке.<br>
Пример:<br><br>
Входная строка:  'А Васька слушает да ест. А воз и ныне там. А вы друзья как ни садитесь, все в музыканты не годитесь. А король-то — голый.
А ларчик просто открывался. А там хоть трава не расти.';<br><br>
Строка, возвращенная функцией :  'А там хоть трава не расти. А ларчик просто открывался. А король-то — голый.
А вы друзья как ни садитесь, все в музыканты не годитесь. А воз и ныне там.А Васька слушает да ест.'*/

function sentences_($a)
{
    $text = explode('.', $a);
    $text = array_reverse($text);
    $text[] = '';
    return implode('.', $text);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $text1 = filter_input(INPUT_POST, 'text1', FILTER_SANITIZE_STRING);
    if ($text1) {
        $result = sentences_($text1);
    } else {
        $fail = 'Введите текст в форму';
    }
}

?>
<div>

    <div>

        <?php if (isset($fail)): ?>
            <p><?= htmlentities($fail) ?></p>
        <?php endif; ?>

        <?php if (isset($result)): ?>
            <pre><?php print_r($result); ?></pre>
        <?php endif; ?>


        <form action="" method="post">
            <div class="form">
                <label for="text1">Текст</label>
                <textarea name="text1" id="text1" class="form" rows="3"
                          required><?= isset($text1) ? htmlentities($text1) : '' ?></textarea>
            </div>
            <button type="submit" class="butt">Ок</button>
        </form>
    </div>
