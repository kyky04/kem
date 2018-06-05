<table class="table table-responsive" id="admins-table">
    <thead>
        <th>Nama</th>
        <th>Email</th>
        <th>Password</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($admins as $admin)
        <tr>
            <td>{!! $admin->nama !!}</td>
            <td>{!! $admin->email !!}</td>
            <td>{!! $admin->password !!}</td>
            <td>
                {!! Form::open(['route' => ['admins.destroy', $admin->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admins.show', [$admin->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admins.edit', [$admin->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>