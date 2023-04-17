<?php

namespace App\Http\Controllers;

use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Rproduct;
use App\Models\Rent;
use App\Models\Rcart;

use Session;
use Stripe;
class MemberController extends Controller
{

    //membership, if user isnt member, get membership page, else redirect to sell or rent according to request
    public function membership(Request $request)
    {
        if(Auth::check() && Auth::user()->usertype == 0)
        {
            return view('home.getmembership');
        }
        else if ($request->type == 'rent')
        {
            return view('member.all_rproduct');
        }
        else if ($request->type == 'sell')
        {
            return view('member.sell');
        }
    }
    public function paymembership()
    {
        if(Auth::check() && Auth::user()->usertype == 0)
        {
            return view('member.stripemember');
        }
        else
        {
            return view('member.userpage');
        }
    }
    public function postmembership(Request $request)
    {
        if(Auth::check() && Auth::user()->usertype == 0)
        {
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            Stripe\Charge::create ([
                "amount" => 1000 * 100,
                "currency" => "npr",
                "source" => $request->stripeToken,
                "description" => "Thanks for the payment"
            ]);
            $user = Auth::user();
            $user->usertype = 2;
            $user->save();

            Session::flash('success', 'Payment successful! you are now a member');

            return back();

        }
        else
        {
            return view('member.rent');
        }
    }

    //rent products for members (rproduct)
    public function rproduct()
    {
        $rproduct=rproduct::paginate(10);
        return view('member.all_rproduct',compact('rproduct'));
    }

    //product details
    public function rproduct_details($id)
    {
        $rproduct=rproduct::find($id);
        return view('member.rproduct_details',compact('rproduct'));
    }

    public function rproduct_search(Request $request)
    {
        $search_text=$request->search;
        $rproduct=rproduct::where('title','LIKE','%$search_text%')->orWhere('catagory','LIKE','$search_text')->paginate(10);
        return view('member.all_rproduct',compact('rproduct'));


    }

    public function r_add_cart(Request $request,$id)
    {
        if(Auth::id())
        {
//            getting user data
            $user=Auth::user();
            $userid=$user->id;
//            dd($user);
//            getting product data
            $rproduct=rproduct::find($id);
//            dd($product);
            $rproduct_exist_id=cart::where('Product_id','=',$id)->where('user_id','=',$userid)->get('id')->first();

            if($rproduct_exist_id)
            {
                $cart = cart::find($rproduct_exist_id->id);

                $quantity=$cart->quantity;
                $cart->quantity=$quantity + $request->quantity;

                $cart->price=$rproduct->secondhand_price *  $cart->quantity;

                $cart->save();
                return redirect()->back()->with('message','product added sucessfully');

            }
            else
            {
                $cart=new cart;
                $cart->name=$user->name;
                $cart->email=$user->email;
                $cart->phone=$user->phone;
                $cart->address=$user->address;
                $cart->user_id=$user->id;

                $cart->Product_title=$rproduct->title;

                $cart->price=$rproduct->secondhand_price * $request->quantity;


                $cart->image=$rproduct->image;
                $cart->Product_id=$rproduct->id;
                $cart->quantity=$request->quantity;

                $cart->save();
                return redirect()->back()->with('message','product added sucessfully');
            }

        }
        else
        {
            return redirect('login');
        }

    }
//rent page
    public function rent($id)
    {
        $rproduct=rproduct::find($id);
        return view('member.rent',compact('rproduct',));
    }


    //rent stripe payment
    public function rentstripe($totalprice)
    {
        return view('member.stripe',compact('totalprice'));
    }



    public function rentstripePost(Request $request,$totalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
            "amount" => $totalprice * 100,
            "currency" => "npr",
            "source" => $request->stripeToken,
            "description" => "Thanks for the payment"
        ]);

        //rediret to function add_rent_order() function
        return redirect()->action('MemberController@add_rent_order');
        Session::flash('success', 'Payment successful!');

        return back();

    }

    public function r_add_cartrent(Request $request,$id)
    {
        {
            if(Auth::id())
            {
                $user=Auth::user();
                $rproduct=rproduct::find($id);
                $rcart=new rcart;
                $rcart->name=$user->name;
                $rcart->email=$user->email;
                $rcart->phone=$user->phone;
                $rcart->address=$user->address;
                $rcart->user_id=$user->id;

                $rcart->Product_title=$rproduct->title;
                $rcart->image=$rproduct->image;
                $rcart->Product_id=$rproduct->id;
                $rcart->month = $request->month;
                $rcart->price = $rproduct->rent_price * $rcart->month;
                $rcart->return_date = date('Y-m-d', strtotime("+{$rcart->month} months", strtotime('now'))) ;
                $rcart->save();

                return redirect()->back();
            }
            else
            {
                return redirect('login');
            }

        }


    }

    public function show_rent()
    {
        if(Auth::id())
        {
            $id=Auth::user()->id;
            $rcart=rcart::where('user_id','=',$id)->get();
            return view('member.showrent',compact('rcart'));
        }
        else{
            return redirect('login');
        }
    }

    public function remove_rent($id)
    {
        $rcart=rcart::find($id);
        $rcart->delete();
        return redirect()->back();
    }

}
