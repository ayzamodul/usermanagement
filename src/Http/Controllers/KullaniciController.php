<?php

namespace Modul\userModul\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modul\userModul\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class KullaniciController extends Controller
{

    public function __construct()
    {
        $this->middleware("web");  // this will solve your problem
        $this->middleware("auth");
        $this->middleware('role:Admin', ['only' => ['index','kaydet','form','sil','update']]);
    }



    public function index()
    {
        //  $list=User::orderBy('name','desc');
        $list = DB::table('yonetici')->get()->all();

        //  dd($data);

        return view('kullanici::kullanici.index', compact('list'));
    }

    public function form($id = 0)
    {
        $entry = new User;
        if ($id > 0) {
            $entry = User::find($id);
        }
        return view('kullanici::kullanici.form', compact('entry'));
    }

    public function kaydet($id = 0)
    {
        //  return request()->only('password');

        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $data = request()->only('name', 'email');

        if (request()->filled('sifre')) {
            $data['sifre'] = Hash::make(request('sifre'));
        }
        if ($id > 0) {
            $entry = User::where('id', $id)->firstOrFail();
            $entry->update($data);
        } else {
            $entry = User::create($data);
        }

        return redirect()
            ->route('yonetim.kullanici.duzenle', $entry->id)
            ->with('status', 'İşleminiz Gerçekleştirildi')
            ->with('status_type', 'success');

    }

    public function sil($id)
    {
        User::destroy($id);
        return redirect()->route('yonetim.kullanici');
    }

}
