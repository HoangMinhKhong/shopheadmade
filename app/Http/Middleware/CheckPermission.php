<?php

namespace App\Http\Middleware;

use Closure;

class CheckPermission
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
        $pathInfo = $request->path();
        $method = $request->method();
        

        $aryPath = explode('/', $pathInfo);
        foreach ($aryPath as $key => $value) {
            if (is_numeric($value)) {
                unset($aryPath[$key]);
            }

            if ($value == 'admin') {
                unset($aryPath[$key]);
            }
        }

        $permission = '';
        $aryPath = array_values($aryPath);

        if (count($aryPath) == 2) {
            //Edit, delete, show, create
            $permission = join('_', $aryPath);

            if ($aryPath[1] == "batch-remove") {
                $permission = $aryPath[0] . '_delete';
            }
        } elseif(count($aryPath) > 0) {
            $permission = join('_', $aryPath) . '_view';

            if ($method == 'DELETE') {
                $permission = join('_', $aryPath) . '_delete';
            }
        }

        //Check login, neu chua login thi rediect ve trang login
        if(!\Auth::check()) {
            return redirect('admin/login');
        }

        //Check quyen truy cap, neu ko co quyen thi redirect ve trang permission denied
        if(!\Auth::user()->can($permission) && !\Auth::user()->hasRole('administrator') && $permission) {
            return redirect('admin/permission-denied');
        }

        return $next($request);
    }
}
