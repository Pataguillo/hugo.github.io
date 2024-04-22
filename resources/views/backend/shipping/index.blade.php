@extends('backend.layouts.master')

@section('main-content')
<div class="container-fluid">
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="../admin">Inicio</a></li>
    </ol>
</div>

    <div class="mb-4">
        <a href="{{route('shipping.create')}}">
            <button type="button" class="btn " style=" color: #fff;background-color: #6d7fcc; margin-left: 80%;">Agregar Envio</button>
        </a>
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
           LISTA DE ENVIOS
        </div>
        <div class="card-body">
        @if(count($shippings)>0)
        <table id="datatablesSimple" class="table table-striped fs-6">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Precio</th>
              <th>Estatus</th>
              <th>Opciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach($shippings as $shipping)   
                <tr>
                    <td>{{$shipping->type}}</td>
                    <td>${{$shipping->price}}</td>
                    <td>
                        @if($shipping->status=='active')
                            <span class="badge badge-success">{{$shipping->status}}</span>
                        @else
                            <span class="badge badge-warning">{{$shipping->status}}</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('shipping.edit',$shipping->id)}}" class="btn btn-primary btn-sm float-left mr-1" style=" color: #fff;background-color: #47748b;">Editar</a>
                        <form method="POST" action="{{route('shipping.destroy',[$shipping->id])}}">
                          @csrf 
                          @method('delete')
                              <button class="btn btn-danger btn-sm dltBtn" data-id={{$shipping->id}}>Eliminar</button>
                        </form>
                    </td>
                    {{-- Delete Modal --}}
                    {{-- <div class="modal fade" id="delModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="#delModal{{$user->id}}Label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="#delModal{{$user->id}}Label">Eliminar</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form method="post" action="{{ route('banners.destroy',$user->id) }}">
                                @csrf 
                                @method('delete')
                                <button type="submit" class="btn btn-danger" style="margin:auto; text-align:center">Parameto Eliminado</button>
                              </form>
                            </div>
                          </div>
                        </div>
                    </div> --}}
                </tr>  
            @endforeach
          </tbody>
        </table>
        <span style="float:right">{{$shippings->links()}}</span>
        @else
          <h6 class="text-center">¡¡¡No se encontraron un envio!!! Por favor crea una envio</h6>
        @endif
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
      .zoom {
        transition: transform .2s; /* Animation */
      }

      .zoom:hover {
        transform: scale(3.2);
      }
  </style>
@endpush

@push('scripts')

  <!-- Page level plugins -->
  <script src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('backend/js/demo/datatables-demo.js')}}"></script>
  <script>
      
      $('#banner-dataTable').DataTable( {
            "columnDefs":[
                {
                    "orderable":false,
                    "targets":[3,4]
                }
            ]
        } );

        // Sweet alert

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
              // alert(dataID);
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