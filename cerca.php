
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
<title>Risultati della ricerca</title></head>
<p><a href="index.php?id=<?echo $id?>"><?php echo "Home"?></a></p>
<?php
include 'access.php';
 if (!userIsLoggedIn()) {
            include 'login.php';
            exit();
}

if(isset($_POST['cerca'])){
$cn = mysql_connect("localhost", "Matteo", "matteopwd");
    mysql_select_db("SEUdb", $cn);
    $testo = \htmlspecialchars(\addslashes($_POST["testo"]));
?>

    <!--<body>-->
<!--<p>-->
<b>You searched for variant in protein position:</b>
<?php
//    if (isset($testo) == false || $testo == "")
//    {
//        echo "nessun risultato!";
//    }
//    else
//    {
//        echo $testo;
//    }
//?>
<!--</p>-->
<?php
    if (isset($testo) == false || $testo == "")
    {
?>
<p>Specificare un criterio di ricerca.</p>
<?php
    }
    else
    {
        echo $testo; 
?><p>
    <table width="50%" frame="hsides" cellpadding=2 cellspacing=8>
 <tr>
     <th>Sample</th>
     <th width="30%">Variant</th>
     <th>read depth</th>
     <th>alt read depth</th>
     <th>alt var freq</th>
     <th>filter</th>
     <th>rs</th>
     <th>Sanger confirmation</th>
     <th>Reference(s)</th>
  </tr>
    <?php

        $arr_txt = explode(" ", $testo);
        
        
        $sql = "SELECT * FROM genotypes WHERE ";
        for ($i=0; $i<count($arr_txt); $i++)
        {
            if ($i > 0)
            {
                $sql .= " AND ";
            }
            $sql .= "(ProteinPosition_31 LIKE '%" . $arr_txt[$i] . "%')";
        }
        //$sql .= " AND cat_id = art_categoria ORDER BY art_timestamp DESC";
        $query = mysql_query($sql, $cn);
        //echo $query;
        $quanti = mysql_num_rows($query);
        if ($quanti == 0)
        {
?>
<p>Nessun risultato!</p>

<?php
        }
        else
        {
            while($results = mysql_fetch_array( $query )) {?>
<!-- <table width="50%" frame="hsides" cellpadding=2 cellspacing=8>
 <tr>
     <th>Sample</th>
     <th width="30%">Variant</th>
     <th>read depth</th>
     <th>alt read depth</th>
     <th>alt var freq</th>
     <th>filter</th>
     <th>rs</th>
     <th>Sanger confirmation</th>
  </tr>-->
                <tr>
                    <td><?php Echo $results['Sample'];?></td>
                    
                    <td width="30%"><?php Echo $results['Gene_0']; Echo " " ;
                    $protein_position = split(":", $results['HGVSp_43']);
                    Echo $protein_position[1];?></td>
                    
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
         //Echo "<a href=http://localhost/SEUdb/references/".$results['Reference'] .">Reference</a><br>";?>
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
        }
    }


    include 'cerca.html';
    include 'logout.php';
    ?> <p><a href="index.php?id=<?echo $id?>"><?php echo "Home"?></a></p>
</body></html>



/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

