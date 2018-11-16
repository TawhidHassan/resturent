@extends('layouts.app')

@section('title','Reservation')

@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
@endpush

@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
             @include('layouts.include.massage')
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">REservation Table</h4>
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
                          Name
                        </th>
                        <th>
                          Phone
                        </th>
                        <th>
                         Emaill
                        </th>
                        <th>
                         Massage
                        </th>
                        <th>
                          Date
                        </th>
                        <th>
                         Statas
                        </th>
                        <th>
                          Action
                        </th>
                      </thead>
                      <tbody>
                        @foreach($reservation as $key=>$data)
                          <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->phone}}</td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->massage}}</td>
                            <td>{{$data->date}}</td>
                            <td>
                              
                              @if($data->statas == true)
                                  
                                  <span class="badge badge-success">Confirm</span>
                            
                                @else
                                <span class="badge badge-danger ">Not Confirm</span>
                             
                              @endif
                            </td>
                            <td>
                               @if($data->statas== false)
                             <form id="reserv_form-{{$data->id}}" action="{{route('resaervation.statas',$data->id)}}" style="display: none;" method="post"> 
                                @csrf
                             </form>
                            <button type="button" class="btn btn-info"
                             onclick="if(confirm('Are you conmer the reservation with call ?? are you sure to confirm this coustomer')){
                                 event.preventDefault();
                                 document.getElementById('reserv_form-{{$data->id}}').submit();
                            }
                             else{
                              event.preventDefault(); 
                             }
                            "><i class="material-icons">done_all
                                   </i></button>
                                @endif

                             <form id="delet_form-{{$data->id}}" action="{{route('resaervation.destroy',$data->id)}}" style="display: none;" method="post"> 
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

{!! Toastr::message() !!}
@endpush
