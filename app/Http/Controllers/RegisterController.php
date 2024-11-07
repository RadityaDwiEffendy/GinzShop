<?php

namespace App\Http\Controllers;

use App\Mail\VerificationMail;
use App\Models\Barang;
use App\Models\History;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

use function PHPUnit\Framework\isNull;

class RegisterController extends Controller
{
    /**
     * 
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }


    public function updatePassword(Request $request)
    {
        $request->validate([
            'password =>'
        ]);
    }

    public function updateProfile(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255|unique:users,email,' . $id,
            'role_id' => 'nullable|integer|exists:roles,id',
        ]);

        $user = User::findOrFail($id);

        $user->update($data);

        return redirect()->route('main.profile')->with('success', 'Data BErhasil di simapn');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255|unique:users,email,' . $id,
            'role_id' => 'nullable|integer|exists:roles,id',
        ]);


        $user = User::findOrFail($id);


        $user->update($data);

        return redirect(route('main.akun-manager'))->with('success', 'User updated successfully.');
    }


    public function Delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('main.akun-manager')->with('success', 'User deleted successfully!');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');


        if (Auth::attempt($credentials)) {

            $user = Auth::user();

            if (is_null($user->email_verified_at)) {
                Auth::logout();
                return redirect(route('verification.notice'));
            }


            if ($user->role_id == 1) {
                return redirect(route('main.home'));
            } else if ($user->role_id == 2) {
                return redirect()->route('main.home');
            } else if ($user->role_id == 3) {
                return redirect()->route('main.home');
            }



            return redirect()->route('welcome');
        } else {
            return redirect()->route('auth.login')
                ->with('error', 'Email atau password salah.')
                ->withInput($request->except('password'));;
        }
    }




    /**
     * 
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:225',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $verificationCode = rand(100000, 999999);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'verification_code' => $verificationCode,
        ]);



        Mail::raw('Test email body', function ($message) {
            $message->to('effendyraditya11@gmail.com')
                ->subject('Test Email');
        });



        Mail::to($user->email)->send(new VerificationMail($verificationCode));

        return redirect(route('verification.notice'));
    }

    /**
     * 
     *
     * @return \Illuminate\View\View
     */

    public function showVerificationNotice()
    {

        // $user = Auth::user();

        // $verificationUrl =  URL::temporaySignedRoute(
        //     'verification-verify',
        //     now()->addMinute(60),
        //     ['id' => $user->id, 'hash'=> sha1($user->email)]

        // );

        return view('auth.verify-email');
    }

    public function home(Barang $barang, User $user)
    {
        $user = Auth::user();
        $totalBarang = Barang::sum('stok');
        $totalakun = User::count();
        $jumlahBarang = Barang::count();
        $telahTerjual = History::sum('barang_quantity');
        return view('main.home', compact('totalBarang', 'totalakun', 'jumlahBarang', 'telahTerjual'), ['user' => $user]);
    }

    public function fotostore(Request $request, User $user)
    {
        $data = $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:33000',
        ]);



        if ($request->hasFile('gambar')) {
            $filename = $request->file('gambar')->store('gambar', 'public');
            $data['gambar'] = $filename;


            if ($user->gambar && Storage::exists('public/' . $user->gambar)) {
                Storage::delete('public/' . $user->gambar);
            }
        } else {

            unset($data['gambar']);
        }

        $user->update($data);



        return redirect()->route('main.profile')->with('success', 'Foto berhasil ditambahkan!');
    }
}
