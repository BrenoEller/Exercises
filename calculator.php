<?php

    require_once("templates/header.php")

?>

<div class="container">
    <div class="calculator">
        <?php
        $result = '';
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $num1 = $_POST["num1"];
            $num2 = $_POST["num2"];
            $operation = $_POST["operation"];

            switch ($operation) {
                case '+':
                    $result = $num1 + $num2;
                    break;
                case '-':
                    $result = $num1 - $num2;
                    break;
                case '*':
                    $result = $num1 * $num2;
                    break;
                case '/':
                    if ($num2 != 0) {
                        $result = $num1 / $num2;
                    } else {
                        $result = 'Error: division by zero!';
                    }
                    break;
                default:
                    $result = 'Error: invalid operation!';
                    break;
            }
        }

        if (isset($_POST["clear"]) || ($_SERVER["REQUEST_METHOD"] === "POST" && isset($result))) {
            $num1 = $num2 = $operation = '';
        }
        ?>

        <form method="post" action="" class="calculator-form">
            <div class="form-group">
                <input type="number" name="num1" placeholder="Número 1" value="<?php echo isset($num1) ? $num1 : ''; ?>" required>
            </div>
            <div class="form-group">
                <input type="number" name="num2" placeholder="Número 2" value="<?php echo isset($num2) ? $num2 : ''; ?>" required>
            </div>

            <div class="radio-group">
                <input type="radio" checked name="operation" id="add" value="+" <?php echo isset($operation) && $operation === '+' ? 'checked' : ''; ?> required>
                <label for="add">+</label>

                <input type="radio" name="operation" id="subtract" value="-" <?php echo isset($operation) && $operation === '-' ? 'checked' : ''; ?>>
                <label for="subtract">-</label>

                <input type="radio" name="operation" id="multiply" value="*" <?php echo isset($operation) && $operation === '*' ? 'checked' : ''; ?>>
                <label for="multiply">*</label>

                <input type="radio" name="operation" id="divide" value="/" <?php echo isset($operation) && $operation === '/' ? 'checked' : ''; ?>>
                <label for="divide">/</label>
            </div>

            <div class="form-group">
                <input type="submit" value="Calcular" class="calculate">
                <button type="button" class="calculate" onclick="clearInput()">C</button>
            </div>
        </form>

        <?php if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($result)) { ?>
            <div class="result-box">
                <p class="result">Result: <?php echo $result; ?></p>
            </div>
        <?php } ?>
    </div>
</div>

<script>
    function clearInput() {
        document.querySelector(".calculator-form").reset();
        document.querySelector(".result-box").innerHTML = '';
    }
</script>
</body>
</html>