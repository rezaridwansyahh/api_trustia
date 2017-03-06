@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Kase
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($kase, ['route' => ['kases.update', $kase->id], 'method' => 'patch']) !!}

                        @include('kases.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection