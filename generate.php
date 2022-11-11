<?php
require('WriteHTML.php');

// Instantiate and use the FPDF class 
$pdf = new PDF_HTML();

function write_line($pdf_instance, $message){
    $pdf_instance->SetFont('Arial', '', 12);
    $pdf_instance->writeHTML(utf8_decode($message));
}


//Add a new page
$pdf->AddPage();
  
// Set the font for the text
$pdf->SetFont('Arial', '', 12);
  
// Prints a cell with given text 
write_line($pdf, 'DÉCLARATION SUR L\'HONNEUR DES SALARIÉS EN TÉLÉTRAVAIL DONT LE TEMPS DE TRAVAIL EST DÉCOMPTÉ EN HEURES');
write_line($pdf, '<br><br>');

$numSemaine = date('W');
write_line($pdf, 'Prénom NOM du salarié concerné : <b>Julien CORON</b><br><br>');
write_line($pdf, 'Semaine n° <b>'.$numSemaine.'</b><br><br>');
write_line($pdf, '');

write_line($pdf, 'Date(s) de la ou des journée(s) de télétravail sur la semaine :<br>');
if($_GET['lundi'] == "on"){
    write_line($pdf, '   <bullet> <b>Lundi</b><br>');
}
if($_GET['mardi'] == "on"){
    write_line($pdf, '   <bullet> <b>Mardi</b><br>');
}
if($_GET['mercredi'] == "on"){
    write_line($pdf, '   <bullet> <b>Mercredi</b><br>');
}
if($_GET['jeudi'] == "on"){
    write_line($pdf, '   <bullet> <b>Jeudi</b><br>');
}
if($_GET['vendredi'] == "on"){
    write_line($pdf, '   <bullet> <b>Vendredi</b><br>');
}
write_line($pdf, '<br><br>');

write_line($pdf, 'Je déclare avoir respecté les horaires de travail applicables au sein de l\'entreprise et ainsi avoir travaillé (durée de travail sur chaque journée de télétravail)<br>');
write_line($pdf, '<br>');
write_line($pdf, '   Oui <check-yes> Non <check-no><br>');
write_line($pdf, '<br><br>');

write_line($pdf, 'Dans la négative, veuillez préciser ci-après la raison et les horaires de travail effectifs pour la/les journée(s) de télétravail.<br>_________________________________________________________<br>');

write_line($pdf, '<br><br>');

write_line($pdf, 'Je déclare avoir respecté les durées maximales de travail quotidiennes (10 heures) et hebdomadaires (48 heures).<br>');
write_line($pdf, '<br>');
write_line($pdf, '   Oui <check-yes> Non <check-no><br>');
write_line($pdf, '<br><br>');

write_line($pdf, 'Je déclare avoir bénéficié des durées minimales de repos quotidien (11 heures) et hebdomadaire (35 heures).<br>');
write_line($pdf, '<br>');
write_line($pdf, '   Oui <check-yes> Non <check-no><br>');
write_line($pdf, '<br><br>');

$now = date('d/m/Y');
write_line($pdf, 'Date de transmission au responsable hiérarchique : <b>'.$now.'</b><br>');
write_line($pdf, '<br><br>');

write_line($pdf, 'Eventuelles remarques ou actions correctives envisagées par le salarié ou son supérieur hiérarchique :<br>');
write_line($pdf, '<br><br>');

write_line($pdf, 'Date et signatures du salarié et du supérieur hiérarchique : <b>'.$now.'</b><br><br>');
$signature = "signature.png";
$pdf->Image($signature, 20, $pdf->GetY());

// return the generated output
$pdf->Output("D", "rapport-teletravail-S".$numSemaine.".pdf");

?>
