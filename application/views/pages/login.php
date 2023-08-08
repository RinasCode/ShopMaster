<?php
$this->load->view('layout/blank');
?>

<section id='content' class="epi-login">
  <div class="card mb-4" style="width: 300px;">
    <div class="card-header pb-0">
      <div class="row justify-content-between">
        <div class="col">
          <h6 class="text-center">Sign In</h6>
        </div>
      </div>
    </div>
    <div class="card-body px-0 py-4">
      <form action="" method="post">
        <div class="row px-4 gap-2">
          <div class="col-12">
            <input type="text" name="username" id="username" class="form-control" placeholder="Username" autocomplete="off">
          </div>
          <div class="col-12">
            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-primary w-100">
              Login
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>