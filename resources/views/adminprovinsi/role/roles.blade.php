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
                    <button type="button" class="btn btn-block btn-sm btn-outline-success btn-flat" onclick="create()">
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
                        <th style="width:5%;text-align:center;">No</th>
                        <th style="width:55%;text-align:center;">Role</th>
                        <th style="width:40%;text-align:center;">Action</th>
                    </tr>
                    </thead>
                    <tbody id='listRole'>
                        @foreach($roles as $role)
                          <tr id="listRole{{ $role->id }}">
                            <td>{{$role->id}}</td>
                            <td>{{$role->role}}</td>
                            <td>
                               <button type="button" id=""  class="btn btn-sm btn-warning ml-1"> 
                               <!-- data-id="{{ $role-id }}" -->
                                Edit
                              </button>
                               <button type="button" id="" class="btn btn-sm btn-danger ml-1"> 

                                Delete
                              </button>
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
<!-- /.card -->

<!-- Modal -->
<!-- <div class="modal fade" id="tambahRole" tabindex="-1" role="dialog" aria-labelledby="role" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahRole">Tambah Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="addRole">
        {{csrf_field()}}
        <div class="modal-body">
          <div class="container-fluid">
              <div class="row">
                <div class="col-md-3">
                  <label for="role">Role</label> 
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="role" placeholder="Masukkan Role">
                </div>
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" onclick="submit()">Tambah Role</button>
        </div>
      </form>
    </div>
  </div>
</div> -->

    <div class="modal fade" id="tambahRole" tabindex="-1" aria-labelledby="RoleLabel" aria-hidden="true">
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
<!-- <script type="text/javascript">
  $(document).ready(function(){
    $('#addRole').on('submit', function(e){
      e.preventDefault();

      $.ajax({
        type:"POST",
        url:"/admin/role/add",
        data:$('#addRole').serialize(),
        success: function(response){
          console.log(response)
          $('#tambahRole').modal('hide')
          alert('Role sudah ditambahkan');
        },
        error: function(response){
          console.log(error)
          alert('Role gagal ditambahkan');
        }
      });
    });
  });
</script> -->

<script>
  $(document).ready(function() {
            //read()
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
                $("#role").html('Create Product')
                $("#page").html(data);
                $("#tambahRole").modal('show');

            // });
        }

</script>

@endpush