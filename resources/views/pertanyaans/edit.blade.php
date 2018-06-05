@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Pertanyaan
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($pertanyaan, ['route' => ['pertanyaans.update', $pertanyaan->id], 'method' => 'patch']) !!}

                        @include('pertanyaans.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection