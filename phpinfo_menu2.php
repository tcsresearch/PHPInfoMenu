<?php
$info_type = isset($_GET['type']) ? $_GET['type'] : 'all';

echo '
<!DOCTYPE html>
<html>
<head>
    <title>PHP Info Selector</title>
    <!-- Define META tag to assist with theme autoselect feature. -->
    <meta name="color-scheme" content="light dark">
    
    <style>
       <!-- Replacing with external stylesheet -->
        .menu a { margin-right: 15px; }
    <link rel="stylesheet" href="/css/style.css">
    </style>

     <script src="ToggleTheme.js"></script>

    <!-- Call JavaScript Theme Toggle -->
    <div class="ThemeToggle" align="right">
        <link id="theme-stylesheet" rel="stylesheet" href="/css/light.css">
        <button onclick="toggleTheme()">Toggle Theme</button>
    </div>

    
</head>
<body>
    <!-- Automatically select theme based on system preferences. -->
    <link rel="stylesheet" href="/css/light.css" media="(prefers-color-scheme: light), (prefers-color-scheme: no-preference)">
    <link rel="stylesheet" href="/css/dark.css" media="(prefers-color-scheme: dark)">

    <h1>PHP Information Selector</h1>
    <nav class="menu">
        <a href="?type=all">All Info</a>
        <a href="?type=general">General</a>
        <a href="?type=configuration">Configuration</a>
        <a href="?type=modules">Modules</a>
        <a href="?type=environment">Environment</a>
        <a href="?type=credits">Credits</a>
        <a href="?type=variables">Variables</a>
        <a href="?type=license">License</a>
    </nav>';

// Use a switch to call phpinfo() with the appropriate constant
switch ($info_type) {
    case 'general':
        phpinfo(INFO_GENERAL); // Basic info: config line, build date, system type
        break;
    case 'configuration':
        phpinfo(INFO_CONFIGURATION); // Local and Master values for all directives
        break;
    case 'modules':
        phpinfo(INFO_MODULES); // Loaded modules and their settings
        break;
    case 'environment':
        phpinfo(INFO_ENVIRONMENT); // Environment variables
        break;
    case 'credits':
        phpinfo(INFO_CREDITS); // Environment variables
        break;
    case 'variables':
        phpinfo(INFO_VARIABLES); // Environment variables
        break;
    case 'license':
        phpinfo(INFO_LICENSE); // Environment variables
        break;
    case 'all':
    default:
        phpinfo(INFO_ALL); // Defaults to show everything
        break;
}

echo '
</body>
</html>';
?>
