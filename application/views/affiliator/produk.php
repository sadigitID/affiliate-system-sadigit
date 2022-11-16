<!-- start of modal salin link -->
<div class="modal" id="modal_salin" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Salin Link</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form_salin">
        <div class="modal-body">
          <button type="button" class="btn btn-light-success" onclick="salin($(this))">Salin</button>
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

  const _copy = async (url) => {
    try {
      await navigator.clipboard.writeText(url);
      alert("Copied the link : " + url);
      console.log('Content copied to clipboard');
    } catch (err) {
      console.error('Failed to copy: ', err);
    }
  }

  const _salin = async (id_produk) => {
    const result = await confirm('Salin data produk ?')
    if (!result.isConfirmed) return;

    await $.ajax({
      type: "post",
      url: "<?= base_url('affiliator/produk/isi_data') ?>",
      data: {
        id_produk
      },
      dataType: "json",
      success: function(res) {
        Swal.fire('', 'data berhasil disalin', 'success')
        table.ajax.reload()
      },
      error(err) {
        Swal.fire('', 'terjadi kesalahan', 'error');
      }
    });
  }

  const salin = async (id_produk) => {
    await $.ajax({
      type: "post",
      url: "<?= base_url('affiliator/produk/isi_data') ?>",
      data: {
        id_produk
      },
      dataType: "json",
      success: function(res) {
        $('#id_pesanan').val(res.id_pesanan)
        $('#id_produk').val(res.id_produk)
        $('#nama_produk').val(res.nama_produk)
        $('#harga_jual').val(res.harga_jual)
        $('#tanggal_pesanan').val(res.tanggal_pesanan)
        $('#status_pesanan').val(res.status_pesanan)
        $('#status_komisi').val(res.status_komisi)
      },
      error(err) {
        Swal.fire('', 'terjadi kesalahan saat mengambil data pesanan', 'error');
      }
    });
  }
</script>