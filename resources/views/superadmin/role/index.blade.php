@extends('layout.layout_superadmin')
@section('title')
Pengaturan Role
@endsection
@push('linkrel')
<!-- DataTables -->
    <link rel="stylesheet" href="../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">   
    <link rel="stylesheet" href="../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <meta name="_token" content="{{ csrf_token() }}">
@endpush
@section('title page')
Pengaturan Role
@endsection
@section('content')
  <!-- MODAL -->  
      <!-- MODAL TAMBAH-->
      <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-2">
                      <label for="role" class="col-form-label">Role </label>
                    </div>
                    <div class="col-md-10">
                      <input type="text" class="form-control" id="role">
                    </div>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <button type="button" class="btn btn-primary btnBuat">Buat</button>
            </div>
          </div>
        </div>
      </div>
      <!-- MODAL EDIT -->
      <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button> 
            </div>
            <div class="modal-body">
            <div class="form-group">
                  <div class="row">
                    <div class="col-md-2">
                      <label for="role" class="col-form-label">Role </label>
                    </div>
                    <div class="col-md-10">
                      <input type="text" class="form-control" id="edit_role">
                    </div>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <button type="button" class="btn btn-primary btnUbahData" idEdit="">Ubah Data</button>
            </div>
          </div>
        </div>
      </div>

  <!-- END MODAL -->

  <!-- Content -->
  <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
            <div class="row">
                <div class="col-md-8 text-left">
                    <h3 class="card-title"  style="position:relative;"><b>Daftar Role</b></h3>    
                </div>
                <div class="col-md-4 text-right">
                    <button type="button" class="btn btn-block btn-sm btn-outline-success btn-flat btnAdd">
                        <b>Tambah Role</b>
                    </button> 
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
              <div id="datatable" class="col display">
                <table id="example1" class="table table-bordered table-hover display">
                    <thead>
                    <tr class="text-center">
                        <th style="width:5%;text-align:center;">No</th>
                        <th style="width:55%;text-align:center;">Role</th>
                        <th style="width:40%;text-align:center;">Action</th>
                    </tr>
                    </thead>
                    <tbody id='tujuan'>
                  
                    </tbody>
                    <tfoot>
                    <tr class="text-center">
                        <th style="width:5%;text-align:center;">No</th>
                        <th style="width:55%;text-align:center;">Role</th>
                        <th style="width:40%;text-align:center;">Action</th>
                    </tr>
                    </tfoot>
                </table>
              </div>
            </div>
        </div>
    </div>
  </div>

  <!-- End Content -->
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
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-12:eq(0)');
    $('#example2').DataTable({
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
        $(document).ready(function(){
            getDataFromDB();
            function resetModal(){
                $("#modalTambah").modal('hide');
                $("#role").val('');
                $("#kode_role").val('');
                $("#email").val('');
                $("#alternatif_email").val('');
            }
            function resetModalEdit(){
                $("#modalEdit").modal('hide');
                $("#edit_role").val('');
                $("#edit_kode_role").val('');
                $("#edit_email").val('');
                $("#edit_alternatif_email").val('');
            }
            // ADD DATA
            $(".btnAdd").on('click', function(){
                $("#modalTambah").modal('show');

                $(".btnBuat").on('click', function(){
                    var namaRole = $("#role").val();
                    $.ajaxSetup({
                        headers : {
                            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        method : "POST",
                        url : '{{url("/superadmin/role/storeData")}}',
                        data : {
                            'namaRole' : namaRole,
                        },
                        success : function(e){
                            resetModal();
                            getDataFromDB();
                        }
                    });
                });
            })


            // Read Data
            function getDataFromDB(){
                var x = '';
                $.ajax({
                    method : 'GET',
                    url : '{{url("/superadmin/role/getData")}}',
                    success : function(res){
                        $.each(res, function(index, item){
                            x = x + '<tr>'+
                            '<td>'+(index+1)+'</td>'+
                            '<td>'+item.role+'</td>'+
                            '<td>'+
                                '<a class="btn btn-danger btn-sm btnDelete" itemID='+item.id+'>Hapus</a>&nbsp'+
                                '<a class="btn btn-warning btn-sm btnUbah" itemID='+item.id+'>Ubah</a>'+
                            '</td>'+
                            '</tr>';
                        })
                        $("#tujuan").html(x)
                        $(".btnUbah").on('click', function(){
                            var idData = $(this).attr("itemID");
                            $.ajax({
                                url : "{{url('/superadmin/role/editData')}}/" + idData,
                                method : "GET",
                                success : function(data){
                                    $("#modalEdit").modal('show');
                                    $("#edit_role").val(data.role);
                                    $(".btnUbahData").attr("idEdit", data.id);
                                    $(".btnUbahData").on('click', function(){
                                        idData = $(this).attr("idEdit");
                                        namaRole = $("#edit_role").val();
                                        $.ajaxSetup({
                                            headers : {
                                                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                                            }
                                        });
                                        $.ajax({
                                            method : "POST",
                                            url : "{{url('/superadmin/role/updateData')}}",
                                            data : {
                                                'idData' : idData,
                                                'namaRole' : namaRole,
                                            },
                                            success : function(o){
                                                resetModalEdit();
                                                getDataFromDB();
                                            }
                                        });
                                    }); 
                                }
                            });
                        });
                        $(".btnDelete").on('click', function(){
                            var idData = $(this).attr("itemID");
                            $.ajaxSetup({
                                headers : {
                                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            $.ajax({
                                method : "POST",
                                url : "{{url('/superadmin/role/destroyData')}}",
                                data : {
                                    'idData' : idData,
                                },
                                success : function(e){
                                    getDataFromDB();
                                }
                            });
                        })
                    }
                });
            }
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

@endpush