<h1>Log In</h1>
<form method="post" action="authenticate.php">
    <p>Username: <input name="username"></p>
    <p>Password: <input type="password" name="password"></p>
    <p><input type="submit" name="submit" value="Log In"></p>
</form>

<a href='index.php'><p>Home</p></a>
<?php
if (isset($_GET['login_error']) && $_GET['login_error'] == 'TRUE') {
    echo "<p style='color:red;'>login failed!</p>";
}

