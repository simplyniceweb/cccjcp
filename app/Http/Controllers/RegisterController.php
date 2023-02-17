<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\ChangePassword;
use Illuminate\Http\Request;
use App\Mail\ConfirmRegistration;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'unique:App\Models\User,email', 'max:29'],
            'username' => ['required', 'unique:App\Models\User,userid', 'max:23'],
            'password' => ['required', 'confirmed', 'max:32', Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
            'gender' => ['required']
        ]);

        if ($validator->fails()) {
            return redirect('/')
                    ->withErrors($validator)
                    ->withInput()
                    ->with('registration', true);
        }

        $validated = $validator->validated();

        $email = $validated['email'];
        $username = $validated['username'];
        $password = md5($validated['password']);
        $url = route("registration.validation", ['username' => $username, 'code' => $password]);
        
        User::create([
            'email' => $email,
            'userid' => $username,
            // 'user_pass' => $password,
            'sex' => $validated['gender']
        ]);

        Mail::to($email)->send(new ConfirmRegistration($email, $username, $url));

        return redirect('/')->with('message', 'Welcome, ' . $username . '! We sent you an email to verify your account.');
    }

    public function validation(Request $request, ?string $username, ?string $code)
    {
        User::where('userid', $username)->update(['user_pass' => $code]);

        return redirect('/')->with('message', 'Welcome, ' . $username . '! Your account is now verified, you can now log in.');
    }

    public function changepassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'email' => ['required', 'email', 'unique:App\Models\User,email', 'max:29'],
            'password' => ['required', 'confirmed', 'max:32', Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
        ]);

        if ($validator->fails()) {
            return redirect('/')
                    ->withErrors($validator)
                    ->withInput()
                    ->with('profile', true);
        }

        $validated = $validator->validated();

        $user_id = Auth::user()->userid;
        User::where('account_id', Auth::user()->account_id)->update(['user_pass' => md5($validated['password'])]);

        Auth::logout();

        return redirect('/')->with('message', 'Hi, ' . $user_id . '! This is an automated message to confirm that your password has been successfully changed.');
    }

    public function forgotpassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
        ]);

        $validator->errors()->add('field', 'Something is wrong with this field!');

        if ($validator->fails()) {
            return redirect('/')
                    ->withErrors($validator)
                    ->withInput()
                    ->with('forgotpass', true);
        }

        $validated = $validator->validated();
        $email = $validated['email'];

        $user = User::where('email', $email)->first();
        if (!empty($user)) {
            $username = $user->userid;
            $url = route('forgot.validation', ['username' => $username, 'code' => md5($validated['password'])]);
    
            Mail::to($email)->send(new ChangePassword($email, $username, $url));
    
            return redirect('/')->with('message', 'Hi, ' . $username . '! We sent you an email to verify your forgot password action.');
        } else {
            $validator->errors()->add('email', 'Email does not exist!');
            return redirect('/')
                    ->withErrors($validator)
                    ->withInput()
                    ->with('forgotpass', true);
        }
    }

    public function forgotvalidation(Request $request, ?string $username, ?string $code)
    {
        User::where('userid', $username)->update(['user_pass' => $code]);

        return redirect('/')->with('message', 'Hi, ' . $username . '! You successfully changed your account password.');
    }
}
