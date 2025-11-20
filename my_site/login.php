<?php
// ======= PHP at the very top, before any HTML =======
$error = ''; // Initialize error variable

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $enteredPassword = $_POST['password'] ?? '';
    $hashedPassword = hash("sha256", $enteredPassword); // compute hash of input
    $correctHash = "b14e9015dae06b5e206c2b37178eac45e193792c5ccf1d48974552614c61f2ff";

    if ($hashedPassword === $correctHash) {
        header("Location: to-do.php");
        exit();
    } else {
        $error = "Incorrect password!";
    }
}

// Optional: Determine base URL for redirection
if ($_SERVER['SERVER_NAME'] === 'localhost') {
    $BASE_URL = ''; // relative path works for XAMPP
} else if ($_SERVER['SERVER_NAME'] === 'osiris.ubishops.ca') {
    $BASE_URL = '/cfougere/'; // replace 'cfougere' with your Osiris username
} else {
    $BASE_URL = '';
}
?>



        

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
        <label for="password">Password:</label><br>
        <input type="password" name="password" id="password"><br><br>
        <button type="submit">Submit</button>
    </form>
	
	<?php if (!empty($error)) { ?>
    <p style="color:red;"><?php echo $error; ?></p>
<?php } ?>

    <?php
    if (!empty($error)) {
        echo "<p style='color:red; font-weight:bold;'>$error</p>";
    }
    ?>
</main>

<?php include 'footer.php'; ?>

</body>
</html>
