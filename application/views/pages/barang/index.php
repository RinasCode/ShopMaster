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
              <h6>Daftar Barang</h6>
            </div>
            <div class="col-2">
              <a href="<?= base_url('barang/tambah') ?>" class="btn btn-primary btn-sm">
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
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">IMEI</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kategori</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Modal</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Harga Jual</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Supplier</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2 pe-4 w-1"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (count($barang) > 0) {
                  foreach ($barang as $b) :
                ?>
                    <tr>
                      <td class="ps-4">
                        <p class="mb-0"><?= $b['nama_jenis'] ?></p>
                      </td>
                      <td>
                        <p class="mb-0"><?= $b['imei'] ?></p>
                      </td>
                      <td>
                        <p class="mb-0"><?= $b['nama_kategori'] ?></p>
                      </td>
                      <td>
                        <p class="mb-0"><?= number_format($b['modal'], 0, ',', '.') ?></p>
                      </td>
                      <td>
                        <p class="mb-0"><?= number_format($b['harga_jual'], 0, ',', '.') ?></p>
                      </td>
                      <td>
                        <p class="mb-0"><?= $b['status_barang'] == 0 ? 'Stok Toko' : 'Stok Gudang' ?></p>
                      </td>
                      <td>
                        <p class="mb-0"><?= $b['nama_supplier'] ?></p>
                      </td>
                      <td class="align-middle pe-4 w-1">
                        <a href="<?= base_url('/barang/edit/' . $b['id_barang']) ?>">
                          <i class="fa fa-pencil text-xs"></i>
                        </a>
                        <a class="ps-2 cursor-pointer" onclick="deleteBarang(`<?= $b['id_barang'] ?>`,`<?= $b['imei'] ?>`)">
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

  function deleteBarang(id, name) {
    alertify.confirm(
      'Hapus Barang',
      'Yakin Menghapus ' + name + ' ?',
      function() {
        try {
          window.location.href = "/point-of-sale/barang/delete/" + id;
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