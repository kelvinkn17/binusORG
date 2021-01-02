@extends('layouts.app')

@section('content')

<section id="home" class="">
    <div class="container">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <h3>HELLO ADMIN!</h3><br>
    </div>
</section>

<section id="jadwal">
    <div class="container">
        <div class="row align-items-center">
            <h2>Jadwal Nama_Organisasi</h2>
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
                    <tr>
                        <th scope="row">STMANIS</th>
                        <td>Rapat Divisi Artisik</td>
                        <td>K3C Syahdan Auditorium Kemanggisan, Jakarta</td>
                        <td>15:00, 05-Jan-2021</td>
                    </tr>
                    <tr>
                        <th scope="row">STMANIS</th>
                        <td>Rapat Divisi Artisik</td>
                        <td>K3C Syahdan Auditorium Kemanggisan, Jakarta</td>
                        <td>15:00, 05-Jan-2021</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<br><br>

<section id="acara">
    <div class="container">
        <div class="row align-items-top">
            <h2>Event Nama_Organisasi</h2>
            <div class="spacer"></div>
            <div class="card eventCard">
                <span class="m-auto mt-3">STMANIS</span>
                <div class="eventImage">
                    <img src="/images/duniamisty.jpg" class="img img-responsive full-width" alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Samanter: Dunia Misty</h5>
                    <p class="card-text">Gedung Kesenian Jakarta, <br> 22-Nov-2021</p>
                    <br>
                </div>
            </div>
            <div class="card eventCard">
                <span class="m-auto mt-3">BNCC</span>
                <div class="eventImage">
                    <img src="/images/bncc.jpg" class="img img-responsive full-width" alt="...">
                </div>

                <div class="card-body">
                    <h5 class="card-title">Acara Seminar Apa Kek Boleh hhhh</h5>
                    <p class="card-text">Auditorium Binus, <br> 10-Nov-2021</p>
                    <br>
                </div>
            </div>

            <div class="card eventCard">
                <span class="m-auto mt-3">BNCC</span>
                <div class="eventImage">
                    <img src="/images/bncc.jpg" class="img img-responsive full-width" alt="...">
                </div>

                <div class="card-body">
                    <h5 class="card-title">Acara Seminar Apa Kek Boleh hhhh</h5>
                    <p class="card-text">Auditorium Binus, <br> 10-Nov-2021</p>
                    <br>
                </div>
            </div>

            
        </div>
    </div>
</section>


@endsection
