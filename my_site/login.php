<?php
session_start(); 


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
    session_destroy();
    session_start(); 
    $loggedOutMessage = "Successfully logged out.";
}

if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true) {
    header("Location: to-do.php");
    exit();
}


$error = ''; 
$savedUsername = $_COOKIE['todo-username'] ?? '';

// Path to login_attempts.json (new)
$loginAttemptsFile = 'login_attempts.json';

// Load login attempts from JSON (new)
if (file_exists($loginAttemptsFile)) {
    $attempts = json_decode(file_get_contents($loginAttemptsFile), true);
    if ($attempts === null) $attempts = [];
} else {
    $attempts = [];
}

// Handle login submission (modified)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password'])) {
    $username = $_POST['username'] ?? '';
    $enteredPassword = $_POST['password'] ?? '';
    $hashedPassword = hash("sha256", $enteredPassword); 
    $correctHash = "b14e9015dae06b5e206c2b37178eac45e193792c5ccf1d48974552614c61f2ff";

    // ====== Initialize attempts for user if not exists (new) ======
    if (!isset($attempts[$username])) {
        $attempts[$username] = [
            'attempts' => 0,
            'locked_until' => 0
        ];
    }

    // ====== Check if user is currently locked out (new) ======
    if ($attempts[$username]['locked_until'] > time()) {
        $remaining = $attempts[$username]['locked_until'] - time();
        $error = "User $username is locked out. Try again in $remaining seconds.";
    } else {
        // ====== Password verification ======
        if (!empty($username) && $hashedPassword === $correctHash) {
            // Reset attempts on successful login (new)
            $attempts[$username]['attempts'] = 0;
            $attempts[$username]['locked_until'] = 0;
            file_put_contents($loginAttemptsFile, json_encode($attempts));
        
        setcookie("todo-username", $username, time() + (86400 * 30));

        
        $_SESSION['is_logged_in'] = true;
        $_SESSION['username'] = $username;

        header("Location: to-do.php");
        exit();
    } else { 
		$attempts[$username]['attempts'] += 1;

            if ($attempts[$username]['attempts'] >= 3) {
                $attempts[$username]['locked_until'] = time() + 30; // lock for 30 sec
                $attempts[$username]['attempts'] = 0;
                $error = "Too many failed attempts! $username is locked for 30 seconds.";
            } else {
                $error = "Incorrect username or password! Attempt {$attempts[$username]['attempts']} of 3.";
            }

            file_put_contents($loginAttemptsFile, json_encode($attempts)); // save updates
        }
    }
}

?>


        



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to To-Do List</title>
    <link rel="stylesheet" href="my_style.css">
</head>
<body>

<?php include 'nav.php'; ?>

<main>

<h1>Enter Username and Password to Access Your To-Do List</h1>

<?php if (!empty($loggedOutMessage)) { ?>
    <p style="color:green;"><?php echo $loggedOutMessage; ?></p>
<?php } ?>

<form method="POST" action="">
    <label for="username">Username:</label><br>
    <input 
        type="text" 
        name="username" 
        id="username"
        value="<?php echo htmlspecialchars($savedUsername); ?>"
        required
    ><br><br>

    <label for="password">Password:</label><br>
    <input type="password" name="password" id="password" required><br><br>

    <button type="submit">Submit</button>
</form>

<?php if (!empty($error)) { ?>
    <p style="color:red;"><?php echo $error; ?></p>
<?php } ?>


 

   
</main>

<?php include 'footer.php'; ?>

</body>
</html>
