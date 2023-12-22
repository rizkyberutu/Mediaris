<?php
session_start();

if(!isset($_SESSION['username'])){
    header("location:login.php");
} else {
    $username = $_SESSION["username"];
}

include '../includes/config.php';

  $item_id = $_GET['item_id'];
	$query = mysqli_query($config, "SELECT * FROM items where item_id=$item_id") or die ("Koneksi ke database gagal");
  $d = mysqli_fetch_array($query);


  if(isset($_POST['edit'])){
    var_dump($_POST);

    $type = $_POST['type'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $img = $_POST['img'];
    $rental_fee = $_POST['rental_fee'];
    $availability = true;
    $description = $_POST['description'];

    $input = mysqli_query($config, "UPDATE items set type = '$type', brand ='$brand',model = '$model',img = '$img',rental_fee = '$rental_fee', availability = '$availability', description = '$description' where item_id=$item_id");
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
          <h1>Edit Item</h1>
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
              <input type="text" class="form-control" id="brand" name="brand" value="<?php echo $d['brand']; ?>" require>
            </div>
            <div class="mb-3">
              <label for="model" class="form-label">Model</label>
              <input type="text" class="form-control" id="model" name="model" value="<?php echo $d['model']; ?>" require>
            </div>
            <div class="mb-3">
              <label for="img" class="form-label">Img Url</label>
              <input type="text" class="form-control" id="img" name="img" value="<?php echo $d['img']; ?>" require>
            </div>
            <div class="mb-3">
              <label for="rent_fee" class="form-label">Rental fee</label>
              <input type="text" class="form-control" id="rental_fee" name="rental_fee" value="<?php echo $d['rental_fee']; ?>" require>
            </div>
            <div class="mb-3">
              <label for="rent_fee" class="form-label">Description</label>
              <input type="text" class="form-control" id="description" name="description" value="<?php echo $d['description']; ?>" require>
            </div>
            <button type="submit" value="tambah" name="edit" class="btn btn-primary">Edit</button>
          </form>
        </div>
      </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>


