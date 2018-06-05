<table class="table table-responsive" id="soals-table">
    <thead>
        <th>Id Kelas</th>
        <th>Juduk</th>
        <th>Pertanyaan</th>
        <th>Jumlah Kata</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($soals as $soal)
        <tr>
            <td>{!! $soal->id_kelas !!}</td>
            <td>{!! $soal->judul !!}</td>
            <td>{!! $soal->pertanyaan !!}</td>
            <td>{!! $soal->jumlah_kata !!}</td>
            <td>
                {!! Form::open(['route' => ['soals.destroy', $soal->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('soals.show', [$soal->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('soals.edit', [$soal->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>