<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TestController extends Controller
{
    public function create()
    {
        return view('test');
    }
    

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:55',
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 401,
                'message' => 'Data Failed',
            ]);
        }else{
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            return response()->json([
                'status' => 200,
                'message' => 'Data Successfully Added',
            ]);
        }
    }

    public function edit($id)
    {
        $editId = User::findOrFail($id);
        return view('update', compact('editId'));
        // if($editId){
        //     return response()->json([
        //         'status' => 200,
        //         'editId' => $editId,
        //     ]);
        // }else{
        //     return response()->json([
        //         'status'=>404,
        //         'message'=>'Data Not Found'
        //     ]);
        // }
    }
    public function update(Request $request, $id)
    {
        $userId = User::findOrFail($id);
        if($userId){
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:55',
                'email' => 'required',
                'password' => 'required',
            ]);
            $userId->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            return response()->json([
                'status' => 200,
                'message' => 'Data Successfully Added',
            ]);
        }else{
            return response()->json([
                'status'=>404,
                'message'=>'Data Not Found',
            ]);
        }
        

    }

    public function delete($id)
    {
        $userId = User::findOrFail($id);
        if($userId){
            $userId->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Data Successfully Added',
            ]);
        }else{
            return response()->json([
                'status'=>404,
                'message'=>'Data Not Found',
            ]);
        }

    }
}
