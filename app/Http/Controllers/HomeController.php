<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\foodchef;
use App\Models\order;
use App\Models\orderdone;
use Illuminate\Queue\RedisQueue;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::id())
        {
            return redirect('redirects');
        }
        else

        $data = food::all();
        $data2=foodchef::all();
        return view('home', compact('data','data2'));
    }
    public function redirects()
    {
       $data = food::all();
       $data2=foodchef::all();
       $usertype= Auth::user()->usertype;

       if($usertype=='1')
       {
           return view('admin.adminHome');
       }
       else
       {

           $user_id= Auth::id();
           $count= cart::where('user_id',$user_id)->count();

           
           return view('home' ,compact('data','data2','count'));
       }
    }

    public function addcart(Request $req, $id)
    {   
        if(Auth::id())
        {
            $user_id= Auth::id();
            $food_id=$id;
            $quantity_id=$req->quantity_id;

            $cart=new Cart;
            $cart->user_id = $user_id;
            $cart->food_id = $food_id;
            $cart->quantity_id = $quantity_id;
            $cart->save();

            return redirect()->back();
        }
        else
        {
            return redirect('/login');
        }
    }
    
    public function showcart(Request $req, $id)
    {

        $count=cart::where('user_id',$id)->count();

        if(Auth::id()==$id)
        {

        $data2= cart::select('*')->where('user_id','=',$id)->get();
        $data = cart::where('user_id',$id)->join('food','carts.food_id','=', 'food.id')->get();
        return view('showcart',compact('count','data','data2'));
        }


        else
        {
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $data=cart::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function orderconfirm(Request $req)
    {
        foreach($req->foodname as $key =>$foodname)
        {
            $data=new orderdone;

            $data->foodname=$foodname;
            $data->price=$req->price[$key];
            $data->quantity_id=$req->quantity_id[$key];
            $data->name=$req->name;
            $data->address=$req->address;
            $data->phone=$req->phone;

            $data->save();

        }

        return redirect()->back();
    }
}
