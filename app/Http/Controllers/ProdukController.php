<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdukRequest;
use App\Produk;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::latest()->get();

        return response()->json($produks);
    }

    public function store(ProdukRequest $request)
    {
        $produk = Produk::create($request->all());

        return response()->json($produk, 201);
    }

    public function show($id)
    {
        $produk = Produk::findOrFail($id);

        return response()->json($produk);
    }

    public function update(ProdukRequest $request, $id)
    {
        $produk = Produk::findOrFail($id);
        $produk->update($request->all());

        return response()->json($produk, 200);
    }

    public function destroy($id)
    {
        Produk::destroy($id);

        return response()->json(null, 204);
    }
}