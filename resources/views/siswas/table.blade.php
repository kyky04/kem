<table class="table table-responsive" id="siswas-table">
    <thead>
        <th>Id Kelas</th>
        <th>Nama</th>
        <th>Username</th>
        <th>Email</th>
        <th>Password</th>
        <th>Jenis Kelamin</th>
        <th>Sekolah</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($siswas as $siswa)
        <tr>
            <td>{!! $siswa->id_kelas !!}</td>
            <td>{!! $siswa->nama !!}</td>
            <td>{!! $siswa->username !!}</td>
            <td>{!! $siswa->email !!}</td>
            <td>{!! $siswa->password !!}</td>
            <td>{!! $siswa->jenis_kelamin !!}</td>
            <td>{!! $siswa->sekolah !!}</td>
            <td>
                {!! Form::open(['route' => ['siswas.destroy', $siswa->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('siswas.show', [$siswa->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('siswas.edit', [$siswa->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>