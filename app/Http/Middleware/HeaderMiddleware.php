<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use App\User;
use App\Models\Feedback;
class HeaderMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //获取处理反馈的最新4条信息(属于关系)
        $fb_id = Feedback::orderBy('Fid','desc') -> take(4) -> lists('Fid');
        $fi =  1;
        foreach($fb_id as $k => $v)
        {
            $feedback = Feedback::find($v);
            $feedback_data[$fi]['Fid'] = $feedback->Fid;
            $feedback_data[$fi]['Fcontent'] = $feedback->Fcontent;
            $feedback_data[$fi]['Uimage'] = $feedback->feedback_users->Uimage;
            $feedback_data[$fi]['Ualais'] = $feedback->feedback_users->Ualais;
            $fi++;
        }
        //获取处理反馈的所有的信息数量
        $fcount = Feedback::count();
        //进行下一步(即传递给session)
        session(['fb_data'=>$feedback_data,'fcount'=>$fcount]);
        return $next($request);
        
    }
}
