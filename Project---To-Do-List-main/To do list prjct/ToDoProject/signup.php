<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['password'])){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbName = "finalproject";

        $connection = new mysqli($servername, $username, $password, $dbName);

        if($connection->connect_error){
            //ka ndodhur nje error gjate lidhjes me databaze
            header("Location: auth.php");
            die();
        }
        $firstName = $_POST["first_name"];
        $lastName = $_POST["last_name"];
        $email = $_POST["email"];
        $userPassword = $_POST["password"];  
          //check a ka naj user me email te njejte ose username te njejte
          $checkDuplicate = $connection->prepare("SELECT * FROM `users` WHERE `email` = ?");
          $checkDuplicate->bind_param("s", $email);
  
          $checkDuplicate->execute();
          $duplicateResult = $checkDuplicate->get_result();
  
          if($duplicateResult->num_rows > 0){
              header("Location: auth.php");
              die();
          }
        
        $stmt = $connection->prepare("INSERT INTO `users` (`first_name`, `last_name`, `email`, `password`) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $firstName, $lastName, $email, $userPassword);

        $stmt->execute();

        header("Location: auth.php");
        $checkDuplicate->close();
        $stmt->close();
        $connection->close();
       
}
}
?>