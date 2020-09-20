@extends('layouts.app')

@section('content')
{{-- <div class="container"> --}}
    <main>
        <privatechat-component :user="{{ auth()->user() }}"></privatechat-component>
    </main>


{{-- </div> --}}
@endsection
