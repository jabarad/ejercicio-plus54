@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">User Section</div>

                <div class="panel-body">
                    <a class="btn btn-info" href="{{ route('category.list') }}">Category List</a>
                    <a class="btn btn-info" href="{{ route('product.list') }}">Product List</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
