<?php
//  home page
session_start();

if (!isset($_SESSION['session_id'])) {
    echo "<a href='login.php'><p>Login</p></a>";
} else {
    echo "You are logged in as: {$_SESSION['username']}";
    echo "<a href='authenticate.php?logout=TRUE'><p>Logout</p></a>";
}
?>
<a href='secret.php'><p>The Secret Page</p></a>
<h1>Welcome home! Guests can view this page!</h1>
<img src="giphy2.gif" alt="Fried Chicken">
