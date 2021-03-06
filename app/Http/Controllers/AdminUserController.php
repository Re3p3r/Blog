<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use App\Role;
use App\Http\Requests\UserRequest;
use App\Photo;
class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $user = User::all();

     return view('admin.users.index',compact('user'));   
             
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         //----------------retrive roles as array------------------------//
         $roles = Role::lists('name','id')->all();
                  
        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //alternative user store

        // User::create($request->all());

        // return redirect('/admin.user');
        
        /*
        $user =  new User;
        $user::create([
             'name'=>$request->name,
             'role_id'=>$request->role_id,
             'email'=>$request->email,
             'password'=>bcrypt($request->password),
             'is_active' => $request->status,
            ]);
          if($file = $request->file('file'))

           {
            $user::create(['file'=>$request->file]);
            $name = $file->getClientOriginalName();
            $file->move('files',$name);
            
            $photo = Photo::create(['name'=>$name]);
            

           }

*/          
         $input = new User;
         $input->name = ($request->name);
         $input->role_id = ($request->role_id);
         $input->email = ($request->email);
         $input->password = bcrypt(($request->password));
         $input->is_active = ($request->status);
         
         
         if($file = $request->file('file'))

           {
            $name = $file->getClientOriginalName();
            $file->move('files',$name);
            $photo = Photo::create(['name'=>$name]);
           // $input['file'] = $photo->id;
            

           }
         $input->save();
       
         return redirect('/admin/user');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}