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
              <h6>Tambah Kategori</h6>
            </div>
          </div>
        </div>
        <div class="card-body px-0 py-4">
          <form action="<?= base_url('kategori/add') ?>" method="post">
            <div class="row px-4 gap-2">
              <div class="col-12">
                <div class="form-group row align-items-center">
                  <div class="col-2 text-end">
                    <label for="nama_kategori">Nama Kategori</label>
                  </div>
                  <div class="col">
                    <input type="text" name="nama_kategori" id="nama_kategori" class="form-control">
                  </div>
                </div>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary float-end">
                  Simpan
                </button>
                <a href="<?= base_url('kategori') ?>" class="btn btn-secondary float-end mx-2">
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