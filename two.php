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
            $numbTwo = $_POST["selecttwo"];
            $number = $_POST["selectnumber"];
            $firstNumb = $_POST["first"];
            $numb = $_POST["select"];
            $j = $numb + 9;
            $answer = [];
                if (isset($_POST["selecttwo"])) {
                    $numbTwo = $_POST["selecttwo"];
                } else {
                    $numbTwo = 0;
                }
                // додає вибраний варіант у сесію
                array_push($_SESSION['answer'], $numbTwo);
                if (!in_array($numbTwo, $answer)) { // check if guess has not been added to the answer array before
                $answer[] = $numbTwo;
                }
        }
        if ($numbTwo == $number) {
            echo "
            <div class='flex'>
                <p class='lose'>Вітаю! Все ж таки в тебе є екстрасенорні здібності! Ти вгадав моє число $number</p>
                <p class='lose butt-try'>
                <a href='prize.html'>
                Отримай приз</a>
                </p>
            </div>";
        } else if ($numbTwo != $number) {
            echo "
            <div class='flex'>
                <p class='lose'>і знову ж таки ти не вгадав! Але ще маєш шанс!</p>
                <p class='lose'>Спробуй ще раз! Вгадай хоча б в якій пятірці є загадане мною число!</p>
            </div>
            ";
        }
        ?>
        <form action='third.php' method='post'>
            <input type='hidden' name='selecttwo' value='<?php echo ($numbTwo); ?>'>
            <input type='hidden' name='first' value='<?php echo ($firstNumb); ?>'>
            <input type='hidden' name='select' value='<?php echo ($numb); ?>'>
            <input type='hidden' name='selectnumber' value='<?php echo ($number); ?>'>
            <label for="selectthree" class='arrow'>
                <select name='selectthree'>
                    <?php
                    $i = floor($firstNumb/10)*10+1;
                    $j = $i + 4;
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
            <button type='submit' class='button'
            <?php
                if ($numbTwo == $number) {
                    echo "disabled";
                }
            ?>
            >Підтвердити вибір</button>
        </form>
    </div>
</body>
</html>