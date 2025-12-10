<?php
// Only set session save path if using local XAMPP
if ($_SERVER['SERVER_NAME'] === 'localhost') {
    ini_set('session.save_path', __DIR__ . '/../sessions/');
}
?>
