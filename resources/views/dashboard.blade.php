@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Dashboard Admin</h3>
    </div>
    <div class="card-body">

        @if(auth()->check())
            <p>Welcome, {{ auth()->user()->name }}!</p>

            @if(auth()->user()->isadmin())
                <div class="alert alert-success">
                    <p>You have admin access.</p>
                </div>
            @endif

            @if(auth()->user()->issuperAdmin())
                <div class="alert alert-warning">
                    <p>You have super admin access.</p>
                </div>
            @endif

            @if(auth()->user()->isguest())
                <div class="alert alert-info">
                    <p>You are viewing this as a guest.</p>
                </div>
            @endif
        @else
            <p>Please log in to access this dashboard.</p>
        @endif
    </div>
@endsection
