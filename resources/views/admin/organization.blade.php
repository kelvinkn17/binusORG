@extends('layouts.app')

@section('content')

<section id="home" class="">

</section>

<section id="organization">
    <div class="container">
        <div class="row align-items-center">
            <h2>Daftar Organisasi</h2>
            <div class="spacer"></div>
            
            @foreach ($data as $item)
            <div class="card organizationCard d-flex flex-row">
                <div class="organizationImage">
                    <img src="/images/organizations/{{ $item->photo }}" class="img img-responsive full-width" alt="...">
                </div>
                <div class="card-body">
                    <h3>{{ $item->name }}</h3>
                    <p class="card-text organization-desc">{{ $item->description }}</p>
                    <br>
                    <div class="d-grid gap-2 d-md-block">
                        <a class="btn btn-warning disabled" href="">Daftar</a>
                        <a class="btn btn-outline-primary" href="">Detail</a>
                      </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<br><br>

@endsection
