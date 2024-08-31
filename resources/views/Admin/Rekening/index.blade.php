@extends('Master.Layouts.app', ['title' => $title])

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
                <h3 class="card-title">Data</h3>
                <div>
                <a href="{{ route('admin.rekening.create') }}" class="btn btn-primary">Tambah Data <i class="fe fe-plus"></i></a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table-1" class="table table-bordered text-nowrap border-bottom dataTable no-footer dtr-inline collapsed">
                        <thead>
                            <th class="border-bottom-0" width="1%">No</th>
                            <th class="border-bottom-0">Nama</th>
                            <th class="border-bottom-0">Tempat Lahir</th>
                            <th class="border-bottom-0">Tanggal Lahir</th>
                            <th class="border-bottom-0">Jenis Kelamin</th>
                            <th class="border-bottom-0">Pekerjaan</th>
                            <th class="border-bottom-0">Provinsi</th>
                            <th class="border-bottom-0">Kabupaten / Kota</th>
                            <th class="border-bottom-0">Kecamatan</th>
                            <th class="border-bottom-0">Kelurahan</th>
                            <th class="border-bottom-0">RT / RW</th>
                            <th class="border-bottom-0">Nominal Setor</th>
                            <th class="border-bottom-0">Status</th>
                            <th class="border-bottom-0" width="1%">Action</th>
                        </thead>
                        <tbody>
                        @foreach($data_rekening as $rekening)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $rekening->nama }}</td>
                                <td>{{ $rekening->tempat_lahir }}</td>
                                <td>{{ $rekening->tanggal_lahir }}</td>
                                <td>{{ $rekening->jenis_kelamin }}</td>
                                <td>{{ $rekening->pekerjaan }}</td>
                                <td>{{ $rekening->provinsi }}</td>
                                <td>{{ $rekening->kabupaten_kota }}</td>
                                <td>{{ $rekening->kecamatan }}</td>
                                <td>{{ $rekening->kelurahan }}</td>
                                <td>{{ $rekening->rt_rw }}</td>
                                <td>{{ $rekening->nominal_setor }}</td>
                                <td>
                                    @if ($rekening->status == 0)
                                        <button class="btn btn-warning">Menunggu Approval</button>
                                    @else
                                        <!-- Optionally display something else or nothing if status is not 0 -->
                                        <span>Approved</span>
                                    @endif
                                </td>
                                <td style="width: 10px;" align="center">
                                    <a href="">
                                        <span class="icon">
                                            <i class="fas fa-pencil-alt"></i> <!-- Icon pensil (pencil) -->
                                        </span>
                                    </a>
                                    <a href="" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $rekening->id }}').submit();">
                                        <span class="icon">
                                            <i class="fas fa-trash-alt"></i> <!-- Icon tong sampah (trash) -->
                                        </span>
                                    </a>
                                    <form id="delete-form-{{ $rekening->id }}" action="" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
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
<div class="modal fade" id="modaldemo8" tabindex="-1" role="dialog" aria-labelledby="modaldemo8Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaldemo8Label">Tambah Data Rekening</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.rekening.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pekerjaan">Pekerjaan</label>
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" required>
                    </div>
                    <div class="form-group">
                        <label for="provinsi">Provinsi</label>
                        <input type="text" class="form-control" id="provinsi" name="provinsi" required>
                    </div>
                    <div class="form-group">
                        <label for="kabupaten_kota">Kabupaten / Kota</label>
                        <input type="text" class="form-control" id="kabupaten_kota" name="kabupaten_kota" required>
                    </div>
                    <div class="form-group">
                        <label for="kecamatan">Kecamatan</label>
                        <input type="text" class="form-control" id="kecamatan" name="kecamatan" required>
                    </div>
                    <div class="form-group">
                        <label for="kelurahan">Kelurahan</label>
                        <input type="text" class="form-control" id="kelurahan" name="kelurahan" required>
                    </div>
                    <div class="form-group">
                        <label for="rt_rw">RT / RW</label>
                        <input type="text" class="form-control" id="rt_rw" name="rt_rw" required>
                    </div>
                    <div class="form-group">
                        <label for="nominal_setor">Nominal Setor</label>
                        <input type="number" class="form-control" id="nominal_setor" name="nominal_setor" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END ROW -->
<script>
    function generateID(){
        id = new Date().getTime();
        $("input[name='kode']").val("BRG-"+id);
    }
</script>
@endsection

@section('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
</script>
@endsection