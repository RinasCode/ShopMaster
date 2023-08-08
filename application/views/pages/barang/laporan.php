<?php
$this->load->view('layout/master');
?>

<section id="content" class="epi-min-h-content">
  <div class="row d-print-none">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <div class="row justify-content-between">
            <div class="col">
              <h6>
                Laporan Barang <?= date_format(date_create(), 'd/m/Y') ?>
              </h6>
            </div>
            <div class="col-2">
              <form action="<?= base_url('laporan-barang/print') ?>" method="post" target="_blank">
                <input type="hidden" name="kategori" value="<?= $kategori ? $kategori['id_kategori'] : '' ?>">
                <button type="submit" class="btn btn-primary btn-sm <?= count($items) == 0 ? 'd-none' : '' ?>">
                  <span>Cetak</span>
                </button>
              </form>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table id="contentTable" class="table align-items-center justify-content-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">IMEI</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kategori</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Modal</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Harga Jual</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Supplier</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (count($items) > 0) {
                  foreach ($items as $item) :
                ?>
                    <tr>
                      <td class="ps-4">
                        <p class="mb-0"><?= $item['nama_jenis'] ?></p>
                      </td>
                      <td>
                        <p class="mb-0"><?= $item['imei'] ?></p>
                      </td>
                      <td>
                        <p class="mb-0"><?= $item['nama_kategori'] ?></p>
                      </td>
                      <td>
                        <p class="mb-0"><?= number_format($item['modal'], 0, ',', '.') ?></p>
                      </td>
                      <td>
                        <p class="mb-0"><?= number_format($item['harga_jual'], 0, ',', '.') ?></p>
                      </td>
                      <td>
                        <p class="mb-0"><?= $item['status_barang'] == 0 ? 'Stok Toko' : 'Stok Gudang' ?></p>
                      </td>
                      <td>
                        <p class="mb-0"><?= $item['nama_supplier'] ?></p>
                      </td>
                    </tr>
                  <?php
                  endforeach;
                } else {
                  ?>
                  <tr>
                    <td colspan="7">
                      <p class="text-center">Data Tidak Ditemukan</p>
                    </td>
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