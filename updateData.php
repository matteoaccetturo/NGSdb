<?php
 if(isset($_POST['update']) ){
      mysql_connect("localhost", "Matteo", "matteopwd") or die(mysql_error()) ;
 mysql_select_db("SEUdb") or die(mysql_error()) ;
$id=$_POST['id'];//
echo $id;
$data_mut = mysql_query("SELECT id, genotypes.Gene_0, genotypes.HGVSp_43, 
    genotypes.ReadDepth_14, genotypes.AltReadDepth_15, genotypes.dbSNPID_44,
    genotypes.AltVariantFreq_13, genotypes.Filters_8, genotypes.Sanger_confirmation, genotypes.Reference
    FROM genotypes WHERE id =". $id ) or die(mysql_error());

 while($info_mut1 = mysql_fetch_array( $data_mut )) {
     
 
?>
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
     <th>Reference</th>
  </tr>
<tr>
         <td width="30%"><?php Echo $info_mut1['Gene_0'];
         Echo " " ;
         
         $protein_position = split(":", $info_mut1['HGVSp_43']);
         Echo $protein_position[1];?></td>
         
         <td><?php Echo $info_mut1['ReadDepth_14'];?></td>
         <td><?php Echo $info_mut1['AltReadDepth_15'];?></td>
         <td><?php Echo $info_mut1['AltVariantFreq_13'];?></td>
         <td><?php Echo $info_mut1['Filters_8'];?></td>
         <td><?php Echo $info_mut1['dbSNPID_44'];?></td>
         
         <td><form enctype="multipart/form-data" action = "save.php" method = "POST"> 
         <input type="hidden" value="<?php echo $info_mut1['id'];?>" name="id">
         <input type="hidden" value="<?php echo $info_mut1['Reference'];?>" name="Reference">
         <select name="options">
		<option value="">Select</option>		
                <option value='"Not tested"'>Not tested</option>
                <option value='"Confirmed"'>Confirmed</option>
		<option value='"Not confirmed"'>Not confirmed</option>
         </select><input type="submit" name="save" value="Save"></td>
         <td><input type="file" name="Reference"><input type="submit" name="upload" value="Upload"></td><br>
               
         </form>
    </table>
<?php

 }
//if(isset($_POST['save']) ){
//    //$id=$_POST['id1'];
//    //$option = $_POST['options'];
//    $pdo= new PDO ('mysql:host=localhost; dbname=SEUdb', 'Matteo', 'matteopwd');
//    $sanger_confirmation = 'UPDATE genotypes SET genotypes.Sanger_confirmation ='.$option.'  WHERE id ='.$id;
//    $s=$pdo->prepare($sanger_confirmation);
//    $s->execute();
//    echo 'fatto';
//}


//if(isset($_POST['save']) ){
////    mysql_connect("localhost", "Matteo", "matteopwd") or die(mysql_error()) ;
//// mysql_select_db("SEUdb") or die(mysql_error()) ;
// $pdo= new PDO ('mysql:host=localhost; dbname=SEUdb', 'Matteo', 'matteopwd');   
//    $id=$_POST['id'];
//    $option = $_POST['options'];
//    echo $option;
//    echo $id;
//    $sanger_confirmation = "UPDATE genotypes SET genotypes.Sanger_confirmation =".$option."  WHERE id =".$info_mut1['id'];
//    $s=$pdo->prepare($sanger_confirmation);
//    $s->execute();
//    if ($sanger_confirmation) {
//        echo 'well done!';
//        //header( 'Location: viewData.php' ) ;
//    }
//    
//}
 }

?>
     
        





   
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

