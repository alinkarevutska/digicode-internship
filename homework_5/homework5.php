<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practice/Homework 5 (PHP)</title>
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            margin: 0 10%;
        }
        .divided {
            color: blue;
            font-weight: bold;
        }
        table, tr, td, th {
            border: 1px solid black;
        }
        .chessboard {
            display: grid;
            grid-template-columns: auto auto;
            grid-template-rows: auto auto;
            width: fit-content;
            gap: 5px;
        }
        .tiles {
            display: grid;
            grid-template-columns: repeat(8, 1fr);
            width: fit-content;
        }
        .tiles > * {
            width: 30px;
            height: 30px;
            background-color: wheat;
            text-align: center;
            line-height: 30px;
            font-size: 20px;
        }
        .dark {
            background-color: grey;
        }
        .rows {
            display: flex;
            flex-direction: column;
            justify-content: space-around;
        }
        .cols {
            display: flex;
            grid-column: 2 / 3;
            justify-content: space-around;
        }
    </style>
</head>
<body>
    <h1>Practice 5. PHP</h1>
    <p>Автор: Alina Revutska. Варіант 5</p>

    <h2>Task 1</h2>
    <p>
        Номер квитка складається із 6 цифр, а у «щасливому квитку» сума чисел утворених трьома
        першими цифрами номера і трьома іншими дорівнює 1000. (Наприклад: 450550)
    </p>

    <p>Щасливі номери квитків:</p>

    <?php 
        define("MAX_TICKET_NUMBER", 999999);
        $countLucky = 0;

        for ($i < 0; $i <= MAX_TICKET_NUMBER; $i++) {
            if(isTiketLucky($i)) {
                $countLucky++;
                echo formatTicketNumber($i)." ";
            }; 
        };

        function formatTicketNumber($ticketNumber) {
            return str_pad($ticketNumber, strlen(MAX_TICKET_NUMBER), 0, STR_PAD_LEFT);
        };

        function isTiketLucky($ticketNumber) {
            $ticketNumber = formatTicketNumber($ticketNumber);
            $numberLeft = substr($ticketNumber, 0, 1).substr($ticketNumber, 1, 1).substr($ticketNumber, 2, 1);
            $numberRight = substr($ticketNumber, 3, 1).substr($ticketNumber, 4, 1).substr($ticketNumber, 5, 1);
            if ($numberLeft + $numberRight == 1000) {
                return true;
            } else {
                return false;
            };
        };
    ?>

    <p>Всього щасливих квитків:  <?php echo $countLucky ?></p>
    <p>Імовірність отримати щасливий квиток: <?php echo $countLucky / (MAX_TICKET_NUMBER + 1) ?></p>

    <h2>Task 2</h2>
    <p>
        У таблиці повинні бути комірки із даними для результатів множення для чисел від 1 до 9 усіх крім
        3. У кожному із стовпців повинен бути пропущений рядок множення, де результатом множення є
        парне число, що лежить в межах від 25 до 30 включно. Усі числа у таблиці множення, які діляться
        на 3 без остачі повинні бути виділені жирним стилем шрифту та синім кольором.
    </p>

    <?php 
        $exceptionCol = 3;
        $startColValue = 1;
        $startRowValue = 1;
        $endColValue = 9;
        $endRowValue = 9;
    ?>

    <table>
        <thead>
            <?php echo getHeadingRow($startColValue, $endColValue, $exceptionCol)?>
        </thead>
        <tbody>
            <?php echo getBodyRow($startColValue, $endColValue, $startRowValue, $endColValue, $exceptionCol)?>
        </tbody>
    </table>

    <?php 
        function isDividedByThree($value) {
            if($value % 3 == 0) {
                return "<span class='divided'>$value</span>";
            } else {
                return $value;
            };
        };

        function getCellLine($multiplier1, $multiplier2) {
            return isDividedByThree($multiplier1)." x "
            .isDividedByThree($multiplier2)." = "
            .isDividedByThree($multiplier1 * $multiplier2);
        };

        function getHeadingRow($start, $end, $exception) {
            $row = "<tr>";
            for($col = $start; $col <= $end; $col++) {
                if($col == $exception) {continue;}
                $row .= "<th>".isDividedByThree($col)."</th>";
            };
            return $row."</tr>";
        };

        function isException($multiplier1, $multiplier2) {
            $product = $multiplier1 * $multiplier2;
            if ($product >= 25 && $product <= 30 && $product % 2 == 0) {
                return true;
            } else {
                return false;
            };
        };

        function getBodyCell($headingValue, $start, $end) {
            $cell = "<td>";
            for($row = $start; $row <= $end; $row++) {
                if(!isException($headingValue, $row)) {
                    $cell .= getCellLine($headingValue, $row)."<br />";
                } 
            };
            return $cell."</td>";
        };

        function getBodyRow($colStart, $colEnd, $rowStart, $rowEnd, $colException) {
            $row = "<tr>";
            for ($col = $colStart; $col <= $colEnd; $col++) {
                if($col == $colException) {continue;} 
                $row .= getBodyCell($col, $rowStart, $rowEnd);
            };
            return $row."</tr>";
        };
    ?>

    <?php 

    define("BOARD_SIZE", 8);
    define("COLUMNS_NAMES", "abcdefgh");

    $currentPosition = getRandomPosition();
    $targetPosition = getRandomPosition();
    ?>

    <h2>Task 3</h2>
        <p>Хід коня.</p>
        <p>
            Теперішня позиція коня: <?php echo $currentPosition; ?> <br />
            Бажана позиція коня: <?php echo $targetPosition; ?><br />
            Висновок. Запропонований хід 
            <?php echo isMoveAllowed($currentPosition, $targetPosition) 
            ? '' : 'не'; ?> 
            можливий.
        </p>

    <div class="chessboard">
        <div class="rows"><?php echo getRowsTitles(); ?></div>
        <div class="tiles"><?php echo getBoardTiles($currentPosition, $targetPosition); ?></div>
        <div class="cols"><?php echo getColsTitles(); ?></div>
    </div>

    <?php 

    function getRandomPosition() {
        $col = substr(COLUMNS_NAMES, rand(0, strlen(COLUMNS_NAMES) - 1), 1);
        $row = rand(1, BOARD_SIZE);
        return $col.$row;
    };

    function getTile($dark, $piece) {
        if($dark) {
            return "<div class='dark'>$piece</div>";
        } else {
            return "<div>$piece</div>";
        };
    };

    function getRowsTitles() {
        $titles = '';
        for ($row = BOARD_SIZE; $row >= 1; $row--) {
            $titles .= "<div>$row</div>";
        };
        return $titles;
    };

    function getColsTitles() {
        $titles = '';
        for ($col = 0; $col < strlen(COLUMNS_NAMES); $col++) {
            $titles .= "<div>".substr(COLUMNS_NAMES, $col, 1)."</div>";
        };
        return $titles;
    };

    function getBoardTiles($knPosition, $targetPosition) {
        $tiles = '';
        $content = '';
        for ($row = BOARD_SIZE; $row >= 1; $row--) {
            for($col = 1; $col <= strlen(COLUMNS_NAMES); $col++) {
                
                $content = '';
                if( $row == getPositionRowNumber($knPosition) 
                && $col ==  getPositionColNumber($knPosition)) {
                    $content .= "Kn";
                };
                if( $row == getPositionRowNumber($targetPosition) 
                && $col ==  getPositionColNumber($targetPosition)) {
                    $content .= "t";
                };

                if(($row + $col)% 2 == 0) {
                    $tiles .= getTile(true, $content);
                } else {
                    $tiles .= getTile(false, $content);
                };
            };
        };
        return $tiles;
    };

    function getPositionRowNumber($position) {
        return intval(substr($position, 1, 1));
    };

    function getPositionColNumber($position) {
        return strpos(COLUMNS_NAMES, substr($position, 0, 1)) + 1;
    };
    

    function isMoveAllowed($knPosition, $targetPosition) {
        if($knPosition == $targetPosition) {
            return false;
        };
        $rowDifference = abs(getPositionRowNumber($knPosition) - getPositionRowNumber($targetPosition));
        $colDifference = abs(getPositionColNumber($knPosition) - getPositionColNumber($targetPosition));
        
        if ($rowDifference == 2 && $colDifference == 1) {
            return true;
        } elseif ($rowDifference == 1 && $colDifference == 2) {
            return true;
        } else {
            return false;
        };
    };
    ?>
</body>
</html>
