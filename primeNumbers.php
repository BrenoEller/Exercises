<?php

    require_once("templates/header.php");

    function isPrime($number) {
        if ($number <= 1) {
            return false;
        }
    
        for ($i = 2; $i <= sqrt($number); $i++) {
            if ($number % $i === 0) {
                return false;
            }
        }
    
        return true;
    }
    
    function getFirstPrimesFrom($startNumber, $count) {
        $primes = array();
        $number = $startNumber;
    
        while (count($primes) < $count) {
            if (isPrime($number)) {
                $primes[] = $number;
            }
            $number++;
        }
    
        return $primes;
    }
    
    $startingNumber = $resultMessage = '';
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $startingNumber = $_POST["startingNumber"];
        $firstPrimes = getFirstPrimesFrom($startingNumber, 10);
        $resultMessage = "The first 10 prime numbers starting from $startingNumber are: " . implode(", ", $firstPrimes);
    }
?>
    

    <div class="container">
        <div class="content">
            <h1>First Prime Numbers</h1>
            <div class="numberSelect">
                <label for="startingNumber">Enter the number from which you want to get the first 10 prime numbers:</label><br>
                <form class="formNumbersPrime" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">          
                    <input class="input" type="number" name="startingNumber" id="startingNumber" value="<?php echo $startingNumber; ?>" required>
                    <button type="submit" class="calculate">Calculate</button>
                </form>
            </div>
            
            <?php if ($_SERVER["REQUEST_METHOD"] === "POST" && $resultMessage) { ?>
                <div class="resultPrimeNumbers">
                    <p><?php echo $resultMessage; ?></p>
                </div>  
            <?php } ?>
        </div>
    </div>

    
</body>
</html>