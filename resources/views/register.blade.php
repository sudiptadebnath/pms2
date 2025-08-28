@extends('layouts.app')

@section('content')
<div class="container d-flex align-items-center justify-content-center login-container h-100">
<div class="col-md-6 col-lg-4">
<x-card icon="person-plus" title="Sign up">
    <form id="register" onsubmit="return register_submt()" novalidate="novalidate">
    <div class="row gy-2">
        <x-text name="name" icon="person" title="Name" required=true />
        <x-text name="mail" icon="envelope" title="Mail" required=true />
        <x-text name="mob" icon="phone" title="Mobile" required=true />
        <x-password name="password" title="Password" required=true />
        <x-password name="password2" title="Repeat Password" required=true />
        <x-button type="submit" title="Sign up" icon="person-plus" />
        <div class="col-md-12">
            Already Have Account ? <a href="{{ url('/') }}">Log in</a>
        </div>
    </div></form>
</x-card>
</div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function ($) {
    $("#register").validate({
        rules: {
            uid: {
                required: true,
                minlength: 4,
                maxlength: 20,
                pattern: /^[a-zA-Z0-9._-]+$/
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 6
            },
            password2: {
                required: true,
                equalTo: "#password"
            }
        },
        messages: {
            uid: {
                required: "User ID is required",
                minlength: "User ID must be at least 4 characters",
                maxlength: "User ID cannot exceed 20 characters",
                pattern: "Only letters, numbers, dots, underscores, and hyphens are allowed"
            },
            email: {
                required: "Email is required",
                email: "Enter a valid email"
            },
            password: {
                required: "Password is required",
                minlength: "Password must be at least 6 characters"
            },
            password2: {
                required: "Please confirm your password",
                equalTo: "Passwords do not match"
            }
        }
    });
});

function register_submt() {
    if($("#register").valid()) {
        webserv("POST","{{ url('/register') }}", "register", 
        function ok(d) { goLnk("{{ url('/user/dashboard') }}"); });
    }
    return false;
}

</script>
@endsection