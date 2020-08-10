<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Admin;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::latest()->get();

        // return response()->json($admins);
        // return view('', compact('admins'));
    }

    public function store(AdminRequest $request)
    {
        $admin = Admin::create($request->all());

        return response()->json($admin, 201);
    }

    public function show($id)
    {
        $admin = Admin::findOrFail($id);

        return response()->json($admin);
    }

    public function update(AdminRequest $request, $id)
    {
        $admin = Admin::findOrFail($id);
        $admin->update($request->all());

        return response()->json($admin, 200);
    }

    public function destroy($id)
    {
        Admin::destroy($id);

        return response()->json(null, 204);
    }
}