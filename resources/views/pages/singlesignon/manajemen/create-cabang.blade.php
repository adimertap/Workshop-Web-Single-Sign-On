@extends('layouts.Admin.adminsinglesignon')

@section('content')

<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-fluid">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i class="fas fa-cog"></i></div>
                            Tambah Data Cabang
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a href="{{ route('manajemen-cabang.index') }}"
                            class="btn btn-sm btn-light text-primary mr-2">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <div class="container">
        <div class="card">
            <div class="card-header border-bottom">
                <div class="nav nav-pills nav-justified flex-column flex-xl-row nav-wizard" id="cardTab" role="tablist">
                    <!-- Wizard navigation item 1-->
                    <a class="nav-item nav-link active" id="wizard1-tab" href="#wizard1" data-toggle="tab" role="tab"
                        aria-controls="wizard1" aria-selected="true">
                        <div class="wizard-step-text">
                            <div class="wizard-step-text-name">Formulir Cabang</div>
                            <div class="wizard-step-text-details">Lengkapi formulir berikut</div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="card-body">
                <div class="tab-content" id="cardTabContent">
                    <!-- Wizard tab pane item 1-->
                    <div class="tab-pane py-2 py-xl-2 fade show active" id="wizard1" role="tabpanel"
                        aria-labelledby="wizard1-tab">
                        <div class="row justify-content-center">
                            <div class="col-xxl-6 col-xl-9">

                                <form action="{{ route('manajemen-cabang.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <h5 class="card-title">Input Data Cabang</h5>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="small mb-1" for="nama_cabang">Nama
                                                        Cabang</label><span class="mr-4 mb-3"
                                                        style="color: red">*</span>
                                                    <input id="nama_cabang" type="text" class="form-control"
                                                        name="nama_cabang" placeholder="Input Nama Cabang"
                                                        value="{{ old('nama_cabang') }}" autofocus required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="small mb-1" for="alamat_cabang">Alamat Cabang</label>
                                                    <input id="alamat_cabang" type="text"
                                                        placeholder="Input Alamat Bengkel" class="form-control"
                                                        name="alamat_cabang" value="{{ old('alamat_cabang') }}">
                                                </div>
                                            </div>

                                            {{-- <div class="row">
                                                <div class="form-group col-6">
                                                    <label class="small mb-1" for="provinsi">Provinsi</label>
                                                    <select class="form-control" name="provinsi">
                                                        <option value="" holder>Pilih Provinsi</option>
                                                        @foreach ($provinsi as $item)
                                                        <option value="{{ $item->id_provinsi }}">
                                            {{ $item->name }}</option>
                                            @endforeach

                                            </select>
                                        </div>
                                        <div class="form-group col-6">
                                            <label class="small mb-1" for="kabupaten">Kabupaten/Kota</label>
                                            <select class="form-control" name="id_kabupaten">
                                                <option value="" holder>Pilih Kabupaten/Kota</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label class="small mb-1" for="kecamatan">Kecamatan</label>
                                            <select class="form-control" name="id_kecamatan">
                                                <option value="" holder>Pilih Kecamatan</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-6">
                                            <label class="small mb-1" for="desa">Desa</label>
                                            <select class="form-control" name="id_desa">
                                                <option value="" holder>Pilih Desa</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="latitude">Latitude Bengkel</label><span class="mr-4 mb-3"
                                                style="color: red">*</span>
                                            <input id="latitude" name="latitude" type="text" class="form-control"
                                                placeholder="Input Latitude Bengkel" name="latitude"
                                                value="{{ old('latitude') }}" autofocus required>
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="longitude">Longitude Bengkel</label><span class="mr-4 mb-3"
                                                style="color: red">*</span>
                                            <input id="longitude" name="longitude" type="text" class="form-control"
                                                placeholder="Input Longitude bengkel" name="longitude"
                                                value="{{ old('longitude') }}" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col">
                                            <small class="text-muted">Silahkan klik peta untuk menentukan lokasi
                                                (latitude dan longitude) bengkel</small>
                                            <div id="mapid">

                                            </div>
                                        </div>
                                    </div> --}}
                            </div>
                        </div>
                        <hr>
                        <h5 class="card-title">Input Data Kepala Cabang</h5>
                        <div class="row">
                            <div class="form-group col-4">
                                <label class="small mb-1" for="nama_pegawai">Nama</label><span class="mr-4 mb-3"
                                    style="color: red">*</span>
                                <input id="nama_pegawai" type="text" class="form-control @error('nama_pegawai') is-invalid @enderror"
                                    name="nama_pegawai" value="{{ old('nama_pegawai') }}" required placeholder="Input Nama Pemilik"
                                    autocomplete="nama_pegawai" autofocus required>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-4">
                                <label class="small mb-1" for="nik_pegawai">NIK Pemilik <small class="text-muted">*16
                                        digit</small></label> <span class="mr-4 mb-3" style="color: red">*</span>
                                <input id="nik_pegawai" type="text" class="form-control" placeholder="Input NIK Pemilik"
                                    name="nik_pegawai" value="{{ old('nik_pegawai') }}" minlength="16" maxlength="16"
                                    required>
                            </div>
                            <div class="form-group col-4">
                                <label class="small mb-1" for="npwp_pegawai">NPWP Pemilik <small class="text-muted">*16
                                        digit</small></label>
                                <input id="npwp_pegawai" type="text" class="form-control"
                                    placeholder="Input NPWP Pemilik" name="npwp_pegawai"
                                    value="{{ old('npwp_pegawai') }}" minlength="16" maxlength="16" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-4">
                                <label class="small mb-1 mr-1" for="jenis_kelamin">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control"
                                    value="{{ old('jenis_kelamin') }}"
                                    class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                    <option value="{{ old('jenis_kelamin')}}"> Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki">Laki Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                @error('jenis_kelamin')<div class="text-danger small mb-1">{{ $message }}
                                </div> @enderror
                            </div>
                            <div class="form-group col-4">
                                <label class="small mb-1" for="no_telp">No.Telp Pemilik</label> <span class="mr-4 mb-3"
                                    style="color: red">*</span>
                                <input id="no_telp" type="text" class="form-control" value="{{ old('no_telp') }}"
                                    placeholder="Input No. Telp Pemilik" name="no_telp" required>
                            </div>
                            <div class="form-group col-4">
                                <label for="alamat">Alamat</label>
                                <input id="alamat" type="text" placeholder="Input Alamat" value="{{ old('alamat') }}"
                                    class="form-control" name="alamat">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                <label class="small mb-1 mr-1" for="tempat_lahir">Tempat Lahir</label>
                                <input class="form-control" id="tempat_lahir" type="text" name="tempat_lahir"
                                    placeholder="Input Tempat Lahir" value="{{ old('tempat_lahir') }}"
                                    class="form-control @error('tempat_lahir') is-invalid @enderror" />
                                @error('tempat_lahir')<div class="text-danger small mb-1">{{ $message }}
                                </div> @enderror
                            </div>
                            <div class="form-group col-6">
                                <label class="small mb-1 mr-1" for="tanggal_lahir">Tanggal Lahir</label>
                                <input class="form-control" id="tanggal_lahir" type="date" name="tanggal_lahir"
                                    value="{{ old('tanggal_lahir') }}"
                                    class="form-control @error('tanggal_lahir') is-invalid @enderror" />
                                @error('tanggal_lahir')
                                <div class="text-danger small mb-1">{{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="small mb-1 mr-1" for="username">Username</label><span class="mr-4 mb-3"
                                    style="color: red">*</span>
                                <input class="form-control" id="username" type="text" name="username"
                                    placeholder="Input Username" />
                            </div>
                            <div class="form-group col-md-6">
                                <label class="small mb-1 mr-1" for="email">Email</label><span class="mr-4 mb-3"
                                    style="color: red">*</span>
                                <input class="form-control" id="email" type="email" name="email"
                                    placeholder="Input Email" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for="password" class="d-block">Password</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Input Password" name="password" required autocomplete="new-password">

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
                        <div class="form-row">
                            <label class="small">Pilih Aplikasi yang Tersedia!</label>
                            <br>
                            <div class="form-group ml-3">
                                @foreach ($role as $item)
                                <input type="checkbox" name="role[]" value="{{ $item->id_sso_aplikasi }}">
                                <label for="role[]"> {{ $item->nama_aplikasi }}</label><br>
                                @endforeach
                            </div>
                        </div>
                        <hr class="my-4" />
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('manajemen-cabang.index') }}" class="btn btn-light">Kembali</a>
                            <button class="btn btn-primary" type="Submit">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</main>

<script>
    $(document).ready(function () {
        $('#validasierror').click();
    });

</script>

<script>
        $(function () {
            $("input[name='no_telp']").on('input', function (e) {
                $(this).val($(this).val().replace(/[^0-9]/g, ''));
            });
        });
        $(function () {
            $("input[name='nik_pegawai']").on('input', function (e) {
                $(this).val($(this).val().replace(/[^0-9]/g, ''));
            });
        });
        $(function () {
            $("input[name='npwp_pegawai']").on('input', function (e) {
                $(this).val($(this).val().replace(/[^0-9]/g, ''));
            });
        });

    </script>

{{-- <script type="text/javascript">
    var BengkelIcon = L.icon({
        iconUrl: 'assets/bengkel.png',
        iconSize: [35, 35],
        iconAnchore: [22, 94],
        popupAnchore: [-3, -76]
    });
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
                .bindPopup("Anda berada disini!").openPopup();

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
            mark = new L.Marker(e.latlng, {
                icon: BengkelIcon
            }).addTo(map);
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
                        $('select[name="id_kecamatan"]').empty();
                        $('select[name="id_desa"]').empty();
                        $('select[name="id_kabupaten"]').append(
                            '<option value="" holder>Pilih Kabupaten/Kota</option>');
                        $('select[name="id_kecamatan"]').append(
                            '<option value="" holder>Pilih Kecamatan</option>');
                        $('select[name="id_desa"]').append(
                            '<option value="" holder>Pilih Desa</option>');
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

    $(document).ready(function () {
        $('select[name="id_kabupaten"]').on('change', function () {
            var cityId = $(this).val();
            if (cityId) {
                $.ajax({
                    url: 'getkecamatan/' + cityId,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="id_kecamatan"]').empty();
                        $('select[name="id_desa"]').empty();

                        $('select[name="id_kecamatan"]').append(
                            '<option value="" holder>Pilih Kecamatan</option>'
                        );
                        $('select[name="id_desa"]').append(
                            '<option value="" holder>Pilih Desa</option>')

                        $.each(data, function (key, value) {
                            $('select[name="id_kecamatan"]').append(
                                '<option value="' +
                                key + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="id_kecamatan"]').empty();
            }
        });

    });

    $(document).ready(function () {
        $('select[name="id_kecamatan"]').on('change', function () {
            var cityId = $(this).val();
            if (cityId) {
                $.ajax({
                    url: 'getdesa/' + cityId,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="id_desa"]').empty();
                        $('select[name="id_desa"]').append(
                            '<option value="" holder>Pilih Desa</option>')
                        $.each(data, function (key, value) {
                            $('select[name="id_desa"]').append(
                                '<option value="' +
                                key + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="id_desa"]').empty();
            }
        });

    });

</script> --}}
@endsection
