@extends('panel.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Customer</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Data Customer</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    @include('common.alert')
    <!-- Main content -->
    <div class="row" style="padding-right:30px;">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              <a href="javascript:void(0)" class="btn btn-sm btn-success" id="tombol-tambah">Add Customer +</a>
              </div>
              <!-- ./card-header -->
              <div class="card-body">
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Alamat</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($customers as $c)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$c->nama}}</td>
                        <td>{{$c->email}}</td>
                        <td>{{$c->alamat}}</td>
                        <td>    
                        <a href="{{route('showDataCustomer', ["id" => $c->id ])}}" class="btn btn-sm btn-info" data-id="{{$c->id}}">Show</a>
                            <a href="javascript:void(0)" class="btn btn-sm btn-warning" id="tombol-edit" data-value="{{$c->id}}">Edit</a>
                            <a href="javascript:void(0)" class="btn btn-sm btn-danger" id="tombol-hapus" data-id="{{$c->id}}">Delete</a>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>



</div>

<div class="modal fade" id="tambah-edit-modal" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-judul"></h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="form-tambah-edit" name="form-tambah-edit" class="form-horizontal" enctype="multipart/form-data">
              @csrf
                    <div class="row">
                        <div class="col-sm-12">
                        

                            <div class="form-group">
                                <label for="name" class="col-sm-12 control-label">Nama</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="nama" name="nama" value="" required>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-12 control-label">alamat</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="alamat" name="alamat" value="" required>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-12 control-label">email</label>
                                    <div class="col-sm-12">
                                        <input type="email" class="form-control" id="email" name="email" value="" required>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-12 control-label">profile_picture</label>
                                    <div class="col-sm-12">
                                        <input type="file" class="form-control" id="profile_picture" name="profile_picture" value="" required>
                                    </div>
                                   
                            </div>
                        </div>

                        <div class="col-sm-offset-2 col-sm-12">
                            <button type="submit" class="btn btn-primary btn-block" id="tombol-simpan"
                                value="create">Simpan
                            </button>
                        </div>
        
                    </div>

                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit-edit-modal" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-judul"></h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="edit-tambah-edit" name="edit-tambah-edit" class="form-horizontal" enctype="multipart/form-data">
              @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name" class="col-sm-12 control-label">ID</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="id1" name="id1" value="value" required>
                                    </div>                          
                                </div>

                            <div class="form-group">
                                <label for="name" class="col-sm-12 control-label">Nama</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="nama1" name="nama1" required>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-12 control-label">alamat</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="alamat1" name="alamat1" required>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-12 control-label">email</label>
                                    <div class="col-sm-12">
                                        <input type="email" class="form-control" id="email1" name="email1" required>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-12 control-label">profile_picture</label>
                                    <div class="col-sm-12">
                                        <input type="file" class="form-control" id="profile_picture1" name="profile_picture1" required>
                                    </div>
                                   
                            </div>
                        </div>
                        <div class="col-sm-offset-2 col-sm-12">
                            <button type="submit" class="btn btn-primary btn-block" id="tombol-simpan-edit"
                                value="create" data-value="cariid(id)">Simpan
                            </button>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            });
    
            //TOMBOL TAMBAH DATA
            //jika tombol-tambah diklik maka
            $('#tombol-tambah').click(function () {
                $('#button-simpan').val("create-post"); //valuenya menjadi create-post
                $('#id').val(''); //valuenya menjadi kosong
                $('#form-tambah-edit').trigger("reset"); //mereset semua input dll didalamnya
                $('#modal-judul').html("Insert New Customer"); //valuenya tambah pegawai baru
                $('#tambah-edit-modal').modal('show'); //modal tampil

            });

            $("form[name='form-tambah-edit']").on("submit", function(ev) {
            ev.preventDefault(); // Prevent browser default submit.

            var formData = new FormData(this);
                
            $.ajax({
                url: "{{ route('storeDataCustomer') }}",
                type: "POST",
                data: formData,
                success: function (data) {
                iziToast.success({ //tampilkan izitoast 
                        title: 'Insert Data Success, 3s will be reloaded',
                        message: '{{ Session('
                        delete ')}}',
                        position: 'bottomRight'
                    
                    });
                    setTimeout(location.reload.bind(location), 3000);  //refresh halaman
                },
                cache: false,
                contentType: false,
                processData: false
            });
              
            });

            //TOMBOL EDIT DATA
            //jika tombol-edit diklik maka
            $(document).on('click', '#tombol-edit', function () {
                let id = $(this).data('value'); //mengambil id dari atribut data-id
                var url = "{{ route('editDataCustomer', ':id') }}";
                url.replace('?=id', '');
                $.ajax({
                    
                   url: url.replace(':id', ''),
                    method: "GET",
                    data: {
                        id: id
                    },
                    dataType: "json",
                    success: function (data) {
                        $('#modal-judul').html("Edit Customer"); //valuenya edit pegawai
                        $('#button-simpan').val("update-post"); //valuenya menjadi update-post
                        $('#id1').val(data.id); //valuenya menjadi id yang di edit
                        $('#nama1').val(data.nama); //valuenya menjadi nama yang di edit
                        $('#alamat1').val(data.alamat); //valuenya menjadi alamat yang di edit
                        $('#email1').val(data.email); //valuenya menjadi email yang di edit
                        $('#edit-edit-modal').modal('show'); //modal tampil
                    }
                });
            });

            $("form[name='edit-tambah-edit']").on("submit", function(ev) {
            ev.preventDefault(); // Prevent browser default submit.
            var id = this.elements["id1"].value;
            // var id=$('#id1').value;
            var formData = new FormData(this);

            var url = "{{ route('updateDataCustomer', ':id') }}";
                
            $.ajax({
                url: url.replace(':id', id),
                type: "POST",
                data: formData,
                success: function (data) {
                iziToast.success({ //tampilkan izitoast 
                        title: 'Insert Data Success, 3s will be reloaded',
                        message: '{{ Session('
                        delete ')}}',
                        position: 'bottomRight'
                    
                    });
                    setTimeout(location.reload.bind(location), 3000);  //refresh halaman
                },
                cache: false,
                contentType: false,
                processData: false
            });
              
            });

            // document.getElementById('id1').style.display = 'none';

        
           //jika tombol hapus pada modal konfirmasi di klik maka
            $('#tombol-hapus').click(function () {
                let id = $(this).data('id'); //mengambil id dari atribut data-id
                console.log(url, id);
                var url = "{{ route('deleteDataCustomer', ':id') }}";
               
                $.ajax({
                   
                    type: "POST",
                    method: "post",
                    data: {
                        _method:"post",
                        "_token": "{{ csrf_token() }}",
                        // id: id2
                    },
                    url: url.replace(':id', id),
                    success: function (data) {
                        iziToast.success({ //tampilkan izitoast 
                            title: 'Delete Data Success, 3s will be reloaded',
                            message: '{{ Session('
                            delete ')}}',
                            position: 'bottomRight'
                        
                        });
                        setTimeout(location.reload.bind(location), 3000);  //refresh halaman
                    }
                });
            });
</script>

@endsection