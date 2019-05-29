<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- My Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Viga" rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" href="/css/style.css">

    <title>BooFind</title>
    <script src="{{ asset('/js/jquery.min.js') }}"></script>

    <!--     Fonts and icons     -->
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- CSS Files -->
    <!-- CSS Just for demo purpose, don't include it in your project -->
    </head>
    <style>
    p{
        text-align: center;
    }
    </style>
    <body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light ">
    <div class="container">
        <a class="navbar-brand" href="#">BooFind</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
        </div>
        </div>
    </div>
    </nav>
    <!-- End Navbar -->

    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Get work done <span>faster</span><br> and <span>with</span> us </h1>
    </div>
    </div>
    <!-- End Jumbotron -->

    <!-- Container -->
    <div class="container">

    <!-- Info Panel -->
    <div class="row justify-content-center">
        <div class="col-10 info-panel">
        
            <!-- Search form -->
            <form class="form-inline md-form form-sm active-cyan active-cyan-2 mt-2">
                <input id="judul" class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Judul" name="judul" aria-label="Search">
                <button id="btn-search" class="btn btn-unique btn-rounded btn-sm my-0" type="submit">Search</button>
            </form>
        
        </div>
    </div>
    <!-- End Info Panel -->

    <!-- List DATA BUKU -->
    <br/>
    <div id="list">
    
    </div>

    <!-- Card -->
    <!-- <div class="row workingspace">
        <div class="card" style="width: 18rem;">
            <img src="http://gpu.id/assets/images/uploads/dirimg_buku/cover_buku_90475.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Detail</a>
            </div>
        </div>
    </div> -->
    <!-- End Card -->


    <!-- Footer -->
    <div class="row footer">
        <div class="col text-center">
        <p>2019 All Rights Reserved by BooFind</p>
        </div>
    </div>
    <!-- End Footer -->

    </div>
    <!-- End Container -->

    <!-- Optional JavaScript -->
    
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
<script type="text/javascript">
    $(document).on('click', '#btn-search', function(event){
            alert('Yakin ingin mencari data?');
            event.preventDefault();
            $.ajax({
            url: 'http://localhost:8000/api/dataBuku',
            type: 'get',
            dataType : 'json',
            data: {
                    "judul": $('#judul').val()
                },
            success: function (data) {
                console.info(data);
                $('#list').empty();
                $.each(data, function(key, value){
                $('#list').append('<p>'+"Judul : "+value['judul']+'<br/>'+"Penulis : "+value['penulis']+'<br/>'+"Tahun : "+value['tahun']+'<br/>'+"Penerbit : "+value['penerbit']+'<br/>'+"Kategori : "+value['kategori']+'</p>'+'<p>'+'<img src="'+value['gambar']+'" style="width:210px; height:300px;" />'+'</p>'+'<p>'+'<br/>'+'<br/>'+'</p>')
                
              })
            }
        });
        });
    </script>