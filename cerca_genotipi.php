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
<title>Query results</title></head>


  

<?php

include 'access.php';
 if (!userIsLoggedIn()) {
            include 'login.php';
            exit();
}

if(isset($_POST['cerca_genotipi'])){
    $pdo= new PDO ('mysql:host=localhost; dbname=SEUdb', 'Matteo', 'matteopwd');
    
    //$cn = mysql_connect("localhost", "Matteo", "matteopwd");
    //mysql_select_db("SEUdb", $cn);
//    $testo1 = \htmlspecialchars(\addslashes($_POST["genot"]));
    $testo1 = $_POST["genot"];
    $array = array();
?>
<p><a href="index.php?id=<?echo $id?>"><?php echo "Home"?></a></p>
<b>You searched for missense variants associated to variation in protein position </b>
  
<?php
if (isset($testo1) == false || $testo1 == "")
    {
?> <p>Specificare un criterio di ricerca.</p> <?php
    }
    else
    {
        echo $testo1;        ?> <b> in all genes in the db</b> <?php
        Echo " <hr>";
        $sql = 'SELECT * FROM patients';
         $result = $pdo->query($sql);
         
        //$data = mysql_query("SELECT * FROM patients") or die(mysql_error());
 
//Puts it into an array
 while ($info = $result->fetch()) {
        //while($info = mysql_fetch_array( $data )) {  
    $pdo1 = new PDO ('mysql:host=localhost; dbname=SEUdb', 'Matteo', 'matteopwd');
    $sql1 = "SELECT * FROM genotypes WHERE
                genotypes.Consequence_28 = 'missense_variant' AND
                genotypes.Sample IN (SELECT genotypes.Sample FROM genotypes
                WHERE genotypes.ProteinPosition_31 LIKE ".$testo1." AND genotypes.Sample = '".$info['Sample']."')";
    $query = $pdo1->query($sql1); 
    
//    $query = mysql_query ("SELECT * FROM genotypes WHERE
//                genotypes.Consequence_28 = 'missense_variant' AND
//                genotypes.Sample IN (SELECT genotypes.Sample FROM genotypes
//                WHERE genotypes.ProteinPosition_31 LIKE ".$testo1." AND genotypes.Sample = ".$info['Sample'].")")
//            or die(mysql_error());
    
       
        //echo $query;
    $quanti = $pdo->query("SELECT count(*) FROM genotypes WHERE
                genotypes.Consequence_28 = 'missense_variant' AND
                genotypes.Sample IN (SELECT genotypes.Sample FROM genotypes
                WHERE genotypes.ProteinPosition_31 LIKE ".$testo1." AND genotypes.Sample = '".$info['Sample']."')")->fetchColumn(); 

    
    //$quanti = $query->fetchColumn();
        //$quanti = mysql_num_rows($query);
        Echo "<p><b>Sample:</b> ".$info['Sample'] . "<br> </p>";
        ?> <p>(number of missense variants):  <?php
        echo $quanti;?></p><?php
        if ($quanti == 0)
        { //echo $quanti;
?>
<p>No results!</p>
<?php // Echo " <hr>";
}
        else
        {   Echo "<b>Sample:</b> ".$info['Sample'] . "<br> ";
        
        ?>
     <table width="50%" frame="hsides" cellpadding=2 cellspacing=8>
 <tr>
<!--     <th>Sample</th>-->
     <th width="30%">Variants</th>
     <th>read depth</th>
     <th>alt read depth</th>
     <th>alt var freq</th>
     <th>filter</th>
     <th>rs</th>
     <th>Sanger confirmation</th>
     <th>Reference(s)</th>
  </tr>
    <?php
        
    while ($results = $query->fetch()) {        
    //while($results = mysql_fetch_array( $query )) {
         
?>

  <!--<p>-->
<tr>
<!--      <td><?php //Echo $results['Sample'];?></td>-->
      
      <td width="30%"><?php Echo $results['Gene_0']; Echo " " ;
         $protein_position = split(":", $results['HGVSp_43']);
         Echo $protein_position[1];?>
      </td>
      <td><?php Echo $results['ReadDepth_14'];?></td>
      <td><?php Echo $results['AltReadDepth_15'];?></td>
      <td><?php Echo $results['AltVariantFreq_13'];?></td>
      <td><?php Echo $results['Filters_8'];?></td>
      <td><?php Echo $results['dbSNPID_44'];?></td>
      <td><?php Echo $results['Sanger_confirmation'];?></td>
         <td><?php 
         $reference = $results['Reference'];
         $ref_array = explode("," , $reference);
         for ($index = 0; $index < count($ref_array); $index++) {
             Echo "<a href=http://localhost/SEUdb/references/".$ref_array[$index] .">".$ref_array[$index] ."</a><br>";
         }
        // Echo "<a href=http://localhost/SEUdb/references/".$results['Reference'] .">Reference</a><br>";?>
         </td>
         <td><form action=updateData.php method="post">
         <input type="hidden" value=" <?php echo $results['id'];?> " name="id" />
         <input type="submit" name="update" value="Update data">
         </form></td>
</tr>            
<?php          
          }         
?>
</table>
<!--<p><a href="leggi.php?id=<?echo $id?>"><?php //echo $query?></a></p>-->
<?php
            }
      Echo " <hr>";  }}
        }
    include 'cerca.html';
    include 'logout.php';
    ?> 

</body></html>

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

