@extends('layouts.app')

@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                {!! Form::open(array('route' => 'product.list','method'=>'POST')) !!}
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                                <strong>Min Price:</strong>
                                {!! Form::number('min_price', null, ['placeholder' => 'Min Price','class' => 'form-control','step'=>'any']) !!}
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                                <strong>Max Price:</strong>
                                {!! Form::number('max_price', null, ['placeholder' => 'Max Price','class' => 'form-control','step'=>'any']) !!}
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <br>
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <br>

    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Price</th>
            <th width="280px">Action</th>
        </tr>
    @foreach ($products as $product)
    <tr>
        <td>{{ $product->id }}</td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->price }}</td>
        <td>
            <a class="btn btn-primary" href="{{ route('product.show',$product->id) }}">Show</a>
        </td>
    </tr>
    @endforeach
    </table>

    {!! $products->links() !!}
@endsection