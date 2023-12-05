
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        My Todo App
    </title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <style>
        body {
            font-family: 'Nunito';
        }
    </style>
</head>

<body>
    @auth
    <nav class="navbar navbar-light bg-light">
        <div class="container d-flex flex-column flex-md-row align-self-center p-3">
            <a href="/"><span class="navbar-brand mb-0 h1">Todo</span></a>
            <div class="col-md-auto" >
                <a href="/create"><span class="btn btn-primary">Create Todo</span></a>
            </div>
            <div class="col-md-auto" >
                <a href="logout"><span class="btn btn-primary">logout</span></a>
            </div>
        </div>
    </nav>
    @else
    <nav class="navbar navbar-light bg-light">
        <div class="d-flex flex-column align-items-center p-3 w-50">
                <a href="/"><span class="navbar-brand mb-0 h1">Todo</span></a>
        </div>
        <div class="mx-10 w-10" >
            <a href="signup"><span class="btn btn-primary">Reg</span></a>
        </div>
        <div class="mx-10 w-10">
            <a href="loginpage"><span class="btn btn-primary">login</span></a>
        </div>
    </nav>
    @if (session()->has('success'))
          <div class="container container--narrow">
            <div class="alert alert-success text-center">
              {{session('success')}}
            </div>
          </div>            
        @endif
    @endauth

    <div class="container">
        {{$slot}}
    </div>
    
    <!-- footer begins -->
    <footer class="border-top text-center small text-muted py-3">
        <p class="m-0">Copyright &copy; 2022 <a href="/" class="text-muted">OurApp</a>. All rights reserved.</p>
    </footer>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script>
    $('[data-toggle="tooltip"]').tooltip()
  </script>
</body>

</html>