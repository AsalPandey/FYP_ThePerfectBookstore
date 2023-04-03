<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;

use Session;
use Stripe;

class HomeController extends Controller
{
    public function redirect()
    {
        $usertype=Auth::user()->usertype;
        if($usertype=='1')
        {
            return view('admin.home');
        }
        else
        {
//            return view('home.userpage');
            $product=Product::paginate(10);
            return view('home.userpage',compact('product'));
        }
    }

    public function index()
    {
        $product=Product::paginate(10);
        return view('home.userpage',compact('product'));
    }

    public function product_details($id)
    {
        $product=product::find($id);
        return view('home.product_details',compact('product'));
    }

    public function add_cart(Request $request,$id)
    {
        if(Auth::id())
        {
//            getting user data
            $user=Auth::user();
//            dd($user);
//            getting product data
            $product=product::find($id);
//            dd($product);

            $cart=new cart;
            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->phone=$user->phone;
            $cart->address=$user->address;
            $cart->user_id=$user->id;

            $cart->Product_title=$product->title;
            if($product->discount_price!=null)
            {
                $cart->price=$product->discount_price * $request->quantity;
            }
            else
            {
                $cart->price=$product->price * $request->quantity;
            }

            $cart->image=$product->image;
            $cart->Product_id=$product->id;
            $cart->quantity=$request->quantity;

            $cart->save();
            return redirect()->back();
        }
        else
        {
            return redirect('login');
        }

    }


    public function show_cart()
    {
        if(Auth::id())
        {
        $id=Auth::user()->id;
        $cart=cart::where('user_id','=',$id)->get();
        return view('home.showcart',compact('cart'));
        }
        else{
            return redirect('login');
        }
    }

    public function remove_cart($id)
    {
        $cart=cart::find($id);
        $cart->delete();
        return redirect()->back();
    }

    public function cash_order()
    {
        $user=Auth::user();
        $userid=$user->id;
//        which user is logged in
//        dd($userid);
        $data=cart::where('user_id','=',$userid)->get();
//        dd($data);
        foreach($data as $data)
        {
            $order=new order;
            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->address=$data->address;
            $order->user_id=$data->user_id;
            $order->product_title=$data->product_title;
            $order->price=$data->price;
            $order->quantity=$data->quantity;
            $order->image=$data->image;
            $order->product_id=$data->Product_id;

            $order->payment_status='cash on delivery';
            $order->delivery_status='processing';

            $order->save();

            //deleting cart
            //get specefic id
            $cart_id=$data->id;
            //find in cart
            $cart=cart::find($cart_id);
            //delete the data
            $cart->delete();


        }

        return redirect()->back()-with('message','We received your order!! We will contact you soon');
    }


    public function stripe($totalprice)
    {
        return view('home.stripe',compact('totalprice'));
    }


    public function stripePost(Request $request,$totalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
            "amount" => $totalprice * 100,
            "currency" => "npr",
            "source" => $request->stripeToken,
            "description" => "Thanks for the payment"
        ]);

        //code pasted from above function to send cart data to order table after payment

        $user=Auth::user();
        $userid=$user->id;
//        which user is logged in
//        dd($userid);
        $data=cart::where('user_id','=',$userid)->get();
//        dd($data);
        foreach($data as $data)
        {
            $order=new order;
            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->address=$data->address;
            $order->user_id=$data->user_id;
            $order->product_title=$data->product_title;
            $order->price=$data->price;
            $order->quantity=$data->quantity;
            $order->image=$data->image;
            $order->product_id=$data->Product_id;

            $order->payment_status='paid(card)';
            $order->delivery_status='processing';

            $order->save();

            //deleting cart
            //get specefic id
            $cart_id=$data->id;
            //find in cart
            $cart=cart::find($cart_id);
            //delete the data
            $cart->delete();


        }

        Session::flash('success', 'Payment successful!');

        return back();
    }


}
