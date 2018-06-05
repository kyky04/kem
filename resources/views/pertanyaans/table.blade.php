<table class="table table-responsive" id="pertanyaans-table">
    <thead>
        <th>Id Soal</th>
        <th>Pertanyaan</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($pertanyaans as $pertanyaan)
        <tr>
            <td>{!! $pertanyaan->id_soal !!}</td>
            <td>{!! $pertanyaan->pertanyaan !!}</td>
            <td>
                {!! Form::open(['route' => ['pertanyaans.destroy', $pertanyaan->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('pertanyaans.show', [$pertanyaan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('pertanyaans.edit', [$pertanyaan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>