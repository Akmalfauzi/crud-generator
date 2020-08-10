<?php

namespace App\Http\Controllers;

use App\Http\Requests\KategoriRequest;
use App\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::latest()->get();

        return response()->json($kategoris);
    }

    public function store(KategoriRequest $request)
    {
        $kategori = Kategori::create($request->all());

        return response()->json($kategori, 201);
    }

    public function show($id)
    {
        $kategori = Kategori::findOrFail($id);

        return response()->json($kategori);
    }

    public function update(KategoriRequest $request, $id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->update($request->all());

        return response()->json($kategori, 200);
    }

    public function destroy($id)
    {
        Kategori::destroy($id);

        return response()->json(null, 204);
    }
}