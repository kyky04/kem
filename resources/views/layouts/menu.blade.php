<li class="{{ Request::is('kelas*') ? 'active' : '' }}">
    <a href="{!! route('kelas.index') !!}"><i class="fa fa-edit"></i><span>Kelas</span></a>
</li>

<li class="{{ Request::is('soals*') ? 'active' : '' }}">
    <a href="{!! route('soals.index') !!}"><i class="fa fa-edit"></i><span>Soals</span></a>
</li>

<li class="{{ Request::is('pertanyaans*') ? 'active' : '' }}">
    <a href="{!! route('pertanyaans.index') !!}"><i class="fa fa-edit"></i><span>Pertanyaans</span></a>
</li>

<li class="{{ Request::is('jawabans*') ? 'active' : '' }}">
    <a href="{!! route('jawabans.index') !!}"><i class="fa fa-edit"></i><span>Jawabans</span></a>
</li>

<li class="{{ Request::is('siswas*') ? 'active' : '' }}">
    <a href="{!! route('siswas.index') !!}"><i class="fa fa-edit"></i><span>Siswas</span></a>
</li>

<li class="{{ Request::is('skors*') ? 'active' : '' }}">
    <a href="{!! route('skors.index') !!}"><i class="fa fa-edit"></i><span>Skors</span></a>
</li>

<li class="{{ Request::is('pertanyaans*') ? 'active' : '' }}">
    <a href="{!! route('pertanyaans.index') !!}"><i class="fa fa-edit"></i><span>Pertanyaans</span></a>
</li>

<li class="{{ Request::is('admins*') ? 'active' : '' }}">
    <a href="{!! route('admins.index') !!}"><i class="fa fa-edit"></i><span>Admins</span></a>
</li>

