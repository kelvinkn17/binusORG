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

        <div class="row align-items-center">
            <h2>Organisasiku</h2>
            <div class="spacer">   
                <div class="row ">
                    @foreach ($organization as $item)
                    <div class="col-md-2">
                        <h4>{{$item->name}}</h4>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <br>
</section>

<section id="jadwal">
    <div class="container">
        <div class="row align-items-center">
            <h2>Jadwalku</h2>
            <div class="spacer"></div>
            <table class="table" style="margin: 0 8px">
                <thead>
                    <tr>
                        <th scope="col">Organisasi</th>
                        <th scope="col">Aktivitas</th>
                        <th scope="col">Tempat</th>
                        <th scope="col">Waktu</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($activity as $item)
                    <tr>
                        <th scope="row">{{ $item->organization_name }}</th>
                        <td>{{ $item->activity }}</td>
                        <td>{{ $item->location }}</td>
                        <td>{{ $item->timeAndDate }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

<br><br>

<section id="acara">
    <div class="container">
        <div class="row align-items-top">
            <h2>Kumpulan Event</h2>
            <div class="spacer"></div>
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
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

@endsection
