<?php

    require_once("templates/header.php");

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $number = $_POST["number"];
    } else {
        $number = "";
    }
?>

    <div class="container">
        <div class="content">
            <h1>Multiplication Table</h1>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="number">Enter a number:</label>
                <input class="input" type="number" name="number" id="number" value="<?php echo $number; ?>" required>
                <button type="submit" class="calculate">Show Table</button>
            </form>

            <?php if ($_SERVER["REQUEST_METHOD"] === "POST") { ?>
                <h2>Multiplication Table for <?php echo $number; ?></h2>
                <table border="1">
                    <tr>
                        <th>Number</th>
                        <th>Result</th>
                    </tr>
                    <?php for ($i = 1; $i <= 10; $i++) { ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $number * $i; ?></td>
                        </tr>
                    <?php } ?>
                </table>
            <?php } ?>
        </div>
    </div>
</body>
</html>