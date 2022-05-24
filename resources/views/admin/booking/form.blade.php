<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($booking->name) ? $booking->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ 'Email' }}</label>
    <input class="form-control" name="email" type="text" id="email" value="{{ isset($booking->email) ? $booking->email : ''}}" >
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="text" id="user_id" value="{{ isset($booking->user_id) ? $booking->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('prod_id') ? 'has-error' : ''}}">
    <label for="prod_id" class="control-label">{{ 'Prod Id' }}</label>
    <input class="form-control" name="prod_id" type="text" id="prod_id" value="{{ isset($booking->prod_id) ? $booking->prod_id : ''}}" >
    {!! $errors->first('prod_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    <label for="type" class="control-label">{{ 'Type' }}</label>
    <input class="form-control" name="type" type="text" id="type" value="{{ isset($booking->type) ? $booking->type : ''}}" >
    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('from_date') ? 'has-error' : ''}}">
    <label for="from_date" class="control-label">{{ 'From Date' }}</label>
    <input class="form-control" name="from_date" type="text" id="from_date" value="{{ isset($booking->from_date) ? $booking->from_date : ''}}" >
    {!! $errors->first('from_date', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('to_date') ? 'has-error' : ''}}">
    <label for="to_date" class="control-label">{{ 'To Date' }}</label>
    <input class="form-control" name="to_date" type="text" id="to_date" value="{{ isset($booking->to_date) ? $booking->to_date : ''}}" >
    {!! $errors->first('to_date', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="control-label">{{ 'Price' }}</label>
    <input class="form-control" name="price" type="text" id="price" value="{{ isset($booking->price) ? $booking->price : ''}}" >
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('mobile') ? 'has-error' : ''}}">
    <label for="mobile" class="control-label">{{ 'Mobile' }}</label>
    <input class="form-control" name="mobile" type="text" id="mobile" value="{{ isset($booking->mobile) ? $booking->mobile : ''}}" >
    {!! $errors->first('mobile', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('approve') ? 'has-error' : ''}}">
    <label for="approve" class="control-label">{{ 'Approve' }}</label>
    <input class="form-control" name="approve" type="text" id="approve" value="{{ isset($booking->approve) ? $booking->approve : ''}}" >
    {!! $errors->first('approve', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('message') ? 'has-error' : ''}}">
    <label for="message" class="control-label">{{ 'Message' }}</label>
    <textarea class="form-control" rows="5" name="message" type="textarea" id="message" >{{ isset($booking->message) ? $booking->message : ''}}</textarea>
    {!! $errors->first('message', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
