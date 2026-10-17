<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminEkstrakurikulerController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ADMIN
    |--------------------------------------------------------------------------
    */

    public function adminIndex()
    {
        $ekstrakurikuler = Ekstrakurikuler::latest()->get();
        return view('admin.ekstrakurikuler.index', compact('ekstrakurikuler'));
    }

    public function create()
    {
        return view('admin.ekstrakurikuler.create');
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'pembina' => 'nullable|string|max:255',
            'jadwal' => 'nullable|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'foto2' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'foto3' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'foto4' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = [
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'pembina' => $request->pembina,
            'jadwal' => $request->jadwal,
        ];

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('ekstrakurikuler/gambar', 'public');
        }

        foreach (['foto2', 'foto3', 'foto4'] as $field) {
            if ($request->hasFile($field)) {
                $data[$field] = $request->file($field)->store('ekstrakurikuler/gambar', 'public');
            }
        }

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('ekstrakurikuler/logo', 'public');
        }

        Ekstrakurikuler::create($data);

        return redirect()
            ->route('admin.ekstrakurikuler.index')
            ->with('success', 'Data ekstrakurikuler berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $ekstrakurikuler = Ekstrakurikuler::findOrFail($id);
        return view('admin.ekstrakurikuler.edit', compact('ekstrakurikuler'));
    }

    // Memperbarui data
    public function update(Request $request, $id)
    {
        $ekstrakurikuler = Ekstrakurikuler::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'pembina' => 'nullable|string|max:255',
            'jadwal' => 'nullable|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'foto2' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'foto3' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'foto4' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = [
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'pembina' => $request->pembina,
            'jadwal' => $request->jadwal,
        ];

        if ($request->hasFile('gambar')) {
            if ($ekstrakurikuler->gambar) {
                Storage::disk('public')->delete($ekstrakurikuler->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('ekstrakurikuler/gambar', 'public');
        }

        foreach (['foto2', 'foto3', 'foto4'] as $field) {
            if ($request->hasFile($field)) {
                if ($ekstrakurikuler->$field) {
                    Storage::disk('public')->delete($ekstrakurikuler->$field);
                }
                $data[$field] = $request->file($field)->store('ekstrakurikuler/gambar', 'public');
            }
        }

        if ($request->hasFile('logo')) {
            if ($ekstrakurikuler->logo) {
                Storage::disk('public')->delete($ekstrakurikuler->logo);
            }
            $data['logo'] = $request->file('logo')->store('ekstrakurikuler/logo', 'public');
        }

        $ekstrakurikuler->update($data);

        return redirect()
            ->route('admin.ekstrakurikuler.index')
            ->with('success', 'Data ekstrakurikuler berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $ekstrakurikuler = Ekstrakurikuler::findOrFail($id);

        foreach (['gambar', 'foto2', 'foto3', 'foto4', 'logo'] as $field) {
            if ($ekstrakurikuler->$field) {
                Storage::disk('public')->delete($ekstrakurikuler->$field);
            }
        }

        $ekstrakurikuler->delete();

        return redirect()
            ->route('admin.ekstrakurikuler.index')
            ->with('success', 'Data ekstrakurikuler berhasil dihapus.');
    }
}
