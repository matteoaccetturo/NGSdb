<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>aHUSdb</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>
        <p><h1>aHUSdb Home</h1>
        <p>This is a database of NGS data from aHUS patients</p>
<!--        <form action=updateData.php>
   <input type="submit" name="update" value="Update data">
 </form>-->
        <?php
     
//        if (!userIsLoggedIn()) {
//            include 'login.php';
//            exit();
//}
        ?>
        <p><a href="cerca.php?id=<?echo $id?>"><?php echo "Search for protein position"?></a></p>
        <p><a href="cerca_genotipi.php?id=<?echo $id?>"><?php echo "Search for genotypes"?></a></p>
        <p><a href="viewData.php?id=<?echo $id?>"><?php echo "View Data"?></a></p>
        <p><a href="add.php?id=<?echo $id?>"><?php echo "Insert a new patient in the db"?></a></p>
        <p><a href="import.html?id=<?echo $id?>"><?php echo "Import data in the db"?></a></p>
        
        <div id="box"><p class="bottom">Designed and developed by Matteo Accetturo</p></div>

        <style type="text/css">
        box{
width:0px;
height:0px;
position:relative;
}
.bottom{
position:absolute;
bottom:0px;
left:10px;
}
        </style>
    </body>
    
</html>
