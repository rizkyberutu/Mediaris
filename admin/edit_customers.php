<?php
session_start();

if(!isset($_SESSION['username'])){
    header("location:login.php");
} else {
    $username = $_SESSION["username"];
}

include '../includes/config.php';

  $customer_id = $_GET['customer_id'];
	$query = mysqli_query($config, "SELECT * FROM customers where customer_id=$customer_id") or die ("Koneksi ke database gagal");
  $d = mysqli_fetch_array($query);


  if(isset($_POST['edit'])){
    var_dump($_POST);

    $fname = $_POST['fname'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $location = $_POST['location'];

    $input = mysqli_query($config, "UPDATE customers set fname = '$fname',username = '$username',phone = '$phone',location = '$location' where customer_id=$customer_id");
    if($input){
      echo "
      <script>
      alert('data berhasil diedit');
      document.location.href = 'customers.php';
      </script>
      ";
    } else{
      echo "
      <script>
      alert('data gagal diedit!');
      document.location.href = 'edit_customers.php?customer_id=';
      </script>
      ";
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
        <title>Edit Customer</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body>
      <div class="container my-5">
        <div class="text-center">
          <h1>Edit Customer</h1>
        </div>
        <div class="form-con container">
          <form action="" method="post">
            <div class="mb-3">
              <label for="brand" class="form-label">Full Name</label>
              <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $d['fname']; ?>" require>
            </div>
            <div class="mb-3">
              <label for="model" class="form-label">Username</label>
              <input type="text" class="form-control" id="username" name="username" value="<?php echo $d['username']; ?>" require>
            </div>
            <div class="mb-3">
              <label for="img" class="form-label">Phone</label>
              <input type="text" class="form-control" id="location" name="phone" value="<?php echo $d['phone']; ?>" require>
            </div>
            <div class="mb-3">
              <label for="rent_fee" class="form-label">Address</label>
              <input type="text" class="form-control" id="location" name="location" value="<?php echo $d['location']; ?>" require>
            </div>
            <button type="submit" value="tambah" name="edit" class="btn btn-primary">Edit</button>
          </form>
        </div>
      </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>


