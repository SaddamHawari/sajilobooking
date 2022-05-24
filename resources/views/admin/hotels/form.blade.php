<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($hotel->name) ? $hotel->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    <label for="address" class="control-label">{{ 'Address' }}</label>
    <textarea class="form-control" rows="5" name="address" type="textarea" id="address" >{{ isset($hotel->address) ? $hotel->address : ''}}</textarea>
    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Description' }}</label>
    <textarea class="form-control" rows="5" name="description" type="textarea" id="description" >{{ isset($hotel->description) ? $hotel->description : ''}}</textarea>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Image' }}</label>
    <input class="form-control"  name="image" type="file" id="image" >
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>



<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="control-label">{{ 'Price' }}</label>
    <textarea class="form-control" rows="5" name="price" type="textarea" id="price" >{{ isset($hotel->price) ? $hotel->price : ''}}</textarea>
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    <label for="type" class="control-label">{{ 'Type' }}</label>
    <select name="type" class="form-control" id="type" >
    @foreach (json_decode('{"star": "Featured", "tips": "Bestseller", "health": "Popular"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($hotel->type) && $hotel->type == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
