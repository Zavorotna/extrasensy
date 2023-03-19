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
            echo "<h1>Привіт! Давай перевіримо твої екстрасенсорні здібності!</h1>";
            echo "<p>Я загадав число від 1 до 100</p>";
            echo "<p>Для початку спробуй відгадати діапазон чисел в якому може бути моє число</p>";
            $firstNumb = rand(1,100);
        ?>
        <form action="indextwo.php" method="post">
        <label for="select" class='arrow'>
            <select name='select'>
                <?php
                for ($i = 1; $i <= 100; $i+=10) {
                    $j = $i + 9;
                    echo "<option value='$i'>$i - $j</option>";
                }    
                ?>       
            </select>
        </label>
        <input type="hidden" name="first" value="<?php echo ($firstNumb); ?>">
        <button type="submit" class="button">Підтвердити вибір</button>
        </form>
    </div>
    </body>
</html>