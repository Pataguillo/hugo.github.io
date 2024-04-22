@extends('backend.layouts.master')

@section('main-content')
<div class="container-fluid px-4">
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="../../admin/product">Inicio</a></li>
        <li class="breadcrumb-item active">Agregar Producto</li>
    </ol>

    <div class="card text-bg-light">
      <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data" >
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

       <div class="col-12">
          <label for="summary" class="col-form-label">Resumen <span class="text-danger">*</span></label>
          <textarea class="form-control" id="summary" name="summary">{{old('summary')}}</textarea>
          @error('summary')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

       <div class="col-12">
          <label for="description" class="col-form-label">Descripcion</label>
          <textarea class="form-control" id="description" name="description">{{old('description')}}</textarea>
          @error('description')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>


       <div class="col-12">
          <label for="is_featured">Factura</label><br>
          <input type="checkbox" name='is_featured' id='is_featured' value='1' checked> Si                       
        </div>
              {{-- {{$categories}} --}}

       <div class="col-12">
          <label for="cat_id">Categoria <span class="text-danger">*</span></label>
          <select name="cat_id" id="cat_id" class="form-control">
              <option value="">--Seleccione una Opcion--</option>
              @foreach($categories as $key=>$cat_data)
                  <option value='{{$cat_data->id}}'>{{$cat_data->title}}</option>
              @endforeach
          </select>
        </div>

        <div class="form-group d-none" id="child_cat_div">
          <label for="child_cat_id">Sub Categoria</label>
          <select name="child_cat_id" id="child_cat_id" class="form-control">
              <option value="">--Seleccione una Opcion--</option>
              {{-- @foreach($parent_cats as $key=>$parent_cat)
                  <option value='{{$parent_cat->id}}'>{{$parent_cat->title}}</option>
              @endforeach --}}
          </select>
        </div>

       <div class="col-12">
          <label for="price" class="col-form-label">Precio <span class="text-danger">*</span></label>
          <input id="price" type="number" name="price"  value="{{old('price')}}" class="form-control">
          @error('price')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

       <div class="col-12">
          <label for="discount" class="col-form-label">Descuento(%)</label>
          <input id="discount" type="number" name="discount" min="0" max="100"   value="{{old('discount')}}" class="form-control">
          @error('discount')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        
        <div class="col-12">
          <label for="size" class="col-form-label">Tamaño</label>
          <select name="size[]" class="form-control">
              <option value="">--Seleccione una Opcion--</option>
              <option value="S">Chico (S)</option>
              <option value="M">Mediano (M)</option>
              <option value="L">Grande (L)</option>
              <option value="XL">Extra Grande (XL)</option>
          </select>
        </div>

       <div class="col-12">
          <label for="brand_id">Marca</label>
          {{-- {{$brands}} --}}

          <select name="brand_id" class="form-control">
              <option value="">--Seleccione una Opcion--</option>
             @foreach($brands as $brand)
              <option value="{{$brand->id}}">{{$brand->title}}</option>
             @endforeach
          </select>
        </div>

       <div class="col-12">
          <label for="condition">Condicion</label>
          <select name="condition" class="form-control">
              <option value="">--Seleccione una Opcion--</option>
              <option value="default">Por defecto</option>
              <option value="new">Nuevo</option>
              <option value="hot">Tendencia</option>
          </select>
        </div>

       <div class="col-12">
          <label for="stock">Cantidad <span class="text-danger">*</span></label>
          <input id="quantity" type="number" name="stock" min="0"   value="{{old('stock')}}" class="form-control">
          @error('stock')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        
       <div class="col-12">
          <label for="photo" class="col-form-label">Imagen:<span class="text-danger">*</span></label>
          <div class="input-group">
           <input type="file" name="photo" class="form-control" id="photo" accept="image/*">
        </div>
        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
          @error('photo')
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
        <div class="card-footer text-center">
                <button type="submit" class="btn " style=" color: #fff;background-color: #6d7fcc;">Agregar</button>
            </div>
      </form>
    </div>
</div>

@endsection

@push('styles')
  <link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
  @endpush
  @push('scripts')
  <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
  <script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<script>
    $('#lfm').filemanager('image');

    $(document).ready(function() {
      $('#summary').summernote({
        placeholder: "Write short description.....",
          tabsize: 2,
          height: 100
      });
    });

    $(document).ready(function() {
      $('#description').summernote({
        placeholder: "Write detail description.....",
          tabsize: 2,
          height: 150
      });
    });
    // $('select').selectpicker();

</script>

<script>
  $('#cat_id').change(function(){
    var cat_id=$(this).val();
    // alert(cat_id);
    if(cat_id !=null){
      // Ajax call
      $.ajax({
        url:"/admin/category/"+cat_id+"/child",
        data:{
          _token:"{{csrf_token()}}",
          id:cat_id
        },
        type:"POST",
        success:function(response){
          if(typeof(response) !='object'){
            response=$.parseJSON(response)
          }
          // console.log(response);
          var html_option="<option value=''>----Select sub category----</option>"
          if(response.status){
            var data=response.data;
            // alert(data);
            if(response.data){
              $('#child_cat_div').removeClass('d-none');
              $.each(data,function(id,title){
                html_option +="<option value='"+id+"'>"+title+"</option>"
              });
            }
            else{
            }
          }
          else{
            $('#child_cat_div').addClass('d-none');
          }
          $('#child_cat_id').html(html_option);
        }
      });
    }
    else{
    }
  })
</script>
@endpush