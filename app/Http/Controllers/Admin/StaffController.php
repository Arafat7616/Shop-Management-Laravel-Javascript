<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs = User::orderBy('id','desc')->take(1000)->get();
        return view('admin.staff.index',compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->input('name') || !$request->input('email') || !$request->input('password') || !$request->input('type')){
            $message = 'Please check staff\'s name, email & type';
            if ($request->ajax()){
                return response()->json([
                    'type' => 'warning',
                    'message' => $message,
                ]);
            }else{
                return Redirect::back()->withErrors([$message]);
            }
        }

        $request->validate([
            'name'          => 'string|required',
            'email'         => 'email|required|unique:users',
            'password'      => 'required|min:4|max:50',
            'type'          => 'integer|required',
            'image'         => 'image|nullable',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->status = $request->input('status', 0);
        $user->password = Hash::make($request->input('password'));
        $user->type = $request->input('type',2);
        //Auto resize with 500 wide/ 500 height
        if($request->hasFile('image')){

            $image             = $request->file('image');
            $folder_path       = 'uploads/images/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $user->image   = $folder_path . $image_new_name;
        }

        $user->save();
        $message = 'Successfully added '.$request->input('name') .'as a staff';
        if ($request->ajax()){
            return response()->json([
                'type' => 'success',
                'message' => $message,
            ]);
        }else{
            session()->flash('message',$message);
            session()->flash('type', 'success');
            return redirect()->route('admin.staff.index');
        }
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
        return User::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (!$request->input('name') || !$request->input('email') || !$request->input('type')){
            $message = 'Please check staff\'s name, email & type';
            if ($request->ajax()){
                return response()->json([
                    'type' => 'warning',
                    'message' => $message,
                ]);
            }else{
                return Redirect::back()->withErrors([$message]);
            }
        }

        $request->validate([
            'name'          => 'string|required',
            'email'         => 'required|email|unique:users,email,'.$request->input('id'),
            'password'      => 'nullable|min:4|max:50',
            'type'          => 'integer|required',
            'image'         => 'image|nullable',
        ]);

        $user = User::find($request->input('id'));
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->status = $request->input('status', 0);
        if ($request->input('password')){
            $user->password = Hash::make($request->input('password'));
        }
        $user->type = $request->input('type',2);
        if($request->hasFile('image')){
            if ($user->image != null && $user->image != 'uploads/images/default.png')
                File::delete(public_path($user->image)); //Old image delete
            $image             = $request->file('image');
            $folder_path       = 'uploads/images/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $user->image   = $folder_path . $image_new_name;
        }
        $user->save();
        $message = 'Successfully edited '.$request->input('name') .'as a staff';
        if ($request->ajax()){
            return response()->json([
                'type' => 'success',
                'message' => $message,
            ]);
        }else{
            session()->flash('message',$message);
            session()->flash('type', 'success');
            return redirect()->route('admin.staff.index');
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

        $user = User::findOrFail($id);
        if($user->id === Auth::user()->id){
            return response()->json([
                'type' => 'error',
                'message' => 'You can\'t able to delete yourself',
            ]);
        }
        try {
            if ($user->image != null && $user->image != "uploads/images/default.png")
                File::delete(public_path($user->image)); //Old image delete
            $user->delete();
            return response()->json([
                'type' => 'success',
            ]);
        }catch (\Exception$exception){
            return response()->json([
                'type' => 'error',
            ]);
        }
    }
}
