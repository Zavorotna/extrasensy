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
                $numb = $_POST["selectthree"];
                $numbTwo = $_POST["selecttwo"];
                $firstNumb = $_POST["first"];
                $four = $_POST["fourselect"];
                if ($firstNumb > $numb || $firstNumb < $numb) {
                    echo "
                    <div class='flex'>
                        <p class='lose'>Нарешті! Твій шлях був тернистий, але в останню мить фортуна повернулася до тебе! Ти вгадав, моє число було - $firstNumb</p>
                        <p class='lose butt-try'>
                        <a href='prize.html'>
                        Отримай приз</a>
                        </p>
                    </div>";
                } else {
                    echo "
                    <div class='flex'>
                        <p class='lose'>Ну все, повна безнадія! Нажаль всі спроби були марні!</p>
                        <p class='lose'>Тобі так і не вдалося вгадати моє число! А воно було - $firstNumb!</p>
                    </div>
                    ";
                    echo "
                    <div class='flex'>
                        <p class='butt-try'><a href='index.php'>Спробувати ще раз</a></p>
                    </div>
                    ";
                }
            }
        ?>
        <form action="four.php" method="post">
            <input type='hidden' name='selecttwo' value='<?php echo ($numbTwo); ?>'>
            <input type='hidden' name='selectthree' value='<?php echo ($numb); ?>'>
            <input type='hidden' name='fourselect' value='<?php echo ($four); ?>'>
        </form>
    </div>
</body>
</html>