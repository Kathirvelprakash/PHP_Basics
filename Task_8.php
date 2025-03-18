<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
        }
        td {
            padding: 8px;
            border: 1px solid black;
        }
        span {
            color: red;
        }
    </style>
</head>
<body>
    <?php
    // Initialize variables
    $error = [];
    $name = $sal = $bon_sal = $net_sal = $title = "";

    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        // Validate Name
        if (empty($_POST['name'])) {
            $error['name'] = "Enter a valid name.";
        } else {
            $name = htmlspecialchars($_POST["name"]);
        }

        // Validate Salary (Using filter_var)
        if (!filter_var($_POST["sal"], FILTER_VALIDATE_FLOAT)) {
            $error['sal'] = "Enter a valid numeric salary.";
        } else {
            $sal = $_POST["sal"];
        }

        // Validate Job Title
        if (empty($_POST['title'])) {
            $error['title'] = "Enter a valid job title.";
        } else {
            $title = htmlspecialchars($_POST["title"]);
        }

        // Perform calculations only if no errors
        if (empty($error)) { 
            $bon_sal = ($sal > 50000) ? ($sal * 10) / 100 : ($sal * 5) / 100;
            $net_sal = $sal - (($sal * 10) / 100);
        }
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        Employee Name: <input type="text" name="name" value="<?php echo $name; ?>"> 
        <span><?php echo $error['name'] ?? ""; ?></span> <br>

        Employee Salary: <input type="text" name="sal" value="<?php echo $sal; ?>">
        <span><?php echo $error['sal'] ?? ""; ?></span> <br>

        Employee Job Title: <input type="text" name="title" value="<?php echo $title; ?>"> 
        <span><?php echo $error['title'] ?? ""; ?></span> <br>

        <input type="submit" value="Submit">
    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] == "POST" && empty($error)) : ?>
    <h3>Employee Salary Details:</h3>
    <table>
        <tr>
            <td>Name</td> <td><?php echo $name; ?></td>
        </tr>
        <tr>
            <td>Your title is</td> <td><?php echo $title; ?></td>
        </tr>
        <tr>
            <td>Your salary before tax</td> <td><?php echo number_format($sal, 2); ?></td>
        </tr>
        <tr>
            <td>Your net salary</td> <td><?php echo number_format($net_sal, 2); ?></td>
        </tr>
        <tr>
            <td>Your Bonus Amount</td> <td><?php echo number_format($bon_sal, 2); ?></td>
        </tr>        
    </table>
    <?php endif; ?>
</body>
</html>