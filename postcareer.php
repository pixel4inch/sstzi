<?php 

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//print_r($_POST);die;
if(isset($_POST['fname']))
{
    if(isset($_POST['fname']))
    { 
        $fname = addslashes($_POST['fname']);
    }
    
    if(isset($_POST['lname']))
    { 
        $lname = addslashes($_POST['lname']);
    }
    
    if(isset($_POST['email']))
    { 
        $emailid = addslashes($_POST['email']);
    }
    
    if(isset($_POST['phone']))
    {
        $phone = addslashes($_POST['phone']);
    }
    
    if(isset($_FILES['resume']))
    {
        //print_r($_FILES['resume']);die;
        
        $acceptable = array('application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/pdf');
        
        if(in_array($_FILES['resume']['type'], $acceptable) && (!empty($_FILES["resume"]["type"]))) 
        {
            
            $basename = basename($_FILES['resume']['name']);
            $filenameexp = explode(".", $basename);
            $extension = end($filenameexp);
            
            $uploadedpath = __DIR__.'/resumes/';
            $resumename = rand(99999, 10000).'.'.$extension;
            
            move_uploaded_file($_FILES['resume']['tmp_name'], $uploadedpath.$resumename);
        }
    }
    
    if (!empty($_POST['contactformid'])) 
    {
        header('Location: thank-you.html');
        exit(0);
    }
    
    date_default_timezone_set('Asia/Kolkata');
	$cdate 	= date('d-m-Y H:i:s');
	
	//echo "<li>++".$resumename; die;
	
	if(!empty($fname) && !empty($emailid) && !empty($phone))
	{
	    $google_captcha_secret_key  = '6LcFrmsqAAAAAJ--gh6HPzUE8sHFyCGla77hRZNH';
		
		if($_POST['g-recaptcha-response'] && !empty($_POST['g-recaptcha-response']))
		{
			$response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.urlencode($google_captcha_secret_key).'&response='.urlencode($_POST['g-recaptcha-response']));
				
			$responseData = json_decode($response);
			
			//print_r($responseData);die;
				
			if(!empty($responseData) && $responseData->success)
			{
		
                    $message = '<html>
                    <head>
                    <title>HTML email</title>
                    </head>
                    <body>
                    <table width="500" border="0" align="left" cellpadding="5" cellspacing="0" style="border:1px solid #2C2C2C;">
                    <tr bgcolor="#EEEEEE">
                    <td ><span style="color:#000000; font-size:14px; font-family:Arial; font-weight:bold;">Welcome Sanali website career enquiry</span></td>
                    </tr>
                    <tr>
                      <td class="style1">Details are follow: </td>
                    </tr>
                    <tr>
                      <td style="padding:0px;">
                          <table width="100%" border="0" cellspacing="0" cellpadding="5">
                    <tr>
                      <td width="124"  class="style1"><strong> Name :</strong></td>
                      <td width="456" class="style1">'.$fname.' '.$lname.'</td>
                    </tr>
                    <tr>
                      <td width="124"  class="style1"><strong> Email :</strong></td>
                      <td width="456" class="style1">'.$emailid.'</td>
                    </tr> 
                    <tr>
                      <td width="124"  class="style1"><strong> Phone :</strong></td>
                      <td width="456" class="style1">'.$phone.'</td>
                    </tr>
                    
                               
                    </table>
                        </td>
                    </tr>
                    </table>
                    </body>
                    </html>';
                    
                    
                    $mail = new PHPMailer(true);
                    
                    try {
                        //Server settings
                        $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                        $mail->isSMTP();                                      // Set mailer to use SMTP
                        $mail->Host = 'mail.sanali.com';                  // Specify main and backup SMTP servers
                        $mail->SMTPAuth = true;                               // Enable SMTP authentication
                        $mail->Username = 'no-reply@sanali.com';             // SMTP username
                        $mail->Password = 'T{gwuIWRXA5)';                           // SMTP password
                        $mail->SMTPSecure = 'ssl';                            // Enable SSL encryption, TLS also accepted with port 465
                        $mail->Port = 465;                                    // TCP port to connect to
                    
                        //Recipients
                        $mail->setFrom('no-reply@sanali.com', 'Sanali');          //This is the email your form sends From
                        //$mail->addAddress('swatantra.ksquare99@gmail.com', ''); // Add a recipient address
                        $mail->addAddress('sales@sanali.com');               // Name is optional
                        //$mail->addReplyTo('info@example.com', 'Information');
                        //$mail->addCC('cc@example.com');
                        //$mail->addBCC('bcc@example.com');
                    
                        //Attachments
                        
                        $mail->addAttachment('resumes/'.$resumename);         // Add attachments
                        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                    
                        //Content
                        $mail->isHTML(true);                                  // Set email format to HTML
                        $mail->Subject = 'Sanali website career enquiry';
                        $mail->Body    = $message;
                        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                    
                        $result = $mail->send();
                        
                        if($result)
                        {
                            header('Location: thank-you.html');
                            exit(0);
                        }
                        else
                        {
                            header('Location: thank-you.html?status=mail-error');
                            exit(0);    
                        }
                        
                    } 
                    catch (phpmailerException $e) 
                    {
                    	//echo $e->errorMessage(); //Pretty error messages from PHPMailer
                    	header('Location: thank-you.html?status=mail-error');
                        exit(0);
                    } 
                    catch (Exception $e) 
                    {
                    	//echo $e->getMessage(); //Boring error messages from anything else!
                    	header('Location: thank-you.html?status=mail-error');
                        exit(0);
                    }
			}
			else
			{
			    header('Location: thank-you.html?status=captcha-error');
                exit(0);
			}
		}
		else
		{
		    header('Location: thank-you.html?status=captcha-resp-error');
            exit(0);
		}
	}
	else
	{
	    header('Location: thank-you.html?status=data-error');
        exit(0);
	}
    
}
?>