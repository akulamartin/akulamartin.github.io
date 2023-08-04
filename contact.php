<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form fields are empty and assign data to variables
    $to = "info@lovebirds.co.ke"; // Replace with the recipient email address
    $name = !empty($_POST['name']) ? $_POST['name'] : '';
    $email = !empty($_POST['email']) ? $_POST['email'] : '';
    $subject = !empty($_POST['subject']) ? $_POST['subject'] : '';
    $message = !empty($_POST['message']) ? $_POST['message'] : '';


    // Check and add selected checkboxes to the message body
    $checkboxes = array(
        'cinematography' => 'Cinematography',
        'videoediting' => 'Video Editing',
        'customizedcakes' => 'Customized Cakes',
        'limousineservices' => 'Limousine Services',
        'indooroutdoordecorations' => 'Indoor / Outdoor Decorations',
        'fashiondesign' => 'Fashion Design',
        'soundmusicandentertainment' => 'Sound Music and Entertainment',
        'makeupservices' => 'Make-Up Services',
        'cateringservices' => 'Catering Services',
    );

    // Get the selected checkboxes and create a list
    $selectedCheckboxes = array();
    foreach ($checkboxes as $key => $label) {
        if (!empty($_POST[$key])) {
            $selectedCheckboxes[] = $label;
        }
    }

    // If there are selected checkboxes, create the list
    if (!empty($selectedCheckboxes)) {
        $body .= "<h1>Selected Services:</h1>\n";
        $body .= "<ul>\n";
        foreach ($selectedCheckboxes as $checkbox) {
            $body .= "<li>$checkbox</li>\n";
        }
        $body .= "</ul>\n";
    }
    $body .= "<h1>Client's Message:</h1>\n";
    $body .="<br>$message\n\n";

    //echo $body;

    // Send the email
     $headers = "MIME-Version: 1.0" . "\r\n";
     $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
     $headers .= "From: $email";
     mail($to, $subject, $body, $headers);
    // Redirect to a thank-you page after successful submission
    header("Location: thank_you_page.html");
    exit();
}
?>
