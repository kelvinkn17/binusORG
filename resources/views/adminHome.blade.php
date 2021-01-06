@extends('layouts.app')

@section('content')

<section id="home" class="">
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger mt-2 ml-3 mr-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</section>

<section id="jadwal">
    <div class="container">
        <div class="row align-items-center">
            <h2>Jadwal {{ $organization->name }}</h2>
            <div class="spacer"></div>
            <table class="table" style="margin: 0 8px">
                <thead>
                    <tr>
                        <th scope="col">Organisasi</th>
                        <th scope="col">Aktivitas</th>
                        <th scope="col">Tempat</th>
                        <th scope="col">Waktu</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($activity as $item)
                    <tr>
                        <th scope="row">{{ $organization->name }}</th>
                        <td>{{ $item->activity }}</td>
                        <td>{{ $item->location }}</td>
                        <td>{{ $item->timeAndDate }}</td>
                        <td class="actions" data-th="">
                            <form id="deleteItem" action="{{ route('delete.activity', $item->id) }}" method="post">
                                @csrf
                                <button class="btn btn-danger btn-sm remove-from-cart" data-id=""
                                    onclick="return confirm('Yakin mau hapus aktivitas ini?')"><i class="fa fa-trash-o"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <h4 class="mt-5">Tambah Aktivitas</h4>
            <form  method="post" action="{{ route('add.activity') }}" class="mt-3 form-inline"  enctype="multipart/form-data" >
                @csrf
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="activity">Aktivitas</label>
                        <input type="text" class="form-control" id="activity" name="activity" placeholder="Melakukan apa?" value="{{ old('activity') }}" required>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="location">Tempat</label>
                        <input type="text" class="form-control" id="location"  name="location"  placeholder="Dimana?" value="{{ old('location') }}" required>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="timeAndDate">Waktu</label>
                        <input type="text" class="form-control" id="timeAndDate" name="timeAndDate" placeholder="Tanggal, Jam" value="{{ old('timeAndDate') }}" required>
                    </div>

                    <div class="col-md-3 mb-3 mt-auto">
                        <button class="btn btn-primary" type="submit">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<br><br>

<section id="acara">
    <div class="container">
        <div class="row align-items-top">
            <h2>Event {{ $organization->name }}</h2>

            <h4 class="mt-5">Tambah Event</h4>
            
            <form  method="post" action="{{ route('add.event') }}" class="mt-3 form-inline"  enctype="multipart/form-data" >
                @csrf
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="event">Nama</label>
                        <input type="text" class="form-control" id="event" name="event" placeholder="Nama Event" value="{{ old('event') }}" required>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="event-location">Tempat</label>
                        <input type="text" class="form-control" id="event_location"  name="event_location"  placeholder="Lokasi Event" value="{{ old('event_location') }}" required>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="event-time">Waktu</label>
                        <input type="text" class="form-control" id="event_time" name="event_time" placeholder="Waktu Event" value="{{ old('event_time') }}" required>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="event-image">Thumbnail</label>
                        <input type="file" class="form-control" id="event_image" name="event_image" placeholder="Waktu Event" value="{{ old('event_image') }}" required>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="event-file">File Detail Event</label>
                        <input type="file" class="form-control" id="event_file" name="event_file" placeholder="File Detail Event" value="{{ old('event_file') }}" required>
                    </div>

                    <div class="col-md-3 mb-3 mt-auto">
                        <button class="btn btn-primary" type="submit">Tambah</button>
                    </div>
                </div>
            </form>

            @foreach ($event as $item)
            <div class="card eventCard">
                <span class="m-auto mt-3">{{ $item->organization_name }}</span>
                <div class="eventImage">
                    <a href="/images/events/{{ $item->event_file }}" target="_blank">
                        <img src="/images/events/{{ $item->thumbnail }}" class="img img-responsive full-width" alt="...">
                    </a>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $item->name }}</h5>
                    <p class="card-text">{{ $item->location }}, <br>{{ $item->time }}</p>
                    <br>
                    <form id="deleteItem" action="{{ route('delete.event', $item->id) }}" method="post">
                        @csrf
                        <button class="btn btn-danger " data-id="" onclick="return confirm('Yakin mau hapus event ini?')"> Hapus Event </button>
                    </form>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

@endsection
