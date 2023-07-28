<?php

    require_once("templates/header.php");

    function countVowels($str) {
        $vowels = array('a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U');
        $count = 0;

        for ($i = 0; $i < strlen($str); $i++) {
            if (in_array($str[$i], $vowels)) {
                $count++;
            }
        }

        return $count;
    }

    $enteredSentence = $vowelCount = '';

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $enteredSentence = $_POST["sentence"];
        $vowelCount = countVowels($enteredSentence);
    }
?>
    <div class="container">
        <div class="content">
            <h1>Vowel Counter</h1>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="sentence">Enter a sentence:</label>
                <input class="inputText" type="text" name="sentence" id="sentence" value="<?php echo $enteredSentence; ?>" required>
                <button class="calculate" type="submit">Count Vowels</button>
            </form>

            <?php if ($_SERVER["REQUEST_METHOD"] === "POST") { ?>
                <p>The sentence "<?php echo $enteredSentence; ?>" has <?php echo $vowelCount; ?> vowels.</p>
            <?php } ?>
        </div>
    </div>

</body>
</html>