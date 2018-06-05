<table class="table table-responsive" id="jawabans-table">
    <thead>
        <th>Id Soal</th>
        <th>Jawaban</th>
        <th>Benar</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($jawabans as $jawaban)
        <tr>
            <td>{!! $jawaban->id_soal !!}</td>
            <td>{!! $jawaban->jawaban !!}</td>
            <td>{!! $jawaban->benar !!}</td>
            <td>
                {!! Form::open(['route' => ['jawabans.destroy', $jawaban->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('jawabans.show', [$jawaban->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('jawabans.edit', [$jawaban->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>