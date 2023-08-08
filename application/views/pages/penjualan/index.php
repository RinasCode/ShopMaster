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
              <h6 class="text-center">Tambah Penjualan</h6>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <form action="<?= base_url('penjualan/add') ?>" method="post">
            <input type="hidden" name="no_invoice" value="<?= $invoice ?>">
            <div class="row px-4 gap-2 pt-4">
              <div class="col-12">
                <div class="form-group row align-items-center">
                  <div class="col-2 text-end">
                    <label for="member">Nama Member</label>
                  </div>
                  <div class="col-6">
                    <div class="row">
                      <select id="member" name="member" class="form-control col me-1" required>
                        <option selected disabled></option>
                        <?php foreach ($member as $m) { ?>
                          <option value="<?= $m['id_member'] ?>" <?= isset($params['id']) && $params['id'] == $m['id_member'] ? 'selected' : '' ?>><?= $m['nama_member'] . " - " . $m['no_member'] ?></option>
                        <?php } ?>
                      </select>
                      <a href="<?= base_url('member/tambah?from=penjualan') ?>" class="btn btn-primary text-lg m-0 p-0 h-full w-full col-1 flex-center">+</a>
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
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">IMEI</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Barang</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kategori</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Harga</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2 pe-4 w-1">
                          <a id="addBarang" class="ps-2 cursor-pointer">
                            <i class="fa fa-plus text-xs"></i>
                          </a>
                        </th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr>
                        <td>
                          <select id="barang1" name="barang[]" class="form-control">
                            <option selected disabled></option>
                            <?php foreach ($barang as $b) { ?>
                              <option value=" <?= $b['id_barang'] ?>" data-nama="<?= $b['nama_jenis'] ?>" data-kategori="<?= $b['nama_kategori'] ?>" data-harga="<?= $b['harga_jual'] ?>" data-hargatext="<?= number_format($b['harga_jual'], 0, ',', '.') ?>">
                                <?= $b['imei'] ?>
                              </option>
                            <?php } ?>
                          </select>
                        </td>
                        <td class="w-20">
                          <input id="nama" name="nama[]" class="form-control" readonly>
                        </td>
                        <td class="w-20">
                          <input id="kategori" name="kategori[]" class="form-control" readonly>
                        </td>
                        <td class="w-20">
                          <input type="hidden" id="harga" name="harga[]">
                          <input id="hargatext" name="hargatext[]" class="form-control" readonly>
                        </td>
                        <td class="align-middle pe-4">
                          <a class="deleteBarang ps-2 cursor-pointer">
                            <i class="fa fa-trash text-xs"></i>
                          </a>
                        </td>
                      </tr>
                    </tbody>

                    <tfoot>
                      <tr>
                        <td colspan="3" class="align-middle">
                          <p class="text-uppercase text-dark font-weight-bolder opacity-7 float-end">Total</p>
                        </td>
                        <td>
                          <input type="hidden" id="total_penjualan" name="total_penjualan" class="form-control" readonly required>
                          <input type="text" id="total_penjualan_text" name="total_penjualan_text" class="form-control" readonly required>
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
  $(document).ready(function() {
    const selectedBarang = [];

    $('#barang1').select2()
    var no = 1

    $('#addBarang').on('click', function() {
      no++
      var table = document.getElementById("barangTable").getElementsByTagName('tbody')[0];

      var row = table.insertRow(table.rows.length);
      row.id = 'row' + no
      var cell1 = row.insertCell(0);
      var cell2 = row.insertCell(1);
      cell2.style.width = "20%";
      var cell3 = row.insertCell(2);
      cell3.style.width = "20%";
      var cell4 = row.insertCell(3);
      cell4.style.width = "20%";
      var cell5 = row.insertCell(4);


      var select = document.createElement("select");
      select.name = "barang[]";
      select.id = "barang" + no;
      select.className = "form-control";

      var option = document.createElement('option');
      option.value = "";
      option.selected = true;
      option.disabled = true;
      select.appendChild(option);

      <?php foreach ($barang as $b) { ?>
        var opt = document.createElement('option');
        opt.value = "<?= $b['id_barang'] ?>"
        opt.text = "<?= $b['imei'] ?>"
        opt.dataset.nama = "<?= $b['nama_jenis'] ?>"
        opt.dataset.kategori = "<?= $b['nama_kategori'] ?>"
        opt.dataset.harga = '<?= $b['harga_jual'] ?>'
        opt.dataset.hargatext = '<?= number_format($b['harga_jual'], 0, ',', '.') ?>'
        select.appendChild(opt);
      <?php } ?>

      cell1.appendChild(select);

      var input1 = document.createElement("input");
      input1.type = "text";
      input1.className = "form-control";
      input1.id = "nama";
      input1.name = "nama[]";
      input1.disabled = true;
      cell2.appendChild(input1);

      var input2 = document.createElement("input");
      input2.type = "text";
      input2.className = "form-control";
      input2.id = "kategori";
      input2.name = "kategori[]";
      input2.disabled = true;
      cell3.appendChild(input2);

      var input3 = document.createElement("input");
      input3.type = "hidden";
      input3.id = "harga";
      input3.name = "harga[]";

      var input4 = document.createElement("input");
      input4.type = "text";
      input4.className = "form-control";
      input4.id = "hargatext";
      input4.name = "hargatext[]";
      input4.disabled = true;

      cell4.appendChild(input3);
      cell4.appendChild(input4);


      var a = document.createElement("a");
      a.className = "deleteBarang ps-2 cursor-pointer";

      var i = document.createElement("i");
      i.className = "fa fa-trash text-xs";

      a.appendChild(i);
      cell5.appendChild(a);

      $(`#barang${no}`).select2()
    })

    $(document).on('change', 'select', function() {
      let selected = $(this).find(':selected')
      $(this).closest('tr').find('#nama').val(selected.data('nama'))
      $(this).closest('tr').find('#kategori').val(selected.data('kategori'))
      $(this).closest('tr').find('#harga').val(selected.data('harga'))
      $(this).closest('tr').find('#hargatext').val(selected.data('hargatext'))

      setTotal()
    })

    $(document).on('click', '.deleteBarang', function() {
      var index = this.closest("tr").rowIndex;

      document.getElementById("barangTable").deleteRow(index);
      if (selectedBarang.includes(selected.val())) selectedBarang.pop(selected.val())
      console.log(selectedBarang);
    })

    function setTotal() {
      let total = 0
      $('select').each((i, elem) => {
        let temp;
        if (elem.id.includes('barang')) {
          temp = $(elem).find(':selected').data('harga')
        }

        if (jQuery.isNumeric(temp)) total += temp
      })
      $('#total_penjualan').val(total)
      $('#total_penjualan_text').val(total.toLocaleString('id-ID'))
    }
  })
</script>