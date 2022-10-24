<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practice 6 (PHP)</title>
</head>
<body>
    <h1>Practice 6. PHP</h1>
    <p>Автор: Alina Revutska Варіант 5</p>
    <h2>Завдання 1</h2>
    <p>
        Число А лежить в межах від -20 до -1. Індексний масив повинен заповнюватись рандомними значеннями в межах від 1 до 20, доки не буде отримане таке значення, для якого значення за модулем буде рівне A. 
        Після заповнення масив необхідно відсортувати у порядку зростання, після чого видалити із масиву три останні значення.
        Статистичні дані, що необхідно отримати: 
    </p>
    <ul>
        <li>кількість елементів масиву;</li>
        <li>добуток усіх значень масиву, які є простими числами;</li>
        <li>суму всіх значень, що не є кратними 5.</li>
    </ul>

    <form method="GET">
    <label for="numberA">Уведіть значенння елементу масиву, модуль якого має дорівнювати А:</label> <br/>
    <input type="number" name="numberA" id="numberA" min="-20" step="1" max="-1">
    <button type="submit">Ввести</button>
    </form>

    <?php 
    define("MIN_VALUE", 1);
    define("MAX_VALUE", 20);

    if($_SERVER["REQUEST_METHOD"] == "GET") {
        if(!empty($_GET["numberA"])){
            $A = $_GET["numberA"];
            $arr = fillArray($A);

            echo "Число А: $A <br/>";
            echo "Отриманий масив:<br/>";
            echo printArray($arr); 

            sort($arr);
            echo "Відсортований масив:<br/>";
            echo printArray($arr); 

            echo "Масив з видаленими 3 останніми значеннями:<br/>";
            $splicedArr = array_splice($arr, 0, count($arr)-3);
            echo printArray($splicedArr);

            echo "Масив значень, що є простими числами:<br/>";
            echo printArray(createPrimeArr($splicedArr));

            echo "Масив значень, що не є кратними 5:<br/>";
            echo printArray(isNotDividedbyFive($splicedArr));

            printStats(getStats($splicedArr));
        };
    };
    ?>
    <?php 

    function fillArray($A) {
        $arr = [];
        for ($i = 0; ; $i++) {
            $arr[$i] = random_int(MIN_VALUE, MAX_VALUE);
            if( $arr[$i] == abs($A)) {break;}
        }
        return $arr;
    };

    function printArray($arr) {
        echo "arr = [";
        for ($i = 0; $i < count($arr); $i++) {
            echo $arr[$i];
            if ($i < count($arr)-1) {
                echo ", ";
            };
        }; 
        echo "]<br/>";
    };

    function isPrime($num) {
        for ($i = 2; $i < $num; $i++) {
            if ($num % $i == 0){
                return false;
            };
        };
        return true;
    };

    function createPrimeArr($arr) {
        $primeArr = [];
        for($i = 0; $i < count($arr); $i++) {
            if(isPrime($arr[$i])) {
                $primeArr[] = $arr[$i];
            }; 
        };
        return $primeArr;
    };

    function isNotDividedbyFive($arr) {
        $isNotDividedbyFive = [];
        for($i = 0; $i < count($arr); $i++ ) {
            if( $arr[$i] % 5 !== 0) {
                $isNotDividedbyFive[] = $arr[$i];
            }; 
        };
        return $isNotDividedbyFive;
    };

    function getStats($arr) {
        return array(
            "Кількість елементів масиву" => count($arr),
            "Добуток значень, що є простими числами" => array_product(createPrimeArr($arr)),
            "Сума значень, що не є кратними 5" => array_sum(isNotDividedbyFive($arr)),
        );
    };

    function printStats($stats) {
        echo "Статистичні дані масиву: <br/>";
        foreach($stats as $key => $value) {
            echo "$key = $value <br/>";
        };
    };
    ?>
</body>
</html>
