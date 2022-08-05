<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Food;
use App\Models\User;
use App\Models\Chief;
use App\Models\Order;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    function index(){
        if(Auth::id()){
            return redirect('redirects');
        }
        else
        $data = Food::all();
        $data2 = Chief::all();
        return View('home', compact('data', 'data2'));
    }
    //multi authentication user and admin
    function redirects(){
        $data = Food::all();
        $data2 = Chief::all();

        $usertype = Auth::user()->usertype;
        if($usertype=='1'){
            return view('admin.index');
        }
        else{
            $user_id = Auth::id();
            $count = Cart::where('user_id',$user_id)->count();
            return view('home', compact('data', 'data2', 'count'));
        }
    }
    public function AddCart(Request $req, $id){
        if(Auth::id()){
            $user_id = Auth::id();
            $food_id = $id;
            $quantity = $req->quantity;

            $cart = new Cart;

            $cart->user_id = $user_id;
            $cart->food_id = $food_id;
            $cart->quantity = $quantity;         
            $cart->save();
          return redirect()->back();
        }
        else{
            return redirect('login');
        }
    }

    public function showCart(Request $req, $id){
        $user_id = Auth::id();

        $count = Cart::where('user_id',$user_id)->count();

         if(Auth::id()==$id){

        $data2 = Cart::select('*')->where('user_id', '=',$id)->get();

        $data = Cart::where('user_id', $id)->join('food', 'carts.food_id', '=', 'food.id')->get();
        return view('showCart', compact('count', 'data', 'data2'));
         }
         else{
             return redirect()->back();
         }
    }
    public function removeCart($id){
        $data2= Cart::find($id);
        $data2->delete();
        return redirect()->back();
    }

    // orders 
    public function confirm_order(Request $req){
        foreach($req->title as $key=>$title){
            $data = new Order;
            $data->foodname = $title;
            $data->price = $req->price[$key];
            $data->quantity = $req->quantity[$key];
            $data->name = $req->name;
            $data->phone = $req->phone;
            $data->address = $req->address;

            $data->save();
        }
        return redirect()->back();
    }
}
