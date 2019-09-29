<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php'); 
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

        <main role="main" class="col-md-2 ml-sm-auto col-lg-10 px-4">
          <?php 
            //mengecek apakah proses update dan delete sukses/gagal
            if (@$_GET['status']!==NULL) {
              $status = $_GET['status'];
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Berhasil Update</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Gagal Update</div>';
              }

            }
           ?>
          <h2 style="margin: 30px 0 30px 0;">Mahasiswa</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>NPM</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Golongan Darah</th>
                  <th>Jenis Kelamin</th>
                  <th>Status</th>
                  <th>Agama</th>
                  <th>Tanggal Lahir</th>
                  <th>Email</th>
                  <th>Nomor Telepon</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  //proses menampilkan data dari database:
                  //siapkan query SQL
                  $query = "SELECT * FROM biodata";
                  $result = mysqli_query(connection(),$query);
                 ?>
                 <?php if(isset($data['nama'])) { ?>
                 
                 <?php }else{ ?>
                  <?php while($data = mysqli_fetch_array($result)): ?>
                  <tr>
                    <td><?php echo $data['NPM'];  ?></td>
                    <td><?php echo $data['Nama'];  ?></td>
                    <td><?php echo $data['Alamat'];  ?></td>
                    <td><?php echo $data['Goldar'];  ?></td>
                    <td><?php echo $data['Jeiskel'];  ?></td>
                    <td><?php echo $data['Status'];  ?></td>
                    <td><?php echo $data['Agama'];  ?></td>
                    <td><?php echo $data['TL'];  ?></td>
                    <td><?php echo $data['Email'];  ?></td>
                    <td><?php echo $data['Telp'];  ?></td>
                    <td>
                      <a href="<?php echo "update.php?npm=".$data['NPM']; ?>" class="btn btn-outline-warning btn-sm"> Update</a>
                      &nbsp;&nbsp;
                      <a href="<?php echo "delete.php?npm=".$data['NPM']; ?>" class="btn btn-outline-danger btn-sm"> Delete</a>
                    </td>
                  </tr>
                 <?php endwhile ?>
                 <?php } ?>
              </tbody>
            </table>
            <a href="<?php echo "form.php"; ?>" class="btn btn-dark btn-sm"> Tambah Data Baru</a>
          </div>
        </main>
      </div>
    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </body>
</html>

