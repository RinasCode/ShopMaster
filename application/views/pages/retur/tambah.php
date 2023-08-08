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
              <h6>Retur Barang</h6>
            </div>
          </div>
        </div>
        <div class="card-body px-0 py-4">
          <form action="<?= base_url('retur/add'); ?>" method="post">
            <div class="row px-4 gap-2">
              <div class="col-12">
                <div class="form-group row align-items-center">
                  <div class="col-2 text-end">
                    <label for="kategori">No Retur</label>
                  </div>
                  <div class="col">
                    <input type="text" name="no_retur" id="no_retur" class="form-control" value="<?= $no_retur ?>" readonly>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group row align-items-center">
                  <div class="col-2 text-end">
                    <label for="imei">IMEI</label>
                  </div>
                  <div class="col">
                    <select name="id_barang" id="id_barang" class="form-control" required>
                      <option selected disabled></option>
                      <?php foreach ($barang as $b) : ?>
                        <option value="<?= $b['id_barang'] ?>" data-nama="<?= $b['nama_jenis'] ?>" data-kategori="<?= $b['nama_kategori'] ?>" data-supplier="<?= $b['nama_supplier'] ?>" data-modal="<?= $b['modal'] ?>" data-harga="<?= $b['harga_jual'] ?>">
                          <?= $b['imei'] ?>
                        </option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group row align-items-center">
                  <div class="col-2 text-end">
                    <label for="nama">Nama Barang</label>
                  </div>
                  <div class="col">
                    <div class="w-100">
                      <input type="text" name="nama" id="nama" class="form-control" readonly>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group row align-items-center">
                  <div class="col-2 text-end">
                    <label for="kategori">Kategori</label>
                  </div>
                  <div class="col">
                    <input type="text" name="kategori" id="kategori" class="form-control" readonly>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group row align-items-center">
                  <div class="col-2 text-end">
                    <label for="supplier">Supplier</label>
                  </div>
                  <div class="col">
                    <input type="text" name="supplier" id="supplier" class="form-control" readonly>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group row align-items-center">
                  <div class="col-2 text-end">
                    <label for="modal">Modal</label>
                  </div>
                  <div class="col">
                    <input type="number" name="modal" id="modal" class="form-control" readonly>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group row align-items-center">
                  <div class="col-2 text-end">
                    <label for="harga">Harga Jual</label>
                  </div>
                  <div class="col">
                    <input type="number" name="harga" id="harga" class="form-control" readonly>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group row align-items-center">
                  <div class="col-2 text-end">
                    <label for="status_barang">Alasan Retur</label>
                  </div>
                  <div class="col">
                    <textarea name="alasan_retur" id="alasan_retur" class="form-control" rows="5" required></textarea>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <button type="submit" id="submit" class="btn btn-primary float-end">
                  Simpan
                </button>
                <a href="<?= base_url('retur') ?>" class="btn btn-secondary float-end mx-2">
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
    $("#id_barang").select2();

    $('#id_barang').change((e) => {
      const nama = $('#id_barang option:selected').attr('data-nama')
      const kategori = $('#id_barang option:selected').attr('data-kategori')
      const supplier = $('#id_barang option:selected').attr('data-supplier')
      const modal = $('#id_barang option:selected').attr('data-modal')
      const harga = $('#id_barang option:selected').attr('data-harga')

      $('#nama').val(nama)
      $('#kategori').val(kategori)
      $('#supplier').val(supplier)
      $('#modal').val(modal)
      $('#harga').val(harga)
    })
  });
</script>