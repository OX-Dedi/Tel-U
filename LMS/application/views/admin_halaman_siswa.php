<div class="container" id="container">
  <div class="header clearfix">
    <div class="logo">
    <img src="http://localhost/Push/LMS/asset/img/logo1.png">
    </div>
  </div>
<div class="container" id="menu-top">
  <div class="row">
    <h4>Data Siswa</h4>
  </div>
</div>
<div class="container header">
  <div class="row">
      <div class="col-6 pt-4">
      <?php echo form_open('Admin_learning/prosesTambahSiswa'); ?>
        <div class="form-group row">
          <label for="NIS" class="col-sm-3 col-form-label">NIS</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="NIS" id="NIS" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="idKelas" class="col-sm-3 col-form-label">Kelas</label>
          <div class="col-sm-9">
            <select class="form-control" name="idKelas" id="idKelas" required>
              <?php
                foreach ($kelas as $data) {
                  extract($data);
                  echo "<option value='$idKelas'>$namaKelas</option>";
                }
              ?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="nama" class="col-sm-3 col-form-label">Nama</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="nama" id="nama" required>
          </div>
        </div>
      </div>
      <div class="col-6 pt-4">
        <div class="form-group row">
          <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
          <div class="col-sm-9">
            <textarea name="alamat" class="form-control"rows="3" required></textarea>
          </div>
        </div>

      </div>
      <div class="col-12 text-right">
        <?= form_submit('submit','Tambah','name="tambah" class="btn btn-success"'); ?>
        <a href="<?php echo base_url(); ?>Admin_learning/halamanSiswa" class="btn btn-secondary">Kembali</a>
      </div>
    <?php echo form_close(); ?>
  </div>
</div>
<div class="row">
  <div class="table-responsive pt-3">
    <table id="table"  class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>No</th>
          <th>Kelas</th>
          <th>NIS</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
          if($siswa){
            $i = 1;
            foreach ($siswa as $dataSiswa) {
        ?>
        <tr>
          <td><?php echo $i++ ?></td>
          <td><?php echo $dataSiswa['namaKelas'] ?></td>
          <td><?php echo $dataSiswa['NIS'] ?></td>
          <td><?php echo $dataSiswa['namaSiswa'] ?></td>
          <td><?php echo $dataSiswa['alamatSiswa'] ?></td>
          <td id="body-table"><a class="btn btn-info btn-sm" href="halamanUbahSiswa/<?php echo $dataSiswa['idSiswa']; ?>">Ubah</a> <a class="btn btn-danger btn-sm" href="hapusSiswa/<?php echo $dataSiswa['idSiswa']; ?>">Hapus</a>
        </tr>
        <?php
            }
          }
        ?>
      </tbody>
    </table>
  </div>
</div>