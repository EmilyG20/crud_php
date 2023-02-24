<?php

include("db.php");

if (isset($_POST['save_book'])){
  $title = $_POST['title'];
  $author = $_POST['author'];

  $query = "INSERT INTO books(title,author) VALUES ('$title','$author')";
  $result = mysqli_query($conn,$query);
  if (!$result){
    die("Query failed");
  }

  $_SESSION['message']='Libro registrado exitosamente';
  $_SESSION['message_type']='success';

  header("Location:index.php");
}

?>