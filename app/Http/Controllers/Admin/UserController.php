<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $user = User::orderByDesc('created_at')->get();
        return view('admin.user', compact('user'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|unique:users,email',
            'address' => 'required|string',
            'password' => 'required|string',
            'religion' => 'required',
            'gender' => 'required|in:laki-laki,perempuan',
            'status' => 'required|in:disetujui,belum_disetujui'
        ]);
        DB::beginTransaction();
        try {
            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->address = $request->input('address');
            $user->gender = $request->input('gender');
            $user->status = $request->input('status');
            $user->religion_id = $request->input('religion');
            $user->password = bcrypt($request->input('password'));
            $user->save();
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required|in:disetujui,belum_disetujui'
        ]);
        DB::beginTransaction();
        try {
            $user = User::find($id);
            $user->status = $request->input('status');
            $user->save();
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
