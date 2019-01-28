<?php
require('../assets/vendors/fpdf/fpdf.php');

$id_users_event = array();
$participants_evenements = $local_bdd->query('call orleans_bde.sps_participant_evenement(' . $_POST['id'] . ');');

while ($participant_evenement = $participants_evenements->fetch()) {
    $id_users_event[] = $participant_evenement['Id_utilisateur'];
}
$participants_evenements->closeCursor();

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(50, 10, 'Nom');
$pdf->Cell(50, 10, 'Prenom');
$pdf->Cell(90, 10, 'Adresse Email', 0, 1);
$pdf->SetFont('Arial', 'B', 10);

foreach ($id_users_event as $id_user_event) {
    $query = $local_bdd->query('call orleans_bde.sps_user(' . $id_user_event . ');');
    $utilisateur = $query->fetch();
    $query->closeCursor();

    $pdf->Cell(50, 10, $utilisateur['Nom']);
    $pdf->Cell(50, 10, $utilisateur['Prenom']);
    $pdf->Cell(90, 10, $utilisateur['Email'], 0, 1);

}
$pdf->Output('D', 'liste-des-inscrits', true);
?>






