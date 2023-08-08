<?php
$this->load->view('layout/master');
?>

<section id="content" class="epi-min-h-content">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <div class="row justify-content-between">
            <div class="col">
              <h6>Daftar Retur</h6>
            </div>
            <div class="col-2">
              <a href="<?= base_url('retur/tambah') ?>" class="btn btn-primary btn-sm">
                <i class="fa fa-plus"></i>
                <span>Tambah</span>
              </a>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table id='contentTable' class="table align-items-center justify-content-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No Retur</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Barang</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">IMEI</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Alasan</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (count($retur) > 0) {
                  foreach ($retur as $r) :
                ?>
                    <tr>
                      <td class="ps-4">
                        <p class="mb-0"><?= $r['no_retur'] ?></p>
                      </td>
                      <td>
                        <p class="mb-0"><?= $r['tgl_retur'] ?></p>
                      </td>
                      <td>
                        <p class="mb-0"><?= $r['nama_jenis'] ?></p>
                      </td>
                      <td>
                        <p class="mb-0"><?= $r['imei'] ?></p>
                      </td>
                      <td>
                        <p class="mb-0"><?= $r['alasan_retur'] ?></p>
                      </td>
                    </tr>
                  <?php
                  endforeach;
                } else {
                  ?>
                  <tr>
                    <td colspan="5">
                      <p class="text-center">Data Tidak Ditemukan</p>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  var table = new DataTable('#contentTable');
</script>