<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Illuminate\Support\Facades\Auth;

class SocialController extends Controller
{
    public function redirect($service)
    {
        return Socialite::driver($service)->redirect();
    }

    public function callback($service,Request $request)
    {
            //    $user = Socialite::driver($service) ->user() ;
            // //    stateless()->
            //   return response() -> json($user);

              if($service == 'github' || $service == 'facebook'){
                $user = Socialite::driver($service) ->user() ;
              }else {
                $user = Socialite::driver($service) ->stateless()->user() ;

              }
                // login if user in the data base
              $user_found = User::where('email',$user->getEmail())->first();

              if( $user_found ){
                  Auth::login( $user_found );
                  return redirect('/home');
              }else{
                  $new_user = new User;
                  $new_user->name = $user->getName();
                  $new_user->email = $user->getEmail();
                  $new_user->password = bcrypt('123456789');

                  if( $new_user->save()){
                    Auth::login( $new_user );
                    return redirect('/home');
                  }

              }

   }

}
