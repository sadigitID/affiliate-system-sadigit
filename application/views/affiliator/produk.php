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


<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.1.2/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.1.2/js/buttons.html5.min.js"></script>

<script>
  $(document).ready(async () => {
    table = $('#table').DataTable({
      "ajax": {
        "url": '<?= base_url('affiliator/produk/copy_link/') ?>',
        "type": "POST",
      },
      "dom": 'Bfrtip',
      "buttons": [
        'copy'
      ]
    });

    $("#copy-btn").on("click", function() {
      table.button('.buttons-copy').trigger();
    });
  });
</script>


<!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">-->
<!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.1.2/css/buttons.dataTables.min.css">-->

<script src="<?= base_url(''); ?>/assets/js/scripts.bundle.js"></script>
<!--var clipboard = new ClipboardJS(copy, {
target: function(trigger) {
var example = trigger.closest('.example');
var el = KTUtil.find(example, '.example-code .tab-pane.active');

if (!el) {
el = KTUtil.find(example, '.example-code');
}

return el;
}
});

clipboard.on('success', function(e) {
KTUtil.addClass(e.trigger, 'example-copied');
e.clearSelection();

setTimeout(function() {
KTUtil.removeClass(e.trigger, 'example-copied');
}, 2000);
});

<script src="<?= base_url(''); ?>/assets/js/pages/crud/form/widget/clipboard.js"></script>
var KTClipboardDemo = function () {
// Private functions
var demos = function () {
// basic example
new ClipboardJS('[data-clipboard=true]').on('success', function(e) {
e.clearSelection();
alert('Copied!');
});
}

return {
// public functions
init: function() {
demos();
}
};
}();

jQuery(document).ready(function() {
KTClipboardDemo.init();
});