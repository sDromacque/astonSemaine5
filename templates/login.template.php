<?php
session_start();
?>
<div class="connection-container">
    <h2>Login</h2>
    <form action="../script/login.php" method="post">
        <div class="form-group">
            <label for="login-username">Name :</label>
            <input type="text" name="username" id="login-username">
        </div>
        <button type="submit" value=" Submit " name="submit">Login</button>
    </form>
</div>
