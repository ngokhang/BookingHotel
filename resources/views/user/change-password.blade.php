@extends('layout.app')

@section('content')
    <section class="container profile-content my-5">
        <div class="col-12 title mb-3 border-bottom pt-2 pb-4">
            <h1 href="#" class="fs-3">Manage account</h1>
        </div>
        <div class="wrapper row">
            @include('components.account.profile-sidebar-menu')
            @include('components.account.form-change-password')
        </div>
    </section>
@endsection
