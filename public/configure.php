<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO app_users VALUES ( '1', 'admin', '$2y$13\$i6B17tQ/nX6J2.yg7z/St.Z6TKOyMOXw0x6KTygtHDCnWhouexAcy', 'admin@admin.com', '1', '1', 'a:1:{i:0;s:10:\"ROLE_ADMIN\";}' ); ";
    $conn->exec($sql);
    echo "The user admin has been created with the password admin, now you can log in.";
}
catch(PDOException $e)
{
    echo "You cannot use this query again." . "<br>" . "If you used already this config file, please remove it urgently from the public folder.";
}

$conn = null;
?>