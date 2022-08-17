 <?php
    // memanggil file config.php untuk membuat koneksi
    include '../config.php';

    // mengecek apakah di url ada nilai GET id
    if (isset($_GET['dokumen_id'])) {
        // ambil nilai id dari url dan disimpan dalam variabel $id
        $id = ($_GET["dokumen_id"]);

        // menampilkan data dari database yang mempunyai id=$id
        $query = "SELECT * FROM dokumen WHERE dokumen_id='$id'";
        $result = mysqli_query($db, $query);
        // jika data gagal diambil maka akan tampil error berikut
        if (!$result) {
            die("Query Error: " . mysqli_errno($db) .
                " - " . mysqli_error($db));
        }
        // mengambil data dari database
        $data = mysqli_fetch_assoc($result);
        // apabila data tidak ada pada database maka akan dijalankan perintah ini
        if (!count($data)) {
            echo "<script>alert('Data tidak ditemukan');window.location='index.php';</script>";
        }
    } else {
        // apabila tidak ada data GET id pada akan di redirect ke index.php
        echo "<script>alert('Masukkan data id.');window.location='index.php';</script>";
    }
    ?>
 <!DOCTYPE html>
 <html>

 <head>
     <title>CRUD </title>
 </head>

 <body>
     <center>
         <h1>Edit <?php echo $data['dokumen_jenis']; ?></h1>
         <center>
             <form method="POST" action="proses_edit.php" enctype="multipart/form-data">
                 <section class="base">
                     <!-- menampung nilai id produk yang akan di edit -->
                     <input name="dokumen_id" value="<?php echo $data['dokumen_id']; ?>" hidden />
                     <div>
                         <label>Jenis Dokumen</label>
                         <input type="text" name="dokumen_jenis" value="<?php echo $data['dokumen_jenis']; ?>" autofocus="" required="" />
                     </div>
                     <div>
                         <label>Judul Dokumen</label>
                         <input type="text" name="dokumen_judul" value="<?php echo $data['dokumen_judul']; ?>" />
                     </div>
                     <div>
                         <label>Tahun Terbit</label>
                         <input type="text" name="dokumen_tahun" required="" value="<?php echo $data['dokumen_tahun']; ?>" />
                     </div>
                     <div>
                         <label>Penulis</label>
                         <input type="text" name="dokumen_penulis" required="" value="<?php echo $data['dokumen_penulis']; ?>" />
                     </div>
                     <div>
                         <label>Jumlah Halaman</label>
                         <input type="text" name="dokumen_halaman" required="" value="<?php echo $data['dokumen_halaman']; ?>" />
                     </div>
                     <div>
                         <button type="submit">Simpan Perubahan</button>
                     </div>
                 </section>
             </form>
 </body>

 </html>
 
