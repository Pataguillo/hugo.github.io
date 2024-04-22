@extends('user.layouts.master')

@section('main-content')
<div class="container-fluid">
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="../../../">Inicio</a></li>
    </ol>
</div>

<div class="container-fluid">
<div class="card mb-4">
<div class="row">
         <div class="col-md-12">
            @include('user.layouts.notification')
         </div>
     </div>
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
           HISTORIAL
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table table-striped">
            <thead>
        <tr>
            <th>Pedido</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Cantidad</th>
            <th>Envio</th>
            <th>Total</th>
            <th>Estatus</th>
            <th>Opciones</th>
        </tr>
      </thead>
          <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{$order->order_number}}</td>
                    <td>{{$order->first_name}} {{$order->last_name}}</td>
                    <td>{{$order->email}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>${{$order->shipping->price}}</td>
                    <td>${{number_format($order->total_amount,2)}}</td>
                    <td>
                        @if($order->status=='new')
                          <span class="badge badge-primary">{{$order->status}}</span>
                        @elseif($order->status=='process')
                          <span class="badge badge-warning">{{$order->status}}</span>
                        @elseif($order->status=='delivered')
                          <span class="badge badge-success">{{$order->status}}</span>
                        @else
                          <span class="badge badge-danger">{{$order->status}}</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('user.order.show',$order->id)}}" class="btn" style=" color: #fff;background-color: #47748b;" data-toggle="tooltip" data-placement="bottom">Ver</i></a>
                        <form method="POST" action="{{route('user.order.delete',[$order->id])}}">
                          @csrf
                          @method('delete')
                              <button class="btn btn-danger" data-id={{$order->id}}>Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
    </div>
</div>
</div>
@endsection

@push('styles')
  <link href="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
  <style>
      div.dataTables_wrapper div.dataTables_paginate{
          display: none;
      }
  </style>
@endpush

@push('scripts')

  <script src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

  <script src="{{asset('backend/js/demo/datatables-demo.js')}}"></script>
  <script>

      $('#order-dataTable').DataTable( {
            "columnDefs":[
                {
                    "orderable":false,
                    "targets":[8]
                }
            ]
        } );


        function deleteData(id){

        }
  </script>
  <script>
      $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
          $('.dltBtn').click(function(e){
            var form=$(this).closest('form');
              var dataID=$(this).data('id');
              e.preventDefault();
              swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                       form.submit();
                    } else {
                        swal("Your data is safe!");
                    }
                });
          })
      })
  </script>
@endpush
