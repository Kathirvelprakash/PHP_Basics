<!DOCTYPE html>
<html lang="en">
<?php

$err = $val = "";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(empty($_POST["val"])){
        $err= "Enter the Correct value";
    }else{
        $val = $_POST["val"];
        
        echo $val;
        for($row=1; $row<=$val;$row++){
            echo $row . " Table <br>";
            for($col=1; $col<=10; $col++){
                echo $row . " x " . $col . " = " . $row*$col . "<br>";
            }
        }    
    }
}
?>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        Enter the How many table Should print : 
        <input type="text" name="val" value="<?php echo $val; ?>"><br>
        <span style="color:red";><?php echo $err ?? "" ?></span><br>
        <input type="submit" value="submit">
    </form>
</body>
</html>