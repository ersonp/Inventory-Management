@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a class="nav-link" href="{{ route('add-bill') }}">Add Bill</a>
                    <a class="nav-link" href="{{ route('list-bill') }}">List Bill</a>
                    <a class="nav-link" href="{{ route('add-products') }}">Add Product</a>
                    <a class="nav-link" href="{{ route('list-products') }}">List Product</a>
                    <a class="nav-link" href="{{ route('info') }}">Info</a>
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
