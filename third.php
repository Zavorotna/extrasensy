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
            $numb = $_POST["selectthree"];
            $numbTwo = $_POST["selecttwo"];
            $number = $_POST["selectnumber"];
            $firstNumb = $_POST["first"];
            $answer = [];
                array_push($_SESSION['answer'], $numb);
                if (!in_array($numb, $answer)) { // check if guess has not been added to the answer array before
                $answer[] = $numb;
                }
            if ($firstNumb == $numb) {
                echo "
                <div class='flex'>
                    <p class='lose'>Ура! Хоч на щось ти тай спроможний!</p>
                    <p class='lose'>Ти вгадав в якій пятірці було моє число - $firstNumb</p>
                    <p class='lose butt-try'>
                    <a href='prize.html'>
                    Отримай приз</a>
                    </p>
                </div>";
            } else if ($firstNumb < $numb) {
                echo "
                <div class='flex'>
                    <p class='lose'>Ти знову не вгадав!</p>
                    <p class='lose'>Залишився останній шанс!</p>
                    <p class='lose'>Даю підказку - твоє число більше ніж моє! Якщо вже і тут не вгадаєш, тоді шукай собі інше хоббі!</p>
                </div>
                ";
            } else if ($firstNumb > $numb) {
                echo "
                <div class='flex'>
                    <p class='lose'>Ти знову не вгадав!</p>
                    <p class='lose'>Залишився останній шанс!</p>
                    <p class='lose'>Даю підказку - твоє число менше ніж моє! Якщо вже і тут не вгадаєш, тоді шукай собі інше хоббі!</p>
                </div>
                ";
            }
        }
        ?>
        <form action="four.php" method="post">
        <input type='hidden' name='selecttwo' value='<?php echo ($numbTwo); ?>'>
        <input type='hidden' name='selectthree' value='<?php echo ($numb); ?>'>
        <input type='hidden' name='selectnumber' value='<?php echo ($number); ?>'>
        <input type='hidden' name='first' value='<?php echo ($firstNumb); ?>'>
        <label for="fourselect" class='arrow'>
            <select name="fourselect">
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
            if ($number >= $numb && $i >= $number) {
                echo "disabled";
            }
        ?>
        >Підтвердити вибір</button>
        </form>
    </div>
</body>
</html>