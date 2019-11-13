@extends('yonetim.layouts.master')
@section('title','Kullanıcı Yönetimi')
@section('content')
    <h1 class="page-header">Kullanıcı Yönetimi</h1>


    <form method="post" action="{{route('yonetim.kullanici.kaydet', @$entry->id)}}">

        {{csrf_field()}}

        <div class="pull-right">
            <button type="submit" class="btn btn-primary">
                {{@$entry->id > 0 ? "Güncelle" : "Kaydet"}}
            </button>
        </div>
        <h2 class="sub-header">
            Kullanıcı {{@$entry->id > 0 ? "Düzenle" : "Ekle"}}
        </h2>


        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="adsoyad">Ad</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder=""
                           value="{{$entry->adsoyad}}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{$entry->email}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="sifre">Şifre</label>
                    <input type="password" class="form-control" id="sifre" name="sifre" placeholder="Şifre"
                           value="{{$entry->password}}">
                </div>
            </div>
        </div>
    </form>

@endsection
