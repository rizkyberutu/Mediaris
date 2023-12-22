<?php
  $customer_id = $_GET["customer_id"];
  include '../includes/config.php';
    mysqli_query($config, "DELETE FROM customers where customer_id =$customer_id");

    echo "
    <script>
    alert('data berhasil dihapus!');
    document.location.href = 'customers.php';
    </script>
    ";
    return mysqli_affected_rows($config);
?>