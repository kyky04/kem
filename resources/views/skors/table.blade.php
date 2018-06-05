<table class="table table-responsive" id="skors-table">
    <thead>
        <th>Id Siswa</th>
        <th>Id Soal</th>
        <th>Skor</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($skors as $skor)
        <tr>
            <td>{!! $skor->id_siswa !!}</td>
            <td>{!! $skor->id_soal !!}</td>
            <td>{!! $skor->skor !!}</td>
            <td>
                {!! Form::open(['route' => ['skors.destroy', $skor->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('skors.show', [$skor->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('skors.edit', [$skor->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>