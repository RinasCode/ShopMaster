<?php
$this->load->view('layout/master');
?>

<section id="content" class="epi-min-h-content">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header">
          <div class="row justify-content-between">
            <div class="col">
              <h6 class="text-center text-bolder">Pilih Tanggal Laporan</h6>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <form action="" method="post">
            <div class="row px-4 gap-2">
              <div class="col-12">
                <div class="form-group row align-items-center">
                  <div class="col-2 text-end">
                    <label for="nama_member">Tanggal Mulai</label>
                  </div>
                  <div class="col">
                    <input type="date" name="mulai" id="mulai" class="form-control" max='<?= date('Y-m-d') ?>'>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group row align-items-center">
                  <div class="col-2 text-end">
                    <label for="nama_member">Tanggal Akhir</label>
                  </div>
                  <div class="col">
                    <input type="date" name="akhir" id="akhir" class="form-control" max='<?= date('Y-m-d') ?>'>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group row align-items-center">
                  <div class="col-2 text-end">
                    <label for="kategori">Kategori</label>
                  </div>
                  <div class="col">
                    <select name="kategori" id="kategori" class="form-control">
                      <option value="">Semua Kategori</option>
                      <?php foreach ($kategori as $k) : ?>
                        <option value="<?= $k['id_kategori'] ?>"><?= $k['nama_kategori'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary float-end">
                  Pilih
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>