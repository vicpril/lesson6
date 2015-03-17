<?php
header('Content-type: text/html; charset=utf-8');
//error_reporting(E_ALL);
session_start();
$bd = array('2028' => 'Берёзовая роща',
    '2018' => 'Гагаринская',
    '2017' => 'Заельцовская',
    '2029' => 'Золотая Нива',
    '2019' => 'Красный проспект',
    '2027' => 'Маршала Покрышкина',
    '2021' => 'Октябрьская',
    '2025' => 'Площадь Гарина-Михайловского',
    '2020' => 'Площадь Ленина',
    '2024' => 'Площадь Маркса',
    '2022' => 'Речной вокзал',
    '2026' => 'Сибирская',
    '2023' => 'Студенческая',
    '9' => 'Автомобили с пробегом',
    '109' => 'Новые автомобили',
    '14' => 'Мотоциклы и мототехника',
    '81' => 'Грузовики и спецтехника',
    '11' => 'Водный транспорт',
    '10' => 'Запчасти и аксессуары',
    '24' => 'Квартиры',
    '23' => 'Комнаты',
    '25' => 'Дома, дачи, коттеджи',
    '26' => 'Земельные участки',
    '85' => 'Гаражи и машиноместа',
    '42' => 'Коммерческая недвижимость',
    '86' => 'Недвижимость за рубежом',
    '111' => 'Вакансии (поиск сотрудников)',
    '112' => 'Резюме (поиск работы)',
    '114' => 'Предложения услуг',
    '115' => 'Запросы на услуги',
    '27' => 'Одежда, обувь, аксессуары',
    '29' => 'Детская одежда и обувь',
    '30' => 'Товары для детей и игрушки',
    '28' => 'Часы и украшения',
    '88' => 'Красота и здоровье',
    '21' => 'Бытовая техника',
    '20' => 'Мебель и интерьер',
    '87' => 'Посуда и товары для кухни',
    '82' => 'Продукты питания',
    '19' => 'Ремонт и строительство',
    '106' => 'Растения',
    '32' => 'Аудио и видео',
    '97' => 'Игры, приставки и программы',
    '31' => 'Настольные компьютеры',
    '98' => 'Ноутбуки',
    '99' => 'Оргтехника и расходники',
    '96' => 'Планшеты и электронные книги',
    '84' => 'Телефоны',
    '101' => 'Товары для компьютера',
    '105' => 'Фототехника',
    '33' => 'Билеты и путешествия',
    '34' => 'Велосипеды',
    '83' => 'Книги и журналы',
    '36' => 'Коллекционирование',
    '38' => 'Музыкальные инструменты',
    '102' => 'Охота и рыбалка',
    '39' => 'Спорт и отдых',
    '103' => 'Знакомства',
    '89' => 'Собаки',
    '90' => 'Кошки',
    '91' => 'Птицы',
    '92' => 'Аквариум',
    '93' => 'Другие животные',
    '94' => 'Товары для животных',
    '116' => 'Готовый бизнес',
    '40' => 'Оборудование для бизнеса',
    '641780' => 'Новосибирск',
    '641490' => 'Барабинск',
    '641510' => 'Бердск',
    '641600' => 'Искитим',
    '641630' => 'Колывань',
    '641680' => 'Краснообск',
    '641710' => 'Куйбышев',
    '641760' => 'Мошково',
    '641790' => 'Обь',
    '641800' => 'Ордынское',
    '641970' => 'Черепаново'
);
if (!function_exists('deleteExplanation')) {

    function deleteExplanation($name) {
        unset($_SESSION['explanation'][$name]);
    }

}
if (!function_exists('showExplanation')) {

    function showExplanation($Exp) {
        $name = $_SESSION['explanation'][$Exp];
        echo '<head>
                <meta charset="utf-8">
                <title>Объявление '.$name['title'].'</title>
             </head>
            <body>
                <form >';
            global $bd;
            if ($name['private']) {
                echo '<div class="form-row-indented">
                <label class="form-label-radio">
                    <input type="radio" checked="" value="1" name="private">Частное лицо</label>
                <label class="form-label-radio">
                    <input type="radio" value="0" name="private">Компания
                </label>
            </div>';
            } else {
                echo '<div class="form-row-indented">
                <label class="form-label-radio">
                    <input type="radio" value="1" name="private">Частное лицо</label>
                <label class="form-label-radio">
                    <input type="radio" checked="" value="0" name="private">Компания
                </label>
            </div>';
            }
            if ($name['seller_name']) {
                echo '<div class="form-row">
                <label for="fld_seller_name" class="form-label"><b id="your-name">Ваше имя - ' . $name['seller_name'] . '</b></label>
            </div>';
            }
            if ($name['manager']) {
                echo '<div style="display: none;" id="your-manager" class="form-row">
                <label for="fld_manager" class="form-label"><b>Контактное лицо - ' . $name['manager'] . '</b></label>
                <em class="f_r_g">&nbsp;&nbsp;необязательно</em>
            </div>';
            }
            if ($name['email']) {
                echo '<div class="form-row">
                <label for="fld_email" class="form-label">Электронная почта - ' . $name['email'] . '</label>
            </div>';
            }
            if ($name['allow_mails']) {
                echo '<div class="form-row-indented">
                <label class="form-label-checkbox" for="allow_mails">
                    <input type="checkbox" checked="" value="1" name="allow_mails" id="allow_mails" class="form-input-checkbox">
                    <span class="form-text-checkbox">Я не хочу получать вопросы по объявлению по e-mail</span>
                </label> 
            </div>';
            } else {
                echo '<div class="form-row-indented">
                <label class="form-label-checkbox" for="allow_mails">
                    <input type="checkbox" value="0" name="allow_mails" id="allow_mails" class="form-input-checkbox">
                    <span class="form-text-checkbox">Я не хочу получать вопросы по объявлению по e-mail</span>
                </label> 
            </div>';
            }

            if ($name['phone']) {
                echo '<div class="form-row">
                <label class="form-label">Номер телефона - ' . $name['phone'] . '</label>
            </div>';
            }
            if ($name['location_id']) {
                echo '<div class="form-row">
                <label class="form-label">Город - ' . $bd[$name['location_id']] . '</label>
            </div>';
            }
            if ($name['metro_id']) {
                echo '<div class="form-row">
                <label class="form-label">Станция метро - ' . $bd[$name['metro_id']] . '</label>
            </div>';
            }
            if ($name['category_id']) {
                echo '<div class="form-row">
                <label class="form-label">Категория - ' . $bd[$name['category_id']] . '</label>
            </div>';
            }
            if ($name['title']) {
                echo '<div class="form-row">
                <label class="form-label">Название объявления - ' . $name['title'] . '</label>
            </div>';
            }
            if ($name['price']) {
                echo '<div class="form-row">
                <label class="form-label">Цена - ' . $name['price'] . '</label>
            </div>';
            }
            if ($name['image']) {
                echo '<div class="form-row">
                <label class="form-label">Ваши фотографии - ' . $name['image'] . '</label>
            </div>';
            }
            if ($name['description']) {
                echo '<div class="form-row">
                    <label for="fld_description" class="form-label" id="js-description-label">Описание объявления</label> 
                    <textarea maxlength="3000" name="description" id="fld_description" class="form-input-textarea">'.$name['description'].'</textarea> 
                </div>';
            }
            echo '</form>
            <p><a href="index.php">Вернуться на предыдущую страницу</a></p>
            </body>';
            exit;
        }
    }

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


                <div class="form-row-indented">
                    <label class="form-label-radio">
                        <input type="radio" checked="" value="1" name="private">Частное лицо</label>
                    <label class="form-label-radio">
                        <input type="radio" value="0" name="private">Компания
                    </label>
                </div>
                <div class="form-row">
                    <label for="fld_seller_name" class="form-label"><b id="your-name">Ваше имя</b></label>
                    <input type="text" maxlength="40" class="form-input-text" value="" name="seller_name" id="fld_seller_name">
                </div>
                <div style="display: none;" id="your-manager" class="form-row">
                    <label for="fld_manager" class="form-label"><b>Контактное лицо</b></label>
                    <input type="text" class="form-input-text" maxlength="40" value="" name="manager" id="fld_manager">
                    <em class="f_r_g">&nbsp;&nbsp;необязательно</em>
                </div>
                <div class="form-row">
                    <label for="fld_email" class="form-label">Электронная почта</label>
                    <input type="text" class="form-input-text" value="" name="email" id="fld_email">
                </div>
                <div class="form-row-indented">
                    <label class="form-label-checkbox" for="allow_mails">
                        <input type="checkbox" value="1" name="allow_mails" id="allow_mails" class="form-input-checkbox">
                        <span class="form-text-checkbox">Я не хочу получать вопросы по объявлению по e-mail</span>
                    </label> 
                </div>
                <div class="form-row">
                    <label id="fld_phone_label" for="fld_phone" class="form-label">Номер телефона</label>
                    <input type="text" class="form-input-text" value="" name="phone" id="fld_phone">
                </div>
                <div id="f_location_id" class="form-row form-row-required">
                    <label for="region" class="form-label">Город</label>
                    <select title="Выберите Ваш город" name="location_id" id="region" class="form-input-select">
                        <option value="">-- Выберите город --</option>
                        <option class="opt-group" disabled="disabled">-- Города --</option>
                        <option selected="" data-coords=",," value="641780">Новосибирск</option>
                        <option data-coords=",," value="641490">Барабинск</option> 
                        <option data-coords=",," value="641510">Бердск</option>
                        <option data-coords=",," value="641600">Искитим</option>
                        <option data-coords=",," value="641630">Колывань</option> 
                        <option data-coords=",," value="641680">Краснообск</option> 
                        <option data-coords=",," value="641710">Куйбышев</option> 
                        <option data-coords=",," value="641760">Мошково</option> 
                        <option data-coords=",," value="641790">Обь</option>   
                        <option data-coords=",," value="641800">Ордынское</option>  
                        <option data-coords=",," value="641970">Черепаново</option> 
                        <option id="select-region" value="0">Выбрать другой...</option> 
                    </select>
                    <div id="f_metro_id"> 
                        <select title="Выберите станцию метро" name="metro_id" id="fld_metro_id" class="form-input-select"> 
                            <option value="">-- Выберите станцию метро --</option>
                            <option value="2028">Берёзовая роща</option>
                            <option value="2018">Гагаринская</option>
                            <option value="2017">Заельцовская</option>
                            <option value="2029">Золотая Нива</option>
                            <option value="2019">Красный проспект</option>
                            <option value="2027">Маршала Покрышкина</option>
                            <option value="2021">Октябрьская</option>
                            <option value="2025">Площадь Гарина-Михайловского</option>
                            <option value="2020">Площадь Ленина</option>
                            <option value="2024">Площадь Маркса</option>
                            <option value="2022">Речной вокзал</option>
                            <option value="2026">Сибирская</option>
                            <option value="2023">Студенческая</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <label for="fld_category_id" class="form-label">Категория</label> 
                    <select title="Выберите категорию объявления" name="category_id" id="fld_category_id" class="form-input-select">
                        <option value="">-- Выберите категорию --</option>
                        <optgroup label="Транспорт">
                            <option value="9">Автомобили с пробегом</option>
                            <option value="109">Новые автомобили</option>
                            <option value="14">Мотоциклы и мототехника</option>
                            <option value="81">Грузовики и спецтехника</option>
                            <option value="11">Водный транспорт</option>
                            <option value="10">Запчасти и аксессуары</option>
                        </optgroup><optgroup label="Недвижимость">
                            <option value="24">Квартиры</option>
                            <option value="23">Комнаты</option>
                            <option value="25">Дома, дачи, коттеджи</option>
                            <option value="26">Земельные участки</option>
                            <option value="85">Гаражи и машиноместа</option>
                            <option value="42">Коммерческая недвижимость</option>
                            <option value="86">Недвижимость за рубежом</option>
                        </optgroup><optgroup label="Работа">
                            <option value="111">Вакансии (поиск сотрудников)</option>
                            <option value="112">Резюме (поиск работы)</option>
                        </optgroup><optgroup label="Услуги">
                            <option value="114">Предложения услуг</option>
                            <option value="115">Запросы на услуги</option>
                        </optgroup><optgroup label="Личные вещи">
                            <option value="27">Одежда, обувь, аксессуары</option>
                            <option value="29">Детская одежда и обувь</option>
                            <option value="30">Товары для детей и игрушки</option>
                            <option value="28">Часы и украшения</option>
                            <option value="88">Красота и здоровье</option>
                        </optgroup><optgroup label="Для дома и дачи">
                            <option value="21">Бытовая техника</option>
                            <option value="20">Мебель и интерьер</option>
                            <option value="87">Посуда и товары для кухни</option>
                            <option value="82">Продукты питания</option>
                            <option value="19">Ремонт и строительство</option>
                            <option value="106">Растения</option></optgroup>
                        <optgroup label="Бытовая электроника">
                            <option value="32">Аудио и видео</option>
                            <option value="97">Игры, приставки и программы</option>
                            <option value="31">Настольные компьютеры</option>
                            <option value="98">Ноутбуки</option>
                            <option value="99">Оргтехника и расходники</option>
                            <option value="96">Планшеты и электронные книги</option>
                            <option value="84">Телефоны</option>
                            <option value="101">Товары для компьютера</option>
                            <option value="105">Фототехника</option>
                        </optgroup><optgroup label="Хобби и отдых">
                            <option value="33">Билеты и путешествия</option>
                            <option value="34">Велосипеды</option>
                            <option value="83">Книги и журналы</option>
                            <option value="36">Коллекционирование</option>
                            <option value="38">Музыкальные инструменты</option>
                            <option value="102">Охота и рыбалка</option>
                            <option value="39">Спорт и отдых</option>
                            <option value="103">Знакомства</option>
                        </optgroup><optgroup label="Животные">
                            <option value="89">Собаки</option>
                            <option value="90">Кошки</option>
                            <option value="91">Птицы</option>
                            <option value="92">Аквариум</option>
                            <option value="93">Другие животные</option>
                            <option value="94">Товары для животных</option>
                        </optgroup><optgroup label="Для бизнеса">
                            <option value="116">Готовый бизнес</option>
                            <option value="40">Оборудование для бизнеса</option>
                        </optgroup>
                    </select>
                </div>
<!--                <div style="display: none;" id="params" class="form-row form-row-required">
                    <label class="form-label ">
                        Выберите параметры
                    </label>
                    <div class="form-params params" id="filters">
                    </div>
                </div>
                <div id="f_map" class="form-row form-row-required hidden"> 
                    <label class="form-label c-2">Укажите местоположение объекта на&nbsp;карте</label>
                    <div class="b-address-map j-address-map disabled">
                        <div class="wrapper">
                            <div class="map" id="address-map"></div>
                            <div class="overlay">
                                <div class="modal">Сначала <span class="fill-in pseudo-link">укажите адрес</span>
                                </div> 
                            </div> 
                        </div> 
                        <div class="result c-2 hidden"> 
                            <div class="map-success">
                                Маркер указывает на: <span class="address-line"></span>.
                                <span class="confirm pseudo-link hidden">Это верный адрес</span>
                            </div>
                            <div class="map-error">Мы не смогли автоматически определить адрес.</div> 
                        </div> 
                        <input type="hidden" disabled="disabled" value="" class="j-address-latitude" name="coords[lat]"> 
                        <input type="hidden" disabled="disabled" value="" class="j-address-longitude" name="coords[lng]"> 
                        <input type="hidden" disabled="disabled" value="" class="j-address-zoom" name="coords[zoom]"> 
                    </div> 
                </div>-->
                <div id="f_title" class="form-row f_title">
                    <label for="fld_title" class="form-label">Название объявления</label>
                    <input type="text" maxlength="50" class="form-input-text-long" value="" name="title" id="fld_title"> 
                </div>
                <div class="form-row">
                    <label for="fld_description" class="form-label" id="js-description-label">Описание объявления</label> 
                    <textarea maxlength="3000" name="description" id="fld_description" class="form-input-textarea"></textarea> 
                </div>
                <div id="price_rw" class="form-row rl"> 
                    <label id="price_lbl" for="fld_price" class="form-label">Цена</label> 
                    <input type="text" maxlength="9" class="form-input-text-short" value="0" name="price" id="fld_price">&nbsp; <span id="fld_price_title">руб.</span>
<!--                    <a class="link_plain grey right_price c-2 icon-link" id="js-price-link" href="/info/pravilnye_ceny?plain">
                        <span>Правильно указывайте цену</span>
                    </a> -->
                </div>

                <div id="f_images" class="form-row"> 
                    <label for="fld_images" class="form-label">
                        <span id="js-photo-label">Фотографии</span>
                        <span class="js-photo-count" style="display: none;"></span>
                    </label>
                    <input type="file" value="image" id="fld_images" name="image" accept="image/*" class="form-input-file"> 
                    <span style="line-height:22px;color: gray; display: none;" id="fld_images_toomuch">Вы добавили максимально возможное количество фотографий</span> 
                    <span style="display: none;" id="fld_images_overhead"></span> 
                </div> 
                <div style="display: none; margin-top: 0px;" class="form-row-indented images" id="files">
                    <div style="display: none;" id="progress"> 
                        <table>
                            <tbody>
                                <tr>
                                    <td> 
                                        <div>
                                            <div>

                                            </div>

                                        </div> 
                                    </td>
                                </tr>
                            </tbody>
                        </table> 
                    </div> 
                </div>

                <div class="form-row-indented form-row-submit b-vas-submit" id="js_additem_form_submit">
                    <div class="vas-submit-button pull-left"> 
                        <span class="vas-submit-border"></span> 
                        <span class="vas-submit-triangle"></span>
                        <input type="submit" value="Далее" id="form_submit" class="vas-submit-input">
                    </div>
                </div>
            </form>


            <?php
            if ($_POST) {
                $_SESSION['explanation'][$_POST['title']] = $_POST;
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

                foreach ($_SESSION['explanation'] as &$value) {
                    echo "<tr align = 'center'>";
                    echo "<td><a href='index.php?show=" . $value['title'] . "'>" . $value['title'] . "</td>";
                    echo "<td>" . $value['price'] . "</td>";
                    echo "<td>" . $value['seller_name'] . "</td>";
                    echo "<td><a href='index.php?delete=" . $value['title'] . "'>Удалить</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            ?>
        </body>
    </html>
