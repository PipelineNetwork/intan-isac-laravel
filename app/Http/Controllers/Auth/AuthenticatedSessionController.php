<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $user = User::where('nric', $request->nric)->get()->first();
        // dd($request);
        // $request->authenticate();

        if ($user == null) {
            // alert()->error('Akaun anda tiada dalam rekod kami.');
            // // alert('Akaun anda tiada dalam rekod kami.');
            // return back();
            echo '<script language="javascript">';
            echo 'alert("Akaun anda tiada dalam rekod kami.");';
            echo "window.location.href='/';";
            echo '</script>';
        }
        $this->validate($request, [
            'password' => 'required',
        ]);

        if (Hash::check($request->password, $user->password)) {
            $request->authenticate();
            $request->session()->regenerate();

            // alert()->success('Log masuk berjaya');
            return redirect()->intended(RouteServiceProvider::HOME);
            // echo '<script language="/javascript">';
            // echo "alert('Swal.fire({ text: 'Log masuk anda berjaya!', icon: 'success', confirmButtonText: 'Ok', })";
            // echo "window.location.href='/dashboard';";
            // echo '</script>';
        } else {
            // alert()->error('Sila masukkan kata laluan yang betul.');
            // alert('Sila masukkan kata laluan yang betul.');
            echo '<script language="javascript">';
            echo 'alert("Sila masukkan kata laluan yang betul.");';
            echo "window.location.href='/';";
            echo '</script>';
            // return back();
        }
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
        // return view('auth.login');
        // return view('welcome');
    }
}
