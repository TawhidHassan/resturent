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
                 <form action="{{route('item.update',$item->id)}}" method="post" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Item name</label>
                          <input type="text" class="form-control" name="name" value="{{$item->name}}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Item Category</label>
                          <select class="form-control" name="category">
                            @foreach($category as $cdata)
                            <option {{$cdata->id == $item->category->id ? 'selected' : ''}} value="{{$cdata->id}}">{{$cdata->category_name}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Item price</label>
                          <input type="number" class="form-control" name="price" value="{{$item->price}}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Item Description</label>
                          <textarea type="text" class="form-control" name="discription" >{{$item->discription}}</textarea>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-5">
                          <label>Chose image</label>
                          <label><img src="{{Storage::url($item->image)}}" width="100px;"></label>
                          <input type="file" class="form-control" name="image" >
                      </div>
                    </div>
                    <div class="row">
                      <a href="{{route('item.index')}}" class="btn btn-danger">Back</a>
                      <button type="submit" class="btn btn-success" name="submit">Save</button>
                    </div>
                   
                 </form>
                </div>
              </div>
            </div>
@endsection      

@push('js')

@endpush
