<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function create()
    {
        return view('admin.auth.login');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string', 'alpha_num', 'max:50'],
            'password' => ['required', 'string', 'between:8,50'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('admin.shipments.index')
                ->with([
                    'success' => trans('app.loginSuccess'),
                ]);
        }

        return back()
            ->withErrors([
                'username' => 'The provided credentials do not match our records.',
            ])
            ->onlyInput('username');
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')
            ->with([
                'success' => trans('app.logoutSuccess'),
            ]);
    }
}
