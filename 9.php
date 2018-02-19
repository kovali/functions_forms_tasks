<?php
/*Написать функцию, которая переворачивает строку. Было "abcde", должна выдать "edcba".
 Ввод текста реализовать с помощью формы
 */
function str_turn($a)
{
    $result = '';

    for ($i = 0; $i < mb_strlen($a); $i++) {
        $result = mb_substr($a, $i, 1) . $result;
    }
    return $result;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $text = filter_input(INPUT_POST, 'text1', FILTER_SANITIZE_STRING);
    if ($text) {
        $result = str_turn($text);
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
                          required><?= isset($text) ? htmlentities($text) : '' ?></textarea>
            </div>
            <button type="submit" class="butt">Ок</button>
        </form>
    </div>
</div>