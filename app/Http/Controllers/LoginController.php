<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use App\Models\UserAccount;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('Username', 'Password');

        // Query the user by 'username' column
        $user = UserAccount::where('username', $credentials['Username'])->first();

        // Debugging output
        if (!$user) {
            return redirect()->route('login')->with('error', 'User not found');
        }

        // Check if the password matches
        if ($user && Hash::check($credentials['Password'], $user->password)) {
            // Store the user role in session
            $isAdmin = $user->role === 'admin';
            Session::put('is_admin', $isAdmin);

            // Debugging output
            Log::info('User logged in', [
                'username' => $credentials['Username'],
                'role' => $user->role,
                'is_admin' => $isAdmin
            ]);

            return redirect()->route($isAdmin ? 'dashboard' : 'tech');
        }

        return redirect()->route('login')->with('error', 'Invalid credentials');
    }

    public function logout()
    {
        Session::forget('is_admin');
        return redirect()->route('login');
    }
}
