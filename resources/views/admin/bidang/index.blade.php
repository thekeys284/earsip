@extends('layout.layout_admin')
@section('title')
 Database Bidang
@endsection
@push('linkrel')
<!-- DataTables -->
    <link rel="stylesheet" href="../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">   
    <link rel="stylesheet" href="../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <meta name="_token" content="{{ csrf_token() }}">
@endpush
@section('title page')
Database Bidang
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
                   <label for="recipient-name" class="col-form-label">Nama Bidang : </label>
                   <input type="text" class="form-control" id="bidang">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Kode Bidang : </label>
                    <input type="number" class="form-control" id="kode_bidang">
                </div>
                <div class="form-group">
                   <label for="recipient-name" class="col-form-label">Alamat Email : </label>
                   <input type="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Email Alternatif : </label>
                    <input type="email" class="form-control" id="alternatif_email">
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
                   <label for="recipient-name" class="col-form-label">Nama Bidang : </label>
                   <input type="text" class="form-control" id="edit_bidang">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Kode Bidang : </label>
                    <input type="number" class="form-control" id="edit_kode_bidang">
                </div>
                <div class="form-group">
                   <label for="recipient-name" class="col-form-label">Alamat Email : </label>
                   <input type="email" class="form-control" id="edit_email">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Email Alternatif : </label>
                    <input type="email" class="form-control" id="edit_alternatif_email">
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
                    <h3 class="card-title"  style="position:relative;"><b>Daftar Bidang</b></h3>    
                </div>
                <div class="col-md-4 text-right">
                    <button type="button" class="btn btn-block btn-sm btn-outline-success btn-flat btnAdd">
                        <b>Tambah Database Bidang</b>
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
                        <th>Kode Seksi</th>
                        <th>Kode Bidang</th>
                        <th>Alamat Email</th>
                        <th>Email Alternatif</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id='tujuan'>
                  
                    </tbody>
                    <tfoot>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Bidang</th>
                        <th>Kode Bidang</th>
                        <th>Alamat Email</th>
                        <th>Email Alternatif</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
              </div>
            </div>
        </div>
    </div>
  </div>


    <!-- <div class="row">
        <div class="col-md-9"></div>
        <div class="col-md-3">
            <a class="btn btn-primary col-md-12 btnAdd">
                Tambah Bidang
            </a>
        </div>
    </div>
    <table id="example1" class="table table-bordered table-hover display">
        <thead>
            <th>No</th>
            <th>Bidang</th>
            <th>Kode Bidang</th>
            <th>Alamat Email</th>
            <th>Email Alternatif</th>
            <th>Action</th>
        </thead>
        <tbody id="tujuan">
            
        </tbody>
        <tfoot>
        <th>No</th>
            <th>Bidang</th>
            <th>Kode Bidang</th>
            <th>Alamat Email</th>
            <th>Email Alternatif</th>
            <th>Action</th>
        </tfoot>
    </table> -->
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
                $("#bidang").val('');
                $("#kode_bidang").val('');
                $("#email").val('');
                $("#alternatif_email").val('');
            }
            function resetModalEdit(){
                $("#modalEdit").modal('hide');
                $("#edit_bidang").val('');
                $("#edit_kode_bidang").val('');
                $("#edit_email").val('');
                $("#edit_alternatif_email").val('');
            }
            // ADD DATA
            $(".btnAdd").on('click', function(){
                $("#modalTambah").modal('show');

                $(".btnBuat").on('click', function(){
                    var namaBidang = $("#bidang").val();
                    var kodeBidang = $("#kode_bidang").val();
                    var email = $("#email").val();
                    var alternatif_email = $("#alternatif_email").val();
                    $.ajaxSetup({
                        headers : {
                            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        method : "POST",
                        url : '{{url("/admin/bidang/storeData")}}',
                        data : {
                            'namaBidang' : namaBidang,
                            'kodeBidang' : kodeBidang,
                            'email' : email,
                            'alternatif_email' : alternatif_email,
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
                    url : '{{url("/admin/bidang/getData")}}',
                    success : function(res){
                        $.each(res, function(index, item){
                            x = x + '<tr>'+
                            '<td>'+(index+1)+'</td>'+
                            '<td>'+item.bidang+'</td>'+
                            '<td>'+item.kode_bidang+'</td>'+
                            '<td>'+item.email+'</td>'+
                            '<td>'+item.alternatif_email+'</td>'+
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
                                url : "{{url('/admin/bidang/editData')}}/" + idData,
                                method : "GET",
                                success : function(data){
                                    $("#modalEdit").modal('show');
                                    $("#edit_bidang").val(data.bidang);
                                    $("#edit_kode_bidang").val(data.kode_bidang);
                                    $("#edit_email").val(data.email);
                                    $("#edit_alternatif_email").val(data.alternatif_email);
                                    $(".btnUbahData").attr("idEdit", data.id);
                                    $(".btnUbahData").on('click', function(){
                                        idData = $(this).attr("idEdit");
                                        namaBidang = $("#edit_bidang").val();
                                        kodeBidang = $("#edit_kode_bidang").val();
                                        email = $("#edit_email").val();
                                        alternatif_email = $("#edit_alternatif_email").val();
                                        $.ajaxSetup({
                                            headers : {
                                                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                                            }
                                        });
                                        $.ajax({
                                            method : "POST",
                                            url : "{{url('/admin/bidang/updateData')}}",
                                            data : {
                                                'idData' : idData,
                                                'namaBidang' : namaBidang,
                                                'kodeBidang' : kodeBidang,
                                                'email' : email,
                                                'alternatif_email' : alternatif_email,
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
                                url : "{{url('/admin/bidang/destroyData')}}",
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