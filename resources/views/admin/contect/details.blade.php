@extends('layouts.app')

@section('title','Contect')

@push('css')

@endpush

@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
             @include('layouts.include.massage')
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Subject:<b>{{$contect->subject}}</b></h4>
                  <p class="card-category"> Here is a subtitle for this table</p>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <strong>name:{{$contect->name}}</strong><br>
                      <b>Email:{{$contect->name}}</b><br>
                      <strong>Massage:</strong><br>
                      <p>{{$contect->massage}}</p>
                    </div>
                    <a href="{{route('acontect.index')}}" class="btn btn-success">Back</a>
                  </div>
                </div>
              </div>
            </div>
@endsection      

@push('js')

@endpush
