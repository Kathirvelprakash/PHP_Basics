<!DOCTYPE html> 
<html lang="en">
<body>
    <?php
    $errors = [];
    $users = [];

    function sanitize_input($x) {
        return stripslashes(trim(htmlspecialchars($x)));
    }

    // Handling Form Submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = sanitize_input($_POST["name"]);
        $mail = sanitize_input($_POST["mail"]);
        $pass = sanitize_input($_POST["pass"]);
        $age = sanitize_input($_POST["age"]);

        // 1️⃣ Validate Name (Only Letters & Spaces)
        if (empty($name)) {
            $errors['name'] = "Enter Name";
        } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) { 
            // Allows only letters and spaces
            $errors['name'] = "Only letters and spaces allowed";
        }

        // 2️⃣ Validate Email
        if (empty($mail)) {
            $errors['mail'] = "Enter Email";
        } elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $errors['mail'] = "Invalid email format";
        }

        // 3️⃣ Validate Password (At least 8 characters & one number)
        if (empty($pass)) {
            $errors['pass'] = "Enter Password";
        } elseif (!preg_match('/^(?=.*\d).{8,}$/', $pass)) {
            $errors['pass'] = "Password must be at least 8 characters and contain a number";
        }

        // 4️⃣ Validate Age (Must be a number)
        if (empty($age)) {
            $errors['age'] = "Enter Age";
        } elseif (!is_numeric($age) || $age < 1 || $age > 120) {
            $errors['age'] = "Enter a valid age (1-120)";
        }

        // Store in users array if no errors
        if (empty($errors)) {
            $users[] = [
                'name' => $name,
                'email' => $mail,
                'age' => $age,
                'password' => str_repeat("*", strlen($pass)) // Mask password for security
            ];
        }
    }
    ?>

    <!-- Form Starts -->
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Name : <input type="text" name="name" value="<?php echo $_POST['name'] ?? ''; ?>"> 
        <span style="color: red;"><?php echo $errors['name'] ?? ''; ?></span><br>

        Password : <input type="password" name="pass"> 
        <span style="color: red;"><?php echo $errors['pass'] ?? ''; ?></span><br>

        E-Mail : <input type="text" name="mail" value="<?php echo $_POST['mail'] ?? ''; ?>"> 
        <span style="color: red;"><?php echo $errors['mail'] ?? ''; ?></span><br>

        Age : <input type="number" name="age" min="1" max="120" value="<?php echo $_POST['age'] ?? ''; ?>"> 
        <span style="color: red;"><?php echo $errors['age'] ?? ''; ?></span><br>

        <input type="submit" value="Submit">
    </form>

    <!-- Display Registered Users -->
    <?php 
    if (!empty($users)) {
        echo "<strong>Registered Users:</strong><br>";
        foreach ($users as $user) {
            echo "Name: " . $user['name'] . "<br>";
            echo "Email: " . $user['email'] . "<br>";
            echo "Age: " . $user['age'] . "<br>";
            echo "Password: " . $user['password'] . "<br>"; // Masked
            echo "<hr>";
        }
    }
    ?>
</body>
</html> 