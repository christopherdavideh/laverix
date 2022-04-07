<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserRole;
use DB;

class AdministratorRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        
        if(auth()->user()->admin == 1)
            return $next($request);
        
        return redirect('/dashboard');
        
        //$sql = "SELECT * FROM user_roles WHERE user_id=?";
        //DB::select($sql, array($user_id));
        /*$users = UserRole::where('user_id','=',1)->get();
        //$roles = $users->role_id;
        foreach($users as $rol )
        {
            if($rol->role_id == 1){
                $perfil='admin';
                break;
            }else{
                $perfil = 'user';
            }
        }
        if ($perfil == 'admin')
            return $next($request);

        return redirect('/');*/
    }
}
