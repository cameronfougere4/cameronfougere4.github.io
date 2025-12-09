<?php

$error = ''; 
$savedUsername = $_COOKIE['todo-username'] ?? ''; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$username = $_POST['username'] ?? '';
    $enteredPassword = $_POST['password'] ?? '';
    $hashedPassword = hash("sha256", $enteredPassword); 
    $correctHash = "b14e9015dae06b5e206c2b37178eac45e193792c5ccf1d48974552614c61f2ff";

    if ($hashedPassword === $correctHash) {
		setcookie("todo-username", $username, time() + (86400 * 30));
        header("Location: to-do.php");
        exit();
    } else {
        $error = "Incorrect password!";
    }
}


if ($_SERVER['SERVER_NAME'] === 'localhost') {
    $BASE_URL = ''; 
} else if ($_SERVER['SERVER_NAME'] === 'osiris.ubishops.ca') {
    $BASE_URL = '/cfougere/'; 
} else {
    $BASE_URL = '';
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

    <h1>Enter Password to Access Your To-Do List</h1>

    <form method="POST" action="">
	 <label for="username">Username:</label><br>
        <input 
            type="text" 
            name="username" 
            id="username"
            value="<?php echo htmlspecialchars($savedUsername); ?>"
        ><br><br>
		
        <label for="password">Password:</label><br>
        <input type="password" name="password" id="password"><br><br>
        <button type="submit">Submit</button>
    </form>
	
	<?php if (!empty($error)) { ?>
    <p style="color:red;"><?php echo $error; ?></p>
<?php } ?>

   
</main>

<?php include 'footer.php'; ?>

</body>
</html>
