<div class="container" id="container">
  <div class="header clearfix">
    <div class="logo">
    <img src="http://localhost/Push/LMS/asset/img/logo1.png">
    </div>
  </div>
<div class="container">
  <div class="row">
    <div class="col-12 pb-2">
      <h4>Ubah Akun Siswa </h4>
    </div>
    <?php
      foreach ($siswa as $data) {
    ?>

      <div class="col-6 pt-4">
      <?php echo form_open('Admin_learning/prosesUbahPasswordSiswa'); ?>
        <input type="hidden" name="id" value="<?php echo $data['idSiswa']; ?>">
        <div class="form-group row">
          <label for="NIS" class="col-sm-3 col-form-label">NIS</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="NIS" id="NIS" value="<?php echo $data['NIS']; ?>" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="password" class="col-sm-3 col-form-label">Password</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="password" id="password" value="<?php echo $data['password']; ?>" required>
          </div>
        </div>
      </div>
      <div class="col-7 text-right">
        <?php echo form_submit('submit','Ubah',' class="btn btn-info"'); ?>
        <a href="<?php echo base_url(); ?>Admin_learning/halamanAkun" class="btn btn-secondary">Kembali</a>
      </div>
    <?php echo form_close();
      }
    ?>
  </div>
</div>