@extends('layouts.app')

@section('title', 'Profile Update')

@section('content')
<div class="container">
    <section class="mt-5">
        <div class="row">
            <div class="col-md-4">
                <h5>
                    Profile Information
                </h5>
                <p class="m-0">
                    Update your account's profile information and email address.
                </p>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <livewire:profile.update-profile :userProfile="$userProfile"/>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <section class="mb-5">
        <div class="row">
            <div class="col-md-4">
                <h5>
                    Update Password
                </h5>
                <p class="m-0">
                    Ensure your account is using a long, random password to stay secure.
                </p>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <livewire:profile.update-password :userProfile="$userProfile"/>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
