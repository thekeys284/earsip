@extends('layout.layout_admin')
@section('title')
    Pengaturan role 
@endsection
@push('linkrel')
  <!-- DataTables -->
  <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush
@section('title page')
    Pengaturan Role
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
            <div class="row">
                <div class="col-md-8 text-left">
                    <h3 class="card-title"  style="position:relative;"><b>Daftar Role</b></h3>    
                </div>
                <div class="col-md-4 text-right">
                    <button type="button" class="btn btn-block btn-sm btn-outline-success btn-flat" data-toggle="modal" data-target="#tambahRole">
                        <b>Tambah Role</b>
                    </button> 
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
              <div class="col">
                <table id="role" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th style="width:5%;">No</th>
                        <th style="width:55%;">Role</th>
                        <th style="width:40%;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td style="width:5%;">Trident</td>
                        <td style="width:55%;">Internet
                        Explorer 4.0
                        </td>
                        <td style="width:40%;">Win 95+</td>
                    </tr>
                    <tr>
                        <td style="width:5%;">Trident</td>
                        <td style="width:55%;">Internet
                        Explorer 5.0
                        </td>
                        <td style="width:40%;">Win 95+</td>

                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th style="width:5%;">No</th>
                        <th style="width:55%;">Role</th>
                        <th style="width:40%;">Action</th>
                    </tr>
                    </tfoot>
                </table>
              </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
</div>
<!-- /.card -->

<!-- Modal -->
<div class="modal fade" id="tambahRole" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahRole">Tambah Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="container-fluid">
              <div class="row">
                <div class="col-md-3">Role</div>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="recipient-name">
                </div>
              </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>
@endsection
@push('scripts')
<!-- DataTables  & Plugins -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="assets/plugins/jszip/jszip.min.js"></script>
<script src="assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-12:eq(0)');
    $('#role').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endpush