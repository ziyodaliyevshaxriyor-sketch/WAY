<?php
$to = "shaxriyor.z@icloud.com";
$subject = "New EagleWay Trucking Application";

// Collect form data
$fullname = $_POST['fullname'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$nationality = $_POST['nationality'];
$otr = $_POST['otr'];
$weekly_miles = $_POST['weekly_miles'];
$eld = $_POST['eld'];
$payment_exp = $_POST['payment_exp'];
$endorsements = isset($_POST['endorsements']) ? implode(", ", $_POST['endorsements']) : '';
$trailer = $_POST['trailer'];

// Email body
$message = "🧾 Company Driver Profile\n";
$message .= "👤 Name: $fullname\n";
$message .= "📞 Phone: $phone\n";
$message .= "📧 Email: $email\n";
$message .= "🌐 Nationality: $nationality\n";
$message .= "📆 Experience: $otr years OTR\n";
$message .= "📊 Weekly Miles: $weekly_miles\n";
$message .= "📝 ELD: $eld\n";
$message .= "💵 Payment: $payment_exp\n";
$message .= "📝 Endorsements: $endorsements\n";
$message .= "🚚 Trailer: $trailer\n";

// File uploads
$attachments = [];
$files = ['cdl_front', 'cdl_back', 'medical'];
foreach($files as $file){
    if(isset($_FILES[$file]) && $_FILES[$file]['error'] == 0){
        $attachments[] = $_FILES[$file]['tmp_name'];
        $message .= "📎 $file uploaded\n";
    }
}

$headers = "From: no-reply@eagleway.com";
mail($to, $subject, $message, $headers);
echo "success";
?>
