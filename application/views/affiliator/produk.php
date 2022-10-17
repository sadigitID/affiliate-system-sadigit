<!-- start of modal salin link -->
<div class="modal" id="modal_copy" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Salin Link Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form_copy">
        <div class="modal-body">
          <button type="button" class="btn btn-light-success" onclick="salin($(this))">Salin Link</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- end of modal salin link -->

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
      "processing": true,
      "serverSide": true,
      "order": [],
      "ajax": {
        "url": '<?= base_url('affiliator/produk/tb_produk/') ?>',
        "type": "POST",
      },
      "ordering": false
    });
  })

  const _copy = async () => {
    $('#form_copy')[0].reset()
    $('#modal_copy').modal('show')
  }

  const salin = async (id_produk) => {
    await $.ajax({
      type: "post",
      url: "<?= base_url('affiliator/produk/copy_link') ?>",
      data: {
        id_produk
      },
      dataType: "json",
      success: function(res) {
        $('#id_pesanan').val(res.id_pesanan)
        $('#status_komisi').val(res.status_komisi)
        Swal.fire('', 'Berhasil menyalin link', 'success');
      },
      error(err) {
        Swal.fire('', 'terjadi kesalahan', 'error');
      }
    });
  }
</script>