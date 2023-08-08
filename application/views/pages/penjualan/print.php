<?php
$this->load->view('layout/print');
?>

<section id="content" class="epi-min-h-content">
  <div class="row">
    <div class="col">
      <h6 class="text-center">
        Laporan Penjualan <?= isset($kategori) ? $kategori['nama_kategori'] : '' . " " ?>
        <?php
        if ($mulai && $akhir) {
          if ($mulai == $akhir) {
            echo date_format(date_create($mulai), 'd/m/Y');
          } else {
            echo date_format(date_create($mulai), 'd/m/Y') . " - " . date_format(date_create($akhir), 'd/m/Y');
          }
        }
        ?>
      </h6>

      <table id="contentTable" class="table align-items-center justify-content-center mb-0">
        <thead>
          <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No Invoice</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Member</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Barang</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Total</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (count($items) > 0) {
            foreach ($items as $item) :
          ?>
              <tr>
                <td class="ps-4">
                  <p class="mb-0"><?= date_format(date_create($item['tgl_penjualan']), 'd M Y') ?></p>
                </td>
                <td>
                  <p class="mb-0"><?= $item['no_invoice'] ?></p>
                </td>
                <td>
                  <p class="mb-0"><?= $item['nama_member'] ?></p>
                </td>
                <td>
                  <div class="flex flex-col gap-1">
                    <?php
                    foreach ($detail as $d) {
                      if ($d['id_penjualan'] == $item['id_penjualan']) {
                    ?>
                        <p class="mb-0"><?= $d['nama_jenis'] ?></p>
                    <?php
                      }
                    }
                    ?>
                  </div>
                </td>
                <td>
                  <p class="mb-0"><?= number_format($item['total_penjualan'], 0, ',', '.') ?></p>
                </td>
              </tr>
            <?php
            endforeach;
          } else {
            ?>
            <tr>
              <td colspan="7">
                <p class="text-center">Data Tidak Ditemukan</p>
              </td>
            </tr>

          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</section>

<script>
  window.print();
</script>