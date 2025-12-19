<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lamp;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; // Wajib ada untuk enkripsi password

class PageController extends Controller
{
    public function home()
    {
        // Menghitung jumlah data untuk ditampilkan di Dashboard
        $total_lampu = Lamp::count();
        $total_user = User::count();

        return view("home", [
            "key" => "home",
            "count_lamp" => $total_lampu,
            "count_user" => $total_user
        ]);
    }

    // --- LOGIKA LAMPU ---

    public function lamp()
    {
        $lamp = Lamp::all();
        return view("lamp", ["key" => "lamp", "lp" => $lamp]);
    }

    public function lampaddform()
    {
        return view ("lampaddform", ["key" => "lamp"]);
    }

    public function lampsave(Request $request)
    {
        if ($request->hasFile('poster'))
        {
            $file_name = time().'-'.$request->file('poster')->getClientOriginalName();
            $path = $request->file('poster')->storeAs('poster', $file_name, 'public');
        }
        else
        {
            $file_name = null;
            $path = null;
        }
        Lamp::create([
            'id_lampu' => $request->id_lampu,
            'name' => $request->name,
            'brand' => $request->brand,
            'power' => $request->power,
            'type' => $request->type,
            'price' => $request->price,
            'description' => $request->description,
            'poster' => $file_name
        ]);
        return redirect ('/lamp')->with('alert', 'Data Berhasil di Simpan!');
    }

    public function lampeditform($id)
    {
        $lamp = Lamp::find($id);
        return view('lampeditform', ["key" => "lamp", "lp" => $lamp]);
    }

    public function lampupdate($id, Request $request)
    {
        $lamp = Lamp::find($id);
        $lamp->id_lampu = $request->id_lampu;
        $lamp->name = $request->name;
        $lamp->brand = $request->brand;
        $lamp->power = $request->power;
        $lamp->type = $request->type;
        $lamp->price = $request->price;
        $lamp->description = $request->description;

        if ($request->poster)
        {
            if ($lamp->poster)
            {
                Storage::disk('public')->delete('poster/'.$lamp->poster);
            }
            $file_name = time().'-'.$request->file('poster')->getClientOriginalName();
            $path = $request->file('poster')->storeAs('poster', $file_name, 'public');
            $lamp->poster = $file_name;
        }
        $lamp->save();
        return redirect('/lamp')->with('alert', 'Data Berhasil di Ubah!');
    }

    public function lampdelete($id)
    {
        $lamp = Lamp::find($id);

        if ($lamp->poster)
        {
            Storage::disk('public')->delete('poster/'.$lamp->poster);
        }
        $lamp->delete();
        return redirect('/lamp')->with('alert', 'Data Berhasil di Hapus!');
    }

    // --- LOGIKA USERS (CRUD ADMIN) ---

    public function users()
    {
        $users = User::all();
        return view("users", ["key" => "users", "usr" => $users]); 
    }

    public function usersaddform()
    {
        return view ("usersaddform", ["key" => "users"]);
    }

    public function userssave(Request $request)
    {
        // Validasi dasar saat create user (opsional tapi disarankan)
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        if ($request->hasFile('foto'))
        {
            $file_name = time().'-'.$request->file('foto')->getClientOriginalName();
            $path = $request->file('foto')->storeAs('foto', $file_name, 'public');
        }
        else
        {
            $file_name = null;
            $path = null;
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'foto' => $file_name
        ]);
        return redirect ('/users')->with('alert', 'Data Berhasil di Simpan!');
    }

    // [BARU] Menampilkan Form Edit User (Khusus Password)
    public function userseditform($id)
    {
        $user = User::find($id);
        return view('userseditform', ["key" => "users", "u" => $user]);
    }

    // [BARU] Proses Update Password User oleh Admin
public function usersupdate($id, Request $request)
    {
        // 1. Validasi Input (Nama & Email wajib, Foto opsional)
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $user = User::find($id);
        
        // 2. Update Nama dan Email
        $user->name = $request->name;
        $user->email = $request->email;

        // 3. Cek apakah user mengupload foto baru?
        if ($request->foto)
        {
            // Jika ada foto lama, hapus dulu dari storage biar tidak menumpuk
            if ($user->foto)
            {
                Storage::disk('public')->delete('foto/'.$user->foto);
            }

            // Upload foto baru
            $file_name = time().'-'.$request->file('foto')->getClientOriginalName();
            $path = $request->file('foto')->storeAs('foto', $file_name, 'public');
            
            // Simpan nama file baru ke database
            $user->foto = $file_name;
        }

        // 4. Simpan ke Database
        $user->save();

        return redirect('/users')->with('alert', 'Data User Berhasil Diubah!');
    }

    public function usersdelete($id)
    {
        $users = User::find($id);

        if ($users->foto)
        {
            Storage::disk('public')->delete('foto/'.$users->foto);
        }
        $users->delete();
        return redirect('/users')->with('alert', 'Data Berhasil di Hapus!');
    }

    // --- LOGIKA GANTI PASSWORD (User Login Sendiri) ---

    public function changepass()
    {
        return view ("changepass", ["key" => "users"]); 
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed'
        ]);

        $user = Auth::user();

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect ('/users')->with('alert', 'Password Berhasil di Ubah!');
    }
}