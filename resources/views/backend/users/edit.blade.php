@extends('backend.layouts.master')

@section('main-content')
<div class="container-fluid px-4">
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="../../users">Inicio</a></li>
        <li class="breadcrumb-item active">Editar Usuario</li>
    </ol>

    <div class="card text-bg-light">
      <form method="post" action="{{route('users.update',$user->id)}}">
        @csrf 
        @method('PATCH')
        <div class="card-body">
                <div class="row g-3">
        <div class="col-12">
          <label for="inputTitle" class="col-form-label">Nombre</label>
        <input id="inputTitle" type="text" name="name"  value="{{$user->name}}" class="form-control">
        @error('name')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        <div class="col-12">
            <label for="inputEmail" class="col-form-label">Email</label>
          <input id="inputEmail" type="email" name="email"  value="{{$user->email}}" class="form-control">
          @error('email')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        {{-- <div class="col-12">
            <label for="inputPassword" class="col-form-label">Contraseña</label>
          <input id="inputPassword" type="password" name="password"   value="{{$user->password}}" class="form-control">
          @error('password')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div> --}}

        <div class="col-12">
        <label for="photo" class="col-form-label">Foto</label>
          <div class="input-group">
           <input type="file" name="photo" class="form-control" id="photo" value="{{$user->photo}}" accept="image/*">
        </div>
        <div  style="margin-top:15px;max-height:100px;"></div>
          @error('photo')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        
        @php 
        $roles=DB::table('users')->select('role')->where('id',$user->id)->get();
        // dd($roles);
        @endphp
        <div class="col-12">
            <label for="role" class="col-form-label">Rol</label>
            <select name="role" class="form-control">
                <option value="">-----Seleccione una Opcion-----</option>
                @foreach($roles as $role)
                    <option value="{{$role->role}}" {{(($role->role=='admin') ? 'selected' : '')}}>Admin</option>
                    <option value="{{$role->role}}" {{(($role->role=='user') ? 'selected' : '')}}>User</option>
                @endforeach
            </select>
          @error('role')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>
          <div class="col-12">
            <label for="status" class="col-form-label">Estatus</label>
            <select name="status" class="form-control">
                <option value="active" {{(($user->status=='active') ? 'selected' : '')}}>Activo</option>
                <option value="inactive" {{(($user->status=='inactive') ? 'selected' : '')}}>Inactivo</option>
            </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>
          </div>
        <div class="card-footer text-center">
                <button type="submit" class="btn " style=" color: #fff;background-color: #6d7fcc;">Actualizar</button>
            </div>
      </form>
    </div>
</div>

@endsection

@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    $('#lfm').filemanager('image');
</script>
@endpush