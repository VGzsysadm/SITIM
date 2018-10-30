<?php
$servername = "localhost";
$usr = "usr";
$pwd = "pwd";
$dbname = "dbname";

try {
	$id = "1";
	$username = "admin";
	$password = "$2y$13\$i6B17tQ/nX6J2.yg7z/St.Z6TKOyMOXw0x6KTygtHDCnWhouexAcy";
	$email = "admin@admin.local";
	$is_active = "1";
	$terms_accepted = "1";
	$roles = "a:1:{i:0;s:10:\"ROLE_ADMIN\";}";
	$lang = "en_EN";
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $usr, $pwd);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare('INSERT INTO app_users (id, username, password, email, is_active, terms_accepted, roles, lang) VALUES (:id, :username, :password, :email, :is_active, :terms_accepted, :roles, :lang)');
	$stmt-> bindValue(":id",$id,PDO::PARAM_INT);
	$stmt-> bindValue(":username",$username,PDO::PARAM_STR);
	$stmt-> bindValue(":password",$password,PDO::PARAM_STR);
	$stmt-> bindValue(":email",$email,PDO::PARAM_STR);
	$stmt-> bindValue(":is_active",$is_active,PDO::PARAM_BOOL);
	$stmt-> bindValue(":terms_accepted",$terms_accepted,PDO::PARAM_BOOL);
	$stmt-> bindValue(":roles",$roles,PDO::PARAM_STR);
	$stmt-> bindValue(":lang",$lang,PDO::PARAM_BOOL);
	$stmt->execute();
	echo "The user admin has been created with the password admin, now you can log in.";
    }
catch(PDOException $e)
    {
    echo "You cannot use this query again." . "<br>" . "If you used already this config file, please remove it urgently from the public folder, if not check your database connection data.";
    }
?>
