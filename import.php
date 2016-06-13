<?php

include 'access.php';
 if (!userIsLoggedIn()) {
            include 'login.php';
            exit();
}
if(isset($_POST['import'])){
$path    = '/Users/imac27/Documents/data/';
//$path    = 'data/';
$files = scandir($path);

//echo $files[2];
for ($index = 2; $index < count($files); $index++) {
    //echo $files[$index];
    $myfile = fopen($path."$files[$index]", "r") or die("Unable to open file!");
    $path_parts = pathinfo($path.$files[$index]);
    $sample = $path_parts['filename'];
    echo "You imported ".$sample;
    ?><p></p><?php
    //salta la prima riga
    fgets($myfile);
    //Connects to the Database
    $pdo= new PDO ('mysql:host=localhost; dbname=SEUdb', 'Matteo', 'matteopwd');
// Output one line until end-of-file
    while(!feof($myfile)) {
  //echo fgets($myfile) . "<br>";
  $str = fgets($myfile);//reads one line
  
  
  $pieces = explode("\t", $str);//splits each line
//    
  $conta = count($pieces);
  //echo $conta;
  //echo $pieces[1];
  //
 // echo $pieces[57];
  //echo $pieces[2];
   
  
  
    $sql = "INSERT INTO `genotypes`(`Sample`, `Gene_0`, `Variant_1`, `Chr_2`,"
            . " `Coordinate_3`, `Classification_23`, `Type_5`, `Genotype_6`,"
            . " `Exonic_7`, `Filters_8`, `Quality_9`, `GQX_10`,"
            . " `InheritedFrom_12`, `AltVariantFreq_13`, `ReadDepth_14`,"
            . " `AltReadDepth_15`, `AllelicDepths_16`, `CustomAnnotation_17`,"
            . " `CustomGeneAnnotation_21`, `CustomGeneAnnotation2_22`,"
            . " `NumTranscripts_27`, `Transcript_28`, `Consequence_29`,"
            . " `cDNAPosition_30`, `CDSPosition_31`, `ProteinPosition_32`,"
            . " `AminoAcids_33`, `Codons_34`, `HGNC_77`, `TranscriptHGNC_37`,"
            . " `Canonical_39`, `Sift_40`, `PolyPhen_41`, `ENSP_42`, `HGVSc_43`,"
            . " `HGVSp_44`, `dbSNPID_45`, `AncestralAllele_46`, `AlleleFreq_47`,"
            . " `AlleleFreqGlobalMinor_48`, `GlobalMinorAllele_49`,"
            . " `AlleleFreqAmr_50`, `AlleleFreqAsn_51`, `AlleleFreqAf_52`,"
            . " `AlleleFreqEur_53`, `AlleleFreqEvs_54`, `EVSCoverage_55`,"
            . " `EVSSamples_56`, `ConservedSequence_57`, `COSMICID_58`,"
            . " `COSMICWildtype_59`, `COSMICAllele_60`, `COSMICGene_61`,"
            . " `COSMICPrimarySite_62`, `COSMICHistology_63`, `ClinVarAccession_70`,"
            . " `ClinVarRef_65`, `ClinVarAlleles_66`, `ClinVarAlleleType_67`,"
            . " `ClinVarSignificance_68`, `RegulatoryFeature_76`, `AlternateAlleles_11`,"
            . " `GoogleScholar_24`, `PubMed_25`, `UCSCBrowser_26`, `ClinVarRS_64`,"
            . " `ClinVarDiseaseName_69`, `ClinVarMedGen_71`, `ClinVarOMIM_72`,"
            . " `ClinVarOrphanet_73`, `ClinVarGeneReviews_74`, `ClinVarSnoMedCtID_75`)"
            . " VALUES ('$sample', '$pieces[0]', '$pieces[1]', '$pieces[2]',"
            . " '$pieces[3]', '$pieces[4]', '$pieces[5]', '$pieces[6]',"
            . " '$pieces[7]', '$pieces[8]', '$pieces[9]', '$pieces[10]',"
            . " '$pieces[11]', '$pieces[12]', '$pieces[13]', '$pieces[14]',"
            . " '$pieces[15]', '$pieces[16]', '$pieces[17]', '$pieces[18]',"
            . " '$pieces[19]', '$pieces[20]', '$pieces[21]', '$pieces[22]',"
            . " '$pieces[23]', '$pieces[24]', '$pieces[25]', '$pieces[26]',"
            . " '$pieces[27]', '$pieces[28]', '$pieces[29]', '$pieces[30]',"
            . " '$pieces[31]', '$pieces[32]', '$pieces[33]', '$pieces[34]',"
            . " '$pieces[35]', '$pieces[36]', '$pieces[37]', '$pieces[38]',"
            . " '$pieces[39]', '$pieces[40]', '$pieces[41]', '$pieces[42]',"
            . " '$pieces[43]', '$pieces[44]', '$pieces[45]', '$pieces[46]',"
            . " '$pieces[47]', '$pieces[48]', '$pieces[49]', '$pieces[50]',"
            . " '$pieces[51]', '$pieces[52]', '$pieces[53]', '$pieces[54]',"
            . " '$pieces[55]', '$pieces[56]', '$pieces[57]', '$pieces[58]',"
            . " '$pieces[59]', '$pieces[60]', '$pieces[61]', '$pieces[62]',"
            . " '$pieces[63]', '$pieces[64]', '$pieces[65]', '$pieces[66]',"
            . " '$pieces[67]', '$pieces[68]', '$pieces[69]', '$pieces[70]')";
    $result = $pdo->query($sql);
//    $result = $pdo->prepare($sql);
//    $result->execute();
    //echo 'inserito';
}
fclose($myfile);
}

 include 'import.html';
 include 'logout.php';
 
 
 }
?> 
<p><a href="viewData.php?id=<?echo $id?>"><?php echo "View Data"?></a></p>
<p><a href="index.php?id=<?echo $id?>"><?php echo "Home"?></a></p>
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

