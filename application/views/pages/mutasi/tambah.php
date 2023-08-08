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
              <h6>Mutasi Barang</h6>
            </div>
          </div>
        </div>
        <div class="card-body px-0 py-4">
          <form action="<?= base_url('mutasi/add'); ?>" method="post">
            <div class="row px-4 gap-2">
              <div class="col-12">
                <div class="form-group row align-items-center">
                  <div class="col-2 text-end">
                    <label for="imei">IMEI</label>
                  </div>
                  <div class="col">
                    <select name="id_barang" id="id_barang" class="form-control" required>
                      <option selected disabled></option>
                      <?php foreach ($barang as $b) : ?>
                        <option value="<?= $b['id_barang'] ?>" data-nama="<?= $b['nama_jenis'] ?>" data-kategori="<?= $b['nama_kategori'] ?>" data-supplier="<?= $b['nama_supplier'] ?>" data-modal="<?= $b['modal'] ?>" data-harga="<?= $b['harga_jual'] ?>" data-status="<?= $b['status_barang'] ?>">
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
                    <label for="status_barang">Status</label>
                  </div>
                  <div class="col">
                    <input type="hidden" name="dari" id="dari">
                    <select name="ke" id="ke" class="form-control" required disabled>
                      <option selected disabled></option>
                      <option value="0">Stok Toko</option>
                      <option value="1">Stok Gudang</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <button type="submit" id="submit" class="btn btn-primary float-end" disabled>
                  Simpan
                </button>
                <a href="<?= base_url('mutasi') ?>" class="btn btn-secondary float-end mx-2">
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

    $('#ke').change((e) => {
      const dari = $('#dari').val()
      const ke = e.target.value;

      if (dari == ke) {
        $('#submit').prop('disabled', true)
      } else {
        if (dari) {
          $('#submit').prop('disabled', false)
        }
      }
    })

    $('#id_barang').change((e) => {
      const nama = $('#id_barang option:selected').attr('data-nama')
      const kategori = $('#id_barang option:selected').attr('data-kategori')
      const supplier = $('#id_barang option:selected').attr('data-supplier')
      const modal = $('#id_barang option:selected').attr('data-modal')
      const harga = $('#id_barang option:selected').attr('data-harga')
      const status = $('#id_barang option:selected').attr('data-status')

      $('#nama').val(nama)
      $('#kategori').val(kategori)
      $('#supplier').val(supplier)
      $('#modal').val(modal)
      $('#harga').val(harga)
      $('#dari').val(status)
      $('#ke').val(status).change()

      $('#ke').prop('disabled', false)
    })
  });
</script>