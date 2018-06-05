<!-- Id Soal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_soal', 'Id Soal:') !!}
    {!! Form::text('id_soal', null, ['class' => 'form-control']) !!}
</div>

<!-- Pertanyaan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pertanyaan', 'Pertanyaan:') !!}
    {!! Form::text('pertanyaan', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pertanyaans.index') !!}" class="btn btn-default">Cancel</a>
</div>
