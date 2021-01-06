@extends('layouts.app')

@section('content')

<section id="home" class="">

</section>

<section id="organization">
    <div class="container">
        <div class="row align-items-center">
            <h2>Pendaftaran {{ $data->name }}</h2>
            <p class="ml-1 mt-1"> {{ $data->description }}</p>

            @if ($errors->any())
                <div class="alert alert-danger mt-2 ml-3 mr-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('register.organization.submit', $data->id) }}" method="POST" class="mt-5 ml-1">
                @csrf
                <label for="description">Alasan mendaftar {{ $data->name  }}</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
                <button class="btn btn-primary mt-3" type="submit">Submit</button>
            </form>
        </div>
    </div>
</section>

<br><br>

@endsection
