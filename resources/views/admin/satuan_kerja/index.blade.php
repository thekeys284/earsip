@extends('layout.layout_admin')
@section('title')
 Database Satuan Kerja
@endsection
@push('linkrel')
<!-- DataTables -->
    <link rel="stylesheet" href="../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">   
    <link rel="stylesheet" href="../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <meta name="_token" content="{{ csrf_token() }}">
@endpush
@section('title page')
Database Satuan Kerja
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
                   <label for="recipient-name" class="col-form-label">Kode Satuan Kerja : </label>
                   <input type="number" class="form-control" id="kode_satker">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Satuan Kerja : </label>
                    <input type="text" class="form-control" id="nama_satker">
                </div>
                <div class="form-group">
                   <label for="recipient-name" class="col-form-label">Alamat Email : </label>
                   <input type="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Email Alternatif : </label>
                    <input type="email" class="form-control" id="alternatif_email">
                </div>
                <div class="form-group">
                   <label for="recipient-name" class="col-form-label">Nomor Telepon : </label>
                   <input type="number" class="form-control" id="no_telepon">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Alamat Kantor : </label>
                    <input type="text" class="form-control" id="alamat_kantor">
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
                   <label for="recipient-name" class="col-form-label">Kode Satuan Kerja : </label>
                   <input type="number" class="form-control" id="edit_kode_satker">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Satuan Kerja : </label>
                    <input type="text" class="form-control" id="edit_nama_satker">
                </div>
                <div class="form-group">
                   <label for="recipient-name" class="col-form-label">Alamat Email : </label>
                   <input type="email" class="form-control" id="edit_email">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Email Alternatif : </label>
                    <input type="email" class="form-control" id="edit_alternatif_email">
                </div>
                <div class="form-group">
                   <label for="recipient-name" class="col-form-label">Nomor Telepon : </label>
                   <input type="number" class="form-control" id="edit_no_telepon">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Alamat Kantor : </label>
                    <input type="text" class="form-control" id="edit_alamat_kantor">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <button type="button" class="btn btn-primary btnUbahData" idEdit="">Ubah Data</button>
            </div>
          </div>
        </div>
      </div>

      <!-- MODAL VIEW -->
      <div class="modal fade" id="modalView" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Lihat Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button> 
            </div>
            <div class="modal-body">
                <div class="form-group">
                   <label for="recipient-name" class="col-form-label">Kode Satuan Kerja : </label>
                   <input type="text" class="form-control" id="view_kode_satker">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Satuan Kerja : </label>
                    <input type="text" class="form-control" id="view_nama_satker">
                </div>
                <div class="form-group">
                   <label for="recipient-name" class="col-form-label">Alamat Email : </label>
                   <input type="email" class="form-control" id="view_email">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Email Alternatif : </label>
                    <input type="email" class="form-control" id="view_alternatif_email">
                </div>
                <div class="form-group">
                   <label for="recipient-name" class="col-form-label">Nomor Telepon : </label>
                   <input type="number" class="form-control" id="view_no_telepon">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Alamat Kantor : </label>
                    <input type="text" class="form-control" id="view_alamat_kantor">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
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
                    <h3 class="card-title"  style="position:relative;"><b>Daftar Satuan Kerja</b></h3>    
                </div>
                <div class="col-md-4 text-right">
                    <button type="button" class="btn btn-block btn-sm btn-outline-success btn-flat btnAdd">
                        <b>Tambah Database Satuan Kerja</b>
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
                        <th>No</th>
                        <th>Satuan Kerja</th>
                        <th>Kode Satuan Kerja</th>
                        <th>Alamat</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id='tujuan'>
                  
                    </tbody>
                    <tfoot>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Satuan Kerja</th>
                        <th>Kode Satuan Kerja</th>
                        <th>Alamat</th>
                        <th>Action</th>
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
                $("#kode_satker").val('');
                $("#nama_satker").val('');
                $("#email").val('');
                $("#alternatif_email").val('');
                $("#no_telepon").val('');
                $("#alamat_kantor").val('');
            }
            function resetModalEdit(){
                $("#modalEdit").modal('hide');
                $("#edit_kode_satker").val('');
                $("#edit_nama_satker").val('');
                $("#edit_email").val('');
                $("#edit_alternatif_email").val('');
                $("#edit_no_telepon").val('');
                $("#edit_alamat_kantor").val('');
            }
            // ADD DATA
            $(".btnAdd").on('click', function(){
                $("#modalTambah").modal('show');

                $(".btnBuat").on('click', function(){
                    var namaSatker = $("#nama_satker").val();
                    var kodeSatker = $("#kode_satker").val();
                    var email = $("#email").val();
                    var alternatif_email = $("#alternatif_email").val();
                    var noTelp = $("#no_telepon").val();
                    var alamatKantor = $("#alamat_kantor").val();
                    $.ajaxSetup({
                        headers : {
                            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        method : "POST",
                        url : '{{url("/admin/satker/storeData")}}',
                        data : {
                            'namaSatker' : namaSatker,
                            'kodeSatker' : kodeSatker,
                            'email' : email,
                            'alternatif_email' : alternatif_email,
                            'noTelp' : noTelp,
                            'alamatKantor' : alamatKantor,
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
                    url : '{{url("/admin/satker/getData")}}',
                    success : function(res){
                        $.each(res, function(index, item){
                            x = x + '<tr>'+
                            '<td>'+(index+1)+'</td>'+
                            '<td>'+item.nama_satker+'</td>'+
                            '<td>'+item.kode_satker+'</td>'+
                            '<td>'+item.alamat_kantor+'</td>'+
                            '<td>'+
                                '<a class="btn btn-warning btn-sm btnUbah" itemID='+item.id+'>Ubah</a>'+
                                '<a class="btn btn-danger btn-sm btnView" itemID='+item.id+'>View</a>&nbsp'+
                                '<a class="btn btn-danger btn-sm btnDelete" itemID='+item.id+'>Hapus</a>&nbsp'+
                                
                            '</td>'+
                            '</tr>';
                        })
                        $("#tujuan").html(x)
                        $(".btnUbah").on('click', function(){
                            var idData = $(this).attr("itemID");
                            $.ajax({
                                url : "{{url('/admin/satker/editData')}}/" + idData,
                                method : "GET",
                                success : function(data){
                                    $("#modalEdit").modal('show');
                                    $("#edit_nama_satker").val(data.nama_satker);
                                    $("#edit_kode_satker").val(data.kode_satker);
                                    $("#edit_email").val(data.email);
                                    $("#edit_alternatif_email").val(data.alternatif_email);
                                    $("#edit_no_telepon").val(data.no_telepon);
                                    $("#edit_alamat_kantor").val(data.alamat_kantor);
                                    $(".btnUbahData").attr("idEdit", data.id);
                                    $(".btnUbahData").on('click', function(){
                                        idData = $(this).attr("idEdit");
                                        namaSatker = $("#edit_nama_satker").val();
                                        kodeSatker = $("#edit_kode_satker").val();
                                        email = $("#edit_email").val();
                                        alternatif_email = $("#edit_alternatif_email").val();
                                        noTelp = $("#edit_no_telepon").val();
                                        alamatKantor = $("#edit_alamat_kantor").val();
                                        $.ajaxSetup({
                                            headers : {
                                                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                                            }
                                        });
                                        $.ajax({
                                            method : "POST",
                                            url : "{{url('/admin/satker/updateData')}}",
                                            data : {
                                                'idData' : idData,
                                                'namaSatker' : namaSatker,
                                                'kodeSatker' : kodeSatker,
                                                'email' : email,
                                                'alternatif_email' : alternatif_email,
                                                'noTelp' : noTelp,
                                                'alamatKantor' : alamatKantor,
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
                                url : "{{url('/admin/satker/destroyData')}}",
                                data : {
                                    'idData' : idData,
                                },
                                success : function(e){
                                    getDataFromDB();
                                }
                            });
                        })
                        $(".btnView").on('click', function(){
                            var idData = $(this).attr("itemID");
                                $.ajax({
                                    url : "{{url('/admin/satker/editData')}}/" + idData,
                                    method : "GET",
                                    success : function(data){
                                        $("#modalView").modal('show');
                                        $("#view_nama_satker").val(data.nama_satker);
                                        $("#view_kode_satker").val(data.kode_satker);
                                        $("#view_email").val(data.email);
                                        $("#view_alternatif_email").val(data.alternatif_email);
                                        $("#view_no_telepon").val(data.no_telepon);
                                        $("#view_alamat_kantor").val(data.alamat_kantor);
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