<?php
header('Content-type: text/html; charset=utf-8');
//error_reporting(E_ALL);
session_start();

//
// Функции вывода списков городов, метро, категорий
//
function show_city_block($city = '') {
    $cities = array('641780' => 'Новосибирск', '641490' => 'Барабинск', '641510' => 'Бердск', '641600' => 'Искитим', '641630' => 'Колывань', '641680' => 'Краснообск', '641710' => 'Куйбышев', '641760' => 'Мошково', '641790' => 'Обь', '641800' => 'Ордынское', '641970' => 'Черепаново',);
    $gorod = (isset($_GET['show'])) ? $_SESSION['explanation'][$_GET['show']]['location_id'] : null;
    ?>

    <select title="Выберите Ваш город" name="location_id"> 
        <option value="">-- Выберите город --</option>
        <option disabled="disabled">-- Города --</option>
        <?php
        foreach ($cities as $number => $city) {
            $selected = ($number == $gorod) ? 'selected=""' : ''; //если мы передали в функцию город который нужно выставить в списке то мы ставим специальную метку в селектор
            echo '<option data-coords=",," ' . $selected . ' value="' . $number . '">' . $city . '</option>';
        }
        ?>
    </select>    
    <?php
}

function show_subway_block($subway = '') {
    $subways = array('2028' => 'Берёзовая роща', '2018' => 'Гагаринская', '2017' => 'Заельцовская', '2029' => 'Золотая Нива', '2019' => 'Красный проспект', '2027' => 'Маршала Покрышкина', '2021' => 'Октябрьская', '2025' => 'Площадь Гарина-Михайловского', '2020' => 'Площадь Ленина', '2024' => 'Площадь Маркса', '2022' => 'Речной вокзал', '2026' => 'Сибирская', '2023' => 'Студенческая',);
    $metro = (isset($_GET['show'])) ? $_SESSION['explanation'][$_GET['show']]['metro_id'] : null;
    ?>

    <select title="Выберите станцию метро" name="metro_id"> 
        <option value="">-- Выберите станцию метро --</option>
        <?php
        foreach ($subways as $number => $subway) {
            $selected = ($number == $metro) ? 'selected=""' : ''; //если мы передали в функцию город который нужно выставить в списке то мы ставим специальную метку в селектор
            echo '<option data-coords=",," ' . $selected . ' value="' . $number . '">' . $subway . '</option>';
        }
        ?>
    </select>    
    <?php
}

function show_category_block($cat = '') {
    $categories = array('GR0' => 'Транспорт', '9' => 'Автомобили с пробегом', '109' => 'Новые автомобили', '14' => 'Мотоциклы и мототехника', '81' => 'Грузовики и спецтехника', '11' => 'Водный транспорт', '10' => 'Запчасти и аксессуары', 'GR1' => 'Недвижимость', '24' => 'Квартиры', '23' => 'Комнаты', '25' => 'Дома, дачи, коттеджи', '26' => 'Земельные участки', '85' => 'Гаражи и машиноместа', '42' => 'Коммерческая недвижимость', '86' => 'Недвижимость за рубежом', 'GR2' => 'Работа', '111' => 'Вакансии (поиск сотрудников)', '112' => 'Резюме (поиск работы)', 'GR3' => 'Услуги', '114' => 'Предложения услуг', '115' => 'Запросы на услуги', 'GR4' => 'Личные вещи', '27' => 'Одежда, обувь, аксессуары', '29' => 'Детская одежда и обувь', '30' => 'Товары для детей и игрушки', '28' => 'Часы и украшения', '88' => 'Красота и здоровье', 'GR5' => 'Для дома и дачи', '21' => 'Бытовая техника', '20' => 'Мебель и интерьер', '87' => 'Посуда и товары для кухни', '82' => 'Продукты питания', '19' => 'Ремонт и строительство', '106' => 'Растения', 'GR07' => 'Бытовая техника', '32' => 'Аудио и видео', '97' => 'Игры, приставки и программы', '31' => 'Настольные компьютеры', '98' => 'Ноутбуки', '99' => 'Оргтехника и расходники', '96' => 'Планшеты и электронные книги', '84' => 'Телефоны', '101' => 'Товары для компьютера', '105' => 'Фототехника', 'GR6' => 'Хобби и отдых', '33' => 'Билеты и путешествия', '34' => 'Велосипеды', '83' => 'Книги и журналы', '36' => 'Коллекционирование', '38' => 'Музыкальные инструменты', '102' => 'Охота и рыбалка', '39' => 'Спорт и отдых', '103' => 'Знакомства', 'GR7' => 'Животные', '89' => 'Собаки', '90' => 'Кошки', '91' => 'Птицы', '92' => 'Аквариум', '93' => 'Другие животные', '94' => 'Товары для животных', 'GR8' => 'Для бизнеса', '116' => 'Готовый бизнес', '40' => 'Оборудование для бизнеса',);
    $id = (isset($_GET['show'])) ? $_SESSION['explanation'][$_GET['show']]['category_id'] : null;
    ?>

    <select title="Выберите категорию объявления" name="category_id"> 
        <option value="">-- Выберите категорию --</option>
        <?php
        foreach ($categories as $number => $cat) {
            $selected = ($number == $id) ? 'selected=""' : ''; //если мы передали в функцию город который нужно выставить в списке то мы ставим специальную метку в селектор
            echo '<optgroup>';
            if (!is_numeric($number)) {
                echo '</optgroup><optgroup label="' . $cat . '">';
            } else {
                echo '<option value="' . $number . '" ' . $selected . '>' . $cat . '</option>';
            }
            echo '</optgroup>';
        }
        ?>
    </select>    
    <?php
}

//
// Функции удвления и вывода объявлений
//
function deleteExplanation($name) {
    unset($_SESSION['explanation'][$name]);
}

function showExplanation($Exp, $changing = false) {
    $name = $_SESSION['explanation'][$Exp];
    ?>
    <!DOCTYPE HTML>
    <html>
        <body>
            <form  method="post" action="index.php?delete=<?= $Exp ?>">
                <?php
                if ($name['private']) {
                    echo '<div>
                            <label>
                            <input type="radio" checked="" value="1" name="private">Частное лицо
                            </label>
                            <label>
                            <input type="radio" value="0" name="private">Компания
                            </label>
                        </div>';
                } else {
                    echo '<div>
                        <label>
                        <input type="radio" value="1" name="private">Частное лицо
                        </label>
                        <label>
                        <input type="radio" checked="" value="0" name="private">Компания
                        </label>
                    </div>';
                }
                ?>
                <div>
                    <label><b>Ваше имя</b></label>
                    <input type="text" maxlength="40" value="<?= $name['seller_name'] ?>" name="seller_name">
                </div>
                <div>
                    <label>Электронная почта</label>
                    <input type="text" value="<?= $name['email'] ?>" name="email">
                </div>
                <div>
                    <label>
                        <?php $checked = (isset($name['allow_mails'])) ? 'checked' : ''; ?>
                        <input type="checkbox" value="1" name="allow_mails" <?= $checked ?>>
                        <span>Я не хочу получать вопросы по объявлению по e-mail</span>
                    </label> 
                </div>
                <div>
                    <label>Номер телефона</label>
                    <input type="text" value="<?= $name['phone'] ?>" name="phone">
                </div>
                <div>
                    <label>Город</label>
                    <?php show_city_block($name['location_id']); ?>   
                    <div> 
                        <label>Станция метро</label>
                        <?php show_subway_block($name['metro_id']);  //блок выбора метро  ?>
                    </div>
                </div>
                <div>
                    <label>Категория</label> 
                    <?php show_category_block($name['category_id']);           //блок выбора категории  ?>
                </div>
                <div>
                    <label>Название объявления</label>
                    <input type="text" maxlength="50" value="<?= $name['title'] ?>" name="title"> 
                </div>
                <div>
                    <label>Описание объявления</label> 
                    <textarea maxlength="3000" name="description"><?= $name['description'] ?></textarea> 
                </div>
                <div> 
                    <label>Цена</label> 
                    <input type="text" maxlength="9" value="<?= $name['price'] ?>" name="price">&nbsp; <span>руб.</span>
                </div>
                <div>
                    <input type="submit" value="Изменить объявление">
                </div>
            </form>
            <p><a href="index.php">Вернуться на предыдущую страницу</a></p>
        </body>

        <?php
        exit;
    }

//
// Главный блок: вывод формы, вывод объявлений, обработка запросов
//
    if (isset($_GET['show'])) {
        showExplanation($_GET['show']);
    }
    if (isset($_GET['delete'])) {
        deleteExplanation($_GET['delete']);
    }
    ?>

    <!DOCTYPE HTML>
    <html>
        <body>
            <form  method="post">
                <div>
                    <label>
                        <input type="radio" checked="" value="1" name="private">Частное лицо</label>
                    <label>
                        <input type="radio" value="0" name="private">Компания
                    </label>
                </div>
                <div>
                    <label><b>Ваше имя</b></label>
                    <input type="text" maxlength="40" value="" name="seller_name">
                </div>
                <div>
                    <label>Электронная почта</label>
                    <input type="text" value="" name="email">
                </div>
                <div>
                    <label>
                        <input type="checkbox" value="1" name="allow_mails">
                        <span>Я не хочу получать вопросы по объявлению по e-mail</span>
                    </label> 
                </div>
                <div>
                    <label>Номер телефона</label>
                    <input type="text" value="" name="phone">
                </div>
                <div>
                    <label>Город</label>
                    <?php show_city_block();    //блок выбора города   ?>   

                    <div> 
                        <label>Станция метро</label>
                        <?php show_subway_block();  //блок выбора метро   ?>
                    </div>
                </div>
                <div>
                    <label>Категория</label> 
                    <?php show_category_block();           //блок выбора категории   ?>
                </div>
                <div>
                    <label>Название объявления</label>
                    <input type="text" maxlength="50" value="" name="title"> 
                </div>
                <div>
                    <label>Описание объявления</label> 
                    <textarea maxlength="3000" name="description"></textarea> 
                </div>
                <div> 
                    <label>Цена</label> 
                    <input type="text" maxlength="9" value="0" name="price">&nbsp; <span>руб.</span>
                </div>
                <div>
                    <input type="submit" value="Подать объявление">
                </div>
            </form>


            <?php
            if ($_POST) {
                $_SESSION['explanation'][] = $_POST;
            }
//            print_r($_SESSION);
            if ($_SESSION) {
                echo "<h2>Объявления</h2>";

                echo "<table width = 100%>";
                echo "<tr>";
                echo "<th bgcolor='silver'>Название объявления</th>";
                echo "<th bgcolor='silver'>Цена</th>";
                echo "<th bgcolor='silver'>Имя</th>";
                echo "<th bgcolor='silver'>Удалить</th>";
                echo "</tr>";

                foreach ($_SESSION['explanation'] as $key => &$value) {
                    echo "<tr align = 'center'>";
                    echo "<td><a href='index.php?show=" . $key . "'>" . $value['title'] . "</td>";
                    echo "<td>" . $value['price'] . "</td>";
                    echo "<td>" . $value['seller_name'] . "</td>";
                    echo "<td><a href='index.php?delete=" . $key . "'>Удалить</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
//session_destroy();
            ?>
        </body>
    </html>

