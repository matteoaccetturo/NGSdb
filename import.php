<?php
$path    = 'data/';
$files = scandir($path);
$pdo= new PDO ('mysql:host=localhost; dbname=SEUdb', 'Matteo', 'matteopwd');
//echo $files[2];
for ($index = 2; $index < count($files); $index++) {
    echo $files[$index]. "<br>";
    $myfile = fopen($path."$files[$index]", "r") or die("Unable to open file!");
    $path_parts = pathinfo($path.$files[$index]);
    echo $sample = $path_parts['filename']. "<br>";
// Output one line until end-of-file
while(!feof($myfile)) {
  //echo fgets($myfile) . "<br>";
  $str = fgets($myfile);//reads one line
  //echo $str;
  $pieces = explode("\t", $str);//splits each line
  //echo $pieces[0];
  // Connects to the Database
    
    $sql = "INSERT INTO `genotypes` (`Sample`, ‘Gene_0’, ‘Variant_1’, ‘Chr_2’, ‘Coordinate_3’, ‘Classification_23’, ‘Type_5’, ‘Genotype_6’, ‘Exonic_7’, ‘Filters_8’, ‘Quality_9’, ‘GQX_10’, ‘Inherited From_12’, ‘Alt Variant Freq_13’, ‘Read Depth_14’, ‘Alt Read Depth_15’, ‘Allelic Depths_16’, ‘Custom Annotation_17’, ‘Custom Gene Annotation_21’, ‘Custom Gene Annotation 2_22’, ‘Num Transcripts_27’, ‘Transcript_28’, ‘Consequence_29’, ‘cDNA Position_30’, ‘CDS Position_31’, ‘Protein Position_32’, ‘Amino Acids_33’, ‘Codons_34’, ‘HGNC_77’, ‘Transcript HGNC_37’, ‘Canonical_39’, ‘Sift_40’, ‘PolyPhen_41’, ‘ENSP_42’, ‘HGVSc_43’, ‘HGVSp_44’, ‘dbSNP ID_45’, ‘Ancestral Allele_46’, ‘Allele Freq_47’, ‘Allele Freq Global Minor_48’, ‘Global Minor Allele_49’, ‘Allele Freq Amr_50’, ‘Allele Freq Asn_51’, ‘Allele Freq Af_52’, ‘Allele Freq Eur_53’, ‘Allele Freq Evs_54’, ‘EVS Coverage_55’, ‘EVS Samples_56’, ‘Conserved Sequence_57’, ‘COSMIC ID_58’, ‘COSMIC Wildtype_59’, ‘COSMIC Allele_60’, ‘COSMIC Gene_61’, ‘COSMIC Primary Site_62’, ‘COSMIC Histology_63’, ‘ClinVar Accession_70’, ‘ClinVar Ref_65’, ‘ClinVar Alleles_66’, ‘ClinVar Allele Type_67’, ‘ClinVar Significance_68’, ‘Regulatory Feature_76’, ‘Alternate Alleles_11’, ‘Google Scholar_24’, ‘PubMed_25’, ‘UCSC Browser_26’, ‘ClinVar RS_64’, ‘ClinVar Disease Name_69’, ‘ClinVar MedGen_71’, ‘ClinVar OMIM_72’, ‘ClinVar Orphanet_73’, ‘ClinVar GeneReviews_74’, ‘ClinVar SnoMedCt ID_75’) "
        . " VALUES ('$sample', ‘$pieces[0]’, ‘$pieces[1]’, ‘$pieces[2]’, ‘$pieces[3]’, ‘$pieces[4]’, ‘$pieces[5]’, ‘$pieces[6]’, ‘$pieces[7]’, ‘$pieces[8]’, ‘$pieces[9]’, ‘$pieces[10]’, ‘$pieces[11]’, ‘$pieces[12]’, ‘$pieces[13]’, ‘$pieces[14]’, ‘$pieces[15]’, ‘$pieces[16]’, ‘$pieces[17]’, ‘$pieces[18]’, ‘$pieces[19]’, ‘$pieces[20]’, ‘$pieces[21]’, ‘$pieces[22]’, ‘$pieces[23]’, ‘$pieces[24]’, ‘$pieces[25]’, ‘$pieces[26]’, ‘$pieces[27]’, ‘$pieces[28]’, ‘$pieces[29]’, ‘$pieces[30]’, ‘$pieces[31]’, ‘$pieces[32]’, ‘$pieces[33]’, ‘$pieces[34]’, ‘$pieces[35]’, ‘$pieces[36]’, ‘$pieces[37]’, ‘$pieces[38]’, ‘$pieces[39]’, ‘$pieces[40]’, ‘$pieces[41]’, ‘$pieces[42]’, ‘$pieces[43]’, ‘$pieces[44]’, ‘$pieces[45]’, ‘$pieces[46]’, ‘$pieces[47]’, ‘$pieces[48]’, ‘$pieces[49]’, ‘$pieces[50]’, ‘$pieces[51]’, ‘$pieces[52]’, ‘$pieces[53]’, ‘$pieces[54]’, ‘$pieces[55]’, ‘$pieces[56]’, ‘$pieces[57]’, ‘$pieces[58]’, ‘$pieces[59]’, ‘$pieces[60]’, ‘$pieces[61]’, ‘$pieces[62]’, ‘$pieces[63]’, ‘$pieces[64]’, ‘$pieces[65]’, ‘$pieces[66]’, ‘$pieces[67]’, ‘$pieces[68]’, ‘$pieces[69]’, ‘$pieces[70]’)";
    
    $result = $pdo->query($sql);
}
fclose($myfile);
}
//foreach ($files as $file) {
//    echo $file;
//   $myfile = fopen("$file", "r") or die("Unable to open file!");
//// Output one line until end-of-file
//while(!feof($myfile)) {
//  echo fgets($myfile) . "<br>";
//}
//fclose($myfile); 
//}

?> 
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

