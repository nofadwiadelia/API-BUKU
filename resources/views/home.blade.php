@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Input Data</div>

                <div class="card-body">
                    @if (session('status'))     
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" action="" role="form">
                    {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="judul" class="col-md-4 col-form-label text-md-right">Judul</label>

                            <div class="col-md-6">
                                <input id="judul" type="text" class="form-control" name="judul">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gambar" class="col-md-4 col-form-label text-md-right">Gambar</label>

                            <div class="col-md-6">
                                <input id="gambar" type="text" class="form-control" name="gambar">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="penulis" class="col-md-4 col-form-label text-md-right">Penulis</label>

                            <div class="col-md-6">
                                <input id="penulis" type="text" class="form-control" name="penulis">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tahun" class="col-md-4 col-form-label text-md-right">Tahun</label>

                            <div class="col-md-6">
                                <input id="tahun" type="text" class="form-control" name="tahun" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="penerbit" class="col-md-4 col-form-label text-md-right">Penerbit</label>

                            <div class="col-md-6">
                                <input id="penerbit" type="text" class="form-control" name="penerbit" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kategori" class="col-md-4 col-form-label text-md-right">Kategori</label>

                            <div class="col-md-6">
                                <input id="kategori" type="text" class="form-control" name="kategori" >
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button id="btnpost" type="submit" class="btn btn-primary">
                                    POST
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    
    <script type="text/javascript">
    $(document).on('click', '#btnpost', function(event){
            alert('Yakin ingin menambah data?');
            event.preventDefault();
            $.ajax({
                    url: 'http://localhost:8000/api/buku',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        "judul": $('#judul').val(),
                        "gambar": $('#gambar').val(),
                        "penulis": $('#penulis').val(),
                        "tahun": $('#tahun').val(),
                        "penerbit": $('#penerbit').val(),
                        "kategori": $('#kategori').val(),
                    },
                    headers: {
                        Authorization : 'Bearer {{Auth::user()->api_token}}',
                    },
                    succes: function(data){
                        console.info(data);
                        alert('Data Ditambahkan');
                        $('#judul').val("");
                        $('#gambar').val("");
                        $('#penulis').val("");
                        $('#tahun').val("");
                        $('#penerbit').val("");
                        $('#kategori').val("");
                    }
                });
        });
    
    </script>

@endsection

