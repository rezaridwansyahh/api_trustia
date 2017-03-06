@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Kases</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('kases.create') !!}">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('kases.table')
            </div>
        </div>
    </div>
@endsection

