<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $all_users = Users::get();

        return view('welcome',[
            'all_users'=>$all_users
        ]);


        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

public function store(Request $request)
{
  

    DB::beginTransaction();

    try {
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fileName);
            $filePath = 'uploads/' . $fileName;
        } else {
            $filePath = null;
        }

        $my_arr = [
            'Name' => $request->Name,
            'Mobile' => $request->Mobile,
            'Email' => $request->Email,
            'Address' => $request->Address,
            'Role' => $request->Role,
            'Designation' => $request->Designation,
            'Photo_Path' => $filePath,
            'Gender' => $request->Gender,
            'Status' => $request->Status,
            'Marital_Status' => $request->Marital_Status,
            'DOB' => $request->DOB,
            'datetime' => date('Y-m-d H:i:s'),
        ];

        // dd($my_arr);
              $insert = Users::insert($my_arr);

       if($insert){
        
            DB::commit();
            Session::flash('done','Successfully Created');
            return redirect('user_registration');
       }else{

            DB::rollback();
            Session::flash('done','Not Created');
            return redirect('user_registration.index');
       }
    }
    catch(\Exception $ex)
        {
            DB::rollback();
            Session::flash('error', 'Error updating user: ' . $ex->getMessage());
            return redirect('user_registration');
        }
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
   
        $user = Users::where('id',$request->id)->first();

        if(!empty($user)){

            return response()->json(['status'=>200,'user'=>$user]);
        }else{
         return response()->json(['status'=>400,'user'=>[]]);

        }
       
    }

    /**
     * Update the specified resource in storage.
     */
 public function update(Request $request, $id)
{
    DB::beginTransaction();

    try {
        $user = Users::find($id);
        if (!$user) {
            Session::flash('error', 'User not found!');
            return redirect()->route('user_registration');
        }

        $my_arr = [
            'Name' => $request->Name,
            'Mobile' => $request->Mobile,
            'Email' => $request->Email,
            'Address' => $request->Address,
            'Role' => $request->Role,
            'Designation' => $request->Designation,
            'Gender' => $request->Gender,
            'Status' => $request->Status,
            'Marital_Status' => $request->Marital_Status,
            'DOB' => $request->DOB,
            'datetime' => date('Y-m-d H:i:s'),
        ];

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fileName);
            $my_arr['Photo_Path'] = 'uploads/' . $fileName;
        }
        
        $update = $user->update($my_arr); 

        if ($update) {
            DB::commit();
            Session::flash('done', 'User updated successfully!');
            return redirect('user_registration');
        } else {
            DB::rollback();
            Session::flash('error', 'Not updated!');
            return redirect('user_registration');
        }
    } catch (\Exception $ex) {
        DB::rollback();
        Session::flash('error', 'Error updating user: ' . $ex->getMessage());
    return redirect('user_registration');
    }
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }
}
