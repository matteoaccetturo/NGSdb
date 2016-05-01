<?php
// Connects to your Database
// mysql_connect("localhost", "Matteo", "matteopwd") or die(mysql_error()) ;
// mysql_select_db("SEUdb") or die(mysql_error()) ;   

//Retrieves data from MySQL
 //$data = mysql_query("SELECT * FROM patients") or die(mysql_error());
 
include 'access.php';
 if (!userIsLoggedIn()) {
            include 'login.php';
            exit();
}
include 'logout.php';
?><p><a href="index.php?id=<?echo $id?>"><?php echo "Home"?></a></p><?php
 $pdo= new PDO ('mysql:host=localhost; dbname=SEUdb', 'Matteo', 'matteopwd');
 $sql = 'SELECT * FROM patients';
 $result = $pdo->query($sql);
 while ($info = $result->fetch()) {
     if ($info['Sample']) {
         //echo $info['Sample'];
 //}
//Puts it into an array
// while($info = mysql_fetch_array( $data )) { 
     
//$data_mut = mysql_query("SELECT id, genotypes.Gene_0, genotypes.HGVSp_43, 
//    genotypes.ReadDepth_14, genotypes.AltReadDepth_15, genotypes.dbSNPID_44,
//    genotypes.AltVariantFreq_13, genotypes.Filters_8, genotypes.Sanger_confirmation
//    FROM genotypes WHERE  
//    genotypes.Consequence_28 = 'missense_variant' AND genotypes.Sample=".$info['Sample']) or die(mysql_error());

  $pdo1 = new PDO ('mysql:host=localhost; dbname=SEUdb', 'Matteo', 'matteopwd');   
  $sql1 = "SELECT * FROM genotypes WHERE  
    genotypes.Consequence_29 = 'missense_variant' AND genotypes.Sample="."'".$info['Sample']."'";
    $result1 = $pdo1->query($sql1);
  
if (!$result1) {
    echo "End of data" ; 
}
 else {
    
//Outputs the attachment and other data
 //Echo "<a href=http://localhost/SEUdb/images/".$info['Attachment'] .">".$info['Attachment'] ."</a><br>";
 Echo "<a href=images/".$info['Attachment'] .">".$info['Attachment'] ."</a><br>";
 Echo "<b>Sample:</b> ".$info['Sample'] . "<br> ";
 Echo "<b>Name:</b> ".$info['Name'] . "<br> ";
 Echo "<b>Email:</b> ".$info['Email'] . " <br>";
 Echo "<b>Phone:</b> ".$info['Phone'] . " <br>";
 Echo "<b>aHUS suspect confirmation:</b> ".$info['aHUS suspect confirmation'] . " <br>";
 Echo "<b>Mutations:</b> ";?>

<meta http-equiv="content-type" content="text/html; charset=windows-1252">
<meta name="generator" content="HAPedit 3.1">
<style type="text/css">
body{font:12px Arial,sans-serif}
tbody{font:12px Arial,sans-serif}
a{color: #2257D5}

table, td, th{border:1px solid #EEE;border-collapse:collapse}
td,th{padding:3px 5px}
td{text-align:left}
th{text-align:left}
/*tr {background: #D5E4FF}*/
/*tr:nth-child(even) {background: #D5E4FF}*/
tr:nth-child(odd) {background: gainsboro}
caption{font-weight:bold;color: #999}
</style>

<body>
<table width="50%" frame="hsides" cellpadding=2 cellspacing=8>
 <tr>
     <th width="30%">Variant</th>
     <th>read depth</th>
     <th>alt read depth</th>
     <th>alt var freq</th>
     <th>filter</th>
     <th>rs</th>
     <th>Sanger confirmation</th>
     <th>Reference(s)</th>
  </tr>
<!--</table>-->
 <!--<table width="50%" frame="hsides" cellpadding=2 cellspacing=8 >-->   
      <?php   
     
      while ($info_mut = $result1->fetch()) {
         
     ?>
<!--<table width="50%" frame="hsides" cellpadding=2 cellspacing=8 >-->
    <tr>
         <td width="30%"><?php Echo $info_mut['Gene_0']; Echo " " ;
         $protein_position = split(":", $info_mut['HGVSp_44']);
         Echo $protein_position[1];?></td>
         
         <td><?php Echo $info_mut['ReadDepth_14'];?></td>
         <td><?php Echo $info_mut['AltReadDepth_15'];?></td>
         <td><?php Echo $info_mut['AltVariantFreq_13'];?></td>
         <td><?php Echo $info_mut['Filters_8'];?></td>
         <td><?php Echo $info_mut['dbSNPID_45'];?></td>
         <td><?php Echo $info_mut['Sanger_confirmation'];?></td>
         <td><?php 
         $reference = $info_mut['Reference'];
         $ref_array = explode("," , $reference);
         for ($index = 0; $index < count($ref_array); $index++) {
             //Echo "<a href=http://localhost/SEUdb/references/".$ref_array[$index] .">".$ref_array[$index] ."</a><br>";
             Echo "<a href=references/".$ref_array[$index] .">".$ref_array[$index] ."</a><br>";
         }
        //Echo "<a href=http://localhost/SEUdb/references/".$info_mut['Reference'] .">".$info_mut['Reference'] ."</a><br>";?>
   
         
         
         
         </td>
 
         
         
         <td><form action=updateData.php method="post">
         <input type="hidden" value=" <?php echo $info_mut['id'];?> " name="id" />
         <input type="submit" name="update" value="Update data">
         </form></td>
         
    </tr>
   <?php }
 ?>
 </table>
     </body>
     <?php 
 Echo " <hr>";
 include 'logout.php';
 ?><p><a href="index.php?id=<?echo $id?>"><?php echo "Home"?></a></p><?php
 }}}
 
 //header("Location: index.php");
 //include 'updateData.php';
 ?> 
 

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

