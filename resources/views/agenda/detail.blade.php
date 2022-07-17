@extends('layouts.main')

@section('content')

<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
        <div class="content-body"><!-- Basic Horizontal form layout section start -->
            <section id="basic-horizontal-layouts">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Membuat tugas dari agenda {{$agenda->j_agenda}} </h4>
                            </div>
                            <div class="card-body">
                                <form class="form form-horizontal" method="POST" action="/todo">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-1">
                                                <label for="title" class="form-label">Judul tugas</label>
                                                <input type="text" class="form-control" id="title" name="judul_tugas" placeholder="Isikan judul agenda" required />
                                                <input type="hidden" class="form-control" id="title" name="user_id" value="{{Auth::user()->id}}" placeholder="Isikan judul agenda" required />
                                                <input type="hidden" class="form-control" id="title" name="agenda_id" value="{{$agenda->id}}" placeholder="Isikan judul agenda" required />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-1">
                                                <label for="task-due-date" class="form-label">Tenggat waktu</label>
                                                <input type="text" class="form-control task-due-date" id="task-due-date" name="tenggat_waktu" required/>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-1">
                                                <label class="form-label">Deskripsi agenda</label>
                                                <textarea name="deskripsi" id="event-description-editor" class="form-control" required ></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-9 offset-sm-3">
                                            <button type="submit" class="btn btn-primary me-1">Tambahkan</button>
                                            <button type="reset" class="btn btn-outline-secondary">Cencel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Menampilkan tugas dari agenda {{$agenda->j_agenda}} </h4>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Judul tugas</th>
                                                <th>Tenggat waktu</th>
                                                <th>Deskripsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($todos as $todo )
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <div class="fw-bolder">{{$todo->judul_tugas}}</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span>{{$todo->tenggat_waktu}}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="fw-bolder me-1">{{$todo->deskripsi}}</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
      </div>
    </div>
  </div>
  <!-- END: Content-->

@endsection
