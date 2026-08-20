<?php
echo '<!DOCTYPE html>';
// echo '<html lang="en" data-theme="light">';
echo '<head>';
echo '<meta charset="UTF-8">';

// New Aug 2026 - Add Color Scheme Meta Tag
echo '<meta name="color-scheme" content="dark light">';
echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
echo '<title>TCS PHPInfo Server - Development Beta 1</title>';

// New Aug 2026 - Inject Inline Head Script and Styles for light/dark modes
<script>
  // Check your stored preference (e.g., localStorage or cookie)
  const isDark = localStorage.getItem('theme') === 'dark';
  if (isDark) {
    document.documentElement.classList.add('dark');
  }
</script>
<style>
  /* Fallback immediate background paint */
  html.dark { background-color: #121212; color: #e0e0e0; }
</style>

echo '<link rel="stylesheet" href="style.css">';
echo '</head>';
echo '<body>';
echo '';
echo '<nav class="navbar">';
echo '<div class="logo">';
echo '<img src="tcshost_logo.png">';
echo 'TCS PHPInfo Server';
echo '</div>';
echo '';

echo '<ul class="nav-links">';
echo '<li><a href="https://phptest.tcshosting.net/">Home</a></li>';
echo '<li><a href="https://phptest.tcshosting.net/Index_General.php">General</a></li>';
echo '<li><a href="https://phptest.tcshosting.net/Index_Credits.php">Credits</a></li>';
echo '<li><a href="https://phptest.tcshosting.net/Index_Configuration.php">Configuration</a></li>';
echo '<li><a href="https://phptest.tcshosting.net/Index_Modules.php">Modules</a></li>';
echo '<li><a href="https://phptest.tcshosting.net/Index_Environment.php">Environment</a></li>';
echo '<li><a href="https://phptest.tcshosting.net/Index_Variables.php">Variables</a></li>';
echo '<li><a href="https://phptest.tcshosting.net/Index_License.php">License</a></li>';
echo '<li><a href="https://phptest.tcshosting.net/Index_All.php">All</a></li>';
echo '</ul>';
echo '';

echo '<!-- Theme Switch Container -->';
echo '<div class="theme-switch-wrapper">';
echo '<span class="mode-label">Light</span>';
echo '<label class="theme-switch" for="checkbox">';
echo '<input type="checkbox" id="checkbox" />';
echo '<div class="slider round"></div>';
echo '</label>';
echo '<span class="mode-label">Dark</span>';
echo '</div>';
echo '</nav>';
echo '';

echo '<main class="content">';
echo '<h1>Welcome To The TCS PHPInfo Server!</h1>';
echo '<p> This server displays information about the installed PHP environment.  Feel free to navigate the various sections using the main menu above.</p>';
echo '<p>To switch between light and dark themes, use the toggle switch in the upper right corner.</p>';
echo '</main>';
echo '';

echo '<script src="script.js"></script>';
echo '</body>';
echo '</html>';
?>
