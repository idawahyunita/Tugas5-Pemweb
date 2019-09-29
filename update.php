<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php'); 

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['npm'])) {
          //query SQL
          $npm_upd = $_GET['npm'];
          $query = "SELECT * FROM biodata WHERE npm = '$npm_upd'"; 

          //eksekusi query
          $result = mysqli_query(connection(),$query);
      }  
  }

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
      $sql = "UPDATE biodata SET nama='$nama', alamat='$alamat', goldar='$goldar', jeiskel='$jeiskel', status='$status', agama='$agama', tl='$tl', email='$email', telp='$telp' WHERE npm='$npm'";

      //eksekusi query
      $result = mysqli_query(connection(),$sql);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }

      //redirect ke halaman lain
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
                <a class="nav-link active" href="<?php echo "index.php"; ?>">Data Mahasiswa</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "form.php"; ?>">Tambah Data Baru</a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          

          <h2 style="margin: 30px 0 30px 0;">Update Data Mahasiswa</h2>
          <form action="update.php" method="POST">
            <?php while($data = mysqli_fetch_array($result)): ?>
            <div class="form-group">
              <label>NPM</label>
              <input type="text" class="form-control" placeholder="NPM mahasiswa" name="npm" value="<?php echo $data['NPM'];  ?>" required="required" readonly>
            </div>
            <div class="form-group">
              <label>Nama</label>
              <input type="text" class="form-control" placeholder="Nama mahasiswa" name="nama" value="<?php echo $data['Nama'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <textarea class="form-control" name="alamat" required="required"><?php echo $data['Alamat'];  ?></textarea>
            </div>
            <div class="form-group">
              <label>Golongan Darah</label>
              <input type="text" class="form-control" placeholder="Golongan Darah" name="goldar" value="<?php echo $data['Goldar'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>Jenis Kelamin</label>
              <select class="custom-select" name="jeiskel" required="required">
                <option value="">Pilih Salah Satu</option>
                <option value="L" <?php echo $data['Jeiskel']=='L' ? "selected" : "" ?>>Laki-Laki</option>
                <option value="P" <?php echo $data['Jeiskel']=='P' ? "selected" : "" ?>>Perempuan</option>
              </select>
              </div>
            <div class="form-group">
              <label>Status</label>
              <select class="custom-select" name="status" required="required">
                <option value="">Pilih Salah Satu</option>
                <option value="Menikah" <?php echo $data['Status']=='Menikah' ? "selected" : "" ?>>Menikah</option>
                <option value="Belum Menikah" <?php echo $data['Status']=='Belum Menikah' ? "selected" : "" ?>>Belum Menikah</option>
                <option value="Janda" <?php echo $data['Status']=='Janda' ? "selected" : "" ?>>Janda</option>
                <option value="Duda" <?php echo $data['Status']=='Duda' ? "selected" : "" ?>>Duda</option>
              </select>
              </div>
            <div class="form-group">
              <label>Agama</label>
              <input type="text" class="form-control" placeholder="Agama mahasiswa" name="agama" value="<?php echo $data['Agama'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>Tanggal Lahir</label>
              <input type="text" class="form-control" placeholder="Tanggal Lahir Mahasiswa" name="tl" value="<?php echo $data['TL'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="text" class="form-control" placeholder="Email mahasiswa" name="email" value="<?php echo $data['Email'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>Telp</label>
              <input type="text" class="form-control" placeholder="Nomor mahasiswa" name="telp" value="<?php echo $data['Telp'];  ?>" required="required">
            </div>
            <?php endwhile; ?>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </main>
      </div>
    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </body>
</html>