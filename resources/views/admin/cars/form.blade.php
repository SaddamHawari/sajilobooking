<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($car->name) ? $car->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('brand') ? 'has-error' : ''}}">
    <label for="brand" class="control-label">{{ 'Brand' }}</label>
    <textarea class="form-control" rows="5" name="brand" type="textarea" id="brand" >{{ isset($car->brand) ? $car->brand : ''}}</textarea>
    {!! $errors->first('brand', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Description' }}</label>
    <textarea class="form-control" rows="5" name="description" type="textarea" id="description" >{{ isset($car->description) ? $car->description : ''}}</textarea>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="control-label">{{ 'Price' }}</label>
    <textarea class="form-control" rows="5" name="price" type="textarea" id="price" >{{ isset($car->price) ? $car->price : ''}}</textarea>
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    <label for="type" class="control-label">{{ 'Type' }}</label>
    <select name="type" class="form-control" id="type" >
    @foreach (json_decode('{"Bestseller": "Bestseller", "Popular": "Popular", "Trending": "Trending"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($car->type) && $car->type == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
