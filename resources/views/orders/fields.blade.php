<!-- Order Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('order_id', 'Order Id:') !!}
    {!! Form::text('order_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Voucher Field -->
<div class="form-group col-sm-6">
    {!! Form::label('voucher', 'Voucher:') !!}
    {!! Form::text('voucher', null, ['class' => 'form-control']) !!}
</div>

<!-- Couriername Field -->
<div class="form-group col-sm-6">
    {!! Form::label('couriername', 'Couriername:') !!}
    {!! Form::text('couriername', null, ['class' => 'form-control']) !!}
</div>

<!-- Firstname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('firstname', 'Firstname:') !!}
    {!! Form::text('firstname', null, ['class' => 'form-control']) !!}
</div>

<!-- Lastname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lastname', 'Lastname:') !!}
    {!! Form::text('lastname', null, ['class' => 'form-control']) !!}
</div>

<!-- Streetaddress Field -->
<div class="form-group col-sm-6">
    {!! Form::label('streetaddress', 'Streetaddress:') !!}
    {!! Form::text('streetaddress', null, ['class' => 'form-control']) !!}
</div>

<!-- Zipcode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('zipcode', 'Zipcode:') !!}
    {!! Form::text('zipcode', null, ['class' => 'form-control']) !!}
</div>

<!-- City Field -->
<div class="form-group col-sm-6">
    {!! Form::label('city', 'City:') !!}
    {!! Form::text('city', null, ['class' => 'form-control']) !!}
</div>

<!-- Phonenumber Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phonenumber', 'Phonenumber:') !!}
    {!! Form::text('phonenumber', null, ['class' => 'form-control']) !!}
</div>

<!-- Datecreated Field -->
<div class="form-group col-sm-6">
    {!! Form::label('datecreated', 'Datecreated:') !!}
    {!! Form::text('datecreated', null, ['class' => 'form-control']) !!}
</div>

<!-- Orderprice Field -->
<div class="form-group col-sm-6">
    {!! Form::label('orderprice', 'Orderprice:') !!}
    {!! Form::text('orderprice', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Synced Field -->
<div class="form-group col-sm-6">
    {!! Form::label('synced', 'Synced:') !!}
    {!! Form::text('synced', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('orders.index') }}" class="btn btn-default">Cancel</a>
</div>
