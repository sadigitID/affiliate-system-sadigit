<div class="card card-custom">
  <div class="card-header">
    <div class="card-title">
      <span class="card-icon"><i class="flaticon-squares-1 text-primary"></i></span>
      <h3 class="card-label">Data Produk</h3>
    </div>
  </div>
  <div class="card-body">
    <!--begin: Datatable-->
    <table class="table table-bordered" id="table" style="margin-top: 13px !important">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Produk</th>
          <th>Harga Produk</th>
          <th>Jumlah Komisi</th>
          <th>Link Produk</th>
          <th>
            <center>Aksi</center>
          </th>
        </tr>
      </thead>
    </table>
    <!--end: Datatable-->
  </div>
</div>
<!--end::Card-->
<script>
  let table
  $(document).ready(async () => {
    table = $('#table').DataTable({
      "responsive": true,
      "processing": false,
      "serverSide": true,
      "order": [],
      "ajax": {
        "url": '<?= base_url('produk/tb_produk/') ?>',
        "type": "GET"
      },
      "ordering": false
    });
  })

  const tambahProduk = async () => {
    $('#form_produk')[0].reset()
    $('#modal_produk').modal('show')
  }

  const _edit = async (id) => {
    await $.ajax({
      type: "post",
      url: "<?= base_url('produk/getProduk') ?>",
      data: {
        id
      },
      dataType: "json",
      success: function(res) {
        $('#id_produk').val(res.id)
        $('#nama_produk').val(res.nama_produk)
        $('#harga_produk').val(res.harga_produk)
        $('#jml_komisi').val(res.jml_komisi)
        $('#link_produk').val(res.link_produk)
        $('#modal_produk').modal('show')
      },
      error(err) {
        Swal.fire('', 'terjadi kesalahan saat mengambil data produk', 'error');
      }
    });
  }

  const _delete = async (id) => {
    const result = await confirm('apakah anda yakin akan menghapus produk ini?')

    if (!result.isConfirmed) return;

    await $.ajax({
      type: "post",
      url: "<?= base_url('produk/delete') ?>",
      data: {
        id
      },
      dataType: "json",
      success: function(res) {
        Swal.fire('', 'berhasil menghapus produk', 'success')
        table.ajax.reload()
      },
      error(err) {
        Swal.fire('', 'terjadi kesalahan saat menghapus produk', 'error');
      }
    });
  }

  const save = async (btn) => {
    btn.prop('disabled', true)
    const data = $('#form_produk').serializeArray()
    await $.ajax({
      type: "post",
      url: "<?= base_url('produk/save') ?>",
      data,
      dataType: "json",
      success: function(res) {
        if (res.status) {
          $('#modal_produk').modal('hide');
          Swal.fire("", "Berhasil menyimpan data", "success");
          table.ajax.reload();
          $('#form_produk').find('.text-danger').remove()
        } else {

          $.each(res.messages, function(key, value) {
            const element = $('[name ="' + key + '"]');
            element
              .removeClass('is-invalid')
              .addClass(value.length > 0 ? 'is-invalid' : '')
              .closest('div.form-group')
              .find('.text-danger')
              .remove();
            element.removeClass('is-invalid')
            // .addClass(value.length > 0 ? 'is-invalid' : '')
            if (element.parents('.input-group').length) {
              $('.div' + key).html(value);
            } else if ($('#' + key + '').hasClass('select')) {
              element.parents().find('.select2-container').after(value);
            } else {
              element.after(value);
            }
          });
        }
      },
      error(err) {
        Swal.fire('', 'terjadi kesalahan', 'error')
      },
      complete() {
        btn.prop('disabled', false)

      }
    });
  }
</script>
