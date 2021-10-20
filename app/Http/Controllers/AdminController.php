<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;
use App\Models\foodchef;
use App\Models\Reservation;
use App\Models\orderdone;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function users()
    {
        $data=user::all();
        return view('admin.users',compact('data'));
    }
    public function deleteuser($id)
    {
        $data=user::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function foodmenu()
    {
        $data=food::all();
        return view('admin.foodmenu',compact("data"));
    }

    public function uploadfood(Request $req)
    {
      $data = new food;



      $image=$req->image;

      $imagename = time().'.'.$image->getClientOriginalExtension();

      $req->image->move('foodimage',$imagename);
      $data->image= $imagename;

      $data->title=$req->title;
      $data->price=$req->price;
      $data->disc=$req->disc;

      $data->save();

      return redirect()->back();
    }

    public function deletemenu(
        $id
    )
    {
        $data = food::find($id);
        $data->delete();


        return redirect()->back();
    }

    public function updateview($id)
    {
        $data= food::find($id);
        return view('admin.updateview',compact("data"));
    }

    public function update(Request $req ,$id)
    {
        $data=Food::find($id);

        $image=$req->image;

        $imagename = time().'.'.$image->getClientOriginalExtension();
  
        $req->image->move('foodimage',$imagename);
        $data->image= $imagename;
  
        $data->title=$req->title;
        $data->price=$req->price;
        $data->disc=$req->disc;
  
        $data->save();
  
        return redirect()->back();
    }


    public function reservation(Request $req)
    {
        $data= new Reservation;

        
        $data->name=$req->name;
        $data->email=$req->email                                                        ;
        $data->phone=$req->phone;
        $data->guest=$req->guest;
        $data->date=$req->date;
        $data->time=$req->time;
        $data->message=$req->message;
        $data->save();
  
        return redirect()->back();
    }

    public function viewreservation()
    {
        if(Auth::id())
        {
        $data =  reservation::all();
        return view('admin.admin_reservation', compact('data'));
        }
        else{
            return redirect('login');
        }
    }

    public function viewchef()
    {   
        $data= foodchef::all();
        return view('admin.adminchef', compact('data'));
    }

    public function uploadchef(Request $req)
    {
        $data= new foodchef;
        $image=$req->image;

        $imagename = time().'.'.$image->getClientOriginalExtension();
  
        $req->image->move('chefimage',$imagename);
        $data->image= $imagename;
        

        $data->name=$req->name;
        $data->special=$req->special;
        $data->save();


        return redirect()->back();
    }

    public function updatechef($id)
    {
        $data = foodchef::find($id);
        return view('admin.updatechef', compact('data'));
    }
    public function updatefoodchef(Request $req, $id)
    {
        $data=foodchef::find($id);
        $image=$req->image;
    if($image)
    {       
        $imagename = time().'.'.$image->getClientOriginalExtension();
  
        $req->image->move('chefimage',$imagename);
        $data->image= $imagename;
  
    }
        $data->name=$req->name;
        $data->special=$req->special;
        $data->save();
        return redirect()->back();
    }

    public function deletechef($id)
    {
        $data= foodchef::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function orders()
    {
        $data=orderdone::all();
        return view('admin.orders',compact('data'));
    }

    
    public function search(Request $req)
    {
        $search= $req->search;
        $data=orderdone::where('name','Like','%'.$search.'%')->get();
        return view('admin.orders',compact('data'));
    }
}
