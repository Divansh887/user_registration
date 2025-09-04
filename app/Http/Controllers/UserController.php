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
        ];

              $insert = Users::create($my_arr);

       if($insert){
        
            DB::commit();
            Session::flash('done','Successfully Created');
            return redirect('user_registration.index');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, $id)
{
    $request->validate([
        'Name' => 'required',
        'Mobile' => 'required',
        'Email' => 'required|email|unique:users,Email,' . $id,
        'Address' => 'required',
        'Role' => 'required',
        'Designation' => 'required',
        'Gender' => 'required',
        'Status' => 'required',
        'Marital_Status' => 'required',
        'DOB' => 'required|date',
        'logo' => 'nullable|',
    ]);

    DB::beginTransaction();

    try {
        $user = Users::where('id',$id)->first();

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');
            $user->Photo_Path = $filePath;
        }

        $my_arr =[
        'Name'=> $request->Name,
        'Mobile' => $request->Mobile,
        'Email' => $request->Email,
        'Address' => $request->Address,
        'Role' => $request->Role,
        'Designation' => $request->Designation,
        'Gender' => $request->Gender,
        'Status' => $request->Status,
        'Marital_Status' => $request->Marital_Status,
        'DOB'=> $request->DOB,
        ];
       
        

        $update = Users::where('id',$id)->update($my_arr);

        if($update){

            DB::commit();
            Session::flash('done', 'User updated successfully!');
            return redirect()->route('user_registration.index');
        }else{


            DB::commit();
            Session::flash('error', 'Not updated !');
            return redirect()->route('user_registration.index');
        }
    } catch (\Exception $ex) {
        DB::rollback();

        Session::flash('error', 'Error updating user: ' . $ex->getMessage());
        return redirect()->back()->withInput();
    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }
}
