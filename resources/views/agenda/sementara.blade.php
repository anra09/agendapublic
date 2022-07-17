    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
            <div class="content-wrapper container-xxl p-0">
                <div class="content-header row"></div>
                <div class="content-body"><!-- Full calendar start -->
                    <section>
                        <div class="app-calendar overflow-hidden border">
                            <div class="row g-0">
                                <!-- Sidebar -->
                                <div class="col app-calendar-sidebar flex-grow-0 overflow-hidden d-flex flex-column" id="app-calendar-sidebar">
                                    <div class="sidebar-wrapper">
                                        <div class="card-body d-flex justify-content-center">
                                            <button
                                                class="btn btn-primary btn-toggle-sidebar w-100"
                                                data-bs-toggle="modal"
                                                data-bs-target="#add-new-sidebar"
                                            >
                                                <span class="align-middle">Tambahkan agenda</span>
                                            </button>
                                        </div>
                                        <div class="card-body pb-0">
                                            <h5 class="section-label mb-1">
                                                <span class="align-middle">Filter kegiatan</span>
                                            </h5>
                                            <div class="form-check-success mb-1">
                                                <input type="checkbox" class="form-check-input select-all" id="select-all" checked />
                                                <label class="form-check-label" for="select-all">Lihat semua kegiatan</label>
                                            </div>
                                            <div class="calendar-events-filter">
                                                <div class="form-check form-check-primary mb-1">
                                                    <input
                                                        type="checkbox"
                                                        class="form-check-input input-filter"
                                                        id="business"
                                                        data-value="business"
                                                        checked
                                                    />
                                                    <label class="form-check-label" for="business">Dinas</label>
                                                </div>
                                                <div class="form-check form-check-danger mb-1">
                                                    <input
                                                        type="checkbox"
                                                        class="form-check-input input-filter"
                                                        id="personal"
                                                        data-value="personal"
                                                        checked
                                                    />
                                                    <label class="form-check-label" for="personal">Non-dinas</label>
                                                </div>
                                                <div class="form-check form-check-warning mb-1">
                                                    <input type="checkbox" class="form-check-input input-filter" id="family" data-value="family" checked />
                                                    <label class="form-check-label" for="family">Keluarga</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-auto">
                                        <img
                                            src="../../../app-assets/images/pages/calendar-illustration.png"
                                            alt="Calendar illustration"
                                            class="img-fluid"
                                        />
                                    </div>
                                </div>

                                <!-- /Sidebar -->

                                <div class="col position-relative">
                                </div>

                                <div class="body-content-overlay"></div>
                            </div>
                        </div>

                        <!-- Calendar Add/Update/Delete event modal-->
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
                                            <div class="mb-1">
                                                <label for="select-label" class="form-label">Label</label>
                                                <select class="select2 select-label form-select w-100" id="select-label" name="label" required >
                                                    <option data-label="primary" value="Business" selected>Dinas</option>
                                                    <option data-label="danger" value="Personal">Non-dinas</option>
                                                    <option data-label="warning" value="Family">Keluarga</option>
                                                </select>
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
                        </div>

                        <!--/ Calendar Add/Update/Delete event modal-->
                    </section>
                    <div class="app-content content ">
                        <div class="content-overlay"></div>
                        <div class="header-navbar-shadow"></div>
                            <div class="content-wrapper container-xxl p-0">
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
                                                                <th>Deskripsi</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal to add new record -->
                                        <div class="modal modal-slide-in fade" id="modals-slide-in">
                                            <div class="modal-dialog sidebar-sm">
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
                                                            <div class="mb-1">
                                                                <label for="select-label" class="form-label">Label</label>
                                                                <select class="select2 select-label form-select w-100" id="select-label" name="label" required >
                                                                    <option data-label="primary" value="Business" selected>Dinas</option>
                                                                    <option data-label="danger" value="Personal">Non-dinas</option>
                                                                    <option data-label="warning" value="Family">Keluarga</option>
                                                                </select>
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
                                        </div>
                                    </section>
                                </div>
                            </div>
                    </div>


</div>
</div>
</div>
  <!--/ Basic table -->
    <!-- END: Content-->
