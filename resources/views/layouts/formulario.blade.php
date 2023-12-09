<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario de Expositor</title>
    <link rel="icon" type="image/x-icon" href="assets/ima/logo_expo.png" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>

    <!-- Mensaje cuando se registra el user-->
    @if(session('success'))<script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <div class="alert alert-success w-50 mx-auto fw-bolder mt-3 text-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
            class="bi bi-check-circle-fill" viewBox="0 0 16 16">
            <path
                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </svg>
        {{ session('success') }}
    </div>
    @endif

    <h3 class="text-uppercase text-center mt-5">Formulario de expositor</h3>
    <div class="container mb-2">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <form action="{{route('GuardarFormularioExpo', ['evento_id' => $evento->id])}}" method="post">
                    @csrf

                    <div class="form-group">
                        <div class="form-floating">
                            <input required type="text" class="form-control" id="exampleInputTextl1" name="nombres"
                                placeholder="Nombres">
                            <label for="exampleInputTextl1">Nombres</label>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="form-floating">
                            <input required type="text" class="form-control" id="exampleInputTextl2" name="apellidos"
                                placeholder="Apellidos">
                            <label for="exampleInputTextl2">Apellidos</label>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="form-floating">
                            <input required type="email" class="form-control" id="exampleInputEmail1" name="email"
                                placeholder="Enter email">
                            <label for="exampleInputEmail1">Email address</label>
                        </div>
                    </div>


                    <br>
                    <div class="form-group">
                        <div class="form-floating">
                            <input required type="number" class="form-control" id="exampleInputNumber1" name="numero"
                                placeholder="Numero celular">
                            <label for="exampleInputNumber1">Numero</label>
                        </div>
                    </div>


                    <input value="{{$evento->id}}" type="hidden" style="display:none" name="evento_id" id="evento_id">

                    <div>
                        <button class="btn btn-primary mt-4 btn-xl text-uppercase w-50  text-center" type="submit">
                            Registrarme
                        </button>
                </form>


            </div>
        </div>
    </div>
    </div>
</body>

</html>