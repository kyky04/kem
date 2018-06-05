<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $pertanyaan->id !!}</p>
</div>

<!-- Id Soal Field -->
<div class="form-group">
    {!! Form::label('id_soal', 'Id Soal:') !!}
    <p>{!! $pertanyaan->id_soal !!}</p>
</div>

<!-- Pertanyaan Field -->
<div class="form-group">
    {!! Form::label('pertanyaan', 'Pertanyaan:') !!}
    <p>{!! $pertanyaan->pertanyaan !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $pertanyaan->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $pertanyaan->updated_at !!}</p>
</div>

