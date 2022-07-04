<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivityRequest;
use App\Models\Activity;
use Response;

class ActivityController extends Controller
{
    public function store(ActivityRequest $request){
        $data = $request->validated();
        Activity::create($data);

        return Response::json(['success' => 'Aktivitas Berhasil Ditambahkan']);
    }

    public function show($id)
    {
        $data = Activity::findOrFail($id);

        return Response::json([
            'success' => 'Sukses Mendapat Detail Aktivitas',
            'data' => $data
        ]);
    }

    public function update(ActivityRequest $request, $id)
    {
        $data = $request->validated();
        Activity::where('id', $id)->update($data);

        return Response::json(['success' => 'Metode Berhasil Diupdate']);
    }

    public function destroy($id)
    {
        Activity::where('id', $id)->delete();
        return Response::json(['success' => 'Metode Berhasil Dihapus']);
    }
}
