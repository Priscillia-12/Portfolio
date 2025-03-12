<?php
		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\SMTP;
		use PHPMailer\PHPMailer\Exception;
	//Load Composer's autoloader
	require 'vendor/autoload.php';
	if(!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['numero']) && !empty($_POST['sujet']) && !empty($_POST['message'])){
		extract($_POST);
		$nom = htmlspecialchars($nom);
		$email = htmlspecialchars($email);
		$numero = htmlspecialchars($numero);
		$sujet = htmlspecialchars($sujet);
		$message = htmlspecialchars($message);
		if(!empty($nom) && !empty($email) && !empty($numero) && !empty($sujet) && !empty($message)){
			if(filter_var($email,FILTER_VALIDATE_EMAIL)){
				if(is_numeric($numero)){
					/*On envoi le mail à Priscillia*/
						//On envoi le mail au propriétaire
							$mail=new PHPMailer(true);
					            $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
					            $mail->isSMTP();
					            $mail->Host="mail0.serv00.com";
					            $mail->SMTPAuth=true;
					            $mail->Username="produdev@produdev.serv00.net";
					            $mail->Password="@Awademee666";
					            $mail->Port=587;
					            $mail->setFrom('produdev@produdev.serv00.net');
							try{
					            
					            $mail->addAddress('priscilliagbo@gmail.com'); 
					            
					            $mail->isHTML(true);
					            $mail->Subject=$sujet;
					            $message="
					            	Nom et Prénom : $nom<br/>
					            	Téléphone : $numero<br/>
					            	Email : $email<br/>
					            	Message : $message
					            ";
					            $mail->Body=$message; 
					            $mail->send();
            					
					        } catch (Exception $e) {
					            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
					        }

					echo "reussi";
				}else{
					echo "Numéro invalid";
				}
			}else{
				echo "Email invalide";
			}
		}else{
			echo "Veuillez remplir tous les champs";
		}
	}
?>