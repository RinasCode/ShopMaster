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
              <h6>Daftar Mutasi</h6>
            </div>
            <div class="col-2">
              <a href="<?= base_url('mutasi/tambah') ?>" class="btn btn-primary btn-sm">
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
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Barang</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">IMEI</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Dari</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Ke</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (count($mutasi) > 0) {
                  foreach ($mutasi as $m) :
                ?>
                    <tr>
                      <td class="ps-4">
                        <p class="mb-0"><?= $m['nama_jenis'] ?></p>
                      </td>
                      <td>
                        <p class="mb-0"><?= $m['imei'] ?></p>
                      </td>
                      <td>
                        <p class="mb-0"><?= $m['dari'] == 0 ? 'Stok Toko' : 'Stok Gudang' ?></p>
                      </td>
                      <td>
                        <p class="mb-0"><?= $m['ke'] == 0 ? 'Stok Toko' : 'Stok Gudang'  ?></p>
                      </td>
                      <td>
                        <p class="mb-0"><?= $m['tgl_mutasi'] ?></p>
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
  let table = new DataTable('#contentTable');
</script>