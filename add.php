<?php
  
include 'access.php';
 if (!userIsLoggedIn()) {
            include 'login.php';
            exit();
}

//This is the directory where images will be saved  
//to avoid undefined index notice, use "if(isset($_POST['submit']))"
if(isset($_POST['up'])){
$target = "images/";  $target = $target . $_FILES['Attachment']['name'];   

//This gets all the other information from the form

//To avoid "do not Access Superglobal $_POST directly" notification: use filter_input(INPUT_POST, 'var_name') instead of $_POST['var_name']
    $sample=$_POST['Sample'];
    $name=$_POST['Name'];
    $email=$_POST['Email'];
    $phone=$_POST['Phone'];
    $phenotype=$_POST['Phenotype'];
    $triggers=$_POST['Triggers'];
    $early_onset=$_POST['Early_onset'];
    $recurrence=$_POST['Recurrence'];
    $response_to_therapy=$_POST['Response_to_therapy'];
    $cardiological_involvement=$_POST['Cardiological_involvement'];
    $gastrointestinal_involvement=$_POST['Gastrointestinal_involvement'];
    $neurological_involvement=$_POST['Neurological_involvement'];
    $overlapping_w_complement_related_path=$_POST['Overlapping_w_complement_related_path'];
    $renal_outcome=$_POST['Renal_outcome'];
    $aggressive_phenotype=$_POST['Aggressive_phenotype'];
    $aHUS_suspect_confirmation=$_POST['aHUS_suspect_confirmation'];
    $urinary_anomalies=$_POST['Urinary_anomalies'];
    $biopsy_pattern=$_POST['Biopsy_pattern'];
    $pic=($_FILES['Attachment']['name']);
  //$name=filter_input(INPUT_POST, 'name');
  //$email=filter_input(INPUT_POST,'email');
  //$phone=filter_input(INPUT_POST,'phone');
 

   
   
Echo $sample;
// Connects to your Database
    $pdo= new PDO ('mysql:host=localhost; dbname=SEUdb', 'Matteo', 'matteopwd');
    $sql = "INSERT INTO `patients` (`Sample`, `Name`, `Email`, `Phone`,"
        . "`Phenotype`, `Triggers`, `Early onset`, `Recurrence`,"
        . "`Response to therapy`, `Cardiological involvement`,"
        . "`Gastrointestinal involvement`, `Neurological involvement`,"
        . "`Overlapping w complement-related path`, `Renal outcome`,"
        . "`Aggressive phenotype`, `aHUS suspect confirmation`, `Urinary anomalies`, `Biopsy pattern`, `Attachment`) "
        . " VALUES ('$sample', '$name', '$email', '$phone', '$phenotype',"
        . "'$triggers', '$early_onset', '$recurrence', '$response_to_therapy',"
        . "'$cardiological_involvement', '$gastrointestinal_involvement',"
        . "'$neurological_involvement', '$overlapping_w_complement_related_path',"
        . "'$renal_outcome', '$aggressive_phenotype', '$aHUS_suspect_confirmation', '$urinary_anomalies', '$biopsy_pattern',"
        . "'$pic')";
    
    $result = $pdo->query($sql);
//  mysql_connect("localhost", "Matteo", "matteopwd") or die(mysql_error()) ;
//  mysql_select_db("SEUdb") or die(mysql_error()) ;

//Writes the information to the database
//mysql_query("INSERT INTO `patients` (`Sample`, `Name`, `Email`, `Phone`,"
//        . "`Phenotype`, `Triggers`, `Early onset`, `Recurrence`,"
//        . "`Response to therapy`, `Cardiological involvement`,"
//        . "`Gastrointestinal involvement`, `Neurological involvement`,"
//        . "`Overlapping w complement-related path`, `Renal outcome`,"
//        . "`Aggressive phenotype`, `aHUS suspect confirmation`, `Urinary anomalies`, `Biopsy pattern`, `Attachment`) "
//        . "VALUES ('$sample', '$name', '$email', '$phone', '$phenotype',"
//        . "'$triggers', '$early_onset', '$recurrence', '$response_to_therapy',"
//        . "'$cardiological_involvement', '$gastrointestinal_involvement',"
//        . "'$neurological_involvement', '$overlapping_w_complement_related_path',"
//        . "'$renal_outcome', '$aggressive_phenotype', '$aHUS_suspect_confirmation', '$urinary_anomalies', '$biopsy_pattern'"
//        . "'$pic')") ;
//Writes the photo to the server
if(move_uploaded_file($_FILES['Attachment']['tmp_name'], $target))  {   
//Tells you if its all ok  

echo  "The file ". $_FILES['Attachment']['name']. " has been uploaded, and your information has been added to the directory";

}
else {   
//Gives an error if its not
 echo "You did not upload any file."; 
 
}  

 
}
include 'form.html';
?>
<p></p>

<p><a href="viewData.php?id=<?echo $id?>"><?php echo "View Data"?></a></p>
<p><a href="index.php?id=<?echo $id?>"><?php echo "Home"?></a></p>
<?php
include 'logout.php';
?>
<p></p>
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

