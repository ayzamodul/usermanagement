@extends('yonetim.layouts.master')
@section('title','Kullanıcı Yönetimi')
@section('content')
    <header class="page-header" style="width: 110%;margin-left: -5%">
        <div class="row-fluid" >
            <h2 class="no-margin-bottom"  id="h2" style="margin-left: 2%" >&nbsp; Kullanıcı Yönetimi</h2>
        </div>
    </header>
    <section>

        <div class="card" style="background-color: white" id="deneme">




                @can('kullanici-ekle')
                    <div class="btn-group pull-right">
                        <a href="{{route('yonetim.kullanici.yeni')}}" class="btn btn-primary" style="margin-top: 12%">Kullanıcı Ekle</a>
                    </div>
                @endcan


                <div class="card-header d-flex align-items-center">
                    <h3 class="h4">Kullanıcı Listesi</h3>
                </div>
                <div class="card-body row-list-table">

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="myTab">
                            <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Ad Soyad</th>
                                <th>Email</th>

                                <th></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($list as $data)
                                <tr>
                                    <td>{{$data->id}}</td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->email}}</td>

                                    <td style="width: 100px">
                                        @can('kullanici-ekle')
                                            <a href="{{route('yonetim.kullanici.duzenle' , $data->id)}}"
                                               class="btn btn-xl btn-warning"
                                               data-toggle="tooltip" data-placement="top"
                                               title="Düzenle">
                                                <span class="fa fa-pencil"></span>
                                            </a>
                                        @endcan
                                        @can('kullanici-sil')
                                            <a href="{{route('yonetim.kullanici.sil' , $data->id)}}"
                                               class="btn btn-xl btn-danger" data-toggle="tooltip" data-placement="top"
                                               title="Sil" onclick="return confirm('Emin misiniz?')">
                                                <span class="fa fa-trash"></span>
                                            </a>
                                        @endcan
                                    </td>
                                </tr>

                            @endforeach

                            </tbody>
                        </table>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#myTab').DataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/a5734b29083/i18n/Turkish.json"
                }
            });
        });
    </script>


@endsection
