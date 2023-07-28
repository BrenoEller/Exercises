<?php

    require_once("templates/header.php");

    function isPalindrome($word) {
        // Remove spaces and convert the word to lowercase for case-insensitive comparison
        $cleanWord = str_replace(' ', '', strtolower($word));

        // Reverse the word and compare with the original word
        return $cleanWord === strrev($cleanWord);
    }

    $enteredWord = $isPalindromeMessage = '';

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $enteredWord = $_POST["word"];
        $isPalindromeMessage = isPalindrome($enteredWord) ? "is" : "is not";
    }
?>
    <div class="container">
        <div class="content">
            <h1>Palindrome Checker</h1>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="word">Enter a word:</label>
                <input class="inputText" type="text" name="word" id="word" value="<?php echo $enteredWord; ?>" required>
                <button type="submit" class="calculate">Check Palindrome</button>
            </form>

            <?php if ($_SERVER["REQUEST_METHOD"] === "POST") { ?>
                <p>The word "<?php echo $enteredWord; ?>" <?php echo $isPalindromeMessage; ?> a palindrome.</p>
            <?php } ?>
        </div>
    </div>
</body>
</html>