<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MotivasiRequest;
use App\Http\Resources\MotivasiResource;
use App\Http\Resources\UserResource;
use App\Models\Motivasi;
use App\Models\User;
use Illuminate\Http\Request;

class MotivasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return MotivasiResource::collection(Motivasi::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MotivasiRequest $request)
    {
        //
        $motivasi = Motivasi::create($request->validated());
        return response()->json([
            'message' => 'Motivasi created',
            'code' => 200,
            'error' => false,
            'data' => new MotivasiResource($motivasi)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Motivasi  $motivasi
     * @return \Illuminate\Http\Response
     */
    public function show(Motivasi $motivasi)
    {
        //
        return new MotivasiResource(Motivasi::with('user')->find($motivasi->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Motivasi  $motivasi
     * @return \Illuminate\Http\Response
     */
    public function update(MotivasiRequest $request, Motivasi $motivasi)
    {
        //
        $motivasi->update($request->validated());
        return response()->json([
            'message' => 'Motivasi updated',
            'code' => 200,
            'error' => false,
            'data' => new MotivasiResource($motivasi)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Motivasi  $motivasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Motivasi $motivasi)
    {
        //
        $motivasi->delete();
        return response()->json([
            'message' => 'Motivasi deleted',
            'code' => 200,
            'error' => false,
            'data' => null
        ]);
    }

    public function user($id)
    {
        # code...
        return new UserResource(User::with('motivasi')->where('id', '=', $id)->first());
    }
}
