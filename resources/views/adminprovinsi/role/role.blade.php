@extends('layout.layout_admin')
@section('title')
    Pengaturan role 
@endsection
@push('linkrel')
  <!-- DataTables -->
  <link rel="stylesheet" href="../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
                    <button type="button" class="btn btn-block btn-sm btn-outline-success btn-flat" onClick="create()">
                        <b>Tambah Role</b>
                    </button> 
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
              <div id="table" class="col display">
                <table id="role" class="table table-bordered table-hover display">
                    <thead>
                    <tr>
                        <th style="width:5%;text-align:center;">No</th>
                        <th style="width:55%;text-align:center;">Role</th>
                        <th style="width:40%;text-align:center;">Action</th>
                    </tr>
                    </thead>
                    <tbody id='listRole'>
                        @foreach($roles as $role)
                          <tr id="listRole{{ $role->id }}">
                            <td style="width:5%;text-align:center;">{{$role->id}}</td>
                            <td>{{$role->role}}</td>
                            <td style="width:5%;text-align:center;">
                                <button class="btn btn-warning" onClick="show({{ $role->id }})">Edit</button>
                                <button class="btn btn-danger" onClick="destroy({{ $role->id }})">Delete</button>
                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th style="width:5%;text-align:center;">No</th>
                        <th style="width:55%;text-align:center;">Role</th>
                        <th style="width:40%;text-align:center;">Action</th>
                    </tr>
                    </tfoot>
                </table>
              </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
</div>

<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div id="page" class="p-2"></div>
        </div>
    </div>
</div> -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="page" class="p-2"></div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
<!-- DataTables  & Plugins -->
<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../assets/plugins/jszip/jszip.min.js"></script>
<script src="../assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="../assets/docs/assets/plugins/popper/popper.min.js"></script>
<script src="../assets/docs/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

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
<script>
        $(document).ready(function() {
            read()
        });
        // Read Database
        // function read() {
        //     $.get("{{ url('read') }}", {}, function(data, status) {
        //         $("#read").html(data);
        //     });
        // }
        // Untuk modal halaman create
        function create() {
            $.get("{{ url('admin/role/add') }}", {}, function(data, status) {
                // $("#exampleModalLabel").html('Create Product')
                $("#page").html(data);
                $("#exampleModal").modal('show');

            });
        } 

        // untuk proses create data
        function store() {
            var role = $("#role").val();
            $.ajax({
                type: "get",
                url: "{{ url('admin/role/submit') }}",
                data: "role=" + role,
                success: function(data) {
                    $(".btn-close").click();
                    //read()
                }
            });
        }

        // Untuk modal halaman edit show
        // function show(id) {
        //     $.get("{{ url('show') }}/" + id, {}, function(data, status) {
        //         $("#exampleModalLabel").html('Edit Product')
        //         $("#page").html(data);
        //         $("#exampleModal").modal('show');
        //     });
        // }

        // untuk proses update data
        // function update(id) {
        //     var name = $("#name").val();
        //     $.ajax({
        //         type: "get",
        //         url: "{{ url('update') }}/" + id,
        //         data: "name=" + name,
        //         success: function(data) {
        //             $(".btn-close").click();
        //             read()
        //         }
        //     });
        // }

        // untuk delete atau destroy data
        // function destroy(id) {

        //     $.ajax({
        //         type: "get",
        //         url: "{{ url('destroy') }}/" + id,
        //         data: "name=" + name,
        //         success: function(data) {
        //             $(".btn-close").click();
        //             read()
        //         }
        //     });
        // }
    </script>
@endpush