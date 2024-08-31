<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rekening;

class RekeningController extends Controller
{
    public function index()
    {
        $data["title"] = "Rekening";
        $data_rekening = Rekening::orderBy('id', 'asc')->get();
        return view('admin.rekening.index', ['data_rekening' => $data_rekening] , $data);
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

    public function edit($rekening_id)
    {
        $detail_rekening = Rekening::where('rekening_id', $rekening_id)->first();
        return view('admin.rekening.edit', ['detail_rekening' => $detail_rekening]);
    }

    public function update(Request $request, $rekening_id)
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

        Rekening::where('rekening_id', $rekening_id)->update($request->except('_token', '_method'));

        return redirect()->route('admin.rekening.index');
    }

    public function destroy($rekening_id)
    {
        Rekening::where('rekening_id', $rekening_id)->delete();

        return redirect()->route('admin.rekening.index');
    }

    public function show($id)
    {
        $rekening = Rekening::findOrFail($id);
        return view('admin.rekening.show', compact('rekening'));
    }

    public function approve(Request $request, $rekening_id)
    {
        // Update only the status to 1 (approved)
        Rekening::where('rekening_id', $rekening_id)->update(['status' => 1]);

        // Return a JSON response indicating success
        return response()->json(['success' => true]);
    }
}

