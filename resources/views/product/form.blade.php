<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
            <strong>Category:</strong>
            {!! Form::select('category_id', $categories, null, array('placeholder' => 'Please select a Category','class' => 'form-control')) !!}
            <strong>Description:</strong>
            {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control')) !!}
            <strong>Price:</strong>
            {!! Form::number('price', null, ['placeholder' => 'Price','class' => 'form-control','step'=>'any']) !!}
            <strong>Photo:</strong>
            @isset($product->photo)
                <img src="{{ asset('uploads/product/' . $product->photo) }}" />
            @endisset
            {!! Form::file('photo', null, ['placeholder' => 'Photo','class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>