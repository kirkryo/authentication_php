<?php
//  this file will check the database and authenticate if the user credentials are correct

//  logout function
if ($_GET['logout'] == 'TRUE') {
    $_SESSION = array();
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 100000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    session_destroy();
    header('Location: login.php');
    die;
}

// login function
$input_username = $_POST['username'];
$input_password = $_POST['password'];

//  form a database connection
$conn = new mysqli('localhost', 'root','','auth_db');
if (!$conn) {
    echo "Cannot connect to database";
    die;
}

$stmt = $conn->prepare("SELECT password, salt FROM users where username = ?");
$stmt->bind_param("s", $input_username);
$stmt->execute();
$stmt->bind_result($stored_password, $stored_salt);
$stmt->fetch();

if (hash_password($input_password, $stored_salt) == $stored_password) {
    session_start();
    $_SESSION['session_id'] = session_id();
    $_SESSION['username'] = $input_username;
    header('Location: index.php');
} else {
    header('Location: login.php?login_error=TRUE');
}

$stmt->close();
$conn->close();

function hash_password($password, $salt) {
    $hashed_password = sha1($password.$salt);
    return $hashed_password;
}

