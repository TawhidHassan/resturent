@extends('layouts.app')

@section('title','Category')

@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
@endpush

@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <a href="{{route('category.create')}}" class="btn btn-primary">Create category</a>
             @include('layouts.include.massage')
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">category Table</h4>
                  <p class="card-category"> Here is a subtitle for this table</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table  id="table" class="table table-striped table-bordered" style="width:100%; ">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          category name
                        </th>
                        <th>
                         slug
                        </th>
                        <th>
                          Created at
                        </th>
                        <th>
                          updateded at
                        </th>
                        <th>
                          Action
                        </th>
                      </thead>
                      <tbody>
                        @foreach($category as $key=>$data)
                          <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$data->category_name}}</td>
                            <td>{{$data->slug}}</td>
                            <td>{{$data->created_at}}</td>
                            <td>{{$data->updated_at}}</td>
                            <td><a class="btn btn-primary" href="{{route('category.edit',$data->id)}}"><i class="material-icons">mode_edit</i></a><br>


                             <form id="delet_form-{{$data->id}}" action="{{route('category.destroy',$data->id)}}" style="display: none;" method="post"> 
                                @csrf
                              @method('DELETE')
                             </form>
                            <button type="button" class="btn btn-primary"
                             onclick="if(confirm('are you sure to delete this item')){
                                 event.preventDefault();
                                 document.getElementById('delet_form-{{$data->id}}').submit();
                            }
                             else{
                              event.preventDefault();
                              
                             }
                            "><i class="material-icons">delete_forever</i></button>

                            
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
@endsection      

@push('js')

<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>


<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable();
} );
</script>
@endpush
