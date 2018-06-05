<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $soal->id !!}</p>
</div>

<!-- Id Kelas Field -->
<div class="form-group">
    {!! Form::label('id_kelas', 'Id Kelas:') !!}
    <p>{!! $soal->id_kelas !!}</p>
</div>

<!-- Pertanyaan Field -->
<div class="form-group">
    {!! Form::label('pertanyaan', 'Pertanyaan:') !!}
    <p>{!! $soal->pertanyaan !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $soal->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $soal->updated_at !!}</p>
</div>

