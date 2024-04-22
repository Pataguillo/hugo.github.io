<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
<section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center"><img src="/frontend/img/Ciber.jpeg" class="img-fluid" style="width: 185px;" height="50px">
                  <h4 class="mt-1 mb-5 pb-1"> Registrate para disfrutar la variedad de nuestros servicios.</h4>
                </div>
                        <form  method="post" action="{{route('register.submit')}}">
                            @csrf
                                <div class="form-outline mb-4">
                                    <input type="text" name="name" class="form-control" placeholder="Ingresa nombre"required="required" value="{{old('name')}}">
                                    <label class="form-label" for="form2Example11">Nombre</label>
                                    @error('name')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <input type="text" name="email" class="form-control" placeholder="Ingresa tu correo electronico"required="required" value="{{old('email')}}">
                                    <label class="form-label" for="form2Example11">Email</label>
                                    @error('email')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                </div>
                                
                                <div class="form-outline mb-4">
                                        <input type="password" name="password"  required="required" value="{{old('password')}}" class="form-control" 
                                        placeholder="Ingresa tu contraseña"/>
                                        <label class="form-label" for="form2Example22">Contraseña</label>
                                        @error('password')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                              </div>
                                
                                <div class="form-outline mb-4">
                    <input type="password" name="password_confirmation"  required="required" value="{{old('password_confirmation')}}" class="form-control" 
                    placeholder="Ingresa tu contraseña"/>
                    <label class="form-label" for="form2Example22">Confirmar Contraseña</label>
                    @error('password_confirmation')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                  </div>
                  <div class="text-center pt-1 mb-5 pb-1">
                  <div class="form-group login-btn">
                                        <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Registrate</button>
                                        <a href="{{route('login.form')}}" class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3">Inicia sesion</a>
                                       
                                        </div>
                  </div>

</form>

</div>
</div>
<div class="col-lg-6 d-flex align-items-center gradient-custom-2">
<div class="text-white px-3 py-4 p-md-5 mx-md-4">
<h4 class="mb-4">Somos más que una simple compañia</h4>
<p class="small mb-0">CSI Surge ante las  necesidades mostradas por el mercado de consumidores de equipos 
    de cómputo y consumibles,manejamos una gran gama de productos en la industria informática.</p>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </section>
  </body>
</html>

<style>
  .gradient-custom-2 {
  background: #fccb90;
  background: -webkit-linear-gradient(to right, #dd3675, #7386D5, #dd3675,  #7386D5);

  background: linear-gradient(to right, #47748b, #7386D5,  #7386D5,  #7386D5);
  }

  @media (min-width: 768px) {
  .gradient-form {
  height: 100vh !important;
  }
  }
  @media (min-width: 769px) {
  .gradient-custom-2 {
  border-top-right-radius: .3rem;
  border-bottom-right-radius: .3rem;
  }
}
</style>