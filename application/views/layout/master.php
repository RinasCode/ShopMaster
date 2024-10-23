<!--
=========================================================
* Soft UI Dashboard - v1.0.6
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url(); ?>assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/img/favicon.png">
  <title>
    <?php if (isset($title)) echo $title . " | " ?>Shop Master
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="<?= base_url(); ?>assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="<?= base_url(); ?>assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="<?= base_url(); ?>assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="<?= base_url(); ?>assets/css/soft-ui-dashboard.css?v=1.0.6" rel="stylesheet" />
  <link id="pagestyle" href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" rel="stylesheet" />

  <script src="<?= base_url(); ?>assets/js/core/jquery.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/core/popper.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/core/bootstrap.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/soft-ui-dashboard.min.js?v=1.0.6"></script>
  <script src="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-100">

  <?php $this->load->view('component/sidebar'); ?>

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <?php $this->load->view('component/navbar'); ?>

    <div id='container' class="container-fluid py-4">

    </div>

    <?php $this->load->view('component/footer'); ?>
  </main>

  <script type="text/javascript">
    alertify.defaults.transition = "slide";
    alertify.defaults.theme.ok = "btn btn-primary";
    alertify.defaults.theme.cancel = "btn btn-secondary";
    alertify.defaults.theme.input = "form-control";
    alertify.defaults.notifier.classes.messages = "ajs-message text-white";
    alertify.set('notifier', 'position', 'top-center');

    <?php if (!empty($this->session->flashdata('errorLogin'))) { ?>
      alertify.error("<?php echo $this->session->flashdata('errorLogin'); ?>");
      <?php $this->session->set_flashdata('errorLogin', null); ?>
    <?php } else if (!empty($this->session->flashdata('success'))) { ?>
      alertify.success("<?php echo $this->session->flashdata('success'); ?>");
      <?php $this->session->set_flashdata('success', null); ?>
    <?php } else if (!empty($this->session->flashdata('error'))) { ?>
      alertify.error("<?php echo $this->session->flashdata('error'); ?>");
      <?php $this->session->set_flashdata('error', null); ?>
    <?php } ?>

    $(document).ready(function() {
      $('#content').appendTo('#container');
    })
  </script>
</body>

</html>