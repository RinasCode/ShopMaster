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
              <h6 class="text-center">Tambah Pembelian</h6>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <form action="<?= base_url('pembelian/add') ?>" method="post">
            <input type="hidden" name="no_invoice" value="<?= $invoice ?>">
            <div class="row px-4 gap-2 pt-4">
              <div class="col-12">
                <div class="form-group row align-items-center">
                  <div class="col-2 text-end">
                    <label for="supplier">Nama Supplier</label>
                  </div>
                  <div class="col-6">
                    <div class="row">
                      <select id="supplier" name="supplier" class="form-control col me-1" required>
                        <option selected disabled></option>
                        <?php foreach ($supplier as $m) { ?>
                          <option value="<?= $m['id_supplier'] ?>" <?= isset($params['id']) && $params['id'] == $m['id_supplier'] ? 'selected' : '' ?>><?= $m['nama_supplier'] ?></option>
                        <?php } ?>
                      </select>
                      <a href="<?= base_url('supplier/tambah?from=pembelian') ?>" class="btn btn-primary text-lg m-0 p-0 h-full w-full col-1 flex-center">+</a>
                    </div>
                  </div>
                  <div class="col">
                    <p class="float-end mb-0 bg-light px-4 py-2 rounded"><?= $invoice ?></p>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="table-responsive">
                  <table id="barangTable" class="table align-items-center justify-content-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Barang</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">IMEI</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kategori</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Harga Jual</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Harga Beli</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2 pe-4 w-1">
                          <a id="addBarang" class="ps-2 cursor-pointer">
                            <i class="fa fa-plus text-xs"></i>
                          </a>
                        </th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr id="row1">
                        <td class="w-25">
                          <select id="jenis1" name="jenis[]" class="form-control">
                            <option selected disabled></option>
                            <?php foreach ($jenis as $j) : ?>
                              <option value="<?= $j['id_jenis'] ?>"><?= $j['nama_jenis'] ?></option>
                            <?php endforeach ?>
                          </select>
                        </td>
                        <td class="w-20">
                          <input type="text" id="imei" name="imei[]" class="form-control">
                        </td>
                        <td class="w-20">
                          <select id="kategori1" name="kategori[]" class="form-control">
                            <option selected disabled></option>
                            <?php foreach ($kategori as $k) : ?>
                              <option value="<?= $k['id_kategori'] ?>"><?= $k['nama_kategori'] ?></option>
                            <?php endforeach ?>
                          </select>
                        </td>
                        <td class="w-15">
                          <input type="number" id="harga_jual" name="harga_jual[]" class="form-control" min='1'>
                        </td>
                        <td class="w-15">
                          <input type="number" id="modal" name="modal[]" class="modal_barang form-control" min='1' onchange="changeHarga();">
                        </td>
                        <td class="w-5 align-middle pe-4">
                          <a class="deleteBarang ps-2 cursor-pointer">
                            <i class="fa fa-trash text-xs"></i>
                          </a>
                        </td>
                      </tr>
                    </tbody>

                    <tfoot>
                      <tr>
                        <td colspan="4" class="align-middle">
                          <p class="text-uppercase text-dark font-weight-bolder opacity-7 float-end">Total</p>
                        </td>
                        <td>
                          <input type="text" id="total_pembelian" name="total_pembelian" class="form-control" readonly required>
                        </td>
                        <td></td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>

              <div class="col-12">
                <button type="submit" class="btn btn-primary float-end">
                  Simpan
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  function changeHarga() {
    let total = 0
    const listHarga = document.getElementsByClassName('modal_barang')
    for (let i = 0; i < listHarga.length; i++) {
      const element = listHarga[i];
      total += Number(element.value)
    }

    document.getElementById('total_pembelian').value = total;
  }

  $(document).ready(function() {
    $("#jenis1").select2({
      tags: true,
    });
    var no = 1

    const listHarga = []

    $('#addBarang').on('click', function() {
      no++
      var table = document.getElementById("barangTable").getElementsByTagName('tbody')[0];

      var row = table.insertRow(table.rows.length);
      row.id = 'row' + no
      var cell1 = row.insertCell(0);
      cell1.className = 'w-25'
      var cell2 = row.insertCell(1);
      cell2.className = 'w-20'
      var cell3 = row.insertCell(2);
      cell3.className = 'w-20'
      var cell4 = row.insertCell(3);
      cell4.className = 'w-15'
      var cell5 = row.insertCell(4);
      cell5.className = 'w-15'
      var cell6 = row.insertCell(5);
      cell6.className = 'w-5 align-middle pe-4'

      var select = document.createElement("select");
      select.id = "jenis" + no;
      select.name = "jenis[]";
      select.className = "form-control";

      var option = document.createElement('option');
      option.selected = true;
      option.disabled = true;
      select.appendChild(option);

      <?php foreach ($jenis as $j) { ?>
        var opt = document.createElement('option');
        opt.value = "<?= $j['id_jenis'] ?>"
        opt.text = "<?= $j['nama_jenis'] ?>"
        select.appendChild(opt);
      <?php } ?>

      cell1.appendChild(select);

      var input1 = document.createElement("input");
      input1.type = "text";
      input1.id = "imei";
      input1.name = "imei[]";
      input1.className = "form-control";
      cell2.appendChild(input1);

      var select2 = document.createElement("select");
      select2.id = "kategori" + no;
      select2.name = "kategori[]";
      select2.className = "form-control";

      var option2 = document.createElement('option');
      option2.selected = true;
      option2.disabled = true;
      select2.appendChild(option2);

      <?php foreach ($kategori as $k) { ?>
        var opt2 = document.createElement('option');
        opt2.value = "<?= $k['id_kategori'] ?>"
        opt2.text = "<?= $k['nama_kategori'] ?>"
        select2.appendChild(opt2);
      <?php } ?>

      cell3.appendChild(select2);

      var input2 = document.createElement("input");
      input2.type = "number";
      input2.id = "harga_jual";
      input2.name = "harga_jual[]";
      input2.className = "form-control";
      input2.min = 1;
      cell4.appendChild(input2);

      var input3 = document.createElement("input");
      input3.type = "number";
      input3.id = "modal";
      input3.name = "modal[]";
      input3.className = "modal_barang form-control";
      input3.min = 1;
      input3.onchange = () => changeHarga();
      cell5.appendChild(input3);

      var a = document.createElement("a");
      a.className = "deleteBarang ps-2 cursor-pointer";

      var i = document.createElement("i");
      i.className = "fa fa-trash text-xs";

      a.appendChild(i);
      cell6.appendChild(a);

      $(`#jenis${no}`).select2({
        tags: true,
      })
    })

    $(document).on('click', '.deleteBarang', function() {
      var index = this.closest("tr").rowIndex

      document.getElementById("barangTable").deleteRow(index)
    })
  })
</script>