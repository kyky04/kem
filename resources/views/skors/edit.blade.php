@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Skor
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($skor, ['route' => ['skors.update', $skor->id], 'method' => 'patch']) !!}

                        @include('skors.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection