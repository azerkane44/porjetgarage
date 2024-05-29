<?php

// Validation et récupération des données POST
$nom = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$Prenom = filter_input(INPUT_POST, 'Prenom', FILTER_SANITIZE_STRING);
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

// Vérification des données
if (!$nom || !$Prenom || !$phone || !$email || !$message) {
    die("Des champs obligatoires sont manquants ou non valides.");
}

// Création du message
$messageBody = "Nom : $nom\nPrénom : $Prenom\nTéléphone : $phone\nEmail : $email\nMessage : $message";

// Importation de PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Inclusion des fichiers de PHPMailer
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Création d'une instance PHPMailer
$mail = new PHPMailer(true);

try {
    // Configuration du serveur SMTP
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'contactgarage.ecf@gmail.com';
    $mail->Password   = 'thod aoas thez funm';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Destinataires
    $mail->setFrom($email, $nom); // Utilise l'email et le nom de l'expéditeur
    $mail->addAddress('benchrifmohamed79@gmail.com');

    // Contenu du message
    $mail->isHTML(true);
    $mail->Subject = 'Objet du message';
    $mail->Body    = $messageBody;
    $mail->AltBody = 'Ceci est le corps du message en texte brut pour les clients de messagerie non-HTML';
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => true, // Vérification SSL activée
            'verify_peer_name' => true,
            'allow_self_signed' => false
        )
    );

    // Envoi du message
    $mail->send();
    echo 'Le message a été envoyé avec succès';
} catch (Exception $e) {
    echo "Le message n'a pas pu être envoyé. Erreur du transporteur : {$mail->ErrorInfo}";
}
