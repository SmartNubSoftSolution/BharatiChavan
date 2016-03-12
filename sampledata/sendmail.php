<?php 
		$to="chemsould@gmail.com";
		$subject="Enquiry ";
		$headers = "From:Chemsoulindia" . "\r\n";
		$name=trim($_POST['Name']);
		$message="";
		$message.="Name -  ".trim($_POST['Name'])."\n";
		$message.="Email -  ".trim($_POST['Email'])."\n";
		$message.="Telephone -  ".trim($_POST['Telephone'])."\n";
		$message.="Address -  ".trim($_POST['Address'])."\n";
		$message.="CompanyName -  ".trim($_POST['CompanyName'])."\n";
		$message.="Product -  ".trim($_POST['Product'])."\n";
		 $message.="Quantity -  ".trim($_POST['quantity'])."\n";
		$message.="Units -  ".trim($_POST['units'])."\n";
		$message.="Requirments -  ".trim($_POST['requirments'])."\n";
		$msg=mail( $to, $subject, $message,$headers); 
		
			 if($msg)
			 {
            $to=trim($_POST['Email']);
			$subject="Thank you for contacting us....";
			$headers="Chemsoulindia";
			$message="";
			$message.="Dear ".$name.",\n";
			$message.=" Thank you for contacting us. An Chemsoulindia representative will \n review your information request and will contact you shortly.\n";
			$message.="\nThank you, \nChemsoulIndia.\n";
			$msg=mail( $to, $subject, $message,$headers); 
			 
			echo "<script type='text/javascript'>
			alert( 'u r email Sent');
			</script>";
			header('location:http://localhost/chemsoulindia/contact.html');
			 }
			 
					
		
?>	