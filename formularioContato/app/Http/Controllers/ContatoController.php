<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContatoEmail;
use Carbon\Carbon;
use Ramsey\Uuid\Uuid;
use App\Models\Formcontact;


class ContatoController extends Controller
{
    
    private $formcontact;

    public function __construct(Formcontact $formcontact)
    {
        $this->formatcontact = $formcontact;
    }

    public function index()
    {
        $formatcontact = $formcontact->all();
    }


    public function enviaContato(Request $request)
    {
            $nome = $request->input('inputNome');
            $email = $request->input('inputEmail1');
            $telefone = $request->input('inputTelefone');
            $mensagem = $request->input('inputMensagem');
            $ip_user = \Request::getClientIp(true);
            $dataup = Carbon::now()->formatLocalized('%Y-%m-%d');
            $horaup = Carbon::now()->format('H:i:s');
        
            $path_save = null;
            //Verifica se arquivo é valido para efetuar upload
            if ($request->file('inputGroupFile01')->isValid())
            {
                //Usei uuid para evitar que algum user do form envie algum arquivo com mesmo nome
                // ou o mesmo user envie 2 arquivos com nomes iguais. 
                $var_uuid = Uuid::uuid4();
                $nameFile = $request->input('inputNome') . $var_uuid . '.' . $request->file('inputGroupFile01')->extension();
                $path_save = $request->file('inputGroupFile01')->storeAs('uploads/formcontact' , $nameFile);
                //dd($path_save);
            }    
            //Adicionando ao array o caminho do arquivo enviado ao storage
            // para ser anexado ao email
            //array_push($request, $path_save);
            $request['path_file'] = $path_save;
            //dd($request);

            $dbform = $this->formatcontact;
            $dbform->nome = $nome;
            $dbform->email = $email;
            $dbform->telefone = $telefone;
            $dbform->mensagem = $mensagem;
            
            $dbform->url_file = $path_save;
            $dbform->ip_user = $ip_user;
            $dbform->data = $dataup;
            $dbform->hora = $horaup;
            $dbform->save();

            Mail::to('to@email.com')->send(new ContatoEmail($request));
            
            $request->session()->flash('success', 'Solicitacao de contato enviada com sucesso. Entraremos em contato.');
            return redirect()->back();

        
    }
}
