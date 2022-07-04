<?php

namespace App\Http\Controllers;

use App\Http\Requests\MethodRequest;
use App\Models\Method;
use Response;

class MethodController extends Controller
{
    public function store(MethodRequest $request){
        $data = $request->validated();
        Method::create($data);

        return Response::json(['success' => 'Metode Berhasil Ditambahkan']);
    }

    public function show($id)
    {
        $data = Method::findOrFail($id);

        return Response::json([
            'success' => 'Sukses Mendapat Detail Metode',
            'data' => $data
        ]);
    }

    public function update(MethodRequest $request, $id){
        $data = $request->validated();
        Method::where('id', $id)->update($data);

        return Response::json(['success' => 'Metode Berhasil Diupdate']);
    }

    public function destroy($id){
        Method::where('id', $id)->delete();
        return Response::json(['success' => 'Metode Berhasil Dihapus']);
    }
}
