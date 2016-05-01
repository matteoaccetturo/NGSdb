<?php
//include 'viewData.php';
if(isset($_POST['save'])){
//    mysql_connect("localhost", "Matteo", "matteopwd") or die(mysql_error()) ;
// mysql_select_db("SEUdb") or die(mysql_error()) ;
    $option = $_POST['options'];
    $id = $_POST['id'];
    
    
    //echo $option;
    //echo 'ciao';
    //echo $id;
    $pdo= new PDO ('mysql:host=localhost; dbname=SEUdb', 'Matteo', 'matteopwd');
    $sanger_confirmation = ("UPDATE genotypes SET Sanger_confirmation =".$option." WHERE id =".$id);
    $s=$pdo->prepare($sanger_confirmation);
    $s->execute();
    header( 'Location: viewData.php' ) ;  

    if ($sanger_confirmation) {
        //echo 'well done!';
        //echo $id;
        //header( 'Location: viewData.php' ) ;
    }
    //include 'updateData.php';
}

if(isset($_POST['upload'])){
    $id = $_POST['id'];
    $link = $_POST['Reference'];
    $target = "references/"; 
    $target = $target . basename( $_FILES['Reference']['name']);
    $ref=($_FILES['Reference']['name']);
    //echo $ref;
    //echo $target;
    
     $pdo= new PDO ('mysql:host=localhost; dbname=SEUdb', 'Matteo', 'matteopwd');
    $sanger_confirmation = ("UPDATE genotypes SET Reference ="."'".$link.$ref.",'"." WHERE id =".$id);
    $s=$pdo->prepare($sanger_confirmation);
    $s->execute();
    if(move_uploaded_file($_FILES['Reference']['tmp_name'], $target))  {   
//Tells you if its all ok  
echo "The file ". basename( $_FILES['Reference']['name']). " has been uploaded, and your information has been added to the directory";  
//header( 'Location: viewData.php' ) ;
?><p><a href="viewData.php?id=<?echo $id?>"><?php echo "View Data"?></a></p><?php
    }
else {   
//Gives an error if its not
echo "Sorry, there was a problem uploading your file.";  } 
}
?>

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

