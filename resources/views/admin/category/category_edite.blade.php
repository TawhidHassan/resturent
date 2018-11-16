@extends('layouts.app')

@section('title','Category form')

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
                  <h4 class="card-title ">Category Isert data</h4>
                  <p class="card-category"> Here is a subtitle for this table</p>
                </div>
                <div class="card-body">
                 <form action="{{route('category.update',$category->id)}}" method="post" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Title name</label>
                          <input type="text" class="form-control" name="category_name" value="{{$category->category_name}}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <a href="{{route('category.index')}}" class="btn btn-danger">Back</a>
                      <button type="submit" class="btn btn-success" name="submit">Save</button>
                    </div>
                   
                 </form>
                </div>
              </div>
            </div>
@endsection      

@push('js')

@endpush
