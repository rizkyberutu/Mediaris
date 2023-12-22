<?php
  $item_id = $_GET["item_id"];
  include '../includes/config.php';
    mysqli_query($config, "DELETE FROM items where item_id =$item_id");

    echo "
    <script>
    alert('data berhasil dihapus!');
    document.location.href = 'items.php';
    </script>
    ";
    return mysqli_affected_rows($config);
?>