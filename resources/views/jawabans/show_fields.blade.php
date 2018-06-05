<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $jawaban->id !!}</p>
</div>

<!-- Id Soal Field -->
<div class="form-group">
    {!! Form::label('id_soal', 'Id Soal:') !!}
    <p>{!! $jawaban->id_soal !!}</p>
</div>

<!-- Jawaban Field -->
<div class="form-group">
    {!! Form::label('jawaban', 'Jawaban:') !!}
    <p>{!! $jawaban->jawaban !!}</p>
</div>

<!-- Benar Field -->
<div class="form-group">
    {!! Form::label('benar', 'Benar:') !!}
    <p>{!! $jawaban->benar !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $jawaban->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $jawaban->updated_at !!}</p>
</div>

