<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Contato - Teste Netshow.me</title>

        <link href="{{ asset('css/app.css')}}" rel="stylesheet">

    </head>
    <body>
        <div class="container">
            <div class="page-contact col-sm-8 offset-sm-2">
                @if ($errors->any())
                    <div class="alert alert-danger mt-2">   
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @elseif (session('success'))
                    <div class="alert alert-success mt-2">{{session('success')}}</div>
                @endif
                <div class="card mt-5">
                    <div class="card-header">
                        <h3>
                            Contato Netshow.me
                        </h3>
                    </div>
                    <div class="card-body">
                    <form action="{{route('contact.store')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="{{old('name')}}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{old('email')}}">
                        </div>
                        <div class="form-group">
                            <label for="phone">Telefone</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="(xx) xxxx-xxxx" value="{{old('phone')}}">
                        </div>
                        <div class="form-group">
                            <label for="message">Mensagem</label>
                            <textarea class="form-control" id="message" name="message" rows="3">{{old('message')}}</textarea>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="archive" name="archive" required>
                            <label class="custom-file-label" for="archive">Anexar arquivo...</label>
                        </div>
                    </div>
                    <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        
        <script src="{{ asset('js/app.js')}}"></script>    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    </body>
</html>
