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
              <h6>Daftar Supplier</h6>
            </div>
            <div class="col-2">
              <a href="<?= base_url('supplier/tambah') ?>" class="btn btn-primary btn-sm">
                <i class="fa fa-plus"></i>
                <span>Tambah</span>
              </a>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table id="contentTable" class="table align-items-center justify-content-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No Telp</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No Rekening</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Bank</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Atas Nama Rekening</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Alamat</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2 pe-4 w-1"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (count($supplier) > 0) {
                  foreach ($supplier as $s) :
                ?>
                    <tr>
                      <td class="ps-4">
                        <p class="mb-0"><?= $s['nama_supplier'] ?></p>
                      </td>
                      <td>
                        <p class="mb-0"><?= $s['tlp_supplier'] ?></p>
                      </td>
                      <td>
                        <p class="mb-0"><?= $s['rek_supplier'] ?></p>
                      </td>
                      <td>
                        <p class="mb-0"><?= $s['bank_supplier'] ?></p>
                      </td>
                      <td>
                        <p class="mb-0"><?= $s['an_rek_supplier'] ?></p>
                      </td>
                      <td>
                        <p class="mb-0"><?= $s['alamat_supplier'] ?></p>
                      </td>
                      <td>
                        <p class="mb-0"><?= $s['email_supplier'] ?></p>
                      </td>
                      <td class="align-middle pe-4">
                        <a href="<?= base_url('/supplier/edit/' . $s['id_supplier']) ?>">
                          <i class="fa fa-pencil text-xs"></i>
                        </a>
                        <a class="ps-2 cursor-pointer" onclick="deleteSupplier(`<?= $s['id_supplier'] ?>`,`<?= $s['nama_supplier'] ?>`)">
                          <i class="fa fa-trash text-xs"></i>
                        </a>
                      </td>
                    </tr>
                  <?php
                  endforeach;
                } else {
                  ?>
                  <tr>
                    <td colspan="8">
                      <p class="text-center">Data Tidak Ditemukan</p>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
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

  function deleteSupplier(id, name) {
    alertify.confirm(
      'Hapus Supplier',
      'Yakin Menghapus ' + name + ' ?',
      function() {
        try {
          window.location.href = "/point-of-sale/supplier/delete/" + id;
        } catch (err) {
          console.log(err);
          swal({
            title: 'Error',
            text: err,
            icon: 'error'
          })
        }
      },
      function() {
        alertify.error('Batal')
      });
  }
</script>