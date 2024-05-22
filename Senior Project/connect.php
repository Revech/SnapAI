<!-- Mohamad Al-Nakib -->

<?php
// Define constants for the database connection
define("DBHOST", "localhost"); // Hostname for the database server
define("DBNAME", "snap"); // Name of the database
define("DBUSER", "root"); // Username for accessing the database
define("DBPASS", ""); // Password for accessing the database

// Define the database connection string using the defined constants
define("DBCONNSTRING", "mysql:host=" . DBHOST . ";dbname=" . DBNAME);
?>
