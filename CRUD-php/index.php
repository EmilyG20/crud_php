<?php include("db.php") ?>

<?php include("includes/header.php") ?>
  
<div class="d-flex">
  <div class="w-50 m-5">

    <?php if(isset($_SESSION['message'])){ ?>
      <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
      <?= $_SESSION['message'] ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php session_unset();} ?>

    <div class="card card-body">
      <form action="save_book.php" method="POST">
        <div class="form-group">
          <label for="title">Título</label>
          <input type="text" name="title" class="form-control" autofocus>
        </div>
        <div class="form-group">
          <label for="author">Autor</label>
          <input type="text" name="author" class="form-control" autofocus>
        </div>
        <input type="submit" class="btn btn-success mt-3 w-100" name="save_book" value="Agregar">
      </form>
    </div>
    
  </div>
  <div class="container w-50 m-5 text-center">
    <div class="row ">
      <div class="col border">Titulo</div>
      <div class="col border">Autor</div>
      <div class="col border">Opciones</div>
    </div>
    
      <?php
      $query = "SELECT * FROM books";
      $result_book = mysqli_query($conn,$query);

      while($row = mysqli_fetch_array($result_book)){?>
        <div class="row">
          <div class="col border"><?php echo $row['title'] ?></div>
          <div class="col border"><?php echo $row['author'] ?></div>
          <div class="col border">
            <a class="btn btn-warning" href="edit_book.php?id=<?php echo $row['id'] ?>"> Editar</a>
            <a class="btn btn-danger" href="delete_book.php?id=<?php echo $row['id'] ?>">X</a>
          </div>
        </div>
      
      <?php } ?>
    
      
  </div>
</div>



<?php include("includes/footer.php") ?>

