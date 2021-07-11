<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Item::orderBy('id','desc')->take(1000)->get();
        return view('admin.product.index',compact('products'));
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
        if (!$request->input('name') || !$request->input('quantity') || !$request->input('buy_price')){
            $message = 'Please check product name, quantity & price';
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
            'quantity'      => 'integer|required',
            'buy_price'     => 'numeric|required',
            'sell_price'    => 'numeric|nullable',
            'image'         => 'image|nullable',
        ]);

        $item = new Item();
        $item->name = $request->input('name');
        $item->quantity = $request->input('quantity');
        $item->buy_price = $request->input('buy_price');
        $item->sell_price = $request->input('sell_price');
        $item->date = Carbon::now()->addHour(6);
        //Auto resize with 500 wide/ 500 height
        if($request->hasFile('image')){

            $image             = $request->file('image');
            $folder_path       = 'uploads/images/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $item->image   = $folder_path . $image_new_name;
        }
        $item->save();
        $message = 'Successfully store this product';
        if ($request->ajax()){
            return response()->json([
                'type' => 'success',
                'message' => $message,
            ]);
        }else{
            session()->flash('message', $message);
            session()->flash('type', 'success');
            return redirect()->route('admin.product.index');
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
