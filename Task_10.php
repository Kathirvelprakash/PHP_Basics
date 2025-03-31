<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        span {
            color: red;
        }
    </style>
</head>
<body>
    <?php
    // Define available rooms
    $rooms = [101, 102, 103, 104, 105];
    
    // Default booked rooms (predefined)
    $pre_booked = [102, 105, 104];
    
    // Initialize variables
    $booked = $pre_booked; // Start with predefined booked rooms
    $error = $success = "";
    $need = "";

    // Retrieve previously booked rooms from the hidden input field
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get already booked rooms from hidden field
        if (!empty($_POST['booked_rooms'])) {
            $booked = explode(',', $_POST['booked_rooms']);
            $booked = array_map('intval', $booked); // Convert all to integers
        }

        // Validate room number
        if (!filter_var($_POST["room"], FILTER_VALIDATE_INT)) {
            $error = "❌ Invalid Room Number! Please enter a valid number.";
        } else {
            $need = intval($_POST["room"]);

            if (!in_array($need, $rooms)) {
                $error = "❌ Invalid Room Number! Please select from available rooms.";
            } elseif (in_array($need, $booked)) {
                $error = "❌ Room $need is already booked!";
            } else {
                $booked[] = $need; // Add new booking to booked list
                $success = "✅ Room $need has been successfully booked!";
            }
        }
    }
    ?>

    <h1>🏨 Hotel Room Booking</h1>

    <h2>🛏️ Room Availability</h2>
    <table>
        <tr>
            <th>Room Number</th>
            <th>Status</th>
        </tr>
        <?php
        foreach ($rooms as $room) {
            $status = in_array($room, $booked) ? "❌ Booked" : "✅ Available";
            echo "<tr><td>$room</td><td>$status</td></tr>";
        }
        ?>
    </table>

    <h2>🔎 Book a Room</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        Enter Room Number: <input type="number" name="room" required>
        <input type="hidden" name="booked_rooms" value="<?php echo implode(',', $booked); ?>">
        <input type="submit" value="Check & Book">
    </form>

    <?php
    // Show messages after form submission
    if (!empty($error)) {
        echo "<p style='color: red;'>" . htmlspecialchars($error) . "</p>";
    }
    if (!empty($success)) {
        echo "<p style='color: green;'>" . htmlspecialchars($success) . "</p>";
    }
    ?>
</body>
</html>