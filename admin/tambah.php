<?php
  if(isset($_POST['tambah'])){
    include '../includes/config.php';
    var_dump($_POST);

    $type = $_POST['type'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $img = $_POST['img'];
    $rental_fee = $_POST['rental_fee'];
    $availability = true;
    $description = $_POST['description'];

    $input = mysqli_query($config, "insert into items (type, brand, model, img, rental_fee, availability, description) values
    ('$type','$brand','$model','$img','$rental_fee','$availability','$description')");
    if($input){
      echo "<h3>Data Berhasil di Tambahkan</h3>";
      echo "<a href = 'tambah.php>Kembali</a>";
    }
    else{
      echo "<h3>Data Gagal di Tambahkan</h3>";
      echo "<a href = 'tambah.php>Kembali</a>";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Add Items</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body>
      <div class="container my-5">
        <div class="text-center">
          <h1>Tambah Item</h1>
        </div>
        <div class="form-con container">
          <form action="" method="post">
            <div class="mb-3">
              <select class="form-select" aria-label="Default select example" name="type" id="type" require>
                <option >Type</option>
                <option value="">Camera</option>
                <option value="2">Lenses</option>
                <option value="3">Tripod</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="brand" class="form-label">Brand</label>
              <input type="text" class="form-control" id="brand" name="brand" require>
            </div>
            <div class="mb-3">
              <label for="model" class="form-label">Model</label>
              <input type="text" class="form-control" id="model" name="model" require>
            </div>
            <div class="mb-3">
              <label for="img" class="form-label">Img Url</label>
              <input type="text" class="form-control" id="img" name="img" require>
            </div>
            <div class="mb-3">
              <label for="rent_fee" class="form-label">Rental fee</label>
              <input type="text" class="form-control" id="rental_fee" name="rental_fee" require>
            </div>
            <div class="mb-3">
              <label for="rent_fee" class="form-label">Description</label>
              <input type="text" class="form-control" id="description" name="description" require>
            </div>
            <button type="submit" value="tambah" name="tambah" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>


