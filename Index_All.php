<?php

echo '<!DOCTYPE html>';
echo '<html lang="en" data-theme="light">';
echo '<head>';
echo '<meta charset="UTF-8">';
echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
echo '<title>TCS PHPInfo Server - Development Beta 1</title>';
echo '<link rel="stylesheet" href="style.css">';
// Include our main menu
include_once 'MainMenu.inc.php'; 
echo '</head>';
echo '<body>';
echo '<main class="content">';


// Show all information, defaults to INFO_ALL
// phpinfo();

// Show all the information.
// phpinfo(8) yields identical results.
phpinfo(INFO_ALL);


echo '</main>';
echo '';
echo '<script src="script.js"></script>';
echo '</body>';
echo '</html>';

?>

