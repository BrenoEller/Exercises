<?php

    require_once("templates/header.php");

    function calculateFactorial($number) {
        if ($number < 0) {
            return "Factorial is not defined for negative numbers.";
        }

        if ($number == 0 || $number == 1) {
            return "1";
        }

        $factorial = "1";
        for ($i = 2; $i <= $number; $i++) {
            $factorial = bcmul($factorial, $i);
        }

        return $factorial;
    }

    function truncateText($text, $maxSize) {
        if (mb_strlen($text) <= $maxSize) {
            return $text;
        } else {
            return mb_substr($text, 0, $maxSize) . '...';
        }
    }

    $enteredNumber = $calculatedFactorial = '';

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $enteredNumber = $_POST["number"];
        $calculatedFactorial = calculateFactorial($enteredNumber);
        $calculatedFactorial = truncateText($calculatedFactorial, 10);
    }
?>

    <div class="container">
        <div class="content">
            <h1>Factorial Calculation</h1>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="formFactorial">
                <label for="number">Enter an integer:</label>
                <input type="number" name="number" id="number" class="input" value="<?php echo $enteredNumber; ?>" required>
                <button type="submit" class="calculate">Calculate Factorial</button>
            </form>

            <?php if ($_SERVER["REQUEST_METHOD"] === "POST" && $calculatedFactorial !== '') { ?>
                <p>The factorial of <?php echo $enteredNumber; ?> is: <?php echo $calculatedFactorial; ?></p>
            <?php } ?>
        </div>
    </div>

</body>
</html>