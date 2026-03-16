<?php
require "dbconnect.php";
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Информационная система размещения частных объявлений </title>
    <style>
        body{
            max-width: 1100px;
            background-color: #00010C;
            color: white;
        }
        *{
            font-family: Sans-Serif;
            margin: 0 auto;
        }
        .item{
            
            background-color: #6b5819;
            margin: 20px;
            padding: 10px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
<h1>Информационная система размещения частных объявлений</h1>

    <?php
    echo "<h2>список пользователей</h2>";

    $result = $conn->query("SELECT * FROM users");

    while ($row = $result->fetch()){
?>
        <div class="item">
            <!-- <div class="image">
                <img src="images/item.png" width="60px">
            </div> -->
            <span class="usId">
                <?=$row['usId']?>
            </span>
            <span class="usLogin">
                <?=$row['usLogin']?>
            </span>
            <span class="usName">
                <?=$row['usName']?>
            </span>
        </div>
<?php

     }
    ?>


</body>
</html>