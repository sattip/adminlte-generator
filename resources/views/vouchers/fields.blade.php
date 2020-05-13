<!-- Voucher Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('voucher', 'Voucher:') !!}
    {!! Form::textarea('voucher', null, ['class' => 'form-control']) !!}
</div>

<!-- Courier Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('courier_name', 'Courier Name:') !!}
    <label class="radio-inline">
        {!! Form::radio('courier_name', "ELTA Courier", null) !!} ELTA Courier
    </label>

    <label class="radio-inline">
        {!! Form::radio('courier_name', " ACS Courier", null) !!}  ACS Courier
    </label>

</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('vouchers.index') }}" class="btn btn-default">Cancel</a>
</div>
