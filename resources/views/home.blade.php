@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a class="btn btn-info" href="{{ route('admin.category.index') }}">Categories</a>
                    <a class="btn btn-info" href="{{ route('admin.product.index') }}">Products</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
