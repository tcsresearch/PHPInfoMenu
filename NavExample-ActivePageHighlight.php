<!-- navigation.php with dynamic active class -->
<?php $activePage = basename($_SERVER['PHP_SELF'], ".php"); // Gets the current script filename without the .php extension ?>

<nav>
    <ul>
        <li class="<?php if ($activePage == 'index') echo 'active'; ?>"><a href="index.php">Home</a></li>
        <li class="<?php if ($activePage == 'about') echo 'active'; ?>"><a href="about.php">About</a></li>
        <li class="<?php if ($activePage == 'contact') echo 'active'; ?>"><a href="contact.php">Contact</a></li>
    </ul>
</nav>
