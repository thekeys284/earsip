@extends('layout.layout_admin')
@section('title')
 Database List Seksi
@endsection
@push('linkrel')
<!-- DataTables -->
    <link rel="stylesheet" href="../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">   
    <link rel="stylesheet" href="../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <meta name="_token" content="{{ csrf_token() }}">
@endpush
@section('title page')
Database List Seksi
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
                   <label for="recipient-name" class="col-form-label">Kode Seksi : </label>
                   <input type="number" class="form-control" id="kode_seksi">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Nama Seksi : </label>
                    <input type="text" class="form-control" id="seksi">
                </div>
                <div class="form-group">
                   <label for="recipient-name" class="col-form-label">Singkatan : </label>
                   <input type="text" class="form-control" id="singkatan">
                </div>
                <div class="input-group input-group-sm">
                   <label for="recipient-name" class="col-form-label">Level : </label>
                   <div class="input-group input-group-sm">
                        <select class="form-control select2" name="level" id="level" onChange="FetchBidang(this.value);">
                                <option></option>
                                <option>Provinsi</option>
                                <option>Kabupaten</option>
                        </select>
                   </div>      
                </div>
                <div class="input-group input-group-sm">
                   <label for="recipient-name" class="col-form-label">Bidang : </label>
                   <div class="input-group input-group-sm">
                        <select class="form-control select2" name="bidang" id="bidang">
                                <option></option>
                                @foreach($bidang as $bid)
                                    <option>{{$bid->bidang}}</option>
                                @endforeach
                        </select>
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
                   <label for="recipient-name" class="col-form-label">Kode Seksi : </label>
                   <input type="number" class="form-control" id="edit_kode_seksi">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Nama Seksi : </label>
                    <input type="text" class="form-control" id="edit_seksi">
                </div>
                <div class="form-group">
                   <label for="recipient-name" class="col-form-label">Singkatan : </label>
                   <input type="text" class="form-control" id="edit_singkatan">
                </div>
                <div class="input-group input-group-sm">
                    <label for="recipient-name" class="col-form-label">Level : </label>
                    
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
                   <label for="recipient-name" class="col-form-label">Kode Seksi : </label>
                   <input type="number" class="form-control" id="view_kode_seksi" readonly>
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Nama Seksi : </label>
                    <input type="text" class="form-control" id="view_seksi" readonly>
                </div>
                <div class="form-group">
                   <label for="recipient-name" class="col-form-label">Singkatan : </label>
                   <input type="text" class="form-control" id="view_singkatan" readonly>
                </div>
                <div class="form-group">
                   <label for="recipient-name" class="col-form-label">Level : </label>
                   <input type="text" class="form-control" id="view_level" readonly>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
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
                    <h3 class="card-title"  style="position:relative;"><b>Daftar Seksi</b></h3>    
                </div>
                <div class="col-md-4 text-right">
                    <button type="button" class="btn btn-block btn-sm btn-outline-success btn-flat btnAdd">
                        <b>Tambah Database List Seksi</b>
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
                        <th>Nama Seksi</th>
                        <th>Kode Seksi</th>
                        <th>Singkatan</th>
                        <th>Level</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id='tujuan'>
                  
                    </tbody>
                    <tfoot>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama Seksi</th>
                        <th>Kode Seksi</th>
                        <th>Singkatan</th>
                        <th>Level</th>
                        <th>Action</th>>
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
                $("#kode_seksi").val('');
                $("#seksi").val('');
                $("#singkatan").val('');
                $("#level").val('');
            }
            function resetModalEdit(){
                $("#modalEdit").modal('hide');
                $("#edit_kode_seksi").val('');
                $("#edit_seksi").val('');
                $("#edit_singkatan").val('');
                $("#edit_level").val('');

            }
            // ADD DATA
            $(".btnAdd").on('click', function(){
                $("#modalTambah").modal('show');

                $(".btnBuat").on('click', function(){
                    var kode_seksi = $("#kode_seksi").val();
                    var seksi = $("#seksi").val();
                    var singkatan = $("#singkatan").val();
                    var level = $("#level").val();
                    $.ajaxSetup({
                        headers : {
                            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        method : "POST",
                        url : '{{url("/admin/list_seksi/storeData")}}',
                        data : {
                            'kode_seksi' : kode_seksi,
                            'seksi' : seksi,
                            'singkatan' : singkatan,
                            'level' : level,
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
                    url : '{{url("/admin/list_seksi/getData")}}',
                    success : function(res){
                        $.each(res, function(index, item){
                            x = x + '<tr>'+
                            '<td class="text-center">'+(index+1)+'</td>'+
                            '<td>'+item.seksi+'</td>'+
                            '<td>'+item.kode_seksi+'</td>'+
                            '<td>'+item.singkatan+'</td>'+
                            '<td>'+item.level+'</td>'+
                            '<td class="text-center">'+
                                '<a class="btn btn-warning btn-sm btnUbah" itemID='+item.id+'>Ubah</a>&nbsp'+
                                '<a class="btn btn-primary btn-sm btnView" itemID='+item.id+'>View</a>&nbsp'+
                                '<a class="btn btn-danger btn-sm btnDelete" itemID='+item.id+'>Hapus</a>&nbsp'+
                            '</td>'+
                            '</tr>';
                        })
                        $("#tujuan").html(x)
                        $(".btnUbah").on('click', function(){
                            var idData = $(this).attr("itemID");
                            $.ajax({
                                url : "{{url('/admin/list_seksi/editData')}}/" + idData,
                                method : "GET",
                                success : function(data){
                                    $("#modalEdit").modal('show');
                                    $("#edit_kode_seksi").val(data.kode_seksi);
                                    $("#edit_seksi").val(data.seksi);
                                    $("#edit_singkatan").val(data.singkatan);
                                    $('#edit_level option').filter(function(){
                                      return ($(this).val()==data.level);
                                      }).prop('selected', true);
                                    $(".btnUbahData").attr("idEdit", data.id);
                                    $(".btnUbahData").on('click', function(){
                                        idData = $(this).attr("idEdit");
                                        kode_seksi = $("#edit_kode_seksi").val();
                                        seksi = $("#edit_seksi").val();
                                        singkatan = $("#edit_singkatan").val();
                                        $.ajaxSetup({
                                            headers : {
                                                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                                            }
                                        });
                                        $.ajax({
                                            method : "POST",
                                            url : "{{url('/admin/list_seksi/updateData')}}",
                                            data : {
                                                'idData' : idData,
                                                'kode_seksi' : kode_seksi,
                                                'seksi' : seksi,
                                                'singkatan' : singkatan,
                                                'level' : level,
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
                                url : "{{url('/admin/list_seksi/destroyData')}}",
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
                                    url : "{{url('/admin/list_seksi/editData')}}/" + idData,
                                    method : "GET",
                                    success : function(data){
                                        $("#modalView").modal('show');
                                        $("#view_kode_seksi").val(data.kode_seksi);
                                        $("#view_seksi").val(data.seksi);
                                        $("#view_singkatan").val(data.singkatan);
                                        $("#view_level").val(data.level);
                                    }
                                });
                        })
                    }
                });
            }
        });
    </script>
    <script>
      function FetchBidang(str){
        if (window.XMLHttpRequest){
          xmlhttp= new XMLHttpRequest();
        } else{
          xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange = function(){
          if (this.readystate==4 &&this.status==200){
            document.getElementById('bidang').innerHTML= this.responseText;
          }
        }

        xmlhttp.open("GET", "helper.php?value="+str, trus);
        xmlhttp.send();
      }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Select2 -->
    <script src="{{asset('../assets/plugins/select2/js/select2.full.min.js')}}"></script>
@endpush