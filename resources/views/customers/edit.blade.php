

@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height: 70vh;">
    <div class="col-md-6 p-4 shadow rounded-3" style="background-color: #ffffff; border: 1px solid #ddd;">
        <h2 class="text-center mb-4" style="font-family: 'Poppins', sans-serif; color: #5a5a5a;">Edit Customer</h2>

        <form action="{{ route('customers.update', $customer->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label" style="font-weight: bold; color: #333;">Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $customer->name }}" required style="border: 1px solid #ccc; padding: 10px; border-radius: 5px;">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label" style="font-weight: bold; color: #333;">E-mail</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $customer->email }}" required style="border: 1px solid #ccc; padding: 10px; border-radius: 5px;">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-3" style="background-color: #4e73df; border: none; font-weight: bold; padding: 10px 0;">Update</button>
        </form>
    </div>
</div>
@endsection
