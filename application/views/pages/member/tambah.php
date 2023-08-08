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
              <h6>Tambah Member</h6>
            </div>
          </div>
        </div>
        <div class="card-body px-0 py-4">
          <form action="<?= base_url('member/add') . (isset($params['from']) ? "?from=" . $params['from'] : '') ?>" method="post">
            <div class="row px-4 gap-2">
              <div class="col-12">
                <div class="form-group row align-items-center">
                  <div class="col-2 text-end">
                    <label for="nama_member">Nama Member</label>
                  </div>
                  <div class="col">
                    <input type="text" name="nama_member" id="nama_member" class="form-control">
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group row align-items-center">
                  <div class="col-2 text-end">
                    <label for="no_member">No Member</label>
                  </div>
                  <div class="col">
                    <input type="tel" name="no_member" id="no_member" class="form-control">
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group row align-items-center">
                  <div class="col-2 text-end">
                    <label for="tlp_member">No Telp</label>
                  </div>
                  <div class="col">
                    <input type="tel" name="tlp_member" id="tlp_member" class="form-control">
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group row align-items-center">
                  <div class="col-2 text-end">
                    <label for="alamat_member">Alamat</label>
                  </div>
                  <div class="col">
                    <textarea name="alamat_member" id="alamat_member" class="form-control" rows="5"></textarea>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group row align-items-center">
                  <div class="col-2 text-end">
                    <label for="email_member">Email</label>
                  </div>
                  <div class="col">
                    <input type="email" name="email_member" id="email_member" class="form-control">
                  </div>
                </div>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary float-end">
                  Simpan
                </button>
                <a href="<?= base_url(isset($params['from']) ? $params['from'] : 'member') ?>" class="btn btn-secondary float-end mx-2">
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