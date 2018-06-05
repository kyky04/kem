<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $skor->id !!}</p>
</div>

<!-- Id Siswa Field -->
<div class="form-group">
    {!! Form::label('id_siswa', 'Id Siswa:') !!}
    <p>{!! $skor->id_siswa !!}</p>
</div>

<!-- Id Soal Field -->
<div class="form-group">
    {!! Form::label('id_soal', 'Id Soal:') !!}
    <p>{!! $skor->id_soal !!}</p>
</div>

<!-- Skor Field -->
<div class="form-group">
    {!! Form::label('skor', 'Skor:') !!}
    <p>{!! $skor->skor !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $skor->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $skor->updated_at !!}</p>
</div>

