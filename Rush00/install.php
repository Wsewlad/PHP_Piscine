<?php
session_start();
?>
<html>
<head>
    <title>install</title>
</head>
<body>
    <div align="center" style="margin: 200px">
        <form action="install_run.php" method="post">
            <?php 
            session_start();
            ?>
            <?php
            if($_GET[error]){ 
                echo $_GET[error];
            }
            ?>
            <br/>
            <h1>Install website</h1>
            <p>Turn in your login and pass for Database</p>
            <input required type="text" name="login" value="" placeholder="Login"><br/>
            <input required type="password" name="passwd" value="" placeholder="Password"><br/>
            <input type="submit" name="submit" value="OK"/><br/>
        </form>
    </div>
</body>
</html>