<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
         <h1>Log in</h1>
        <p>Please log in to view the db</p>
        <?php 
        if (isset($loginError))  {?>
        <p> <?php echo ($loginError);?></p>
        
<?php } ?>
        <form action="" method="post">
            <div>
                <label for="user">User: <input type="text" name="user" id="user"></label>
            </div>
            <div>
                <label for="password">Password: <input type="password" name="password" id="password"></label>
            </div>
            <div>
                <input type="hidden" name="action" value="login">
                <input type="submit" value="Log in">
            </div>
    </form>
        <p><a href="index.php?id=<?echo $id?>"><?php echo "Home"?></a></p>
    </body>
</html>
