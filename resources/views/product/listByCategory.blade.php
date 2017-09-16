@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Product List of Category {{ $category->name }}</h2>
            </div>
        </div>
    </div>

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
            <a class="btn btn-primary" href="{{ route('product.show',$product->id) }}">Show</a>
        </td>
    </tr>
    @endforeach
    </table>

    {!! $products->links() !!}

    <br><a class="btn btn-info" href="{{ route('category.list') }}">Back to Category List</a>
@endsection