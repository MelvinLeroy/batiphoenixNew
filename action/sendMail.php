<?php

	if(strlen($_POST['name']) !== 0 && strlen($_POST['subject']) !== 0  && strlen($_POST['message']) !== 0 && strlen($_POST['telephone']) !== 0 && strlen($_POST['mail']) !== 0){
     	$to      = 'kevin.cheruel.dev@gmail.com';
        $phone   = $_POST['telephone'];
        $mail    = $_POST['mail'];
     	$subject = $_POST['subject'];
     	$message = 'Numero de telephone :'.$phone."\n".$_POST['message'];
     	$headers = 'From: ' .$_POST['name']. ' at '.$_POST['mail']."\n".
     	'Reply-To: kevin.cheruel.dev@gmail.com' . "\n" .
     	'X-Mailer: PHP/' . phpversion();

     	if(mail($to, $subject, $message, $headers)){?>
					<script type='text/javascript'>
							alert('Mail Envoyé ! Nous vous répondrons très prochainement');
							window.location.href = "http://batiphoenix.com";
					</script>
			<?php
		}else{?>
					<script type='text/javascript'>
						alert('Mail non-Envoyé ! ');
						window.location.href = "http://batiphoenix.com";
					</script>
					<?php
				}
	}
