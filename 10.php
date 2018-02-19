<?php
/*Написать функцию, которая считает количество уникальных слов в тексте. Слова разделяются пробелами.
Текст должен вводиться с формы*/

function str_unique($a)
{
    $punct = ['.', ',', ';'];
    $filter = str_replace($punct, ' ', $a);

    $arr = explode(' ', $filter);
    $arr = array_filter($arr);
    $arr = array_unique($arr);

    return count($arr);

}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$text = filter_input(INPUT_POST, 'text1', FILTER_SANITIZE_STRING);

if ($text) {
    $result = str_unique($text);
} else {
    $fail = 'Введите текст.';
}

}

?>


<div>

    <div>
      <?php if (isset($result)): ?>
            <pre><?= print_r($result); ?></pre>
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

