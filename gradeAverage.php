<?php

    require_once("templates/header.php");

    function calculateAverage($grades) {
        $total = 0;
        foreach ($grades as $grade) {
            $total += $grade;
        }

        return $total / count($grades);
    }

    $subject1 = $subject2 = $subject3 = '';
    $average = '';

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $subject1 = $_POST["subject1"];
        $subject2 = $_POST["subject2"];
        $subject3 = $_POST["subject3"];

        $grades = array($subject1, $subject2, $subject3);
        $average = calculateAverage($grades);
    }
?>

    <div class="container">
        <div class="content">
            <h1>Grade Average Calculator</h1>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="subject1">Enter grade for Subject 1 (max 10):</label>
                <input class="input" type="number" step="0.01" name="subject1" id="subject1" value="<?php echo $subject1; ?>" required max="10">
                <br>

                <label for="subject2">Enter grade for Subject 2 (max 10):</label>
                <input class="input" type="number" step="0.01" name="subject2" id="subject2" value="<?php echo $subject2; ?>" required max="10">
                <br>

                <label for="subject3">Enter grade for Subject 3 (max 10):</label>
                <input class="input" type="number" step="0.01" name="subject3" id="subject3" value="<?php echo $subject3; ?>" required max="10">
                <br>

                <button type="submit" class="calculate">Calculate Average</button>
            </form>

            <?php if ($_SERVER["REQUEST_METHOD"] === "POST") { ?>
                <p>The calculated average grade is: <?php echo number_format($average, 2); ?></p>
            <?php } ?>
        </div>
    </div>
</body>
</html>