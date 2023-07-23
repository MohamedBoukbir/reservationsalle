<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        $events = array();
  $reservations = Reservation::get();
        foreach ($reservations as $reservation) {
            $events[] = [
                 'id' =>$reservation->id,
                'title' => $reservation->salle_id,
                'start' => $reservation->start_time,
                'end' => $reservation->end_time,
                'date'=>$reservation->date,
                'effectif'=>$reservation->effectif,
                'titlee'=>$reservation->title,
            ];
        }
        $allreservations=Reservation::where('start_time', '>', Carbon::now())->get();
        $allresrvationCount=count($allreservations);
        $mesreservations=Reservation::where('user_id',auth()->user()->id)->orderBy('id', 'desc')->paginate("");
        $mesresrvationCount=count($mesreservations);

        return view('admin.dashboard-admin', ['events' => $events,'allresrvationCount'=>$allresrvationCount,'mesresrvationCount'=>$mesresrvationCount]);
    }
    public function profile(){
        $allreservations=Reservation::where('start_time', '>', Carbon::now())->get();
        $allresrvationCount=count($allreservations);
        $mesreservations=Reservation::where('user_id',auth()->user()->id)->orderBy('id', 'desc')->paginate("");
        $mesresrvationCount=count($mesreservations);
        return view('admin.profile',compact('allresrvationCount','mesresrvationCount'));
    }
    public function updateprofile(Request $request,$id){
        $request->validate([
            'phone' => 'required',
            'address' => 'required',
        ]);
   
     // Verify the current password
     
//    dd($id);
      // Update the password
         $user = User::find($id);
         if($request->current_password && $request->password){
            $request->validate([
                'current_password' => 'required',
                'password' => 'required|min:6|confirmed',
            ]);
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Le mot de passe actuel est incorrect.']);
            }
            $user->password = Hash::make($request->password);
        }
            if($request->image){
                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                ]);
                $imagePath =$request->image->store('images', 'public');
                // $candidat->image = $request->image;
                $user->image = $imagePath;
            }
   
            $user->address = $request->address;
            // $user->country = $request->country;
            $user->phone = $request->phone;
            $user->save();
        return redirect()->route('admin')->with('success', 'your profile is update !!');
        dd($request);

    }
    public function allreservation(){
        $reservations = Reservation::get();
        // $mesreservations=Reservation::where('user_id',auth()->user()->id)->orderBy('id', 'desc')->paginate("");
        // $mesresrvationCount=count($mesreservations);
        return view('admin.Allreservation',compact('reservations'));
    }
}
