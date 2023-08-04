<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "info@lovebirds.co.ke"; // Replace with the recipient email address
    $subject = $_POST["subject"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Checkboxes
    $checkboxes = array(
        "cinematography" => "I need Cinematography",
        "videoediting" => "I need Video Editing",
        "customizedcakes" => "I need Customized Cakes",
        "limousineservices" => "I need Limousine Services",
        "indooroutdoordecorations" => "I need Indoor / Outdoor Decorations",
        "fashiondesign" => "I need Fashion Design",
        "soundmusicandentertainment" => "I need Sound Music and Entertainment",
        "makeupservices" => "I need Make-Up Services",
        "cateringservices" => "I need Catering Services",
    );

    $selected_checkboxes = array();
    foreach ($checkboxes as $key => $label) {
        if (!empty($_POST[$key])) {
            $selected_checkboxes[] = $label;
        }
    }

    // Combine selected checkboxes into a single string
    $checkboxes_message = implode("\n", $selected_checkboxes);

    // Include the checkboxes message in the email body
    $email_body = "Name: $name\nEmail: $email\n\n$checkboxes_message\n\n$message";

    // Send the email
    $headers = "From: $email";
    mail($to, $subject, $email_body, $headers);

    // Redirect to a thank-you page after successful submission
    header("Location: thank_you_page.html");
    exit();
}
?>
