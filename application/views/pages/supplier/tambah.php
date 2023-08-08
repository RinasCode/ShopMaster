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
              <h6>Tambah Supplier</h6>
            </div>
          </div>
        </div>
        <div class="card-body px-0 py-4">
          <form action="<?= base_url('supplier/add') . (isset($params['from']) ? "?from=" . $params['from'] : '') ?>" method="post">
            <div class="row px-4 gap-2">
              <div class="col-12">
                <div class="form-group row align-items-center">
                  <div class="col-2 text-end">
                    <label for="nama_supplier">Nama Supplier</label>
                  </div>
                  <div class="col">
                    <input type="text" name="nama_supplier" id="nama_supplier" class="form-control">
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group row align-items-center">
                  <div class="col-2 text-end">
                    <label for="tlp_supplier">No Telp</label>
                  </div>
                  <div class="col">
                    <input type="tel" name="tlp_supplier" id="tlp_supplier" class="form-control">
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group row align-items-center">
                  <div class="col-2 text-end">
                    <label for="rek_supplier">No Rekening</label>
                  </div>
                  <div class="col">
                    <input type="tel" name="rek_supplier" id="rek_supplier" class="form-control">
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group row align-items-center">
                  <div class="col-2 text-end">
                    <label for="bank_supplier">Bank</label>
                  </div>
                  <div class="col">
                    <input type="text" name="bank_supplier" id="bank_supplier" class="form-control">
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group row align-items-center">
                  <div class="col-2 text-end">
                    <label for="an_rek_supplier">A/N Rekening</label>
                  </div>
                  <div class="col">
                    <input type="text" name="an_rek_supplier" id="an_rek_supplier" class="form-control">
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group row align-items-center">
                  <div class="col-2 text-end">
                    <label for="alamat_supplier">Alamat</label>
                  </div>
                  <div class="col">
                    <textarea name="alamat_supplier" id="alamat_supplier" class="form-control" rows="5"></textarea>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group row align-items-center">
                  <div class="col-2 text-end">
                    <label for="email_supplier">Email</label>
                  </div>
                  <div class="col">
                    <input type="email" name="email_supplier" id="email_supplier" class="form-control">
                  </div>
                </div>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary float-end">
                  Simpan
                </button>
                <a href="<?= base_url(isset($params['from']) ? $params['from'] : 'supplier') ?>" class="btn btn-secondary float-end mx-2">
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