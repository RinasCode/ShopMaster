<?php
$this->load->view('layout/blank');
?>


<section id="content" class="epi-min-h-content">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-body px-0 pt-0 pb-2">
          <div class="row px-4 gap-2 pt-4">
            <div class="col-12">
              <div class="form-group row align-items-start">
                <div class="col-6">
                  <table class="table table-borderless table-sm">
                    <tbody>
                      <tr>
                        <td class="w-1">
                          <p>Nama Supplier</p>
                        </td>
                        <td class="w-1">:</td>
                        <td>
                          <p><?= $data[0]['nama_supplier'] ?></p>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <p>Alamat</p>
                        </td>
                        <td>:</td>
                        <td>
                          <p><?= $data[0]['alamat_supplier'] ?></p>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <p>No Telp</p>
                        </td>
                        <td>:</td>
                        <td>
                          <p><?= $data[0]['tlp_supplier'] ?></p>
                        </td>
                      </tr>
                    </tbody>
                  </table>

                </div>

                <div class="col">
                  <p class="float-end mb-0 bg-light px-4 py-2 rounded"><?= $data[0]['no_invoice'] ?></p>
                </div>
              </div>
            </div>

            <div class="col-12">
              <div class="table-responsive">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">IMEI</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Barang</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kategori</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 pe-4">Harga</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($data as $d) {
                    ?>
                      <tr>
                        <td>
                          <p><?= $no++; ?></p>
                        </td>
                        <td>
                          <p><?= $d['imei']; ?></p>
                        </td>
                        <td>
                          <p><?= $d['nama_jenis']; ?></p>
                        </td>
                        <td>
                          <p><?= $d['nama_kategori']; ?></p>
                        </td>
                        <td>
                          <p><?= number_format($d['modal'], 0, ',', '.') ?></p>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>

                  <tfoot>
                    <tr>
                      <td colspan="4" class="align-middle">
                        <p class="text-uppercase text-dark font-weight-bolder opacity-7 float-end">Total</p>
                      </td>
                      <td>
                        <p><?= number_format($data[0]['total_pembelian'], 0, ',', '.') ?></p>
                      </td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer d-print-none">
          <div class="flex gap-1 justify-content-end">
            <a href="<?= base_url() ?>" class="btn btn-danger">Kembali</a>
            <button type="button" onclick="print()" class="btn btn-primary">Cetak</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>