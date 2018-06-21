<?php
//  secret page
include 'session_check.php';

if (!isset($_SESSION['session_id'])) {
    echo "<a href='login.php'><p>Login</p></a>";
} else {
    echo "You are logged in as: {$_SESSION['username']}";
    echo "<a href='authenticate.php?logout=TRUE'><p>Logout</p></a>";
}
?>
<a href='index.php'><p>Home</p></a>
<h1>This is the secret page!</h1>
<img src="giphy.gif" alt="Fried Chicken">