<?php
//This is the directory where references will be saved  
if(isset($_POST['carica'])){
$target = "references/";  $target = $target . basename( $_FILES['Reference']['name']);   

//This gets all the other information from the form
  $gene=$_POST['gene'];
  $variant=$_POST['variant'];
  $cDNA_Position=$_POST['cDNA_Position'];
  $Protein_Position=$_POST['Protein_Position'];
  $Amino_Acids=$_POST['Amino_Acids'];
  $rs=$_POST['rs'];
  $ref=($_FILES['Reference']['name']);
  $Individual=$_POST['Individual'];
  $Individual_id=$_POST['Individual_id'];

// Connects to your Database
  mysql_connect("localhost", "Matteo", "matteopwd") or die(mysql_error()) ;
  mysql_select_db("SEUdb") or die(mysql_error()) ;

//Writes the information to the database
mysql_query("INSERT INTO `genotypes` VALUES ('$gene', '$variant', '$cDNA_Position', '$Protein_Position',"
        . "'$Amino_Acids', '$rs', '$ref', '$Individual', '$Individual_id')") ;
//Writes the photo to the server
if(move_uploaded_file($_FILES['Reference']['tmp_name'], $target))  {   
//Tells you if its all ok  
echo "The file ". basename( $_FILES['Reference']['name']). " has been uploaded, and your information has been added to the directory";  }
else {   
//Gives an error if its not
echo "Sorry, there was a problem uploading your file.";  }  
}
include 'form_mut.html';
?>
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
