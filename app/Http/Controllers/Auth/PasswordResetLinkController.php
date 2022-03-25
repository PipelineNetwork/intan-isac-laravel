<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $check_email = User::where('email', $request->email)->first();

        if ($check_email != null) {
            // We will send the password reset link to this user. Once we have attempted
            // to send the link, we will examine the response then see the message we
            // need to show to the user. Finally, we'll send out a proper response.
            $status = Password::sendResetLink(
                $request->only('email')
            );

            echo "<script>
            alert('Sistem berjaya menghantar pautan tukar laluan ke e-mel anda. Sila semak e-mel untuk menukar kata laluan.');
            window.location.href='/forgot-password';
            </script>";
            return $status == Password::RESET_LINK_SENT;
            // ? back()->with('status', __($status));
            // : back()->withInput($request->only('email'));
            // ->withErrors(['email' => __($status)]);
        } else {
            echo '<script language="javascript">';
            echo 'alert("E-mel yang dimasukkan tidak wujud di dalam sistem.");';
            echo "window.location.href='/forgot-password';";
            echo '</script>';
        }
    }
}
