<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Food;
use App\Models\Reservation;
use App\Models\Chief;
use App\Models\Order;
use Dotenv\Loader\Resolver;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    function users(){
        $users = User::all();
        return view('admin.users', compact("users"));
    }
    function deleteuser($id){
        $users = User::find($id);
        $users->delete();
        return redirect()->back();
    }
    public function foodmenu(){
        $data = Food::all();
        return view('admin.foodMenu', compact('data'));
    }
    public function uploadfood(Request $req){
        $uploadfood = new Food;
        
        $image = $req->image;
        
        $imageName = time().'-food'.'.'.$image->getClientOriginalExtension();
        $req->image->move('FoodImages', $imageName);
        
        $uploadfood->image = $imageName;
        $uploadfood->title = $req->title;
        $uploadfood->price = $req->price;
        $uploadfood->description = $req->description;
        
        $uploadfood->save();

        return redirect()->back();

    }
    public function deleteFood($id){
        $data = Food::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function updateFood($id){
        $data = Food::find($id);
        return view('UpdateFood', compact('data'));
    }
    public function update(Request $req, $id){
        $data = Food::find($id);
        $image = $req->image;
        
        $imageName = time().'-food'.'.'.$image->getClientOriginalExtension();
        $req->image->move('FoodImages', $imageName);
        
        $data->image = $imageName;
        $data->title = $req->title;
        $data->price = $req->price;
        $data->description = $req->description;
        
        $data->save();

        return redirect()->back();
    }

    // reservation 
    public function reservation(Request $req){
        $reservation = new Reservation;
        
        
        $reservation->name = $req->name;
        $reservation->email = $req->email;
        $reservation->phone = $req->phone;
        $reservation->guest = $req->guest;
        $reservation->date = $req->date;
        $reservation->time = $req->time;
        $reservation->message = $req->message;
        
        $reservation->save();

        return redirect()->back();

    }
    public function orders(){
        $data = reservation::all();

        return view('admin.orders', compact('data'));
    }
    public function cheifs(){
        $data = Chief::all();
        return view('admin.cheifs', compact('data'));
    }

    public function cheifsAdd(Request $req){
        $data2 = new Chief;
        
        $image = $req->image;
        
        $imageName = time().'-cheif'.'.'.$image->getClientOriginalExtension();
        $req->image->move('CheifsImages', $imageName);
        
        $data2->image = $imageName;
        $data2->name = $req->name;
        $data2->specialist = $req->specialist;
        $data2->save();

        return redirect()->back();

    }
    public function EditCheif($id){
        $data = Chief::find($id);
        return view('updateCheif', compact('data'));
    }
    public function UpdateCheif(Request $req, $id){
         $data2 = Chief::find($id);
        
        $image = $req->image;
        
        $imageName = time().'-cheif'.'.'.$image->getClientOriginalExtension();
        $req->image->move('CheifsImages', $imageName);
        
        $data2->image = $imageName;
        $data2->name = $req->name;
        $data2->specialist = $req->specialist;
        $data2->save();

        return redirect()->back();
    }
    public function deleteCheif(Request $req, $id){
        $data = Chief::find($id);
        $data->delete();
        return redirect()->back();
    }

    // orders 

    public function user_orders(){
        $data =  Order::all();
         return view('admin.user_orders', compact('data'));
    }

    public function search(Request $req){
       $search = $req->search;
        $data =  Order::where('name', 'Like', '%'. $search.'%')->orWhere('foodname', 'Like', '%'. $search.'%')->get();
         return view('admin.user_orders', compact('data'));
    }

}
