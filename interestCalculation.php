<?php

    require_once("templates/header.php");

    function calculateFinalValue($initialCapital, $interestRate, $investmentTime) {
        $finalValue = $initialCapital * (1 + $interestRate / 100) ** $investmentTime;
        return $finalValue;
    }

    $initialCapital = $interestRate = $investmentTime = '';
    $finalValue = '';

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $initialCapital = $_POST["initialCapital"];
        $interestRate = $_POST["interestRate"];
        $investmentTime = $_POST["investmentTime"];

        $finalValue = calculateFinalValue($initialCapital, $interestRate, $investmentTime);
    }
?>

    <div class="container">
        <div class="content">
            <h1>Investment Calculator</h1>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="initialCapital">Enter initial capital:</label>
                <input class="input" type="number" step="0.01" name="initialCapital" id="initialCapital" value="<?php echo $initialCapital; ?>" required>
                <br>

                <label for="interestRate">Enter interest rate (% per month):</label>
                <input class="input" type="number" step="0.01" name="interestRate" id="interestRate" value="<?php echo $interestRate; ?>" required>
                <br>

                <label for="investmentTime">Enter investment time (in months):</label>
                <input class="input" type="number" step="1" name="investmentTime" id="investmentTime" value="<?php echo $investmentTime; ?>" required>
                <br>

                <button type="submit" class="calculate">Calculate Final Value</button>
            </form>

            <?php if ($_SERVER["REQUEST_METHOD"] === "POST") { ?>
                <p>The final value of the investment is: <?php echo number_format($finalValue, 2); ?></p>
            <?php } ?>
        </div>
    </div>
</body>
</html>