<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Catagory;
use App\Models\Order;
use App\Models\Rproduct;
use App\Models\School;
use App\Models\Rorder;
use App\Models\Sell;

class AdminController extends Controller
{
public function view_catagory()
    {
        $data=catagory::all();
        return view('admin.catagory',compact('data'));

    }
    public function add_catagory(Request $request)
    {
        $data=new catagory;
        $data->catagory_name=$request->catagory;
        $data->save();
        return redirect()->back()->with('message','Catagory Added Sucessfully');

    }

    public function delete_catagory($id)
    {
    $data=catagory::find($id);
    $data->delete();
    return redirect()->back()->with('message','Catagory deleted sucessfully');

    }


    public function view_product()
    {
        $catagory=catagory::all();
        return view('admin.product',compact('catagory'));

    }


    public function add_product(Request $request)
    {
        $product=new product;
        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->quantity=$request->quantity;
        $product->discount_price=$request->dis_price;
        $product->catagory=$request->catagory;

        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);
        $product->image=$imagename;




        $product->save();
        return redirect()->back()->with('message','Product Added Sucessfully');

    }

    public function show_product()
    {
        $product=product::all();
        return view('admin.show_product',compact('product'));

    }

    public function delete_product($id)
    {
        $product=product::find($id);
        $product->delete();
        return redirect()->back()->with('message','Product deleted sucessfully');

    }


    public function update_product($id)
    {
        $product=product::find($id);
        //variable=tablename::all()
        $catagory=catagory::all();
        return view('admin.update_product',compact('product','catagory'));

    }

    public function update_product_confirm(Request $request,$id)
    {
        $product=product::find($id);
        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->discount_price=$request->dis_price;
        $product->catagory=$request->catagory;
        $product->quantity=$request->quantity;
        $image=$request->image;
        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product',$imagename);
            $product->image=$imagename;
        }
        $product->save();


        return redirect()->back()->with('message','Product Updated Sucessfully');

    }

    public function order()
    {
        $order=order::all();


        return view('admin.order',compact('order'));

    }

    public function rent_order()
    {
        $rorder=rorder::all();


        return view('admin.rorder',compact('rorder'));

    }

    public function rent_delivered($id)
    {
        $rorder=rorder::find($id);
        $rorder->delivery_status="delivered";
        $rorder->payment_status="paid";
        $rorder->save();

        return redirect()->back()->with('message','Product Delivered');

    }

    public function rent_searchdata(Request $request)
    {
        $searchText=$request->search;
        $order=order::where('name','LIKE',"%$searchText%")->orWhere('phone','LIKE',"%$searchText%")->orWhere('product_title','LIKE',"%$searchText%")->get();
        return view('admin.order',compact('order'));


    }


    public function delivered($id)
    {
        $order=order::find($id);
        $order->delivery_status="delivered";
        $order->payment_status="paid";
        $order->save();

        return redirect()->back()->with('message','Product Delivered');

    }

    public function searchdata(Request $request)
    {
        $searchText=$request->search;
        $order=order::where('name','LIKE',"%$searchText%")->orWhere('phone','LIKE',"%$searchText%")->orWhere('product_title','LIKE',"%$searchText%")->get();
        return view('admin.order',compact('order'));


    }


//schools

    public function view_schools()
    {
        $data=school::all();
        return view('admin.school',compact('data'));

    }
    public function add_schools(Request $request)
    {
        $data=new school;
        $data->school_name=$request->school;
        $data->save();
        return redirect()->back()->with('message','School Added Sucessfully');

    }
    public function delete_schools($id)
    {
        $data=school::find($id);
        $data->delete();
        return redirect()->back()->with('message','School deleted sucessfully');

    }

    //rproduct
    public function view_rproduct()
    {
        $catagory=catagory::all();
        $school=school::all();
        return view('admin.rproduct',compact('catagory','school'));

    }
    public function add_rproduct(Request $request)
    {
        $rproduct=new rproduct;
        $rproduct->title=$request->title;
        $rproduct->description=$request->description;
        $rproduct->price=$request->price;
        $rproduct->quantity=$request->quantity;
        $rproduct->discount_price=$request->dis_price;
        $rproduct->catagory=$request->catagory;
        $rproduct->secondhand_price=$request->sec_price;
        $rproduct->rent_price=$request->rent_price;
        $rproduct->ISBN=$request->ISBN;
        $rproduct->genre=$request->genre;
        $rproduct->author=$request->author;

        $rproduct->school_id=$request->school;

        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);
        $rproduct->image=$imagename;




        $rproduct->save();
        return redirect()->back()->with('message','Book Added Sucessfully');

    }
    public function show_rproduct()
    {
        $rproduct=rproduct::all();
        return view('admin.show_rproduct',compact('rproduct'));

    }
    public function delete_rproduct($id)
    {
        $rproduct=rproduct::find($id);
        $rproduct->delete();
        return redirect()->back()->with('message','Product deleted sucessfully');

    }
    public function update_rproduct($id)
    {
        $rproduct=rproduct::find($id);
        //variable=tablename::all()
        $catagory=catagory::all();
        $school=school::all();
        return view('admin.update_rproduct',compact('rproduct','catagory','school'));

    }




    public function update_rproduct_confirm(Request $request,$id)
    {
        $rproduct=rproduct::find($id);
        $rproduct->title=$request->title;
        $rproduct->description=$request->description;
        $rproduct->price=$request->price;
        $rproduct->secondhand_price=$request->sec_price;
        $rproduct->discount_price=$request->dis_price;
        $rproduct->rent_price=$request->rent_price;
        $rproduct->ISBN=$request->ISBN;
        $rproduct->genre=$request->genre;
        $rproduct->author=$request->author;
        $rproduct->catagory=$request->catagory;
        $rproduct->quantity=$request->quantity;
        $rproduct->school_id=$request->school;
        $image=$request->image;
        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('rproduct',$imagename);
            $rproduct->image=$imagename;
        }
        $rproduct->save();


        return redirect()->back()->with('message','Product Updated Sucessfully');


    }


    public function sell_order()
    {
        $order=order::all();
        return view('admin.sell_order',compact('order'));

    }



}
