<?php
$email = $_POST["email"];
$passwd = $_POST["password"];

if (!empty($email) || !empty($passwd)) {
    $host = "localhost";
    $dbUsername = "root";
    $dbname = "sovann"

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    if(mysqli_connect_error()) {
        die('Connect Error('. mysqli_connect_error().')'. mysqli_connect_error());
    } else {
        $SELECT = "SELECT email From register Where email = ? Limit 1";
        $INSERT = "INSERT Into register (email, password) values (?,?)";

        $stmt = $conn->prepare($SELECT),
        $stmt->bind_param("s", $email);
        $stmt->execute()
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum = $stmt->num_rows;
        if(rnum==0) {
            $stmt->close();

            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("si",$email,$passwd);
            $stmt->execute();
            echo "New record insterted sucessfully";
        } echo {
            echo "Someone already register using this email";
        }
        $stmt->close();
        $conn->close();
    }
} else {
    echo "All feld are required";
    die();
}
?>