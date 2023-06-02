<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Local;
use App\Models\Pacient;

class PacientController extends Controller
{
    public function create(){
        $locals = Local::all();
        return view('pacients.create-pacient', ['locals'=>$locals]);
    }   
    public function store(Request $request){
        $pacient = new Pacient;
        $pacient->nome = $request->nome;
        $pacient->data = $request->data;
        $pacient->telefone = $request->telefone;
        $pacient->local_id = $request->local;
        $pacient->endereco = $request->endereco;
        $pacient->observacao = $request->obs;
        $pacient->doencas = $request->doencas;
        $user = auth()->user();
        $pacient->user_id = $user->id;
        $pacient->save(); 
        return redirect('/pacientes')->with ('msg','paciente criado com sucesso!');
     }
     public function dashboard(){
        $user = auth()->user();
        $pacients = DB::table('pacients')
        ->join('locals', 'pacients.local_id', '=', 'locals.id')
        ->orderBy('id', 'DESC')
        ->select('locals.local','pacients.*') 
        ->paginate(12);
        // dd($pacients);
        $exames = Exame::all();
        $pacientsAsParticipant = $user->pacientsAsParticipant;
        return view('pacients.pacients', ['exames' => $exames,'pacients' => $pacients, 'pacientsAsParticipant' => $pacientsAsParticipant]);
    }
}
