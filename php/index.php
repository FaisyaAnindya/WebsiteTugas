<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
?>
<!DOCTYPE html>
<html>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Karla:wght@500;700;800&display=swap" rel="stylesheet">
  <head>
    <title>Penjualan Buku</title>
    <style type="text/css">
      * {
        font-family: 'Karla', sans-serif;
      }
      h1 {
        text-transform: uppercase;
        color: #000;
      }
      body{
        background-color: #5903e41e;
      }
    table {
      border: solid 1px #5b03e4;
      border-collapse: collapse;
      border-spacing: 0;
      width: 90%;
      margin: 50px auto 10px auto;
    }
    table thead th {
        background-color: #5b03e4;
        border: solid 1px #5b03e4;
        color: #fff;
        padding: 10px;
        text-align: center;
        /* text-shadow: 1px 1px 1px #fff; */
        text-decoration: none;
    }
    table tbody td {
        border: solid 1px #5b03e4;
        background-color: #fff;
        color: #000;
        padding: 10px;
        /* text-shadow: 1px 1px 1px #fff; */
    }
    a {
          background-color: #5b03e4;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
    }
    </style>
  </head>
  <body>
    <center><h1>jajabuku.co</h1><center>
    <a href="tambah_produk.php">+ &nbsp; Jual Buku</a>
    <a href="../index.html">+ &nbsp; Back to Main</a>
    <br/>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Judul Buku</th>
          <th>Penerbit</th>
          <th>ISBN</th>
          <th>Harga Jual</th>
          <th>Cover Buku</th>
          <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
      <?php
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
      $query = "SELECT * FROM produk ORDER BY id ASC";
      $result = mysqli_query($koneksi, $query);
      //mengecek apakah ada error ketika menjalankan query
      if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
      }

      //buat perulangan untuk element tabel dari data mahasiswa
      $no = 1; //variabel untuk membuat nomor urut
      // hasil query akan disimpan dalam variabel $data dalam bentuk array
      // kemudian dicetak dengan perulangan while
      while($row = mysqli_fetch_assoc($result))
      {
      ?>
       <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $row['nama_produk']; ?></td>
          <td><?php echo $row['deskripsi']; ?></td>
          <td><?php echo $row['harga_beli']; ?></td>
          <td>Rp <?php echo $row['harga_jual']; ?></td>
          <td style="text-align: center;"><img src="../gambar/<?php echo $row['gambar_produk']; ?>" style="width: 120px;"></td>
          <td>
              <a href="edit_produk.php?id=<?php echo $row['id']; ?>">Edit</a> |
              <a href="proses_hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
          </td>
      </tr>
         
      <?php
        $no++; //untuk nomor urut terus bertambah 1
      }
      ?>
    </tbody>
    </table>
  </body>
</html>
