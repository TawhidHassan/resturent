@extends('layouts.app')

@section('title','Slider form')

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
                  <h4 class="card-title ">Slider Isert data</h4>
                  <p class="card-category"> Here is a subtitle for this table</p>
                </div>
                <div class="card-body">
                 <form action="{{route('slider.store')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Title name</label>
                          <input type="text" class="form-control" name="slider_title" >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating"> Sub Title name</label>
                          <input type="text" class="form-control" name="slider_sub_title" >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-5">
                        
                          <label>Chose image</label>
                          <input type="file" class="form-control" name="image" >
                       
                      </div>
                    </div>
                    <div class="row">
                      <a href="{{route('slider.index')}}" class="btn btn-danger">Back</a>
                      <button type="submit" class="btn btn-success" name="submit">Save</button>
                    </div>
                   
                 </form>
                </div>
              </div>
            </div>
@endsection      

@push('js')

@endpush
