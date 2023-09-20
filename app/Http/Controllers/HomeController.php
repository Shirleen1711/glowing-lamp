<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $user_model;

    public function __construct(){
        $this->user_model = new User();
    }

    public function respon($status, $code, $data)
    {
        $data = [
            "status" =>$status,
            "code" => $code,
            "data" =>$data
        ];
        return response()->json($data);
    }
    public function index()
    {
        return view('Home');
    }

    public function tampil()
    {
        return "Data Perusahaan";
    }

    public function TestUser()
    {
        $list = $this->user_model->getAllUser();
        $data = [];

        if(count($list)>0){
          foreach($list as $key => $value){
            $data[$key] = $value;
            $data[$key]->nomor = $key +1;
          }  
        }

        if($data){
            return $this->respon("success", "200", $data);
        } else{
            return $this->respon("failed", "404", "Gagal mengambil data user!");
        }
        
    }


    public function login(Request $request)
    {
        // Validasi data input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Ambil semua pengguna dari database
        $users = User::all();

        // Loop melalui pengguna
        foreach ($users as $user) {
            // Periksa apakah email dan password cocok
            if ($user->email === $request->email && $user->password === $request->password) {
                // Autentikasi berhasil
                return redirect()->route('login'); // Ganti 'dashboard' dengan rute yang sesuai
            }
        }

        // Autentikasi gagal
        return back()->with('error', 'Email atau password salah.');
    }
}