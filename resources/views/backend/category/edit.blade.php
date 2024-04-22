@extends('backend.layouts.master')

@section('main-content')
<div class="container-fluid px-4">
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="../../category">Inicio</a></li>
        <li class="breadcrumb-item active">Editar Categoria</li>
    </ol>

    <div class="card text-bg-light">
      <form method="post" action="{{route('category.update',$category->id)}}">
        @csrf 
        @method('PATCH')
        <div class="card-body">
                <div class="row g-3">
                    <div class="col-12">
          <label for="inputTitle" class="col-form-label">Nombre <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="title"  value="{{$category->title}}" class="form-control">
          @error('title')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="col-12">
          <label for="summary" class="col-form-label">Resumen</label>
          <input class="form-control" id="summary" name="summary" value="{{$category->summary}}"></input>
          @error('summary')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="col-12">
          <label for="is_parent">Parent</label><br>
          <input type="checkbox" name='is_parent' id='is_parent' value='{{$category->is_parent}}' {{(($category->is_parent==1)? 'checked' : '')}}> Si                        
        </div>
        {{-- {{$parent_cats}} --}}
        {{-- {{$category}} --}}

      <div class="col-12" {{(($category->is_parent==1) ? 'd-none' : '')}}" id='parent_cat_div'>
          <label for="parent_id">Categoria</label>
          <select name="parent_id" class="form-control">
              <option value="">--Seleccione una Opcion--</option>
              @foreach($parent_cats as $key=>$parent_cat)
              
                  <option value='{{$parent_cat->id}}' {{(($parent_cat->id==$category->parent_id) ? 'selected' : '')}}>{{$parent_cat->title}}</option>
              @endforeach
          </select>
        </div>

  

        <div class="col-12">
          <label for="inputPhoto" class="col-form-label">Foto</label>
          <div class="input-group"> 
            <input id="thumbnail" type="file" id="photo" accept="image/*" class="form-control" name="photo" value="{{$category->photo}}">
  
        </div>
        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
          @error('photo')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="col-12">
          <label for="status" class="col-form-label">Estatus <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
              <option value="active" {{(($category->status=='active')? 'selected' : '')}}>Activo</option>
              <option value="inactive" {{(($category->status=='inactive')? 'selected' : '')}}>Inactivo</option>
          </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>

</div>

</div>
<div class="card-footer text-center">
                <button type="submit" class="btn " style=" color: #fff;background-color: #6d7fcc;">Actualizar</button>
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
        height: 150
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