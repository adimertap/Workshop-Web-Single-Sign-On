<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>SIM Bengkel</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="../node_modules/bootstrap-social/bootstrap-social.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="../stisla/assets/css/style.css">
    <link rel="stylesheet" href="../stisla/assets/css/components.css">

    <!-- Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
    <style>
        #mapid {
            height: 250px;
        }

    </style>


</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="login-brand">
                            <img src="../image/favicon.png" alt="logo" width="60" class="">
                            <h5 class="mt-3">Sistem Informasi Manajemen Bengkel</h5>
                        </div>

                        <div class="card card-primary">
                            <div class="card-header text-center">
                                <center>
                                    <h4>Register</h4>
                                </center>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                    @csrf
                                    <h6>Data Bengkel</h6>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="nama_bengkel">Nama Bengkel</label>
                                            <input id="nama_bengkel" type="text" class="form-control"
                                                name="nama_bengkel" placeholder="Input Nama Bengkel" autofocus>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="alamat_bengkel">Alamat Bengkel</label>
                                            <input id="alamat_bengkel" type="text" placeholder="Input Alamat Bengkel"
                                                class="form-control" name="alamat_bengkel">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label class="small mb-1" for="logo_bengkel">Logo Bengkel</label>
                                            <input class="form-control" id="logo_bengkel" type="file"
                                                name="logo_bengkel" accept="image/*">
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="nohp_bengkel">No. Telp Bengkel</label>
                                            <input id="nohp_bengkel" type="number" class="form-control"
                                                placeholder="Input No. Telp Bengkel" name="nohp_bengkel">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label class="small mb-1" for="provinsi">Provinsi</label>
                                            <select class="form-control" name="provinsi">
                                                <option value="" holder>provinsi</option>
                                                @foreach ($provinsi as $item)
                                                <option value="{{ $item->id_provinsi }}">
                                                    {{ $item->nama_provinsi }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="form-group col-6">
                                            <label class="small mb-1" for="kabupaten">Kabupaten</label>
                                            <select class="form-control" name="id_kabupaten">
                                                <option value="" holder>Kota</option>
                                            </select> </div>

                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="latitude">Latitude Bengkel</label>
                                            <input id="latitude" name="latitude" type="text" class="form-control"
                                                placeholder="Input Latitude Bengkel" name="latitude" autofocus>
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="longitude">Longitude Bengkel</label>
                                            <input id="longitude" name="longitude" type="text" class="form-control"
                                                placeholder="Input Longitude bengkel" name="longitude">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col">
                                            <div id="mapid">

                                            </div>
                                        </div>
                                    </div>


                                    <hr>
                                    <h6>Data Pemilik</h6>

                                    <div class="row">
                                        <div class="form-group col-4">
                                            <label class="small mb-1" for="name">Nama</label>
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ old('name') }}" required placeholder="Input Nama Pemilik"
                                                autocomplete="name" autofocus>

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-4">
                                            <label class="small mb-1 mr-1" for="jenis_kelamin">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control"
                                                class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                                <option value="{{ old('jenis_kelamin')}}"> Pilih Jenis Kelamin</option>
                                                <option value="Laki-Laki">Laki Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                            @error('jenis_kelamin')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                        <div class="form-group col-4">
                                            <label class="small mb-1" for="no_telp">No.Telp Pemilik</label>
                                            <input id="no_telp" type="number" class="form-control"
                                                placeholder="Input No. Telp Pemilik" name="no_telp">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1 mr-1" for="tempat_lahir">Tempat Lahir</label>
                                            <input class="form-control" id="tempat_lahir" type="text"
                                                name="tempat_lahir" placeholder="Input Tempat Lahir"
                                                class="form-control @error('tempat_lahir') is-invalid @enderror" />
                                            @error('tempat_lahir')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1 mr-1" for="tanggal_lahir">Tanggal Lahir</label>
                                            <input class="form-control" id="tanggal_lahir" type="date"
                                                name="tanggal_lahir"
                                                class="form-control @error('tanggal_lahir') is-invalid @enderror" />
                                            @error('tanggal_lahir')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label class="small mb-1" for="username">Username</label>
                                            <input id="username" type="text"
                                                class="form-control @error('username') is-invalid @enderror"
                                                name="username" placeholder="Input Username"
                                                value="{{ old('username') }}" required autocomplete="username"
                                                autofocus>

                                            @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="email">Email</label>
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                placeholder="Input Email" value="{{ old('email') }}" required
                                                autocomplete="email">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="password" class="d-block">Password</label>
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Input Password" name="password" required
                                                autocomplete="new-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="password-confirm" class="d-block">Password Confirmation</label>
                                            <input id="password-confirm" type="password" class="form-control"
                                                placeholder="Konfirmasi Password" name="password_confirmation" required
                                                autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="form-group mt-4">
                                        <button type="submit" class="btn btn-primary btn-block">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </form>


                                <div class="simple-footer">
                                    Copyright &copy; Bengkel 2021
                                </div>

                            </div>
                        </div>
                    </div>
        </section>
    </div>


    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="../stisla/assets/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="../stisla/assets/js/scripts.js"></script>
    <script src="../stisla/assets/js/custom.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            map = L.map('mapid').fitWorld();
            L.tileLayer(
                'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                    maxZoom: 18,
                    id: 'mapbox/streets-v11',
                    tileSize: 512,
                    zoomOffset: -1,
                    accessToken: 'pk.eyJ1IjoiYXJ0YW5pbGExNSIsImEiOiJja29hN2IxeW0weWRlMm9zMnA3eTlmem04In0.O2Mk0N3OYzJ40NXBuOCevQ'
                }).addTo(map);

            function onLocationFound(e) {

                map.flyTo(e.latlng, 15)
                L.marker(e.latlng).addTo(map)
                    .bindPopup("You are here").openPopup();

            }

            function onLocationError(e) {
                alert(e.message);
            }

            map.on('locationfound', onLocationFound);
            map.on('locationerror', onLocationError);

            map.locate({
                setView: true,
                maxZoom: 15
            });

            var mark;
            map.on('click', function (e) {
                if (mark) { // check
                    map.removeLayer(mark); // remove
                }
                mark = new L.Marker(e.latlng).addTo(map);
                var coord = e.latlng;
                var lat = coord.lat;
                var lng = coord.lng;
                $("#latitude").val(lat);
                $("#longitude").val(lng);


            });
        });
        $(document).ready(function () {

            $('select[name="provinsi"]').on('change', function () {
                var cityId = $(this).val();
                if (cityId) {
                    $.ajax({
                        url: 'getkabupaten/' + cityId,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="id_kabupaten"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="id_kabupaten"]').append(
                                    '<option value="' +
                                    key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="id_kabupaten"]').empty();
                }
            });

        });

    </script>

    <!-- Page Specific JS File -->

</body>

</html>
