<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $user = User::all();
        return response()->json([
            'success' => true,
            'message' => 'data user',
            'data' => $user,
        ], 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return response()->json([
            'success' => true,
            'message' => 'data user berhasil dibuat',
            'data' => $user,
        ], 201);

    }

    public function show($id)
    {
        $user = User::find($id);
        if ($user) {
            return response()->json([
                'success' => true,
                'message' => 'data user ditemukan',
                'data' => $user,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'data user tidak ditemukan',
                'data' => [],
            ], 404);

        }

    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if ($user) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
            return response()->json([
                'success' => true,
                'message' => 'data user berhasil diedit',
                'data' => $user,
            ], 201);

        } else {
            return response()->json([
                'success' => false,
                'message' => 'data user tidak ditemukan',
                'data' => [],
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return response()->json([
                'success' => true,
                'message' => 'data user berhasil dihapus',
                'data' => $user,
            ], 200);

        } else {
            return response()->json([
                'success' => false,
                'message' => 'data user tidak ditemukan',
                'data' => [],
            ], 404);
        }
    }
}
