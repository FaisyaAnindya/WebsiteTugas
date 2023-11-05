<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
?>
<!DOCTYPE html>
<html>
  <head>
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
      margin-bottom: 15px;
      width: 100%;
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
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Karla:wght@500;700;800&display=swap" rel="stylesheet">
  <body>
      <form method="POST" action="proses_tambah.php" enctype="multipart/form-data" >
      <section class="base">
      <center>
        <h1>Form Data Buku</h1>
      <center>

        <div>
          <label>Nama Buku</label>
          <input type="text" name="nama_produk" autofocus="" required="" />
        </div>
        <div>
          <label>Penerbit</label>
         <input type="text" name="deskripsi" />
        </div>
        <div>
          <label>ISBN</label>
         <input type="text" name="harga_beli" required="" />
        </div>
        <div>
          <label>Harga Jual</label>
         <input type="text" name="harga_jual" required="" />
        </div>
        <div>
          <label>Cover Buku</label>
         <input type="file" name="gambar_produk" required="" />
        </div>
        <div>
         <button type="submit">Ajukan Penjualan</button>
        </div>
        </section>
      </form>
  </body>
</html>
