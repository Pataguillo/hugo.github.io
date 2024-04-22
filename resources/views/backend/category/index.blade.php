@extends('backend.layouts.master')

@section('main-content')
<div class="container-fluid">
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="../admin">Inicio</a></li>
    </ol>
</div>

    <div class="mb-4">
        <a href="{{route('category.create')}}">
            <button type="button" class="btn " style=" color: #fff;background-color: #6d7fcc; margin-left: 80%;">Agregar Categoria</button>
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
           LISTA DE CATEGORIAS
        </div>
        <div class="card-body">
        @if(count($categories)>0)
        <table id="datatablesSimple" class="table table-striped fs-6">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Tipo</th>
              <th>Estatus</th>
              <th>Opciones</th>
            </tr>
          </thead>
          <tbody>

            @foreach($categories as $category)
              @php
              @endphp
                <tr>
                    <td>{{$category->title}}</td>
                    <td>{{$category->slug}}</td>
                    <td>
                        @if($category->status=='active')
                            <span class="badge badge-success">{{$category->status}}</span>
                        @else
                            <span class="badge badge-warning">{{$category->status}}</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('category.edit',$category->id)}}" class="btn btn-primary btn-sm float-left mr-1" style=" color: #fff;background-color: #47748b;">Editar</a>
                    <form method="POST" action="{{route('category.destroy',[$category->id])}}">
                      @csrf
                      @method('delete')
                          <button class="btn btn-danger btn-sm dltBtn" data-id={{$category->id}}>Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
        <span style="float:right">{{$categories->links()}}</span>
        @else
          <h6 class="text-center">¡¡¡No se encontraron categorías!!! Por favor crea una categoría</h6>
        @endif
      </div>
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

      $('#banner-dataTable').DataTable( {
            "columnDefs":[
                {
                    "orderable":false,
                    "targets":[3,4,5]
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
