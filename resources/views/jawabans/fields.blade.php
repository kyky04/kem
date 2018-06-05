<!-- Id Soal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_soal', 'Id Soal:') !!}
    {!! Form::text('id_soal', null, ['class' => 'form-control']) !!}
</div>

<!-- Jawaban Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jawaban', 'Jawaban:') !!}
    {!! Form::text('jawaban', null, ['class' => 'form-control']) !!}
</div>

<!-- Benar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('benar', 'Benar:') !!}
    {!! Form::text('benar', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('jawabans.index') !!}" class="btn btn-default">Cancel</a>
</div>
