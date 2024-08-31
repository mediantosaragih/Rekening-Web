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
                                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateStatusModal" onclick="setRekeningId({{ $rekening->id }}, 0)">Menunggu Approval</button>
                                    @else
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
<div class="modal fade" id="updateStatusModal" tabindex="-1" role="dialog" aria-labelledby="updateStatusModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateStatusModalLabel">Update Status Rekening</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="updateStatusForm" action="" method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" id="rekening-id" name="rekening_id" value="">
    <div class="modal-body">
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="0">Menunggu Approval</option>
                <option value="1">Approved</option>
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Update Status</button>
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
<script>
    function setRekeningId(id, status) {
    var form = document.getElementById('updateStatusForm');
    form.action = '/admin/rekening/' + id;  // Sesuaikan dengan route Anda
    document.getElementById('rekening-id').value = id;
    document.getElementById('status').value = status;
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