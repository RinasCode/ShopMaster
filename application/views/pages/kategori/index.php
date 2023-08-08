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
              <h6>Daftar Kategori</h6>
            </div>
            <div class="col-2">
              <a href="<?= base_url('/kategori/tambah') ?>" class="btn btn-primary btn-sm">
                <i class="fa fa-plus"></i>
                <span>Tambah</span>
              </a>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table id="contentTable" class="table align-items-center justify-content-center mb-0 epi-datatable">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2 pe-4" style="width: 1%;"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (count($kategori) > 0) {
                  foreach ($kategori as $k) :
                ?>
                    <tr>
                      <td class="ps-4">
                        <p class="mb-0"><?= $k['nama_kategori'] ?></p>
                      </td>
                      <td class="align-middle pe-4">
                        <a href="<?= base_url('/kategori/edit/' . $k['id_kategori']) ?>">
                          <i class="fa fa-pencil text-xs"></i>
                        </a>
                        <a class="ps-2 cursor-pointer" onclick="deleteKategori(`<?= $k['id_kategori'] ?>`,`<?= $k['nama_kategori'] ?>`)">
                          <i class="fa fa-trash text-xs"></i>
                        </a>
                      </td>
                    </tr>
                  <?php
                  endforeach;
                } else {
                  ?>
                  <tr>
                    <td colspan="2">
                      <p class="text-center">Data Tidak Ditemukan</p>
                    </td>
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

  function deleteKategori(id, name) {
    alertify.confirm(
      'Hapus Kategori',
      'Yakin Menghapus ' + name + ' ?',
      function() {
        try {
          window.location.href = "/point-of-sale/kategori/delete/" + id;
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