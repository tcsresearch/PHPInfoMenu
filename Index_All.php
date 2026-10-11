<?php

echo '<!DOCTYPE html>';
echo '<html lang="en" data-theme="light">';
echo '<head>';
echo '<meta charset="UTF-8">';
echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
echo '<title>TCS PHPInfo Server - Development Beta 1</title>';

// Temporarily leave PHP for Bug Fixes
?>

<script>
    // Check localStorage for saved theme, default to 'light' if not found
    const currentTheme = localStorage.getItem('theme') || 'light';
    document.documentElement.setAttribute('data-theme', currentTheme);
    
    // Alternatively, if you use a class name:
    // document.body.classList.add(currentTheme);
</script>

<script>
    
const currentTheme = localStorage.getItem('theme') ? localStorage.getItem('theme') : null;

if (currentTheme) {
    document.documentElement.setAttribute('data-theme', currentTheme);

    if (currentTheme === 'dark') {
        toggleSwitch.checked = true;
    }
}
    
</script>

<?php // Go back to PHP
// Source our JavaScript
    echo '<script src="script.js"></script>';
// Include Our Stylesheet
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
// echo '<script src="script.js"></script>';
echo '</body>';
echo '</html>';

?>

