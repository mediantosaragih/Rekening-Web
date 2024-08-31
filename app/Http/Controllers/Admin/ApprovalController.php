<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rekening;

class ApprovalController extends Controller
{
    public function index()
    {
        $data["title"] = "Rekening";
        $data_rekening = Rekening::orderBy('id', 'asc')->get();
        return view('admin.approval.index', ['data_rekening' => $data_rekening] , $data);
    }

    public function create()
    {
        return view('admin.rekening.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'pekerjaan' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'kabupaten_kota' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kelurahan' => 'required|string|max:255',
            'rt_rw' => 'required|string|max:255',
            'nominal_setor' => 'required|numeric'
        ]);

        Rekening::create($request->all());
        return redirect()->route('admin.rekening.index');
    }

    public function update(Request $request, $id)
{
    $rekening = Rekening::findOrFail($id);

    $request->validate([
        'status' => 'required|in:0,1',
    ]);

    $rekening->update([
        'status' => $request->input('status'),
    ]);

    return redirect()->route('admin.rekening.index')->with('success', 'Status rekening berhasil diperbarui');
}

    public function updateStatus(Request $request, Rekening $rekening)
    {
        // Validasi input jika diperlukan
        $request->validate([
            'status' => 'required|string',
        ]);

        // Update status rekening
        $rekening->status = $request->input('status');
        $rekening->save();

        // Redirect atau respon sesuai kebutuhan
        return redirect()->route('admin.rekening.index')->with('success', 'Status rekening berhasil diperbarui.');
    }

    public function show($id)
    {
        $rekening = Rekening::findOrFail($id);
        return view('admin.rekening.show', compact('rekening'));
    }
}

