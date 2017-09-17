@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Product List</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('admin.product.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
    @foreach ($products as $product)
    <tr>
        <td>{{ $product->id }}</td>
        <td>{{ $product->name }}</td>
        <td>
            <a class="btn btn-primary" href="{{ route('admin.product.edit',$product->id) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['admin.product.destroy', $product->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>    </tr>
    @endforeach
    </table>

    {!! $products->links() !!}

    <br><a class="btn btn-info" href="{{ route('home') }}">Back to Dashboard</a>
@endsection