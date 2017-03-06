@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Case Detail
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($caseDetail, ['route' => ['caseDetails.update', $caseDetail->id], 'method' => 'patch']) !!}

                        @include('case_details.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection