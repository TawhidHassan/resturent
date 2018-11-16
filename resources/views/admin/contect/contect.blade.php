@extends('layouts.app')

@section('title','Contect')

@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
@endpush

@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
             @include('layouts.include.massage')
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Contect Table</h4>
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
                         name
                        </th>
                        <th>
                          emaill
                        </th>
                        <th>
                          subject
                        </th>
                        <th>
                          massage
                        </th>
                        <th>
                          sent at
                        </th>
                        <th>
                          Action
                        </th>
                      </thead>
                      <tbody>
                        @foreach($contect as $key=>$data)
                          <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->subject}}</td>
                            <td>{{$data->massage}}</td>
                            <td>{{$data->created_at}}</td>
                            <td><a class="btn btn-primary" href="{{route('acontect.details',$data->id)}}"><i class="material-icons">details</i></a><br>

                             <form id="delet_form-{{$data->id}}" action="{{route('deletec.details',$data->id)}}" style="display: none;" method="post"> 
                                @csrf
                              @method('DELETE')
                             </form>
                            <button type="button" class="btn btn-primary"
                             onclick="if(confirm('are you sure to delete this contect')){
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
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable();
} );
</script>
{!! Toastr::message() !!}
@endpush
