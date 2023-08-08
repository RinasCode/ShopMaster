<?php
$nav = array(
  0 => array(
    'id' => 'dashboard',
    'title' => 'Dashboard',
    'icon' => 'app',
    'role' => ['admin', 'manager'],
  ),
  1 => array(
    'id' => 'master',
    'title' => 'Master Data',
    'icon' => 'archive-2',
    'child' => [
      0 => array(
        'id' => 'barang',
        'title' => 'Barang',
      ),
      1 => array(
        'id' => 'kategori',
        'title' => 'Kategori',
      ),
      2 => array(
        'id' => 'supplier',
        'title' => 'Supplier',
      ),
      3 => array(
        'id' => 'member',
        'title' => 'Member',
      ),
    ],
    'role' => ['admin'],
  ),
  2 => array(
    'id' => 'transaksi',
    'title' => 'Transaksi',
    'icon' => 'cart',
    'child' => [
      0 => array(
        'id' => 'penjualan',
        'title' => 'Penjualan',
      ),
      1 => array(
        'id' => 'pembelian',
        'title' => 'Pembelian',
      ),
      2 => array(
        'id' => 'mutasi',
        'title' => 'Mutasi Barang',
      ),
      3 => array(
        'id' => 'retur',
        'title' => 'Retur Barang',
      ),
    ],
    'role' => ['admin'],
  ),
  3 => array(
    'id' => 'laporan',
    'title' => 'Laporan',
    'icon' => 'single-copy-04',
    'child' => [
      0 => array(
        'id' => 'laporan-penjualan',
        'title' => 'Laporan Penjualan',
      ),
      1 => array(
        'id' => 'laporan-pembelian',
        'title' => 'Laporan Pembelian',
      ),
      2 => array(
        'id' => 'laporan-barang',
        'title' => 'Laporan Barang',
      ),
    ],
    'role' => ['admin', 'manager'],
  ),
);

$uri = $this->uri->segment_array();

?>

<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 d-print-none" id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href="<?= base_url(); ?>">
      <img src="<?= base_url(); ?>assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
      <span class="ms-1 font-weight-bold">PT. Ekuator Putra Indonesia</span>
    </a>
  </div>
  <hr class="horizontal dark mt-0">
  <div class="collapse navbar-collapse epi-sidebar-height w-auto " id="sidenav-collapse-main">
    <ul class="navbar-nav">

      <?php
      foreach ($nav as $n) {
        if (in_array($this->session->userdata('user')->role, $n['role'])) {

      ?>
          <?php if (isset($n['child'])) {
            $active = false;
            foreach ($n['child'] as $c) {
              if ($c['id'] == $uri[1]) {
                $active = true;
              }
            }
          ?>
            <li class="nav-item">
              <a data-bs-toggle="collapse" href="#child-<?= $n['id'] ?>" class="nav-link <?php if ($active) echo "active" ?>" aria-controls="child-<?= $n['id'] ?>" role="button" aria-expanded="false">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center me-2">
                  <i class="ni ni-<?= $n['icon'] ?> epi-text-sm <?php if (!$active) echo "text-dark" ?>"></i>
                </div>
                <span class="nav-link-text ms-1"><?= $n['title'] ?></span>
              </a>

              <div class="collapse <?php if ($active) echo "show" ?>" id="child-<?= $n['id'] ?>">
                <ul class="nav ms-4 ps-3">
                  <?php foreach ($n['child'] as $child) : ?>
                    <li class="nav-item <?php if ($child['id'] == $uri[1]) echo "active" ?>">
                      <a class="nav-link " href="<?= base_url($child['id']) ?>">
                        <span class="sidenav-mini-icon"> <?= substr($child['title'], 0, 1) ?> </span>
                        <span class="sidenav-normal"> <?= $child['title'] ?> </span>
                      </a>
                    </li>
                  <?php endforeach; ?>
                </ul>
              </div>
            </li>
          <?php
          } else {
            $active = false;
            if ($n['id'] == $uri[1]) {
              $active = true;
            }
          ?>
            <li class="nav-item">
              <a class="nav-link <?php if ($active) echo "active" ?>" href="<?= base_url($n['id']) ?>">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-<?= $n['icon'] ?> epi-text-sm <?php if (!$active) echo "text-dark" ?>"></i>
                </div>
                <span class="nav-link-text ms-1"><?= $n['title'] ?></span>
              </a>
            </li>
      <?php }
        }
      } ?>
    </ul>
  </div>
</aside>