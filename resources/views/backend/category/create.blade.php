@extends('backend.layouts.master')

@section('main-content')
<div class="container-fluid px-4">
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="../../admin/category">Inicio</a></li>
        <li class="breadcrumb-item active">Agregar Categoria</li>
    </ol>

    <div class="card text-bg-light">
      <form method="post" action="{{route('category.store')}}">
        {{csrf_field()}}
        <div class="card-body">
                <div class="row g-3">
                    <div class="col-12">
          <label for="inputTitle" class="col-form-label">Nombre <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="title"  value="{{old('title')}}" class="form-control">
          @error('title')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="col-md-12">
          <label for="summary" class="col-form-label">Resumen</label>
          <textarea class="form-control" id="summary" name="summary">{{old('summary')}}</textarea>
          @error('summary')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="col-md-12">
          <label for="is_parent">Parent</label><br>
          <input type="checkbox" name='is_parent' id='is_parent' value='1' checked> Si                       
        </div>
        {{-- {{$parent_cats}} --}}

        <div class="form-group d-none" id='parent_cat_div'>
          <label for="parent_id">Categoria</label>
          <select name="parent_id" class="form-control">
              <option value="">--Select any category--</option>
              @foreach($parent_cats as $key=>$parent_cat)
                  <option value='{{$parent_cat->id}}'>{{$parent_cat->title}}</option>
              @endforeach
          </select>
        </div>

        <div class="col-md-12">
        <label for="inputPhoto" class="col-form-label">Foto</label>
          <div class="input-group">
           <input  id="thumbnail" class="form-control" name="photo" value="{{old('photo')}}" type="file" accept="image/*">
        </div>
        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
          @error('photo')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        
        <div class="col-md-12">
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
      $('#summary').summernote({
        placeholder: "Write short description.....",
          tabsize: 2,
          height: 120
      });
    });
</script>

<script>
  $('#is_parent').change(function(){
    var is_checked=$('#is_parent').prop('checked');
    // alert(is_checked);
    if(is_checked){
      $('#parent_cat_div').addClass('d-none');
      $('#parent_cat_div').val('');
    }
    else{
      $('#parent_cat_div').removeClass('d-none');
    }
  })
</script>
@endpush