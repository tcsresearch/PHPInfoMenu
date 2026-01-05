<?php
$info_type = isset($_GET['type']) ? $_GET['type'] : 'all';

echo '
<!DOCTYPE html>
<html>
<head>
    <title>PHP Info Selector</title>
    <style>
        .menu a { margin-right: 15px; }
    </style>
</head>
<body>
    <h1>PHP Information Selector</h1>
    <nav class="menu">
        <a href="?type=all">All Info</a>
        <a href="?type=general">General</a>
        <a href="?type=configuration">Configuration</a>
        <a href="?type=modules">Modules</a>
        <a href="?type=environment">Environment</a>
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
    case 'all':
    default:
        phpinfo(INFO_ALL); // Defaults to show everything
        break;
}

echo '
</body>
</html>';
?>
