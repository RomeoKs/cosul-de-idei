<?php 
if(isset($_POST['submit'])){
    $to = "romeo@cosuldeidei.ro"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $fullname = $_POST['fullName'];
    $phone = $_POST['phone'];
    $subject = "Mesaj nou de pe pagina de contact - Cosul de Idei";
    $subject2 = "Copia mesajului dumneavoastra de pe cosuldeidei.ro";
    $message = $fullname . ", Telefon: " . $phone . " wrote the following:" . "\n\n" . $_POST['message'];
    $message2 = "Salut, <br><br> Iti trimitem si tie o copie a mesajului de pe cosuldeidei.ro " . $fullname . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    // You cannot use header and echo together. It's one or the other.
    }

    $fullname = $_POST['fullName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $hostname="localhost";
    $username="cosuldei_romeokiss";
    $password="@Alabala007@";
    $dbname="cosuldei_contactForm";

    // Create connection
$conn = new mysqli($hostname, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "INSERT INTO contactForm (fullName, email, phone, message)
VALUES ('$fullname', '$email', '$phone', '$message')";
if ($conn->query($sql) === TRUE) {
    function function_alert($message) { 
      
        // Display the alert box  
        echo "<script>alert('$message');</script>"; 
    } 
      
      
    // Function call 
    function_alert("Mesaj trimis. " . $fullname . ", iti multumim si te vom contacta in curand."); 
    header( "refresh:1;url=index.html" ); //this line used to redirect to the index.php page after 3 seconds
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
