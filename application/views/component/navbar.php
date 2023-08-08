<?php $uri = $this->uri->segment_array(); ?>
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl d-print-none" id="navbarBlur" navbar-scroll="true">
  <div class="container-fluid py-1 px-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
          <?php
          if (isset($uri[1])) {
            if ($uri[1] == 'laporan-penjualan' || $uri[1] == 'laporan-pembelian' || $uri[1] == 'laporan-barang') {
              $splited = explode('-', $uri[1]);
              echo ucfirst($splited[1]);
            } else {
              echo ucfirst($uri[1]);
            }
          } else {
            echo "Dashboard";
          }
          ?>
        </li>
      </ol>
      <h6 class="font-weight-bolder mb-0">
        <?php
        if (isset($uri[2])) {
          if ($uri[2] == 'tambah') {
            echo "Tambah";
          } else {
            echo "Edit";
          }
        } else {
          if (isset($uri[1]) && ($uri[1] == 'laporan-penjualan' || $uri[1] == 'laporan-pembelian' || $uri[1] == 'laporan-barang')) {
            echo "Laporan";
          } else {
            echo "Table";
          }
        }
        ?>
      </h6>
    </nav>
    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 justify-content-end" id="navbar">
      <ul class="navbar-nav justify-content-end">
        <li class="nav-item dropdown pe-2 d-flex align-items-center">
          <a href="javascript:;" class="nav-link text-body font-weight-bold px-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-user me-sm-1"></i>
            <span class="d-sm-inline d-none"><?= ucfirst($this->session->userdata('user')->username) ?></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end px-2 me-sm-n4" aria-labelledby="dropdownMenuButton">
            <li class="mb-2">
              <a class="dropdown-item border-radius-md" href="<?= base_url('logout') ?>">
                <span class="d-sm-inline d-none">Logout</span>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>