@extends('backend.layouts.master')

@section('main-content')
<div class="container-fluid px-4">
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="../../admin/shipping">Inicio</a></li>
        <li class="breadcrumb-item active">Agregar Envio</li>
    </ol>

    <div class="card text-bg-light">
      <form method="post" action="{{route('shipping.store')}}">
        {{csrf_field()}}
        <div class="card-body">
                <div class="row g-3">
        <div class="col-12">
          <label for="inputTitle" class="col-form-label">Tipo <span class="text-danger">*</span></label>
        <input id="inputTitle" type="text" name="type"   value="{{old('type')}}" class="form-control">
        @error('type')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        <div class="col-12">
          <label for="price" class="col-form-label">Precio <span class="text-danger">*</span></label>
        <input id="price" type="number" name="price"   value="{{old('price')}}" class="form-control">
        @error('price')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>
        
        <div class="col-12">
          <label for="status" class="col-form-label">Estatus <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
              <option value="active">Activo</option>
              <option value="inactive">Inactivo</option>
          </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        </div>
</div>
        <div class="card-footer text-center">
                <button type="submit" class="btn " style=" color: #fff;background-color: #6d7fcc;">Agregar</button>
            </div>
      </form>
    </div>
</div>

@endsection

@push('styles')
  <link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
  @endpush
  @push('scripts')
  <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
  <script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
  <script>
    $('#lfm').filemanager('image');

    $(document).ready(function() {
    $('#description').summernote({
      placeholder: "Write short description.....",
        tabsize: 2,
        height: 150
    });
    });
</script>
@endpush