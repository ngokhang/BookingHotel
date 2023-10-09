@extends('layout.app')

@section('content')
    <section id="reset-password">
        <x-alert-errors />
        <form action="{{ route('forgot.store') }}" method="POST" id="form-reset-password" class="shadow">
            @csrf
            <h3 class="form-title text-center">Forgot password?</h3>
            <x-alert-errors />
            <div class="form-text">
                <span class="fs-5">Enter the mail address associated with your account and we'll send you a code to
                    reset your password</span>
            </div>
            <div class="input-group d-flex flex-column mb-3 col-12 gap-2">
                <label for="email" class="d-block">Your email</label>
                <input type="email" class="form-control w-100" name="email" id="email" placeholder="Your email">
            </div>
            <button class="btn btn-primary">Send code</button>
            <div class="redirect-to-signup mt-3">
                <p>Don't have an account? <a href="#">Sign up</a></p>
            </div>
        </form>
    </section>
@endsection
