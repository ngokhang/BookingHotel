@extends('layout.app')

@section('title', 'Account settings')

@section('content')
    <section class="container profile-content my-5">
        <div class="col-12 title mb-3 pt-2">
            <h1 href="#" class="fs-3">Manage account</h1>
        </div>
        <div class="row gutters">
            <div class="wrapper row">
                @include('components.account.profile-sidebar-menu')
                @include('components.account.form-profile-update')
            </div>
        </div>
    </section>
@endsection
