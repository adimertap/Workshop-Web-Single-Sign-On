@extends('layouts.Admin.adminfrontoffice')

@section('content')
{{-- HEADER --}}
<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="package"></i></div>
                            Data Harga Jual Sparepart
                        </h1>
                        <div class="page-header-subtitle">Data harga jual sparepart pada bengkel</div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- MAIN PAGE CONTENT --}}

    <div class="container-fluid mt-n10">
        <div class="card mb-4">
            <div class="card card-header-actions">
                <div class="card-header">List Sparepart
                </div>
            </div>
            <div class="card-body">
                <div class="datatable">
                    @if(session('messageberhasil'))
                    <div class="alert alert-success" role="alert"> <i class="fas fa-check"></i>
                        {{ session('messageberhasil') }}
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @endif
                    @if(session('messagehapus'))
                    <div class="alert alert-danger" role="alert"> <i class="fas fa-check"></i>
                        {{ session('messagehapus') }}
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @endif
                    {{-- SHOW ENTRIES --}}
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered table-hover dataTable" id="dataTable" width="100%"
                                    cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 20px;">No</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 20px;">Kode Sparepart</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 20px;">Nama Sparepart</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 20px;">Jenis Sparepart</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 20px;">Merk Sparepart</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 80px;">Harga Jual</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 20px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($harga as $item)
                                        <tr role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}</th>
                                            <td>{{ $item->sparepart->kode_sparepart }}</td>
                                            <td>{{ $item->sparepart->nama_sparepart }}</td>
                                            <td>{{ $item->sparepart->jenissparepart->jenis_sparepart }}</td>
                                            <td>{{ $item->sparepart->merksparepart->merk_sparepart }}</td>
                                            <td>Rp.
                                                {{ number_format($item->harga_jual,2,',','.') }}</td>
                                            <td>
                                                <a href="" class="btn btn-primary btn-datatable  mr-2" type="button"
                                                    data-toggle="modal" data-target="#Modaledit-{{ $item->id_harga }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL EDIT ------------------------------------------------------------------------}}
    @forelse ($harga as $item)
    <div class="modal fade" id="Modaledit-{{ $item->id_harga }}" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Data Harga Sparepart</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <form action="{{ route('harga-jual.update', $item->id_harga) }}" id="formedit" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <div class="small">{{ $item->Sparepart->nama_sparepart }} </div>
                        <hr>
                        </hr>
                        <div class="form-group">
                            <label class="small mb-1 mr-1" for="harga_jual_edit">Harga Jual</label><span
                                class="mr-4 mb-3" style="color: red">*</span>
                            <input class="form-control edit_harga_jual" name="harga_jual_edit" type="number"
                                id="edit_harga_jual" value="{{ $item->harga_jual }}" />
                            <div class="small text-primary">Detail Harga :
                                <span id="detaileditjual"
                                    class="detaileditjual">Rp.{{ number_format($item->harga_jual,2,',','.')}}</span>
                            </div>
                            <div class="small" id="alerttanggal" style="display:none">
                                <span class="font-weight-500 text-danger">Error! Anda Belum Memasukan Harga Jual</span>
                                <button class="close" type="button" onclick="$(this).parent().hide()"
                                    aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary" onclick="submit1({{ $item->id_harga }})"
                                type="button">Ubah</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    @empty

    @endforelse
</main>

<script>
    $(function () {
        $("input[name='harga_jual']").on('input', function (e) {
            $(this).val($(this).val().replace(/[^0-9]/g, ''));
        });
    });

    function submit1(id_harga) {
        var _token = $('#formedit').find('input[name="_token"]').val()
        var harga_jual = $('#formedit').find('input[name="harga_jual_edit"]').val()

        var data = {
            _token: _token,
            id_harga: id_harga,
            harga_jual: harga_jual
        }

        if (harga_jual == '' | harga_jual == 0) {
            $('#alerttanggal').show()
        } else {
            $.ajax({
                method: 'put',
                url: '/frontoffice/harga-jual/' + id_harga,
                data: data,
                success: function (response) {
                    window.location.href = '/frontoffice/harga-jual'
                },
                error: function (error) {
                    console.log(error)
                }

            });
        }

    }

    $(document).ready(function () {
        var table = $('#dataTablesparepart').DataTable()
        $('#validasierror').click();
        // $('#validasierroredit').click();

        $('.edit_harga_jual').each(function () {
            $(this).on('input', function () {
                var harga = $(this).val()
                var harga_fix = new Intl.NumberFormat('id', {
                    style: 'currency',
                    currency: 'IDR'
                }).format(harga)

                var harga_paling_fix = $(this).parent().find('.detaileditjual')
                $(harga_paling_fix).html(harga_fix);
            })
        })


    });

</script>


@endsection
