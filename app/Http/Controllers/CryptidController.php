<?php

namespace App\Http\Controllers;

use App\Models\Cryptid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CryptidController extends Controller
{
    public function index()
    {
        $cryptids = Cryptid::with('user', 'sightings')->latest()->paginate(10);
        return view('cryptids.index', compact('cryptids'));
    }

    public function create()
    {
        return view('cryptids.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'danger_level' => 'required|in:Low,Medium,High,Extreme',
        ]);

        $validated['user_id'] = Auth::id();
        $validated['status'] = (Auth::user()->role === 'admin' || Auth::user()->role === 'superadmin') ? 'approved' : 'draft';

        Cryptid::create($validated);

        return redirect()->route('cryptids.index')->with('success', 'Cryptid berhasil ditambahkan!');
    }

    public function show(Cryptid $cryptid)
    {
        $cryptid->load('user', 'sightings.user');
        return view('cryptids.show', compact('cryptid'));
    }

    public function edit(Cryptid $cryptid)
    {
        return view('cryptids.edit', compact('cryptid'));
    }

    public function update(Request $request, Cryptid $cryptid)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'danger_level' => 'required|in:Low,Medium,High,Extreme',
            'status' => 'sometimes|in:draft,approved',
        ]);

        $cryptid->update($validated);

        return redirect()->route('cryptids.index')->with('success', 'Cryptid berhasil diperbarui!');
    }

    public function destroy(Cryptid $cryptid)
    {
        $cryptid->delete();
        return redirect()->route('cryptids.index')->with('success', 'Cryptid berhasil dihapus!');
    }
}
