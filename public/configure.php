<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "dbname";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $db->prepare("INSERT INTO app_users ( id, username, password, email, isactive, termsAccepted, roles, lang ) VALUES ( NULL, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $id, $username, $password, $email, $isactive, $termsAccepted, $roles, $lang  );
    $id = '1';
    $username = 'admin';
    $password = '$2y$13\$i6B17tQ/nX6J2.yg7z/St.Z6TKOyMOXw0x6KTygtHDCnWhouexAcy';
    $email = 'admin@admin.local';
    $isactive = '1';
    $termsAccepted = '1';
    $roles = ''a:1:{i:0;s:10:\"ROLE_ADMIN\";}'';
    $lang = 'en_EN';
    $stmt->execute();
    echo "The user admin has been created with the password admin, now you can log in.";
}
catch(PDOException $e)
{
    echo "You cannot use this query again." . "<br>" . "If you used already this config file, please remove it urgently from the public folder.";
}
$conn = null;
?>
