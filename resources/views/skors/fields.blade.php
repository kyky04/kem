<!-- Id Siswa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_siswa', 'Id Siswa:') !!}
    {!! Form::text('id_siswa', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Soal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_soal', 'Id Soal:') !!}
    {!! Form::text('id_soal', null, ['class' => 'form-control']) !!}
</div>

<!-- Skor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('skor', 'Skor:') !!}
    {!! Form::text('skor', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('skors.index') !!}" class="btn btn-default">Cancel</a>
</div>
