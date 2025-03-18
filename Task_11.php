<!DOCTYPE html>
<html lang="en">
<?php
$err = $val = "";
$output = "";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(empty($_POST["val"])){
        $err = "Enter the Correct value";
    } elseif(!is_numeric($_POST["val"]) || $_POST["val"] <= 0) {
        $err = "Please enter a valid positive number.";
    } else {
        $val = (int)$_POST["val"];
        for($row=1; $row<=$val;$row++){
            $output .= "<b>" . $row . " Table</b> <br>";
            for($col=1; $col<=10; $col++){
                $output .= $row . " x " . $col . " = " . ($row*$col) . "<br>";
            }
            $output .= "<br>";
        }    
    }
}
?>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        Enter the number of tables to print: 
        <input type="text" name="val" value="<?php echo htmlspecialchars($val); ?>"><br>
        <div style="color:red; font-weight:bold;"><?php echo $err ?? ""; ?></div><br>
        <input type="submit" value="Submit">
    </form>

    <div style="margin-top:10px; font-family:Arial;">
        <?php echo $output; ?>
    </div>
</body>
</html>