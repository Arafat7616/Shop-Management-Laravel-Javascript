<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Invoice;
use App\Item;
use App\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    //Get Quantity
    public function getQuantity(){
        return Item::orderBy('id', 'desc')->where('quantity', '>=', '0')->get();
    }

    //Post storeInvoice
    public function storeInvoice(Request $request){
        if (!$request->input('qty') || !$request->input('ids') || !$request->input('price') || !$request->input('total_price') || !$request->input('paid_amount')){
            $message = 'Please check all of item price and paid amount';
            return response()->json([
                'type' => 'warning',
                'message' => $message,
            ]);
        }
        // Item Quantity update after sell



        //Add customer
        if ($request->input('phone')){
            if (!Customer::select('id')->where('phone', $request->input('phone'))->first()) {
                //New customer
                DB::table('customers')->insert([
                    'name' => $request->input('customer'),
                    'phone' => $request->input('phone'),
                ]);
            }
        }


        $customerid = null;

        if (Customer::select('id')->where('phone', $request->input('phone'))->first()){
            $customerid = Customer::select('id')->where('phone', $request->input('phone'))->first()->id;
        }

        //Add Invoice
        $invoice = new Invoice();
        $invoice->staff_id =  Auth::user()->id;
        $invoice->customer_id =  $customerid;
        $invoice->total_price =  $request->input('total_price');
        $invoice->paid_amount =  $request->input('paid_amount');
        $invoice->date =  Carbon::now()->addHours(6);
        $invoice->save();

        $index_name = 0;
        foreach($request->input(['ids']) as $id){
            //Database
            $item = Item::find($id);

            //Find quantity of this item from array
            $index_quantity = 0;
            foreach($request->input(['qty']) as $qty){
                if ($index_name == $index_quantity){
                    $item->quantity = $item->quantity - $qty;
                    break;
                }
                $index_quantity++;
            }
            $item->save();

            //Find price of this item from array
            $index_price = 0;
            foreach($request->input(['price']) as $price){
                if ($index_name == $index_price){
                    break;
                }
                $index_price++;
            }

            //Add Sale each or item
            $sale = new Sale();
            $sale->invoice_id = $invoice->id;
            $sale->item_id = $item->id;
            $sale->quantity = $qty;
            $sale->price = $price;
            $sale->save();
            /*
            DB::table('sales')->insert([
                'invoice_id'   => $invoice->id,
                'item_id'      => $item->id,
                'quantity'     => $qty,
                'price'         => $price,
            ]);*/
            $index_name++;
        }


        $message = 'SUCCESS। ';
        return response()->json([
            'type' => 'success',
            'message' => $message,
        ]);
    }
}
