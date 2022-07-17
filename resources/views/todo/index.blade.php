@extends('layouts.main')

@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content todo-application">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-area-wrapper container-xxl p-0">
            <div class="sidebar-left">
                <div class="sidebar">
                    <div class="sidebar-content todo-sidebar">
                        <div class="todo-app-menu">
                            <div class="add-task">
                                <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#new-task-modal">
                                Tambahkan Tugas
                                </button>
                            </div>
                            <div class="mt-auto">
                                <img
                                    src="../../../app-assets/images/pages/calendar-illustration.png"
                                    alt="Calendar illustration"
                                    class="img-fluid"
                                />
                            </div>
                            <div class="card-header">
                                <button type="button" class="btn btn-primary w-100">
                                    Tugas Hari ini
                                    </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <!-- Right Sidebar starts -->
             <div class="modal modal-slide-in sidebar-todo-modal fade" id="new-task-modal">
                <div class="modal-dialog sidebar-sm">
                    <div class="modal-content p-0">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="modal-header mb-1">
                            <h5 class="modal-title">Menambahkan Tugas</h5>
                        </div>
                        <div class="modal-body flex-grow-1 pb-sm-0 pb-3">
                            <form class="event-form needs-validation" method="POST" action="/todo">
                                @csrf
                                <div class="mb-1">
                                    <label for="title" class="form-label">Judul tugas</label>
                                    <input type="text" class="form-control" id="title" name="judul_tugas" placeholder="Isikan judul agenda" required />
                                    <input type="hidden" class="form-control" id="title" name="user_id" value="{{Auth::user()->id}}" placeholder="Isikan judul agenda" required />
                                </div>
                                <div class="mb-1">
                                    <label for="task-due-date" class="form-label">Tenggat waktu</label>
                                    <input type="text" class="form-control task-due-date" id="task-due-date" name="tenggat_waktu" required/>
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
            </div>
            <div class="content-right">
                <div class="content-wrapper container-xxl p-0">
                    <div class="content-header row">
                </div>
                <div class="content-body">
                    <div class="body-content-overlay"></div>
                    <div class="todo-app-list">
                        <!-- Todo search starts -->


                                <!-- Todo List starts -->
                                    <div class="todo-task-list-wrapper list-group">
                                        <ul class="todo-task-list media-list" id="todo-task-list">
                                            @foreach ( $todos as $todo )
                                            <li class="todo-item">
                                                <div class="todo-title-wrapper">
                                                    <div class="todo-title-area">
                                                        <div class="title-wrapper">
                                                            <span class="todo-title">{{$todo->judul_tugas}}
                                                            <br>
                                                            <small class="text-nowrap text-muted me-1">Deskripsi : {{$todo->deskripsi}}</small>
                                                            <br>
                                                            <small class="text-nowrap text-muted me-1">Tenggat waktu : {{$todo->tenggat_waktu}}</small>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="todo-title-area">
                                                        <div class="title-wrapper">
                                                            <div class="demo-inline-spacing">
                                                                <form method="POST" action="/todo/{{ $todo->id }}">
                                                                    @method('put')
                                                                    @csrf
                                                                    @if ($todo->keterangan_agenda==NULL)


                                                                                <input type="hidden" name="keterangan_agenda" value="Telah diselesaikan">
                                                                                <button type="submit" class="btn btn-gradient-danger">Selesaikan tugas</button>
                                                                            </form>

                                                                    @elseif ($todo->keterangan_agenda=="Telah diselesaikan")


                                                                                <input type="hidden" name="keterangan_agenda" value="Telah diselesaikan">
                                                                                <button type="" class="btn btn-gradient-success">Selesaikan tugas</button>
                                                                                <br>
                                                                                <small class="text-nowrap text-muted me-1">Status : {{$todo->keterangan_agenda}}</small>
                                                                    @else
                                                                    @endif
                                                                </form>
                                                              </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <div class="no-results">
                                            <h5>Tidak ada yang ditemukan</h5>
                                        </div>
                                    </div>
                                <!-- Todo List ends -->
                                </div>
                            <!-- Right Sidebar starts -->
                                <div class="modal modal-slide-in sidebar-todo-modal fade" id="new-task-modal">
                                        <div class="modal-dialog sidebar-lg">
                                            <div class="modal-content p-0">
                                                <form id="form-modal-todo" method="POST" action="/todo">
                                                    @csrf

                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        <div class="modal-header mb-1">
                                                            <h5 class="modal-title">Menambahkan Tugas</h5>
                                                        </div>
                                                    <div class="modal-body flex-grow-1 pb-sm-0 pb-3">
                                                        <div class="action-tags">
                                                            <div class="mb-1">
                                                                <label for="todoTitleAdd" class="form-label">Judul tugas</label>
                                                                <input
                                                                type="text"
                                                                id="todoTitleAdd"
                                                                name="judul_tugas"
                                                                class="new-todo-item-title form-control"
                                                                placeholder="Title"
                                                                />
                                                            </div>
                                                            <div class="mb-1">
                                                                <label for="task-due-date" class="form-label">Tenggat waktu</label>
                                                                <input type="text" class="form-control task-due-date" id="task-due-date" name="tenggat_waktu" />
                                                            </div>
                                                            <div class="mb-1">
                                                                <label class="form-label">Deskripsi</label>
                                                                <div id="task-desc" class="border-bottom-0" data-placeholder="Tuliskan deskripsi"></div>
                                                                <textarea name="deskripsi" id="event-description-editor" class="form-control" required ></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="my-1">
                                                            <button type="submit" class="btn btn-primary d-none add-todo-item me-1">Add</button>
                                                            <button type="button" class="btn btn-outline-secondary add-todo-item d-none" data-bs-dismiss="modal">Cancel</button>
                                                            <button type="button" class="btn btn-primary d-none update-btn update-todo-item me-1">Update</button>
                                                            <button type="button" class="btn btn-outline-danger update-btn d-none" data-bs-dismiss="modal">Delete</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                            <!-- Right Sidebar ends -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- END: Content-->

@endsection
