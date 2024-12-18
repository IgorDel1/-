<?php session_start();


include_once 'api/db.php';
$searchParams = $_GET;
if(!empty($searchParams)){
    $animalType = $searchParams['animal-type'];
    $address = $searchParams['address'];

    $posts = $db->query("
        SELECT * FROM posts WHERE
        (type_animal = '$animalType' OR address = '$address')
        AND (status = 'active')
    ")->fetchAll();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Поиск</title>
    <link rel="stylesheet" href="search.css">
</head>
<body>
    <header>
        <div class="container">
            <a href="glavn.php">На главную</a>
        </div>
    </header>
    <main>
        <section class="info">
            <div class="container">
                <div class="imog">
                    <img src="images\img\images.jpg" alt="">
                </div>
                <div class="info_item">
                <form class="search-form" method = "GET" action = "search.php">
                    <div class="search-input">
                    <select name="animal-type" id="animal-type">
                            <option value="">Вид животного</option>
                            <option value="cat">Кошка</option>
                            <option value="dog">Собака</option>
                        </select>
                        <input type="text" placeholder="Район" name = "address">
                        <button type = "submit">Найти</button>
                    </div>
                    
                </form>
                </div>
            </div>
        </section>
        <section class = "table">
            <div class="container">
            <table>
    <caption>Информация о найденных животных</caption>
    <thead>
        <tr>
            <th>Вид животного</th>
            <th>Описание</th>
            <th>клеймо</th>
            <th>Адресс</th>
            <th>Район</th>
            <th>Дата</th>
            <th>Ссылка</th>
        </tr>
    </thead>
    <tbody>
        <?php 

            if(!empty ($posts)){
                foreach ($posts as $key => $value){
                    $type = $value['type_animal'];
                    $desc = $value['description'];
                    $mark = $value['mark'];
                    $address = $value['address'];
                    $date = $value['date_found'];
                    $id = $value['id'];
                    echo "
                        <tr>
                        <td>$type</td>
                        <td><img src='images/img/negr.jpg' alt = 'Фото животного'</td>
                        <td>$desc</td>
                        <td>$mark</td>
                        <td>$address</td>
                        <td>$date</td>
                        <td><a href = 'info.php?id=$id'>подробнее</a></td>
                        </tr>
                    ";
                }
            }
                
            ?>
    </tbody>
            </table>
            </div>
        </section>
    </main>

    <style>
    .container{
        max-width: 1900px;
        margin: 0 auto;
    }
    table {
        width: 900px;
        border-collapse: collapse;
        margin: 0 auto;
        font-family: Arial, sans-serif;
    }

    caption {
        font-size: 1.5em;
        margin-bottom: 10px;
    }

    th, td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #4CAF50; /* Цвет фона заголовков */
        color: white; /* Цвет текста заголовков */
    }

    tr:nth-child(even) {
        background-color: #f2f2f2; /* Цвет фона четных строк */
    }

    tr:hover {
        background-color: #ddd; /* Цвет фона при наведении на строку */
    }

    .table img {
        max-width: 100px; /* Максимальная ширина изображений */
        height: auto; /* Автоматическая высота для сохранения пропорций */
    }
</style>
</body>
</html>


