<div class="container" id="container">
  <div class="header clearfix">
    <div class="logo">
    <img src="http://localhost/Push/LMS/asset/img/logo1.png">
    </div>
  </div>
<div class="container" id="menu-top">
  <div class="row">
    <div class="col-md-6">
      <h4>Data Akun Guru</h4>
      <div class="table-responsive pt-3">
        <table id="table" class="table table-striped">
          <thead>
            <tr>
              <th>NIP</th>
              <th>Password</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php

            if($guru){
              foreach ($guru as $dataGuru) {
            ?>
            <tr>
              <td><?php echo $dataGuru['NIP'] ?></td>
              <td><?php echo $dataGuru['password'] ?></td>
              <td id="body-table"><a class="btn btn-info btn-sm" href="halamanUbahPasswordGuru/<?php echo $dataGuru['idGuru']; ?>">Ubah</a>
            </tr>
            <?php
              }
            } ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-md-6">
      <h4>Data Akun Siswa</h4>
      <div class="table-responsive pt-3">
        <table id="table" class="table table-striped">
          <thead>
            <tr>
              <th>NIS</th>
              <th>Password</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php

            if($siswa){
              foreach ($siswa as $dataSiswa) {
            ?>
            <tr>
              <td><?php echo $dataSiswa['NIS'] ?></td>
              <td><?php echo $dataSiswa['password'] ?></td>
              <td id="body-table"><a class="btn btn-info btn-sm" href="halamanUbahPasswordSiswa/<?php echo $dataSiswa['idSiswa']; ?>">Ubah</a>
            </tr>
            <?php
              }
            } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>