<?php
// Function to capture specific phpinfo() output using output buffering
function get_phpinfo_content($type) {
    ob_start();
    phpinfo($type);
    $content = ob_get_clean();
    return $content;
}

// Define the menu options
$menu_items = [
    'all' => 'All Information',
    'general' => 'General Information',
    'configuration' => 'Configuration (.ini values)',
    'modules' => 'Modules & Extensions',
    'environment' => 'Environment Variables',
    'variables' => 'All Variables (EGPCS)'
];

// Determine which section to display (default to 'all' if none specified)
$current_section = isset($_GET['section']) && array_key_exists($_GET['section'], $menu_items) ? $_GET['section'] : 'all';

// Map menu selection to phpinfo() constants
$info_constant = INFO_ALL; // Default
switch ($current_section) {
    case 'general':
        $info_constant = INFO_GENERAL;
        break;
    case 'configuration':
        $info_constant = INFO_CONFIGURATION;
        break;
    case 'modules':
        $info_constant = INFO_MODULES;
        break;
    case 'environment':
        $info_constant = INFO_ENVIRONMENT;
        break;
    case 'variables':
        $info_constant = INFO_VARIABLES;
        break;
    case 'all':
    default:
        $info_constant = INFO_ALL;
        break;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Info Menu</title>
    <style>
        body { font-family: sans-serif; }
        nav { margin-bottom: 20px; }
        nav a { margin-right: 15px; text-decoration: none; padding: 5px 10px; border: 1px solid #ccc; }
        nav a.active { background-color: #eee; }
    </style>
</head>
<body>

    <h1>PHP Information Menu</h1>

    <nav>
        <?php foreach ($menu_items as $key => $label): ?>
            <a href="?section=<?php echo $key; ?>" class="<?php echo ($current_section === $key) ? 'active' : ''; ?>">
                <?php echo $label; ?>
            </a>
        <?php endforeach; ?>
    </nav>

    <hr>

    <?php
    // Output the selected phpinfo() content
    echo get_phpinfo_content($info_constant);
    ?>

</body>
</html>
