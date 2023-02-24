<?php

include("db.php");

  $query = "SELECT * FROM books";
  $result = mysqli_query($conn,$query);
  if (!$result){
    die("Query failed");
  }
  $resultjson = mysqli_fetch_all($result);
 echo json_encode($resultjson);


?>
