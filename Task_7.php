<!DOCTYPE html>
<html lang="en">
<body>
    <?php
        $error = [];
        $a = $b = $opt = $result = '';

        function san($x){
            return htmlspecialchars(stripslashes(trim($x)));
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Validate A
            if (empty($_POST["a"]) && $_POST["a"] !== "0") {
                $error['a'] = "Enter a valid number";
            } elseif (!is_numeric($_POST["a"])) {
                $error['a'] = "Invalid input. Must be a number.";
            } else {
                $a = san($_POST["a"]);
            }

            // Validate B
            if (empty($_POST["b"]) && $_POST["b"] !== "0") {
                $error['b'] = "Enter a valid number";
            } elseif (!is_numeric($_POST["b"])) {
                $error['b'] = "Invalid input. Must be a number.";
            } else {
                $b = san($_POST["b"]);
            }

            // Validate Operation
            if (empty($_POST["opt"])) {
                $error['opt'] = "Please select an operation";
            } else {
                $opt = san($_POST["opt"]);
            }

            // Perform Calculation only if no errors
            if (empty($error)) {
                switch ($opt) {
                    case "+":
                        $result = $a + $b;
                        break;
                    case "-":
                        $result = $a - $b;
                        break;
                    case "*":
                        $result = $a * $b;
                        break;
                    case "/":
                        if ($b == 0) {
                            $result = "Error: Cannot divide by zero!";
                        } else {
                            $result = $a / $b;
                        }
                        break;
                    case "%":
                        if ($b == 0) {
                            $result = "Error: Cannot find modulus with zero!";
                        } else {
                            $result = $a % $b;
                        }
                        break;
                    default:
                        $result = "Invalid operation selected.";
                        break;
                }
            }
        }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        Value A: <input type="text" name="a" value="<?php echo $a; ?>">
        <span style="color: red;"><?php echo $error['a'] ?? ''; ?></span><br>

        Value B: <input type="text" name="b" value="<?php echo $b; ?>">
        <span style="color: red;"><?php echo $error['b'] ?? ''; ?></span><br>

        <select name="opt">
            <option value="">Select Operation</option>
            <option value="+" <?php if($opt == "+") echo "selected"; ?>>ADD</option>
            <option value="-" <?php if($opt == "-") echo "selected"; ?>>SUB</option>
            <option value="*" <?php if($opt == "*") echo "selected"; ?>>MUL</option>
            <option value="/" <?php if($opt == "/") echo "selected"; ?>>DIV</option>
            <option value="%" <?php if($opt == "%") echo "selected"; ?>>MOD</option>
        </select>
        <span style="color: red;"><?php echo $error['opt'] ?? ''; ?></span><br>

        <input type="submit" value="Calculate">
    </form>

    <?php if(isset($result)): ?>
        <h3>Result: <?php echo $result; ?></h3>
    <?php endif; ?>
</body>
</html>
