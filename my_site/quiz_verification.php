<?php
include 'nav.php';


$name = $_GET['name'] ?? '';
$email = $_GET['email'] ?? '';
$study = $_GET['study'] ?? '';
$snack = $_GET['snack'] ?? '';
$sleep = $_GET['sleep'] ?? '';
$profession = $_GET['profession'] ?? '';
$masters = $_GET['masters'] ?? '';


$score = 0;
if ($study == 'early') $score += 2;
if ($study == 'last_minute') $score += 1;
if ($study == 'never') $score += 0;

if ($sleep >= 8) $score += 2;
else if ($sleep >= 5) $score += 1;


if ($score >= 3) $category = "Organized Student";
else $category = "Relaxed Student";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Quiz Results</title>
  <link rel="stylesheet" href="my_style.css">
</head>
<body>

<h1>Quiz Results for <?php echo htmlspecialchars($name); ?></h1>

<p>Email: <?php echo htmlspecialchars($email); ?></p>

<p>Your study habits: <?php echo htmlspecialchars($study); ?></p>
<p>Your sleep hours: <?php echo htmlspecialchars($sleep); ?></p>

<h2>You are a: <?php echo $category; ?></h2>

<?php

$student_type = "organized"; 


$image_file = "";
if ($student_type === "organized") {
    $image_file = "images/organized_student.jpg"; 
} elseif ($student_type === "relaxed") {
    $image_file = "images/relaxed_student.jpg"; 
}


if ($image_file !== "") {
    echo "<img src='$image_file' alt='$student_type student' style='max-width:300px; display:block; margin:20px auto;'>";
}
?>


<?php include 'footer.php'; ?>
</body>
</html>
