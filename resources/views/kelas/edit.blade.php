@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Kelas
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($kelas, ['route' => ['kelas.update', $kelas->id], 'method' => 'patch']) !!}

                        @include('kelas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection