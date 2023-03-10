<div class="container" id="container">
  <div class="header clearfix">
    <div class="logo">
    <link rel="shortcut icon" href="http://localhost/Push/LMS/asset/img/logo1.png">
    </div>
  </div>
<div class="container" id="menu-top">
  <div class="row">
    <h4>Data Nilai</h4>
  </div>
</div>
<div class="container header">
  <div class="row">
      <div class="col-6 pt-4">
        <?php
          foreach ($siswa as $dataSiswa) {
        ?>
        <div class="form-group row">
          <label for="NIS" class="col-sm-3 col-form-label">NIS</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="NIS" id="NIS" value="<?php echo $dataSiswa['NIS']?>" disabled required>
          </div>
        </div>
        <div class="form-group row">
          <label for="Nama" class="col-sm-3 col-form-label">Nama Siswa</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="nama" id="Nama" value="<?php echo $dataSiswa['namaSiswa']?>" disabled required>
          </div>
        </div>
      </div>
      <div class="col-6 pt-4">
        <div class="form-group row">
          <label for="kelas" class="col-sm-3 col-form-label">Kelas</label>
          <div class="col-sm-9">
            <?php
              foreach ($kelas as $dataKelas) {
                if($dataKelas['idKelas'] == $dataSiswa['idKelas']){
                  $ampuKelas = $dataKelas['idKelas'];
                  echo "<input type='text' class='form-control' name='kelas' id='kelas' value='$dataKelas[namaKelas]' disabled required>";
                }
              }
            ?>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>
<div class="container header">
  <div class="row">
    <div class="col-12">
      <div class="header">
        <div class="col-4">
          <div class="form-group row">
            <label for="idKelas" class="col-sm-5 col-form-label">Mata Pelajaran</label>
            <div class="col-sm-7">
              <select class="form-control" name="idKelas" id="idKelas" required>
                <option value="0" rel='0'> -- Pilih Kelas -- </option>
                <?php
                  foreach ($kontrak as $dataKontrak) {
                    if($dataKontrak['idKelas'] == $ampuKelas){
                      foreach ($mapel as $dataMapel) {
                        if($dataMapel['idMapel'] == $dataKontrak['idMapel']){
                          echo "<option value='$dataMapel[idMapel]' rel='$dataMapel[idMapel]'>$dataMapel[namaMapel]</option>";
                        }
                      }
                    }
                  }
                ?>
              </select>
            </div>
          </div>
        </div>
        <h5>Mata Pelajaran : Keamanan Informasi | Name Guru : Nama Guru </h5>
      </div>
    </div>
    <div class="col-12">
      <h5>Tugas Harian</h5>
    </div>
    <div class="col-12">
      <div class="table-responsive pt-3">
        <table id="tableHarian"  class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>No</th>
              <th>Mapel</th>
              <th>Nilai</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if($harian){
              $i = 1;
              foreach ($harian as $dataHarian) {
                ?>
                <tr>
                  <td><?php echo $i++ ?></td>
                  <td><?php echo $dataHarian['namaMapel'] ?></td>
                  <td><?php echo $dataHarian['nilai'] ?></td>
                </tr>
                <?php
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<div class="container header">
  <div class="row">
    <div class="col-12">
      <h5>Ulangan</h5>
    </div>
    <div class="col-12">
      <div class="table-responsive pt-3">
        <table id="tableUlangan"  class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>No</th>
              <th>Mapel</th>
              <th>Nilai</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if($ulangan){
              $i = 1;
              foreach ($ulangan as $dataUlangan) {
                ?>
                <tr>
                  <td><?php echo $i++ ?></td>
                  <td><?php echo $dataUlangan['namaMapel'] ?></td>
                  <td><?php echo $dataUlangan['nilai'] ?></td>
                </tr>
                <?php
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<div class="container header">
  <div class="row">
    <div class="col-12">
      <h5>UAS</h5>
    </div>
    <div class="col-12">
      <div class="table-responsive pt-3">
        <table id="tableUAS"  class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>No</th>
              <th>Mapel</th>
              <th>Nilai</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if($uas){
              $i = 1;
              foreach ($uas as $dataUas) {
                ?>
                <tr>
                  <td><?php echo $i++ ?></td>
                  <td><?php echo $dataUas['namaMapel'] ?></td>
                  <td><?php echo $dataUas['nilai'] ?></td>
                </tr>
                <?php
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('footer_table'); ?>
