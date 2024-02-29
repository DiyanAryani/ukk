<?php
$id = $_GET['id'];

$result1 = mysqli_query($con, "SELECT * FROM produk WHERE ProdukID=$id");

while($user_data = mysqli_fetch_array($result1))
{
    $name = $user_data['nama_produk'];
	$harga = $user_data['harga'];
    $stok = $user_data['stok'];
    
}
?>

<div class="row well">
    <div class="col-md-12">
        <div class="card well">
            <div class="card-header">
                <form action="" class="form-signin" method="post" enctype="multipart/form-data"> 
                    <h3 class="">Update Barang</h3>
                    <div class="card-body">
                        <form class="pt-3 mt-3" action="" method="post">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <p class="col-form-label" for="">Nama Produk</p>
                                    <input type="text" name="nama_produk" class="form-control" value="<?php echo $name; ?>" id="" placeholder="Enter Nama Barang">
                                </div>
                                <div class="form-group col-sm-6">
                                    <p class="col-form-label" for="">Harga</p>
                                    <input type="number" name="harga" class="form-control" value="<?php echo $harga; ?>" id="" placeholder="Enter Harga">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="foto" class="form-label">Foto<span style="color: red;"> *</span></label>
                                    <input type="file" class="form-control" id="foto" name="foto" required>
                                    <p style="color: red;">Hanya bisa menginput foto dengan ekstensi PNG, JPG, JPEG, SVG</p>
                                </div>
                                <div class="form-group col-sm-6">
                                    <p class="col-form-label" for="">Stok</p>
                                    <input type="number" name="stok" class="form-control" value="<?php echo $stok; ?>" id="" placeholder="Enter Stok">
                                </div>
                            </div>
                            <button name="update" class="btn btn-primary">Tambah Data</button>    
                        </form>
                    </div> 
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include "koneksi/koneksi.php";
if (isset($_POST['update'])) {
  $name = $_POST['nama_produk'];
  $harga = $_POST['harga'];
  $stok = $_POST['stok'];

  $target = "foto/";
  $time = date('dmYHis');
  $type = strtolower(pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION));
  $targetfile = $target . $time . '.' . $type;
  $filename = $time . '.' . $type;
  
  $uploadOk = 1;

  if (move_uploaded_file($_FILES["foto"]["tmp_name"], $targetfile)) {
      $sql = "UPDATE produk SET nama_produk='$name', harga='$harga', stok='$stok', foto='$filename' WHERE ProdukID=$id";
      
      if ($con->query($sql) === TRUE) {
          echo "<script>alert('Berhasil Mengupdate produk');window.location.href='?page=stok';</script>";
          exit();
      } else {
          echo "Error: " . $sql . "<br>" . $koneksi->error;
      }
  } else {
      echo "Maaf, terjadi kesalahan saat mengupload file gambar.";
  }

  $koneksi->close();
}

?>