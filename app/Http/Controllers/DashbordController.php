<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashbordController extends Controller
{
    public function logincontrole()
    {

        $user=auth()->user();
        try{
           
            switch ($user) {
                case $user->hasRole('admin'):
                    return redirect()->route('admin');
                    break;
                case $user->hasRole('user'):
                    return redirect()->route('user');
                    break;
                default:
                    return back();
            }
       
        }catch(Exception $e){
            return back();
               
            }
 }
}
