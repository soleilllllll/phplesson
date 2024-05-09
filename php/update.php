<?php
require('dbconfig.php'); 
    
    if (isset($_POST['id']) && isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['gender'])) {
        $id = $_POST['id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $gender = $_POST['gender'];

        
        $stmt = $conn->prepare("UPDATE users SET first_name = :first_name, last_name = :last_name, gender = :gender WHERE id = :id");
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        header("Location:../index.php");
        exit;
    } else {
        echo "All fields are required";
        exit;
    }


?>