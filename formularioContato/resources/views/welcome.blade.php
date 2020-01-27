<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

        <title>Formulario de contato</title>
       
    </head>
    <body>
        <br>

        @if (session('success'))
            
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        
        @endif

        <form action="/enviar" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group col-3">
                <label for="inputNome">Nome</label>
                <input type="text" class="form-control" name="inputNome" id="inputNome" aria-describedby="emailHelp" placeholder="Seu nome">
                
            </div>
            <div class="form-group col-3">
                <label for="inputEmail1">Endereço de email *</label>
                <input type="email" class="form-control" name="inputEmail1" id="inputEmail1" aria-describedby="emailHelp" required placeholder="Seu email">
                <small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seu email, com ninguém.</small>
            </div>

            <div class="form-group col-2">
                <label for="inputTelefone">Telefone *</label>
                <input type="text" class="form-control" name="inputTelefone" id="inputTelefone" aria-describedby="emailHelp" required placeholder="Seu telefone">
            </div>

            <div class="form-group col-4">
                <label for="inputMensagem">Mensagem</label>
                <textarea rows="6" cols="30" class="form-control" name="inputMensagem" id="inputMensagem" required placeholder="Deixe sua mensagem"></textarea>
            </div>

            <div class="form-group col-6 input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01">Anexo</span>
            </div>
            <div class="custom-file">
                <input type="file" name="inputGroupFile01" accept=".pdf , .doc , .docx , .odt , .txt" class="custom-file-input" id="inputGroupFile01" required aria-describedby="inputGroupFileAddon01">>
                <label class="custom-file-label" for="inputGroupFile01">Clique aqui para anexar arquivo (tipo: pdf, doc, docx, odt ou txt) </label>
            </div>
            </div>
            
            <br>
            <div class="form-group col-4">
            <button type="submit" class="btn btn-primary">Enviar</button>
            </div>

        </form>

    </body>

<script>

    var uploadField = document.getElementById("inputGroupFile01");
    uploadField.onchange = function() {
        if (this.files[0].size > 500000) {
            alert("Arquivo maior que o permitido!");
            this.value = "";
        };
    };

    $("#inputTelefone").mask("(00)0000-00000");

</script>

</html>

