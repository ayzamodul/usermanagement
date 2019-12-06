@extends('yonetim.layouts.master')
@section('title','Kullanıcı Yönetimi')
@section('content')
    <section>

        <div class="card" style="background-color: white" id="deneme">


                <form method="post" action="{{route('yonetim.kullanici.kaydet', @$entry->id)}}">

                    {{csrf_field()}}
                    <div class="card-header d-flex align-items-center">
                        <h3 class="h4">Kullanıcı {{@$entry->id > 0 ? "Düzenle" : "Ekle"}}</h3>
                    </div>


<div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="adsoyad">Ad</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder=""
                                       value="{{$entry->name}}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                       value="{{$entry->email}}">
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
</div>
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary">
                            {{@$entry->id > 0 ? "Güncelle" : "Kaydet"}}
                        </button>
                    </div>
                </form>
                <br>
                <hr>
            </div>

    </section>
@endsection
