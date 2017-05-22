<?php

namespace App\Http\Middleware;

use Auth;
use DB;
use Closure;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $pof)
    {
        if(!Auth::check())
        {
            return redirect('autherror');
        }
        else
        {
            $group = Auth::user()->GroupID;
            $privilege = array(
                DB::table('OperatorGroup')->where('GroupID',$group)->pluck('PrivilegeOfFunctions0')->first(),
                DB::table('OperatorGroup')->where('GroupID',$group)->pluck('PrivilegeOfFunctions1')->first(),
                DB::table('OperatorGroup')->where('GroupID',$group)->pluck('PrivilegeOfFunctions2')->first(),
                DB::table('OperatorGroup')->where('GroupID',$group)->pluck('PrivilegeOfFunctions3')->first(),
                DB::table('OperatorGroup')->where('GroupID',$group)->pluck('PrivilegeOfFunctions4')->first(),
                DB::table('OperatorGroup')->where('GroupID',$group)->pluck('PrivilegeOfFunctions5')->first(),
                DB::table('OperatorGroup')->where('GroupID',$group)->pluck('PrivilegeOfFunctions6')->first(),
                DB::table('OperatorGroup')->where('GroupID',$group)->pluck('PrivilegeOfFunctions7')->first()
                );

            if( $privilege[$pof] == '1' )
                return $next($request);
            else
                return redirect('autherror');
        }
    }
}
