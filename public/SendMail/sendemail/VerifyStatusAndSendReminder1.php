<?php
date_default_timezone_set('Etc/UTC');
require '../PHPMailerAutoload.php';
include'connect.php';
$Today =date("Y-m-d");

$con->query("UPDATE trainings SET GCP_GCLP_Status='Expired' WHERE GCP_GCLP_ExpireDate <= '$Today'") AND GCP_GCLP_ExpireDate != '0000-00-00'  or die(mysql_error());
$con->query("UPDATE trainings SET HSP_Status='Expired' WHERE HSP_ExpireDate <= '$Today' AND HSP_ExpireDate != '0000-00-00'") or die(mysql_error());

$con->query("UPDATE trainings SET GCP_GCLP_Status='Current' WHERE GCP_GCLP_ExpireDate >= '$Today'") or die(mysql_error());
$con->query("UPDATE trainings SET HSP_Status='Current' WHERE HSP_ExpireDate >= '$Today'") or die(mysql_error());
$con->query("UPDATE trainings SET GCP_GCLP_Status='' WHERE GCP_GCLP_ExpireDate = '0000-00-00'")  or die(mysql_error());
$con->query("UPDATE trainings SET HSP_Status='' WHERE HSP_ExpireDate = '0000-00-00'") or die(mysql_error());

$con->query("UPDATE trainings SET ML_Status='Expired' WHERE ML_ExpireDate <= '$Today' AND ML_ExpireDate != '0000-00-00'") or die(mysql_error());
$con->query("UPDATE trainings SET ML_Status='Current' WHERE ML_ExpireDate >= '$Today'") or die(mysql_error());

$con->query("UPDATE drugs SET Status='Expired' WHERE ExpireDate <= '$Today' AND ExpireDate != '0000-00-00' OR RemainderDate <= '$Today' AND RemainderDate != '0000-00-00'") or die(mysql_error());
$con->query("UPDATE drugs SET Status='Good' WHERE ExpireDate > '$Today' AND RemainderDate > '$Today'") or die(mysql_error());



//*********************************************GCP Reminders**********************************
include'connect.php';
$today=date("Y-m-d");
$sql="SELECT * FROM trainings where (GCP_GCLP_ExpireDate <= '$Today' OR GCP_GCLP_ReminderDate <= '$Today') AND GCP_GCLP_Notification ='Yes' AND GCP_GCLP_ReminderDate !='0000-00-00' AND GCP_GCLP_ExpireDate !='0000-00-00'";  
$query =  $con->query($sql);
$rowdata = mysqli_fetch_array($query);

if ($rowdata){
$query2=$con->query("SELECT * FROM trainings WHERE (GCP_GCLP_ExpireDate <= '$Today' OR GCP_GCLP_ReminderDate <= '$Today') AND GCP_GCLP_Notification ='Yes' AND GCP_GCLP_ReminderDate !='0000-00-00' AND GCP_GCLP_ExpireDate !='0000-00-00'");  

$txt1="Hi,";
$txt="";
$expl="\n\n For more details Please login the ARTS system \n http://arts2.mbeya.nimr-mmrc.org or \n http://arts.mbeya.nimr-mmrc.org";
while( $data=mysqli_fetch_array($query2) ) {

$txt .= "<p> -GCP/GCLP Certificate for staff with Name <b>".$data['Name']."</b> is Expired or will expire soon, the Expire date is <b>".$data['GCP_GCLP_ExpireDate']."</b></p>";
}
$txt2 = $txt1." ".$txt."".$expl;

$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = "mail.mmrp.org";
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 25;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = "arts@nimr-mmrc.org";
//Password to use for SMTP authentication
$mail->Password = "M0rog0ro";
//Set who the message is to be sent from
$mail->setFrom('ARTS@mmrp.org', 'ARTS System');
//Set an alternative reply-to address
//*$mail->addReplyTo('replyto@mmrp.org', 'No reply');
//Set who the message is to be sent to
$mail->addAddress('qms@nimr-mmrc.org', 'QMS');
$mail->addCC('pagrea@mmrp.org', 'Peter Agrea');
//Set the subject line
$mail->Subject = 'GCP/GCLP Refresher Training Remainder';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//*$mail->msgHTML(file_get_contents('contents1.php'), dirname(__FILE__));
//Replace the plain text body with one created manually
//*$mail->AltBody = 'This is a plain-text message body for text';
$mail->IsHTML(true);
$mail->Body = $txt2;
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "\n GCP Reminders Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "\n Message sent!";
}

}
//*********************************************END GCP Reminders***************************************************

//*********************************************HSP Reminders ****************************************************
include'connect.php';
$today=date("Y-m-d");
$sql="SELECT * FROM trainings where (HSP_ExpireDate <= '$Today' OR HSP_ReminderDate <= '$Today') AND HSP_Notification ='Yes' AND HSP_ReminderDate !='0000-00-00' AND HSP_ExpireDate !='0000-00-00'";  
$query =  $con->query($sql);
$rowdata = mysqli_fetch_array($query);

if ($rowdata){
$query2=$con->query("SELECT * FROM trainings WHERE (HSP_ExpireDate <= '$Today' OR HSP_ReminderDate <= '$Today') AND HSP_Notification ='Yes' AND HSP_ReminderDate !='0000-00-00' AND HSP_ExpireDate !='0000-00-00'");  

$txt1="Hi,";
$txt="";
$expl="\n\n For more details Please login the ARTS system \n http://arts2.mbeya.nimr-mmrc.org or \n http://arts.mbeya.nimr-mmrc.org";
while( $data=mysqli_fetch_array($query2) ) {

$txt .= "<p> -HSP Certificate for staff with Name <b>".$data['Name']."</b> is Expired or will expire soon, the Expire date is <b>".$data['HSP_ExpireDate']."</b></p>";
}
$txt2 = $txt1." ".$txt."".$expl;

$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = "mail.mmrp.org";
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 25;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = "arts@nimr-mmrc.org";
//Password to use for SMTP authentication
$mail->Password = "M0rog0ro";
//Set who the message is to be sent from
$mail->setFrom('ARTS@mmrp.org', 'ARTS System');
//Set an alternative reply-to address
//*$mail->addReplyTo('replyto@mmrp.org', 'No reply');
//Set who the message is to be sent to
$mail->addAddress('qms@nimr-mmrc.org', 'QMS');
$mail->addCC('pagrea@mmrp.org', 'Peter Agrea');
//Set the subject line
$mail->Subject = 'HSP Refresher Training Remainder';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//*$mail->msgHTML(file_get_contents('contents1.php'), dirname(__FILE__));
//Replace the plain text body with one created manually
//*$mail->AltBody = 'This is a plain-text message body for text';
$mail->IsHTML(true);
$mail->Body = $txt2;
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "\n GCP Reminders Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "\n Message sent!";
}

}
//*********************************************End HSP Reminders ****************************************************************

//*********************************************Medical License Reminders ********************************************************
include'connect.php';
$today=date("Y-m-d");
$sql="SELECT * FROM trainings where (ML_ExpireDate <= '$Today' OR ML_ReminderDate <= '$Today') AND ML_Notification ='Yes' AND ML_ReminderDate !='0000-00-00' AND ML_ExpireDate !='0000-00-00'";  
$query =  $con->query($sql);
$rowdata = mysqli_fetch_array($query);

if ($rowdata){
$query2=$con->query("SELECT * FROM trainings WHERE (ML_ExpireDate <= '$Today' OR ML_ReminderDate <= '$Today') AND ML_Notification ='Yes' AND ML_ReminderDate !='0000-00-00' AND ML_ExpireDate !='0000-00-00'");  

$txt1="Hi,";
$txt="";
$expl="\n\n For more details Please login the ARTS system \n http://arts2.mbeya.nimr-mmrc.org or \n http://arts.mbeya.nimr-mmrc.org";
while( $data=mysqli_fetch_array($query2) ) {

$txt .= "<p> -Medical License Certificate for staff with Name <b>".$data['Name']."</b> is Expired or will expire soon, the Expire date is <b>".$data['ML_ExpireDate']."</b></p>";
}
$txt2 = $txt1." ".$txt."".$expl;

$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = "mail.mmrp.org";
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 25;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = "arts@nimr-mmrc.org";
//Password to use for SMTP authentication
$mail->Password = "M0rog0ro";
//Set who the message is to be sent from
$mail->setFrom('ARTS@mmrp.org', 'ARTS System');
//Set an alternative reply-to address
//*$mail->addReplyTo('replyto@mmrp.org', 'No reply');
//Set who the message is to be sent to
$mail->addAddress('qms@nimr-mmrc.org', 'QMS');
$mail->addCC('pagrea@mmrp.org', 'Peter Agrea');
//Set the subject line
$mail->Subject = 'Medical License Certificates Expired';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//*$mail->msgHTML(file_get_contents('contents1.php'), dirname(__FILE__));
//Replace the plain text body with one created manually
//*$mail->AltBody = 'This is a plain-text message body for text';
$mail->IsHTML(true);
$mail->Body = $txt2;
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "\n GCP Reminders Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "\n Message sent!";
}

}
//*********************************************End Medical License Reminders ********************************************************


//****************************************** Studies Extensions Remainder ************************************************************

include'connect.php';
$today=date("Y-m-d");
$sql="SELECT * FROM approvalinfors where ExtensionRemainderDate <= '$today' AND Status!='Closed' and ExtensionNotification ='Yes' AND ExtensionRemainderDate != '0000-00-00'";  
$query = $con->query($sql);
$row1=mysqli_fetch_array($query);

if ($row1){
$sqls="SELECT * FROM approvalinfors where ExtensionRemainderDate <= '$today' AND Status!='Closed' and ExtensionNotification ='Yes' AND ExtensionRemainderDate != '0000-00-00'";  
$query2=  $con->query($sqls);

$txt1="Hi,";
$txt="";
$expl="\n \n For more details Please login the ARTS system \n http://arts2.mbeya.nimr-mmrc.org or \n http://arts.mbeya.nimr-mmrc.org";
while( $data=mysqli_fetch_array($query2) ) {
$txt .= "<p> -The Study with ID <b>".$data['StudyID']."</b> and ApprovalType <b>".$data['ApprovalType']."</b> need Protocal Extension, its expire date is <b>".$data['NextExtansionDate']."</b></p>";

}
//$to = "qms@nimr-mmrc.org, pagrea@mmrp.org";
$txt2 = $txt1." ".$txt."".$expl;

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
//*$mail->SMTPDebug = 2;
//Ask for HTML-friendly debug output
//*$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = "mail.mmrp.org";
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 25;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = "arts@nimr-mmrc.org";
//Password to use for SMTP authentication
$mail->Password = "M0rog0ro";
//Set who the message is to be sent from
$mail->setFrom('ARTS@mmrp.org', 'ARTS System');
//Set an alternative reply-to address
//*$mail->addReplyTo('replyto@mmrp.org', 'No reply');
//Set who the message is to be sent to
$mail->addAddress('qms@nimr-mmrc.org', 'QMS');
$mail->addCC('pagrea@mmrp.org', 'Peter Agrea');
//Set the subject line
$mail->Subject = 'Studies Extensions Remainder';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//*$mail->msgHTML(file_get_contents('contents1.php'), dirname(__FILE__));
//Replace the plain text body with one created manually
//*$mail->AltBody = 'This is a plain-text message body for text';
$mail->IsHTML(true);
$mail->Body = $txt2;
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "\nStudies Extensions Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "\nMessage sent!";
}
}
//****************************************** End Studies Extensions Remainder ************************************************************


//****************************************** Studies Progressive reports Remainder *******************************************************

include'connect.php';
$today=date("Y-m-d");
$sql="SELECT * FROM approvalinfors where ReportReminderDate <= '$today' AND Status!='Closed' and ReportNotification ='Yes' AND ReportReminderDate != '0000-00-00'";  
$query = $con->query($sql);
$row1=mysqli_fetch_array($query);

if ($row1){
$sqls="SELECT * FROM approvalinfors where ReportReminderDate <= '$today' AND Status!='Closed' and ReportNotification ='Yes' AND ReportReminderDate != '0000-00-00'";  
$query2=  $con->query($sqls);

$txt1="Hi,";
$txt="";
$expl="\n \n For more details Please login the ARTS system \n http://arts2.mbeya.nimr-mmrc.org or \n http://arts.mbeya.nimr-mmrc.org";
while( $data=mysqli_fetch_array($query2) ) {
$txt .= "<p>-The Study with ID <b>".$data['StudyID']."</b> and ApprovalType <b>".$data['ApprovalType']." </b>need the progressive report, its progress report due date is <b>".$data['NextSixMonthReportDate']."</b></p>";

}
//$to = "qms@nimr-mmrc.org, pagrea@mmrp.org";
$txt2 = $txt1." ".$txt."".$expl;

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
//*$mail->SMTPDebug = 2;
//Ask for HTML-friendly debug output
//*$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = "mail.mmrp.org";
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 25;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = "arts@nimr-mmrc.org";
//Password to use for SMTP authentication
$mail->Password = "M0rog0ro";
//Set who the message is to be sent from
$mail->setFrom('ARTS@mmrp.org', 'ARTS System');
//Set an alternative reply-to address
//*$mail->addReplyTo('replyto@mmrp.org', 'No reply');
//Set who the message is to be sent to
$mail->addAddress('qms@nimr-mmrc.org', 'QMS');
$mail->addCC('pagrea@mmrp.org', 'Peter Agrea');
//Set the subject line
$mail->Subject = 'Study Progressive Reports Remainder';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//*$mail->msgHTML(file_get_contents('contents1.php'), dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->IsHTML(true);
//*$mail->AltBody = 'This is a plain-text message body for text';
$mail->Body = $txt2;
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "\n Progressive Reports Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "\nMessage sent!";

}

}
//****************************************** END Studies Progressive reports Remainder *******************************************************


//****************************************** Drugs expire Remainder *************************************

include'connect.php';
$today=date("Y-m-d");
$sql="SELECT * FROM drugs where Status ='Expired' and ExpireNotification ='Yes'";  
$query = $con->query($sql);
$row1=mysqli_fetch_array($query);

if ($row1){
$sqls="SELECT * FROM drugs where Status ='Expired' and ExpireNotification ='Yes'";  
$query2=  $con->query($sqls);

$txt1="Hi,";
$txt="";
$expl="\n \n For more details Please login the ARTS system \n http://arts2.mbeya.nimr-mmrc.org or \n http://arts.mbeya.nimr-mmrc.org";
while( $data=mysqli_fetch_array($query2) ) {
$txt .= "<p>-The Drug with Name <b>".$data['DrugName']." is Expired or Will expire soon, its expire date is <b>".$data['ExpireDate']."</b></p>";

}
//$to = "qms@nimr-mmrc.org, pagrea@mmrp.org";
$txt2 = $txt1." ".$txt."".$expl;

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
//*$mail->SMTPDebug = 2;
//Ask for HTML-friendly debug output
//*$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = "mail.mmrp.org";
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 25;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = "arts@nimr-mmrc.org";
//Password to use for SMTP authentication
$mail->Password = "M0rog0ro";
//Set who the message is to be sent from
$mail->setFrom('ARTS@mmrp.org', 'ARTS System');
//Set an alternative reply-to address
//*$mail->addReplyTo('replyto@mmrp.org', 'No reply');
//Set who the message is to be sent to
$mail->addAddress('qms@nimr-mmrc.org', 'QMS');
$mail->addCC('pagrea@mmrp.org', 'Peter Agrea');
//Set the subject line
$mail->Subject = 'Drugs Expire Notification';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//*$mail->msgHTML(file_get_contents('contents1.php'), dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->IsHTML(true);
//*$mail->AltBody = 'This is a plain-text message body for text';
$mail->Body = $txt2;
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "\n Progressive Reports Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "\nMessage sent!";

}

}
//******************************************End Drugs expire Remainder ***************************************************

?>