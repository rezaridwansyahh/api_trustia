<!-- Foto Ktp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('foto_ktp', 'Foto Ktp:') !!}
    {!! Form::text('foto_ktp', null, ['class' => 'form-control']) !!}
</div>

<!-- Foto Stnk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('foto_stnk', 'Foto Stnk:') !!}
    {!! Form::text('foto_stnk', null, ['class' => 'form-control']) !!}
</div>

<!-- Foto Mobil Field -->
<div class="form-group col-sm-6">
    {!! Form::label('foto_mobil', 'Foto Mobil:') !!}
    {!! Form::text('foto_mobil', null, ['class' => 'form-control']) !!}
</div>

<!-- Sisi1 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sisi1', 'Sisi1:') !!}
    {!! Form::text('sisi1', null, ['class' => 'form-control']) !!}
</div>

<!-- Sisi2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sisi2', 'Sisi2:') !!}
    {!! Form::text('sisi2', null, ['class' => 'form-control']) !!}
</div>

<!-- Sisi3 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sisi3', 'Sisi3:') !!}
    {!! Form::text('sisi3', null, ['class' => 'form-control']) !!}
</div>

<!-- Sisi4 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sisi4', 'Sisi4:') !!}
    {!! Form::text('sisi4', null, ['class' => 'form-control']) !!}
</div>

<!-- Foto Dashboard Field -->
<div class="form-group col-sm-6">
    {!! Form::label('foto_dashboard', 'Foto Dashboard:') !!}
    {!! Form::text('foto_dashboard', null, ['class' => 'form-control']) !!}
</div>

<!-- Foto Sim Field -->
<div class="form-group col-sm-6">
    {!! Form::label('foto_sim', 'Foto Sim:') !!}
    {!! Form::text('foto_sim', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('caseDetails.index') !!}" class="btn btn-default">Cancel</a>
</div>
