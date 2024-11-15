{{-- @extends('layouts.app') --}}
{{-- @extends('layouts.app')
@section('content')
<div class="d-flex justify-content-center align-items-center vh-100 " style="background-color: rgb(236, 231, 247)">
    <div class="text-center">
        <h1 class="text-primary" style="font-size: 110px; font-family: 'Arial', sans-serif;">Welcome page</h1>
        <p class="fs-2 mt-3" style="font-family: 'Verdana', sans-serif; font-size: 1.5rem;">I am Enas Melad</p>
    </div>
</div>
@endsection --}}
@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-center align-items-center vh-100" style="background-color: rgb(236, 231, 247)">
    <div class="text-center fade-in">
        <h1 class="text-primary" style="font-size: 110px; font-family: 'Arial', sans-serif;">Welcome page</h1>
        <p class="fs-2 mt-3" style="font-family: 'Verdana', sans-serif; font-size: 1.5rem;">I am Enas Melad</p>
    </div>
</div>

<style>
    /* Animation for fade-in effect */
    @keyframes fadeIn {
        0% {
            opacity: 0;
            transform: translateY(30px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .fade-in {
        animation: fadeIn 2s ease-in-out;
    }
</style>
@endsection
