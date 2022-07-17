@extends('layouts.main')

@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row"></div>
            <div class="content-body"><!-- Dashboard Ecommerce Starts -->
                <section id="dashboard-ecommerce">
                    <div class="row match-height">
                        <!-- Medal Card -->
                        <div class="col-xl-4 col-md-1 col-12">
                            <div class="card card-congratulation-medal">
                                <div class="card-body">
                                    <section>
                                        <div class="app-calendar overflow-hidden border">
                                            <div class="row g-0">
                                                <!-- Sidebar -->
                                                    <div class="sidebar-wrapper">
                                                        <div class="card-body d-flex justify-content-center">
                                                            <button class="btn btn-primary btn-toggle-sidebar w-100" data-bs-toggle="modal" data-bs-target="#add-new-sidebar">
                                                                <span class="align-middle">Tambahkan agenda</span>
                                                            </button>
                                                        </div>
                                                        <div class="card-body pb-0">

                                                        </div>
                                                    </div>
                                                    <div class="mt-auto">
                                                        <img
                                                            src="../../../app-assets/images/pages/calendar-illustration.png"
                                                            alt="Calendar illustration"
                                                            class="img-fluid"
                                                        />
                                                    </div>


                                                <!-- /Sidebar -->

                                                <div class="col position-relative"></div>
                                                <div class="body-content-overlay"></div>
                                            </div>
                                        </div>
                                        <!-- Add/Update/Delete agenda-->
                                        <div class="modal modal-slide-in event-sidebar fade" id="add-new-sidebar">
                                            <div class="modal-dialog sidebar-lg">
                                                <div class="modal-content p-0">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    <div class="modal-header mb-1">
                                                        <h5 class="modal-title">Menambahkan agenda</h5>
                                                    </div>
                                                    <div class="modal-body flex-grow-1 pb-sm-0 pb-3">
                                                        <form class="event-form needs-validation" method="POST" action="/agenda">
                                                            @csrf
                                                            <div class="mb-1">
                                                                <label for="title" class="form-label">Judul agenda</label>
                                                                <input type="text" class="form-control" id="title" name="j_agenda" placeholder="Isikan judul agenda" required />
                                                            </div>
                                                            <div class="mb-1 position-relative">
                                                                <label for="start-date" class="form-label">Start Date</label>
                                                                <input type="text" class="form-control" id="start-date" name="start_date" placeholder="Masukan waaktu mulai agenda" required />
                                                            </div>
                                                            <div class="mb-1 position-relative">
                                                                <label for="end-date" class="form-label">End Date</label>
                                                                <input type="text" class="form-control" id="end-date" name="end_date" placeholder="Masukan waaktu berakhir agenda" required />
                                                            </div>
                                                            <div class="mb-1">
                                                                <label for="select-label" class="form-label">Keperluan</label>
                                                                <select class="select2 select-label form-select w-100" id="select-label" name="label" required >
                                                                    <option data-label="primary" value="Dinas" selected>Dinas</option>
                                                                    <option data-label="danger" value="Non-dinas">Non-dinas</option>
                                                                    <option data-label="warning" value="Keluarga">Keluarga</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-1">
                                                                <label for="event-location" class="form-label">Lokasi agenda</label>
                                                                <input type="text" class="form-control" id="event-location" name="lokasi" placeholder="Masukan lokasi agendan" required />
                                                                <input type="hidden" class="form-control" id="event-location" name="user_id" value="{{Auth::user()->id}}" placeholder="Masukan lokasi agendan"/>
                                                            </div>
                                                            <div class="mb-1">
                                                                <label class="form-label">Deskripsi agenda</label>
                                                                <textarea name="deskripsi" id="event-description-editor" class="form-control" required ></textarea>
                                                            </div>
                                                            <div class="mb-1 d-flex">
                                                                <button type="submit" class="btn btn-primary add-event-btn me-1">Add</button>
                                                                <button type="button" class="btn btn-outline-secondary btn-cancel" data-bs-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-primary update-event-btn d-none me-1">Update</button>
                                                                <button class="btn btn-outline-danger btn-delete-event d-none">Delete</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        <!--/ Calendar Add/Update/Delete event modal-->
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                        <!--/ Medal Card -->
                        <!-- -->
                        <div class="col-xl-8 col-md-6 col-12">
                            <div class="content-body">
                                <!-- Basic table -->
                                <section id="basic-datatable">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <table class="datatables-basic table">
                                                    <thead>
                                                        <tr>
                                                            <th>Kegiatan</th>
                                                            <th>Waktu kegiatan</th>
                                                            <th></th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($agendas as  $agenda )
                                                        <tr>
                                                            <td class="text-nowrap">
                                                                <div class="d-flex flex-column">
                                                                    <span class="fw-bolder mb-25">{{$agenda->j_agenda}}</span>
                                                                </div>
                                                                <div class="font-small-2 text-muted"> Keperluan : {{$agenda->label}}</div>
                                                                <div class="font-small-2 text-muted"> Lokasi : {{$agenda->lokasi}}</div>
                                                                <div class="font-small-2 text-muted"> Deskrpsi : {{$agenda->deskripsi}}</div>
                                                            </td>
                                                            <td class="text-nowrap">
                                                                <div class="d-flex flex-column">
                                                                    <span class="fw-bolder mb-25"> Mulai : {{$agenda->start_date}}</span>
                                                                </div>
                                                                <div class="font-small-2 text-muted"> Berakhir  : {{$agenda->end_date}}</div>
                                                            </td>
                                                            <td class="btn-group">
                                                                    <button
                                                                      type="button"
                                                                      class="btn btn-primary btn-sm dropdown-toggle dropdown-toggle-split"
                                                                      data-bs-toggle="dropdown"
                                                                      aria-expanded="false"
                                                                    >
                                                                    </button>
                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                        <a class="dropdown-item" href="agenda/{{$agenda->id}}/edit">Update</a>
                                                                        <form action="/agenda/{{$agenda->id }}" method="post" class="d-inline" >
                                                                            @method('delete')
                                                                            @csrf
                                                                            <button class="dropdown-item btn-flat-danger"><span>Hapus</span></button>
                                                                        </form>
                                                                        <div class="dropdown-divider"></div>
                                                                        <a class="dropdown-item" href="/agenda/{{$agenda->id}}">Buat ToDo</a>
                                                                      </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
