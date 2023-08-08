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
              <h6>Daftar Member</h6>
            </div>
            <div class="col-2">
              <a href="<?= base_url('member/tambah') ?>" class="btn btn-primary btn-sm">
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
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No Member</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No Telp</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Alamat</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2 pe-4 w-1"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (count($member) > 0) {
                  foreach ($member as $m) :
                ?>
                    <tr>
                      <td class="ps-4">
                        <p class="mb-0"><?= $m['nama_member'] ?></p>
                      </td>
                      <td>
                        <p class="mb-0"><?= $m['no_member'] ?></p>
                      </td>
                      <td>
                        <p class="mb-0"><?= $m['tlp_member'] ?></p>
                      </td>
                      <td>
                        <p class="mb-0"><?= $m['alamat_member'] ?></p>
                      </td>
                      <td>
                        <p class="mb-0"><?= $m['email_member'] ?></p>
                      </td>
                      <td class="align-middle pe-4">
                        <a href="<?= base_url('/member/edit/' . $m['id_member']) ?>">
                          <i class="fa fa-pencil text-xs"></i>
                        </a>
                        <a class="ps-2 cursor-pointer" onclick="deleteMember(`<?= $m['id_member'] ?>`,`<?= $m['nama_member'] ?>`)">
                          <i class="fa fa-trash text-xs"></i>
                        </a>
                      </td>
                    </tr>
                  <?php
                  endforeach;
                } else {
                  ?>
                  <tr>
                    <td colspan="6">
                      <p class="text-center">Data Tidak Ditemukan</p>
                    </td>
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

  function deleteMember(id, name) {
    alertify.confirm(
      'Hapus Member',
      'Yakin Menghapus ' + name + ' ?',
      function() {
        try {
          window.location.href = "/point-of-sale/member/delete/" + id;
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