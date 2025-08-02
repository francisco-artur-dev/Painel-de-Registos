    @if (session('success'))
        <p style="color: #0f0;" class="alert alert-success" role="alert">
            {{ session('success') }}
        </p>
    @endif

            <!-- Verifica se há erros de validação -->
        @if ($errors->any())
           <div class="alert alert-danger" role="alert" >
                @foreach ($errors->all() as $error)
                         {{ $error }} <br>
                @endforeach
           </div>

        @endif


