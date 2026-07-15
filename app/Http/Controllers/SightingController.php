<?php

namespace App\Http\Controllers;

use App\Models\Sighting;
use App\Models\Cryptid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SightingController extends Controller
{
    public function index()
    {
        $sightings = Sighting::with('cryptid', 'user')->latest()->paginate(10);
        return view('sightings.index', compact('sightings'));
    }

    public function create()
    {
        $cryptids = Cryptid::where('status', 'approved')->orderBy('name')->get();
        return view('sightings.create', compact('cryptids'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'cryptid_id' => 'required|exists:cryptids,id',
            'location' => 'required|string|max:255',
            'sighting_date' => 'required|date',
            'kronologi' => 'required|string',
        ]);

        $validated['user_id'] = Auth::id();

        Sighting::create($validated);

        return redirect()->route('sightings.index')->with('success', 'Laporan penampakan berhasil disimpan!');
    }

    public function show(Sighting $sighting)
    {
        $sighting->load('cryptid', 'user');
        return view('sightings.show', compact('sighting'));
    }

    public function edit(Sighting $sighting)
    {
        $cryptids = Cryptid::where('status', 'approved')->orderBy('name')->get();
        return view('sightings.edit', compact('sighting', 'cryptids'));
    }

    public function update(Request $request, Sighting $sighting)
    {
        $validated = $request->validate([
            'cryptid_id' => 'required|exists:cryptids,id',
            'location' => 'required|string|max:255',
            'sighting_date' => 'required|date',
            'kronologi' => 'required|string',
        ]);

        $sighting->update($validated);

        return redirect()->route('sightings.index')->with('success', 'Laporan penampakan berhasil diperbarui!');
    }

    public function destroy(Sighting $sighting)
    {
        $sighting->delete();
        return redirect()->route('sightings.index')->with('success', 'Laporan penampakan berhasil dihapus!');
    }
}
