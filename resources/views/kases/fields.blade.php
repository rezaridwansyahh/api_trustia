<!-- Tanggal Case Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_case', 'Tanggal Case:') !!}
    {!! Form::date('tanggal_case', null, ['class' => 'form-control']) !!}
</div>

<!-- No Polisi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_polisi', 'No Polisi:') !!}
    {!! Form::text('no_polisi', null, ['class' => 'form-control']) !!}
</div>

<!-- No Mesin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_mesin', 'No Mesin:') !!}
    {!! Form::text('no_mesin', null, ['class' => 'form-control']) !!}
</div>

<!-- No Rangka Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_rangka', 'No Rangka:') !!}
    {!! Form::text('no_rangka', null, ['class' => 'form-control']) !!}
</div>

<!-- Merek Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('merek_id', 'Merek Id:') !!}
    {!! Form::text('merek_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Tahun Anggaran Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tahun_anggaran', 'Tahun Anggaran:') !!}
    {!! Form::text('tahun_anggaran', null, ['class' => 'form-control']) !!}
</div>

<!-- Warna Field -->
<div class="form-group col-sm-6">
    {!! Form::label('warna', 'Warna:') !!}
    {!! Form::text('warna', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('kases.index') !!}" class="btn btn-default">Cancel</a>
</div>
