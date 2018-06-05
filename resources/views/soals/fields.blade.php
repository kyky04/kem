<!-- Id Kelas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_kelas', 'Id Kelas:') !!}
    {!! Form::text('id_kelas', null, ['class' => 'form-control']) !!}
</div>

<!-- Pertanyaan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('judul', 'Judul:') !!}
    {!! Form::text('judul', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('pertanyaan', 'Pertanyaan:') !!}
    {!! Form::text('pertanyaan', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('jumlah_kata', 'Jumlah Kata:') !!}
    {!! Form::text('jumlah_kata', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('soals.index') !!}" class="btn btn-default">Cancel</a>
</div>
