@extends('layouts.app')

@section('content')
    @isset($product)
        <div class="row">
            @if (Auth::check())
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        @if (Auth::id() === $product->user->id)
                            <a class="btn btn-primary" href="{{ route('product.edit',$product->id) }}">Edit</a>
                        @else
                            <a class="btn btn-primary" href="#">Buy now</a>
                        @endif
                    </div>
                </div>
            @endif
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>User:</strong>
                    {{ $product->user->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {{ $product->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Category:</strong>
                    {{ $product->category->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    {{ $product->description }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Price:</strong>
                    {{ $product->price }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Photo:</strong>
                    @isset($product->photo)
                        <img src="{{ asset('uploads/product/' . $product->photo) }}" />
                    @else
                        No photo available
                    @endisset
                </div>
            </div>        
        </div>
    @else
        <div class="alert alert-danger">
            <strong>Selected product does not exist</strong>
        </div>
    @endisset
@endsection