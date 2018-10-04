<?php
/**
 * Created by PhpStorm.
 * User: Lola-Axwel
 * Date: 05/09/2017
 * Time: 00:09
 */

	$mailto = "axelbaron@outlook.fr";
	$nomprenom = $_POST['id'];
	$sujet = $_POST['object'];
	$mail = $_POST['email'];
	$messagecontact = $_POST['message'];

	filter_var($nomprenom,FILTER_SANITIZE_STRING);
	filter_var($sujet,FILTER_SANITIZE_STRING);
	filter_var($mail,FILTER_SANITIZE_EMAIL);
	filter_var($messagecontact,FILTER_SANITIZE_STRING);

	$newsujet = "Site 2francaisauquebec.fr : ".$sujet;
	$newmessagecontact = $messagecontact."\n \nCe message vous a été envoyé via le formulaire de contact du site 2francaisauquebec.fr";

	$entete = 'From: '.$mail."\r\n".
        'Reply-To: '.$mail."\r\n".
        'X-Mailer: PHP/'.phpversion();

	mail($mailto, $newsujet, $newmessagecontact, $entete);

