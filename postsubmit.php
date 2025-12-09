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
if(isset($_POST['name']))
{
    if(isset($_POST['name']))
    { 
        $name = addslashes($_POST['name']);
    }
    
    if(isset($_POST['email']))
    { 
        $emailid = addslashes($_POST['email']);
    }
    
    if(isset($_POST['phone']))
    {
        $phone = addslashes($_POST['phone']);
    }
    
    if(isset($_POST['pagename']))
    {
        $pagename = addslashes($_POST['pagename']);
    }
    
    if (!empty($_POST['contactformid'])) 
    {
        header('Location: thank-you.html');
        exit(0);
    }
    
    date_default_timezone_set('Asia/Kolkata');
	$cdate 	= date('d-m-Y H:i:s');
	
	
	
	if(!empty($name) && !empty($emailid) && !empty($phone))
	{
	    $google_captcha_secret_key  = '6LcFrmsqAAAAAJ--gh6HPzUE8sHFyCGla77hRZNH';
		
		if($_POST['g-recaptcha-response'] && !empty($_POST['g-recaptcha-response']))
		{
			$response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.urlencode($google_captcha_secret_key).'&response='.urlencode($_POST['g-recaptcha-response']));
				
			$responseData = json_decode($response);
			
			//print_r($responseData);die;
				
			if(!empty($responseData) && $responseData->success)
			{
		
				//$cvsData = $name . "," . $emailid . "," . $mobileno ."," . $company_name ."," . $country ."," . $website ."," . $businesssize ."," . $budgetrange ."," . $message . ",". $cdate .", \r\n";
				$cvsData = $name . "," . $emailid . "," . $phone . ",". $pagename . ",". $cdate .", \r\n";

				$file_path = __DIR__ . "/enquiry_page_lead.csv";
				$fp = fopen($file_path,"a");

				if($fp)
				{
					fwrite($fp,$cvsData);
					fclose($fp);

                    //$to = 'sales@sanali.com';
                    //$to = 'swatantra.ksquare99@gmail.com';
                    //$subject = "Sanali website contact enquiry";
                    $message = '<html>
                    <head>
                    <title>HTML email</title>
                    </head>
                    <body>
                    <table width="500" border="0" align="left" cellpadding="5" cellspacing="0" style="border:1px solid #2C2C2C;">
                    <tr bgcolor="#EEEEEE">
                    <td ><span style="color:#000000; font-size:14px; font-family:Arial; font-weight:bold;">Welcome Sanali website inner enquiry</span></td>
                    </tr>
                    <tr>
                      <td class="style1">Details are follow: </td>
                    </tr>
                    <tr>
                      <td style="padding:0px;">
                          <table width="100%" border="0" cellspacing="0" cellpadding="5">
                    <tr>
                      <td width="124"  class="style1"><strong> Name :</strong></td>
                      <td width="456" class="style1">'.$name.'</td>
                    </tr>
                    <tr>
                      <td width="124"  class="style1"><strong> Email :</strong></td>
                      <td width="456" class="style1">'.$emailid.'</td>
                    </tr> 
                    <tr>
                      <td width="124"  class="style1"><strong> Phone :</strong></td>
                      <td width="456" class="style1">'.$phone.'</td>
                    </tr>
                    
                    <tr>
                      <td width="124"  class="style1"><strong> Page :</strong></td>
                      <td width="456" class="style1">'.$pagename.'</td>
                    </tr>
                    
                               
                    </table>
                        </td>
                    </tr>
                    </table>
                    </body>
                    </html>';
    
                    /*// Always set content-type when sending HTML email
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    // More headers
                    $headers .= 'From: Sanali website contact enquiry <no-reply@sanali.com>' . "\r\n";
                    //$headers .= 'Cc: swatantra.ksquare99@gmail.com' . "\r\n";
                    $sent = mail($to, $subject, $message, $headers);*/
                    
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
                        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                    
                        //Content
                        $mail->isHTML(true);                                  // Set email format to HTML
                        $mail->Subject = 'Sanali website inner enquiry';
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
			}
			else
			{
			    header('Location: thank-you.html?status=captcha-error');
                exit(0);
			}
		}
		header('Location: thank-you.html?status=captcha-resp-error');
        exit(0);
	}
	else
	{
	    header('Location: thank-you.html?status=data-error');
        exit(0);
	}
    
}
?>