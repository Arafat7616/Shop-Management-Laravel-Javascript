<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
            $image = $request->file('image');
            $OriginalExtension = $image->getClientOriginalExtension();
            $image_name = 'staff-profile-' . Carbon::now()->addHour(6) .'.'. $OriginalExtension;
            $destinationPath = ('uploads/images');
            $resize_image = Image::make($image->getRealPath());
            $resize_image->resize(500, 500, function($constraint){
                $constraint->aspectRatio();
            });
            $resize_image->save($destinationPath . '/' . $image_name);
            $user->image = $image_name;
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
        //Auto resize with 500 wide/ 500 height
        if($request->hasFile('image')){
            $image = $request->file('image');
            $OriginalExtension = $image->getClientOriginalExtension();
            $image_name = 'staff-profile-' . Carbon::now()->addHour(6) .'.'. $OriginalExtension;
            $destinationPath = ('uploads/images');
            $resize_image = Image::make($image->getRealPath());
            $resize_image->resize(500, 500, function($constraint){
                $constraint->aspectRatio();
            });
            $resize_image->save($destinationPath . '/' . $image_name);
            $user->image = $image_name;
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
        //
    }
}
