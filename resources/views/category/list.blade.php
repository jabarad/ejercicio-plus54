@extends('layouts.app')

@section('content')
    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
    @foreach ($categories as $category)
    <tr>
        <td>{{ $category->id }}</td>
        <td>{{ $category->name }}</td>
        <td>
            <a class="btn btn-primary" href="{{ route('product.listByCategory',$category->id) }}">List products</a>
        </td>
    </tr>
    @endforeach
    </table>

    {!! $categories->links() !!}
@endsection