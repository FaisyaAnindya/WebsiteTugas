<?php
  // memanggil file koneksi.php untuk membuat koneksi
include 'koneksi.php';

  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM produk WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
      // apabila data tidak ada pada database maka akan dijalankan perintah ini
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='index.php';</script>";
       }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='index.php';</script>";
  }         
  ?>
<!DOCTYPE html>
<html>
  <head>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Karla:wght@500;700;800&display=swap" rel="stylesheet">
    <title>jajabuku.co</title>
    <style type="text/css">
      * {
        font-family: 'Karla', sans-serif;
      }
      h1 {
        text-transform: uppercase;
        color: #000;
      }
      span{
        color: #5b03e4;
      }
      body{
        background-color: #5903e41e;
      }
    button {
          background-color: #5b03e4;
          display: block;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
          border: 0px;
          border-radius: 8px;
          margin-top: 20px;
          margin-bottom: 20px
    }
    label {
      margin-top: 10px;
      float: left;
      text-align: left;
      width: 100%;
      background: #fff;
    }
    input {
      padding: 6px;
      width: 100%;
      margin-bottom: 15px;
      box-sizing: border-box;
      background: #fff;
      border: 2px solid #ccc;
      outline-color: #5b03e4;
    }
    div {
      width: 100%;
      height: auto;
    }
    .base {
      width: 400px;
      height: auto;
      padding: 20px;
      margin-left: auto;
      margin-right: auto;
      background: #fff;
      border-radius: 15px;
    }
    </style>
  </head>
  <body>
      <form method="POST" action="proses_edit.php" enctype="multipart/form-data" >
        
      <section class="base">
        <!-- menampung nilai id produk yang akan di edit -->
        <center>
        <h1>Edit Data Buku <span><?php echo $data['nama_produk']; ?></span> </h1>
      <center>

        <input name="id" value="<?php echo $data['id']; ?>"  hidden />
        <div>
          <label>Judul Buku</label>
          <input type="text" name="nama_produk" value="<?php echo $data['nama_produk']; ?>" autofocus="" required="" />
        </div>
        <div>
          <label>Penerbit</label>
         <input type="text" name="deskripsi" value="<?php echo $data['deskripsi']; ?>" />
        </div>
        <div>
          <label>ISBN</label>
         <input type="text" name="harga_beli" required=""value="<?php echo $data['harga_beli']; ?>" />
        </div>
        <div>
          <label>Harga Jual</label>
         <input type="text" name="harga_jual" required="" value="<?php echo $data['harga_jual']; ?>"/>
        </div>
        <div>
          <label>Cover Buku</label>
          <img src="../gambar/<?php echo $data['gambar_produk']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
          <input type="file" name="gambar_produk" />
          <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak merubah cover buku</i>
        </div>
        <div>
         <button type="submit">Simpan Perubahan</button>
        </div>
        </section>
      </form>
  </body>
</html>
