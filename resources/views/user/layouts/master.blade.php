<!DOCTYPE html>
<html lang="en">

@include('user.layouts.head')

<body id="page-top">

  <div id="wrapper">

    @include('user.layouts.sidebar')
   
    <div id="content-wrapper" class="d-flex flex-column">

      <div id="content">

        @include('user.layouts.header')
      
        @yield('main-content')

      </div>

</body>

</html>
