<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Auth;

class ceklogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $userakses = User::join('personal_access_tokens', 'personal_access_tokens.tokenable_id', '=', 'users.id')->where('users.email', $request->email)->get(['personal_access_tokens.*']);
        // dd($userakses);
        // $user = $request->user();
        $dataResponse = [];
        if (!empty($userakses)) {
            foreach ($userakses as $key => $data) {
                $dataResponse[$key] = [
                    "id" =>  $data->id,
                    "abilities" =>  json_decode($data->abilities),
                ];
            }
        }
        // dd($dataResponse);

        return $next($request);
    }
}
