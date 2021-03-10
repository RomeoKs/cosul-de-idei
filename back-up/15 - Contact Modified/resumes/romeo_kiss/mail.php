<?php 
if(isset($_POST['submit'])){
    $to = "romeo@cosuldeidei.ro"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $first_name = $_POST['firstName'];
    $last_name = $_POST['lastName'];
    $phone = $_POST['phone'];
    $subject = "New message on the Resume page";
    $subject2 = "Copy of your form submission";
    $message = $first_name . " " . $last_name . ", Telefon: " . $phone . " wrote the following:" . "\n\n" . $_POST['message'];
    $message2 = "Here is a copy of your message on the Romeo's Kiss Resume page " . $first_name . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    // You cannot use header and echo together. It's one or the other.
    }

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $hostname="localhost";
    $username="cosuldei_romeokiss";
    $password="@Alabala007@";
    $dbname="cosuldei_resume";

    // Create connection
$conn = new mysqli($hostname, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "INSERT INTO resume (firstName, lastName, email, phone, message)
VALUES ('$firstName', '$lastName', '$email', '$phone', '$message')";
if ($conn->query($sql) === TRUE) {
    function function_alert($message) { 
      
        // Display the alert box  
        echo "<script>alert('$message');</script>"; 
    } 
      
      
    // Function call 
    function_alert("Mail Sent. Thank you " . $first_name . ", I will contact you shortly."); 
    header( "refresh:1;url=index.html" ); //this line used to redirect to the index.php page after 3 seconds
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
