<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php'); 

  $status = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $npm = $_POST['npm'];
      $nama = $_POST['nama'];
      $alamat = $_POST['alamat'];
      $goldar = $_POST['goldar'];
      $jeiskel = $_POST['jeiskel'];
      $status = $_POST['status'];
      $agama = $_POST['agama'];
      $tl = $_POST['tl'];
      $email = $_POST['email'];
      $telp = $_POST['telp'];
      //query SQL
      $query = "INSERT INTO biodata (npm, nama, alamat, goldar, jeiskel, status, agama, tl, email, telp) VALUES('$npm','$nama','$alamat','$goldar','$jeiskel', '$status','$agama','$tl','$email','$telp')"; 

      //eksekusi query
      $result = mysqli_query(connection(),$query);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }

      header('Location: index.php?status='.$status);
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Sistem Informasi - Sunu</title>
    <!-- load css boostrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Tugas 5 Pemrograman Web</a>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column" style="margin-top:100px;">
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "index.php"; ?>">Data Mahasiswa</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo "form.php"; ?>">Tambah Data Baru</a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          
          <?php 
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Berhasil Disimpan</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Gagal</div>';
              }
           ?>

          <h2 style="margin: 30px 0 30px 0;">Form Mahasiswa</h2>
          <form action="form.php" method="POST">
            
            <div class="form-group">
              <label>NPM</label>
              <input type="text" class="form-control" placeholder="NPM mahasiswa" name="npm" required="required">
            </div>
            <div class="form-group">
              <label>Nama</label>
              <input type="text" class="form-control" placeholder="Nama mahasiswa" name="nama" required="required">
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <textarea class="form-control" placeholder="Alamat Mahasiswa" name="alamat" required="required"></textarea>
            </div>
            <div class="form-group">
              <label>Golongan Darah</label>
              <input type="text" class="form-control" placeholder="Golongan Darah" name="goldar" required="required">
            </div>
            <div class="form-group">
              <label>Jenis Kelamin</label>
              <select class="custom-select" name="jeiskel" required="required">
                <option value="">Pilih Salah Satu</option>
                <option value="L">Laki-Laki</option>
                <option value="P">Perempuan</option>
              </select>
            </div>
            <div class="form-group">
              <label>Status</label>
              <select class="custom-select" name="status" required="required">
                <option value="">Pilih Salah Satu</option>
                <option value="Menikah">Menikah</option>
                <option value="Belum Menikah">Belum Menikah</option>
                <option value="Duda">Duda</option>
                <option value="Janda">Janda</option>
              </select>
            </div>
            <div class="form-group">
              <label>Agama</label>
              <input type="text" class="form-control" placeholder="Agama Mahasiswa" name="agama" required="required">
            </div>
            <div class="form-group">
              <label>Tanggal Lahir</label>
              <input type="text" class="form-control" placeholder="DD-MM-YYYY" name="tl" required="required">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="text" class="form-control" placeholder="example@gmail.com" name="email" required="required">
            </div>
            <div class="form-group">
              <label>Telp</label>
              <input type="text" class="form-control" placeholder="08XXXXXXXXXX" name="telp" required="required">
            </div>
                        
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </main>
      </div>
    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </body>
</html>