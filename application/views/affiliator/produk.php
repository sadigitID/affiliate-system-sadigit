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
</script>