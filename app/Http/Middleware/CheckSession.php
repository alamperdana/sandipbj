<?php


namespace App\Http\Middleware;


use Closure;

class CheckSession
{
    public function handle($request, Closure $next)
    {
        if (!$request->session()->has('is_login')){
            $request->session()->flash('alert', $this->create_alert('warning', 'Silahkan login terlebih dahulu!'));
            return redirect()->route('login');
        }
        return $next($request);
    }

    public function create_alert($type, $message): string
    {
        return json_encode([
            'type' => $type,
            'message' => $message
        ]);
    }
}
