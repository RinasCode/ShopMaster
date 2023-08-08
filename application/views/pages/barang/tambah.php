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
              <h6>Tambah Barang</h6>
            </div>
          </div>
        </div>
        <div class="card-body px-0 py-4">
          <form action="<?= base_url('barang/add') ?>" method="post">
            <div class="row px-4 gap-2">
              <div class="col-12">
                <div class="form-group row align-items-center">
                  <div class="col-2 text-end">
                    <label for="id_jenis">Nama Barang</label>
                  </div>
                  <div class="col">
                    <div class="w-100">
                      <select name="id_jenis" id="id_jenis" class="form-control" required>
                        <option selected disabled></option>
                        <?php foreach ($jenis as $j) : ?>
                          <option value="<?= $j['id_jenis'] ?>"><?= $j['nama_jenis'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group row align-items-center">
                  <div class="col-2 text-end">
                    <label for="imei">IMEI</label>
                  </div>
                  <div class="col">
                    <input type="tel" name="imei" id="imei" class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group row align-items-center">
                  <div class="col-2 text-end">
                    <label for="id_kategori">Kategori</label>
                  </div>
                  <div class="col">
                    <select name="id_kategori" id="id_kategori" class="form-control" required>
                      <option selected disabled></option>
                      <?php foreach ($kategori as $k) : ?>
                        <option value="<?= $k['id_kategori'] ?>"><?= $k['nama_kategori'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group row align-items-center">
                  <div class="col-2 text-end">
                    <label for="id_supplier">Supplier</label>
                  </div>
                  <div class="col">
                    <select name="id_supplier" id="id_supplier" class="form-control" required>
                      <option selected disabled></option>
                      <?php foreach ($supplier as $s) : ?>
                        <option value="<?= $s['id_supplier'] ?>"><?= $s['nama_supplier'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group row align-items-center">
                  <div class="col-2 text-end">
                    <label for="modal">Modal</label>
                  </div>
                  <div class="col">
                    <input type="number" name="modal" id="modal" class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group row align-items-center">
                  <div class="col-2 text-end">
                    <label for="harga_jual">Harga Jual</label>
                  </div>
                  <div class="col">
                    <input type="number" name="harga_jual" id="harga_jual" class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group row align-items-center">
                  <div class="col-2 text-end">
                    <label for="status_barang">Status</label>
                  </div>
                  <div class="col">
                    <select name="status_barang" id="status_barang" class="form-control" required>
                      <option value="0">Stok Toko</option>
                      <option value="1">Stok Gudang</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary float-end">
                  Simpan
                </button>
                <a href="<?= base_url('barang') ?>" class="btn btn-secondary float-end mx-2">
                  Kembali
                </a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  $(document).ready(function() {
    $("#id_jenis").select2({
      tags: true,
    });
  });
</script>