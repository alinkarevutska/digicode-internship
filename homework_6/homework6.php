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
    
        <h2>Завдання 2</h2>
    <p>
    Кіт Шкрябко відсвяткував свій день народження <i><strong>X</strong></i> хв тому. Визначте, якого числа та місяця день народження у Шкрябка та виведіть на сторінку у вигляді: “Кіт Шкрябко відсвяткував свій день народження <i><strong>8000</strong></i> хв тому. День народження Шкрябка – 9-го червня.” (Число <i><strong>X</strong></i> повинно задаватись випадковим чином у межах від 10000 до 500000.) 
    </p>

    <?php 
    define("MIN_X_VALUE", 10000);
    define("MAX_X_VALUE", 500000);
    $randomX = random_int(MIN_X_VALUE, MAX_X_VALUE);

    function randomMinToSec($randomMin) {
        $timeInSec = $randomMin * 60;
        return $timeInSec;
    }

    function getPastTimestamp($timeInSec) {
        $now = time();
        $pastTimeStamp = $now - $timeInSec;
        return $pastTimeStamp;
    }

    function getDayAndMonth($pastTimeStamp) {
        $calculatedDay = date("j", $pastTimeStamp);
        $calculatedMonth = date("n", $pastTimeStamp);
        
        $EnMonthToUkr = [
            1 => 'січня',
            2 => 'лютого',
            3 => 'березня',
            4 => 'квітня',
            5 => 'травня',
            6 => 'червня',
            7 => 'липня',
            8 => 'серпня',
            9 => 'вересня',
            10 => 'жовтня',
            11 => 'листопада',
            12 => 'грудня',
        ];
        return $calculatedDay.' '.$EnMonthToUkr[$calculatedMonth];
    }
    ?>

    <p>Кіт Шкрябко відсвяткував свій день народження <?php echo "<i><strong>$randomX</strong></i>"?> хв тому.
    День народження Шкрябка - <?php echo getDayAndMonth(getPastTimestamp(randomMinToSec($randomX))).'.'?>
    </p>
    
        <h2>Завдання 3</h2>
    <p>
        Конвертер одиниць часу. 
        Доступні для конвертування одиниці: секунди, хвилини, години.
    </p>

    <?php 
        define("VALUES", array("seconds", "minutes", "hours"));
        define("TIME_CONST", 60);
        $validationErrors = [];
        $result = '';
    ?>

    <?php 
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $amount = $_POST["amount"];
            $valueFrom = $_POST["valueFrom"];
            $valueTo = $_POST["valueTo"];

            $validationErrors["valueFrom"] = validateValue($valueFrom);
            $validationErrors["valueTo"] = validateValue($valueTo);
            $validationErrors["amount"] = validateAmount($amount);

            if(!array_filter($validationErrors)){
                $result = convert($amount, $valueFrom, $valueTo);
                $result = round($result, 4);
            };
        }
    ?>

    <form method="POST" class="converter" novalidate>
        <label for="amount">Amount</label>
        <input type="number" name="amount" id="amount">
        <span>
        <?php
            echo $validationErrors["amount"];
        ?>
        </span>

        <label for="valueFrom">From</label>
        <select name="valueFrom" id="valueFrom">
            <?php foreach (VALUES as $value) {
                echo "<option value='$value'>$value</option>";
            };
            ?>
        </select>
        <span>
        <?php 
            echo $validationErrors["valueFrom"]; 
        ?>
        </span>

        <label for="valueTo">To</label>
        <select name="valueTo" id="valueTo">
            <?php foreach (VALUES as $value) {
                echo "<option value='$value'>$value</option>";
            };
            ?>
        </select>
        <span>
        <?php 
            echo $validationErrors["valueTo"];
        ?>
        </span>

        <button type="submit">Convert</button>
    </form>

   <?php 
     if($result) {
        echo "<p>Result:</p>";
        echo "$amount $valueFrom = $result $valueTo";
    } 
   ?>

    <?php 
    function validateValue($value){
        if(empty($value)) {
            return "Please enter time value";
        };
        if (in_array($value, VALUES)) {
            return null;
        }
        else {
            return "Time value should be one of the provided values";
        };
    };

    function validateAmount($amount) {
        if(empty($amount)) {
            return "Please enter amount of time";
        }
        if(!floatval($amount)) {
            return "Amount of time should be a number";
        }
        if($amount < 0) {
            return "Amount of time should be a positive number";
        }
        return null;
    };

    function checkArray($array) {
        for($i = 0; $i < count($array); $i++) {
            if(!isset($array[$i])){
                var_dump($array);
                return true;
            }
            else {
                return false;
            }
        }
    }
    // ["seconds", "minutes", "hours"]
    function convert($amount, $valueFrom, $valueTo) {
        if($valueFrom === $valueTo) {
            return $amount;
        };

        switch($valueFrom) {
            case VALUES[0]: 
                // seconds to minutes
                if($valueTo === VALUES[1]) {
                    return $amount / TIME_CONST;
                }
                // seconds to hours
                if($valueTo === VALUES[2]) {
                    return $amount / pow(TIME_CONST, 2);
                }
                break;
            case VALUES[1]: 
                // minutes to seconds
                if($valueTo === VALUES[0]) {
                    return $amount * TIME_CONST;
                }
                // minutes to hours
                if($valueTo === VALUES[2]) {
                    return $amount / TIME_CONST;
                }
                break;
            case VALUES[2]: 
                // hours to seconds
                if($valueTo === VALUES[0]) {
                    return $amount * pow(TIME_CONST, 2);
                }
                // hours to minutes
                if($valueTo === VALUES[1]) {
                    return $amount * TIME_CONST;
                }
                break;
        }
    }
</body>
</html>
