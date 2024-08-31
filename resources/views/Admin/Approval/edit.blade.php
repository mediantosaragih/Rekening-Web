@extends('Master.Layouts.app')

@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-gray">Master Data</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->

<!-- ROW -->
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header justify-content-between">
                <h3 class="card-title">Tambah Data</h3>
            </div>
            <section class="content">
                <div class="card-body">
                @foreach($detail_divisi as $detail_divisi)
                    <form action="{{ route('admin.rekening.store') }}" method="post">
                        @csrf
                        <div class="container-fluid px-4">
                            <div class="row">
                                <div class="col-md-8">
                                    <label class="col-form-label form-label">Nama</label>
                                    <input name="nama" type="text" class="form-control" required>
                                </div>
                                <div class="col-md-8">
                                    <label class="col-form-label form-label">Tempat Lahir</label>
                                    <input name="tempat_lahir" type="text" class="form-control" required>
                                </div>
                                <div class="col-md-8">
                                    <label class="col-form-label form-label">Tanggal Lahir</label>
                                    <input name="tanggal_lahir" type="date" class="form-control" required>
                                </div>
                                <div class="col-md-8">
                                    <label class="col-form-label form-label">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control" required>
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                                <div class="col-md-8">
                                    <label class="col-form-label form-label">Pekerjaan</label>
                                    <input name="pekerjaan" type="text" class="form-control" required>
                                </div>
                                <div class="col-md-8">
                                    <label class="col-form-label form-label">Provinsi</label>
                                    <input name="provinsi" type="text" class="form-control" required>
                                </div>
                                <div class="col-md-8">
                                    <label class="col-form-label form-label">Kabupaten / Kota</label>
                                    <input name="kabupaten_kota" type="text" class="form-control" required>
                                </div>
                                <div class="col-md-8">
                                    <label class="col-form-label form-label">Kecamatan</label>
                                    <input name="kecamatan" type="text" class="form-control" required>
                                </div>
                                <div class="col-md-8">
                                    <label class="col-form-label form-label">Kelurahan</label>
                                    <input name="kelurahan" type="text" class="form-control" required>
                                </div>
                                <div class="col-md-8">
                                    <label class="col-form-label form-label">RT / RW</label>
                                    <input name="rt_rw" type="text" class="form-control" required>
                                </div>
                                <div class="col-md-8">
                                    <label class="col-form-label form-label">Nominal Setor</label>
                                    <input name="nominal_setor" type="number" class="form-control" required step="0.01">
                                </div>
                                <br>
                                <div class="col-md-8">
                                    <div class="d-flex justify-content-center align-items-center text-align-center">
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- END ROW -->

@section('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@endsection
@endsection
