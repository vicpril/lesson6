<?php
header('Content-type: text/html; charset=utf-8');
//error_reporting(E_ALL);

$str = '<optgroup label="Транспорт">
                    <option data-coords=",," value="641780">Новосибирск</option>
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
                    </optgroup>';


function parseHTMLOption($str,$pattern){
    preg_match_all('!<option value="(.*?)">(.*?)</option>!si', $str, $result);
    foreach ($result[1] as $key => $value) {
        $new[$value] = $result[2][$key];
    }
    preg_match_all('!<option data-coords=",," value="(.*?)">(.*?)</option>!si', $str, $result);
    foreach ($result[1] as $key => $value) {
        $new[$value] = $result[2][$key];
    }
    return $new;
}
$result = parseHTMLOption($str, $pattern);

foreach ($result as $key => $value) {
    echo "'$key'=>'$value',<br>";
}
//print_r($result);
?>

