<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Game Extrasensy. Version 2.0</title>
</head>
    <body>
    <div class="box"></div>
        <div class="wrapper">
            <?php
            if ($_POST) {
                session_start();
                // session_destroy();
                if (!isset($_SESSION['answer'])) {
                    $_SESSION['answer'] = $answer = [];
                } else {
                    $answer = $_SESSION['answer'];
                }
                $firstNumb = $_POST["first"];
                $numb = $_POST["select"];
                // оголошення правильної відповіді з попередньої сторінки
                $answer = [];
                if (isset($_POST["selecttwo"])) {
                    $i = $_POST["selecttwo"];
                } else {
                    $i = 0;
                }
                array_push($_SESSION['answer'], $i);
                if (!in_array($i, $answer)) { // check if guess has not been added to the answer array before
                $answer[] = $i;
            }
                if ($firstNumb == $numb) {
                    echo "
                    <div class='flex'>
                        <p class='lose'>Вітаю! Ти справжній екстрасенс! Ти вгадав моє число з діапазоном! Я загадав $firstNumb</p>
                        <p class='lose butt-try'>
                        <a href='prize.html'>
                        Отримай приз</a>
                        </p>
                    </div>";
                } else if ($numb != $firstNumb) {
                    echo "
                    <div class='flex'>
                        <p class='lose'>Нажаль ти не вгадав з першого разу!</p>
                        <p class='lose'>Але ти можеш спробувати ще раз вгадати моє число з обраного тобою діапазону!</p>
                    </div>
                    ";
                }
                // наступна спроба вгадати число з обраного діапазону
                if (isset($_POST["selecttwo"])) {
                    $numbTwo = $_POST["selecttwo"];
                    // перевірка чи співпадає наш вибір із загаданим числом
                    if ($numbTwo == $number) {
                        echo "
                        <div class='flex'>
                            <p class='lose'>Вітаю! Ти справжній екстрасенс! Ти вгадав моє число $number</p>
                            <p class='lose butt-try'>
                            <a href='prize.html'>
                            Отримай приз</a>
                            </p>
                        </div>";
                    } else if ($numbTwo != $number) {
                        echo "
                        <div class='flex'>
                            <p class='lose'>Нажаль ти не вгадав!</p>
                        </div>
                        ";
                    }
                } else {
                    $numbTwo = 1;
                }
            }
            ?>
            <form action="two.php" method="post">
            <input type="hidden" name="first" value="<?php echo ($firstNumb); ?>">
            <input type="hidden" name="select" value="<?php echo ($numb); ?>">
            <input type='hidden' name='selectnumber' value='<?php echo ($number); ?>'>
            <label for="selecttwo" class='arrow'>
                <select name='selecttwo'>
                <?php
                    $i = floor($firstNumb/10)*10+1;
                    $j = $i + 9;
                    for ($i; $i <= $j; $i++) {
                        if (!in_array($i, $_SESSION['answer'])) { // якщо число вже було використано, робимо його неактивним
                            echo "<option value='$i'>$i</option>";
                        } else {
                            echo "<option value='$i' disabled>$i (вже використано)</option>";
                        }
                    }  
                ?>
                </select>
            </label>
                <button type="submit" class="button"
                <?php
                if ($numbTwo > 1) {
                    echo "disabled";
                }
                ?>>Підтвердити вибір</button>
            </form>
        </div>
    </body>
</html>