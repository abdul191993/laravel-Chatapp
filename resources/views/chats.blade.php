@extends('layouts.app')

@section('content')
{{-- <div class="container"> --}}
    <main>
        <groupchats-component :user="{{ auth()->user() }}"></groupchats-component>
    </main>


{{-- </div> --}}
@endsection
