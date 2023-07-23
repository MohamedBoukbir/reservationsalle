<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Reservation;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(){
  $events = array();
  $reservations = Reservation::where('start_time', '>', Carbon::now())->get();
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

        return view('user.dashboard-user', ['events' => $events,'allresrvationCount'=>$allresrvationCount,'mesresrvationCount'=>$mesresrvationCount]);
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'effectif' => 'required',
            'title' => 'required',
            'start_time' => 'required|date|after_or_equal:' . date('Y-m-d'), // Vérification date >= date du système
            'date' => 'required',
            'end_time' => 'required|after:start_time',
        ], [
            'start_time.after_or_equal' => 'La date de début doit être égale ou postérieure à la date d\'aujourd\'hui.',
            'end_time.after' => 'La date de fin doit être postérieure à la date de début.',
        ]);
    
    
        if ($validator->fails()) {
            return redirect()->back()->with('erreur', 'Erreur !! Veuillez essayer à nouveau.')
                                     ->withErrors($validator)->withInput();
        }
    
//     $reservaionotest=Reservation::where('salle_id',$request->salle_id)
//                                         ->where('start_time','<',$request->start_time)
//                                         ->orwhere('end_time','>',$request->end_time);
                        
// if( count($reservaionotest)>0){
//     return redirect()->back()->with('erreur', 'cette salle est déjà réservé !!');
// }
$reservations = Reservation::where('salle_id', $request->salle_id)
        ->where('start_time', '<', $request->end_time) // Modified to 'end_time'
        ->where('end_time', '>', $request->start_time) // Modified to 'start_time'
        ->get();

    if ($reservations->count() > 0) {
        return redirect()->back()->with('erreur', 'Cette salle est déjà réservée pour ce créneau horaire.');
    }

      $reservation= new Reservation();
      $reservation->title=$request->title;
      $reservation->effectif=$request->effectif;
      $reservation->salle_id=$request->salle_id;
      $reservation->user_id=Auth::user()->id;
      $reservation->date=$request->date;
      $reservation->start_time= $request->start_time;
      $reservation->end_time=$request->end_time ;
      $reservation->save();


      return redirect()->back()->with('success', 'reservation a été bien effectué !!');


    }
    /*////////////////////////////////////////////////////////////////  */
    public function update($id, Request $request){
        $validator = Validator::make($request->all(), [
            'effectif' => 'required',
            'title' => 'required',
            'start_time' => 'required|date|after_or_equal:' . date('Y-m-d'), // Vérification date >= date du système
            'date' => 'required',
            'end_time' => 'required|after:start_time',
        ], [
            'start_time.after_or_equal' => 'La date de début doit être égale ou postérieure à la date d\'aujourd\'hui.',
            'end_time.after' => 'La date de fin doit être postérieure à la date de début.',
        ]);
    
    
        if ($validator->fails()) {
            return redirect()->back()->with('erreur', 'Erreur !! Veuillez essayer à nouveau.')
                                     ->withErrors($validator)->withInput();
        }
        $reservations = Reservation::where('salle_id', $request->salle_id)
        ->where('id', '!=', $id)
        ->where('start_time', '<', $request->end_time) // Modified to 'end_time'
        ->where('end_time', '>', $request->start_time) // Modified to 'start_time'
        ->get();
        if ($reservations->count() > 0) {
            return redirect()->back()->with('erreur', 'Cette salle est déjà réservée pour ce créneau horaire.');
        }
        $resrvationold=Reservation::find($id);
        if ($resrvationold->start_time < Carbon::now()->addHour(1) && $resrvationold->end_time > Carbon::now()) {
            return redirect()->back()->with('erreur', 'Tu ne peux pas modifier cette réservation car elle est dans le temps actuel ou bien dans le passé !!');
        }
      $resrvationold->title=$request->title;
      $resrvationold->effectif=$request->effectif;
      $resrvationold->salle_id=$request->salle_id;
      $resrvationold->user_id=Auth::user()->id;
      $resrvationold->date=$request->date;
      $resrvationold->start_time= $request->start_time;
      $resrvationold->end_time=$request->end_time ;
      $resrvationold->save();
      
      return redirect()->back()->with('success', 'reservation a été bien modifier !!');
    }
    /*////////////////////////////////////////////////////////////////  */

    public function allreservation(){
        $reservations = Reservation::where('start_time', '>', Carbon::now())->get();
        $mesreservations=Reservation::where('user_id',auth()->user()->id)->orderBy('id', 'desc')->paginate("");
        $mesresrvationCount=count($mesreservations);
        return view('user.Allreservation',compact('reservations','mesresrvationCount'));
    }

    public function myreservation(){
        $allresrvation=Reservation::where('start_time', '>', Carbon::now())->get();
        $allresrvationCount=count($allresrvation);
        $reservations=Reservation::where('user_id',auth()->user()->id)->orderBy('id', 'desc')->paginate("");
        return view('user.MseResrvation',compact('reservations','allresrvationCount'));
    }
    public function destroyreservation($id){
        $reservation= Reservation::find($id);
        if ($reservation->start_time > Carbon::now()->addHour(1) || $reservation->end_time < Carbon::now() ) {
            $reservation->delete();
            return redirect()->back()->with('success', 'reservation a été bien supprimer !!');
        }
        return redirect()->back()->with('erreur', 'tu ne peux pas supprimer cette réservation puisque il été dans le temps actuelle!!');
    }
    public function profile(){
        $allreservations=Reservation::where('start_time', '>', Carbon::now())->get();
        $allresrvationCount=count($allreservations);
        $mesreservations=Reservation::where('user_id',auth()->user()->id)->orderBy('id', 'desc')->paginate("");
        $mesresrvationCount=count($mesreservations);
        return view('user.profile',compact('allresrvationCount','mesresrvationCount'));
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
        return redirect()->route('user')->with('success', 'your profile is update !!');
        dd($request);

    }
}
