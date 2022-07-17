@extends('layouts.main')

@section('content')

<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
        <div class="content-body"><!-- Basic Horizontal form layout section start -->
            <div class="mflex-grow-1 pb-sm-0 pb-3">
                <form class="event-form needs-validation" method="POST" action="/agenda/{{$agenda->id}}">
                    @method('put')
                    @csrf
                    <div class="mb-1">
                        <label for="title" class="form-label">Judul agenda</label>
                        <input type="text" class="form-control" id="title" name="j_agenda" placeholder="Isikan judul agenda" value="{{$agenda->j_agenda}}" required />
                    </div>
                    <div class="mb-1 position-relative">
                        <label for="start-date" class="form-label">Start Date</label>
                        <input type="text" class="form-control" id="start-date" name="start_date" placeholder="Masukan waaktu mulai agenda" value="{{$agenda->start_date}}"  required />
                    </div>
                    <div class="mb-1 position-relative">
                        <label for="end-date" class="form-label">End Date</label>
                        <input type="text" class="form-control" id="end-date" name="end_date" placeholder="Masukan waaktu berakhir agenda" value="{{$agenda->end_date}}" required />
                    </div>
                    <div class="mb-1">
                        <label for="select-label" class="form-label">Keperluan</label>
                        <select class="select2 select-label form-select w-100" id="select-label" name="label" value="{{$agenda->lebel}}" required >
                            <option data-label="primary" value="Dinas" selected>Dinas</option>
                            <option data-label="danger" value="Non-dinas">Non-dinas</option>
                            <option data-label="warning" value="Keluarga">Keluarga</option>
                        </select>
                    </div>
                    <div class="mb-1">
                        <label for="event-location" class="form-label">Lokasi agenda</label>
                        <input type="text" class="form-control" id="event-location" name="lokasi" placeholder="Masukan lokasi agenda" value="{{$agenda->lokasi}}" required />
                        <input type="hidden" class="form-control" id="event-location" name="user_id" value="{{Auth::user()->id}}" placeholder="Masukan lokasi agendan"/>
                    </div>
                    <div class="mb-1">
                        <label class="form-label">Deskripsi agenda</label>
                        <textarea name="deskripsi" id="event-description-editor" class="form-control" value="{{$agenda->deskripsi}}" required ></textarea>
                    </div>
                    <div class="mb-1 d-flex">
                        <button type="submit" class="btn btn-primary add-event-btn me-1">update</button>
                        <button type="button" class="btn btn-outline-secondary btn-cancel" href="/agenda">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<div>
  <!-- END: Content-->

@endsection
