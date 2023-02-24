<?php 

  include("db.php");

  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM books WHERE id=$id";
    $result = mysqli_query($conn,$query);
    if (mysqli_num_rows($result)==1){
      $row = mysqli_fetch_array($result);
      $title = $row['title'];
      $author = $row['author'];
    }
  }

  if(isset($_POST['update'])){
    $id = $_GET['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];

    $query = "UPDATE books SET title ='$title', author='$author' WHERE id=$id";
    mysqli_query($conn,$query);
    $_SESSION['message']='Libro actualizado exitosamente';
    $_SESSION['message_type']='warning';
    header("Location: index.php");
  }

?>

<?php include("includes/header.php") ?>
<div class="container">
  <div class="row">
    <div class="col-md-4 mx-auto mt-5">
      <div class="card card-body">
        <form action="edit_book.php?id=<?php echo $_GET['id']; ?>" method="POST">
          <div class="form-group m-3">
            <input type="text" name="title" value="<?php echo $title; ?>" class="form-control" placeholder="Actualice el titulo">
          </div>
          <div class="form-group m-3">
            <input type="text" name="author" value="<?php echo $author; ?>" class="form-control" placeholder="Actualice el autor">
          </div>
          <button class="btn-success btn m-3 w-75" name="update">Actualizar</button>
        </form>
      </div>
    </div>
  </div>
</div>

