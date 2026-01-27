<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    // READ - Show all packages
    public function index()
    {
        $packages = Package::paginate(10);
        return view('admin.packages.index', compact('packages'));
    }

    // CREATE - Show create form
    public function create()
    {
        return view('admin.packages.create');
    }

    // CREATE - Store to database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
            'type' => 'required|in:grup,family',
            'status' => 'required|in:active,inactive'
        ]);

        Package::create($validated);

        return redirect()->route('packages.index')->with('success', 'Paket berhasil ditambahkan!');
    }

    // READ - Show single package
    public function show($id)
    {
        $package = Package::findOrFail($id);
        return view('admin.packages.show', compact('package'));
    }

    // UPDATE - Show edit form
    public function edit($id)
    {
        $package = Package::findOrFail($id);
        return view('admin.packages.edit', compact('package'));
    }

    // UPDATE - Update to database
    public function update(Request $request, $id)
    {
        $package = Package::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
            'type' => 'required|in:grup,family',
            'status' => 'required|in:active,inactive'
        ]);

        $package->update($validated);

        return redirect()->route('packages.index')->with('success', 'Paket berhasil diperbarui!');
    }

    // DELETE
    public function destroy($id)
    {
        $package = Package::findOrFail($id);
        $package->delete();

        return redirect()->route('packages.index')->with('success', 'Paket berhasil dihapus!');
    }
}
