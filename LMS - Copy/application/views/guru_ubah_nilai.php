<div class="container" id="container">
  <div class="header clearfix">
    <div class="logo">
    <link rel="shortcut icon" href="http://localhost/Push/LMS/asset/img/logo1.png">
    </div>
  </div>
<div class="container">
  <div class="row">
    <div class="col-12 pb-2">
      <h4>Tambah Materi </h4>
    </div>
      <?php
        foreach ($nilai as $data) {
      ?>
      <div class="col-6 pt-4">
      <?php echo form_open_multipart('Guru/prosesUbahNilai'); ?>
      <input type="hidden" name="id" value="<?php echo $data['idNilai']?>">
      <div class="form-group row">
        <label for="Nilai" class="col-sm-3 col-form-label">Nilai</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="nilai" id="Nilai" value="<?php echo $data['nilai']?>" required>
        </div>
      </div>
      </div>
      <div class="col-7 text-right">
        <?php echo form_submit('submit','Ubah','name="ubah" class="btn btn-info"'); ?>
        <a href="<?php echo base_url(); ?>Guru/halamanNilai" class="btn btn-secondary">Kembali</a>
      </div>
    <?php echo form_close();
      }
    ?>
  </div>
</div>
<?php $this->load->view('footer'); ?>