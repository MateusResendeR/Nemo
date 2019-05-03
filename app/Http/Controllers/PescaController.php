<?php

namespace nemo\Http\Controllers;

use Illuminate\Http\Request;

class PescaController extends Controller
{

	public function __construct(){
		$this->middleware('auth');
  	}

    public function pesca($tanque_id){
			$tanque = \nemo\Tanque::find($tanque_id);	
			//dd($tanque_id);		
			$piscicultura = $tanque->piscicultura;
			date_default_timezone_set('America/Sao_Paulo');
      $data = date('Y-m-d');
      $hora = date('H:i');
    	return view("pescarEspecie", ['data_atual'=>$data,'hora_atual'=>$hora,'tanque'=>$tanque,'piscicultura' => $piscicultura]);
	}
	
	
	public function pescar(Request $request){	 			
		$tanque = \nemo\Tanque::find($request->id_tanque);
		$ciclo = $tanque->ciclos[count($tanque->ciclos)-1];
    $pesca = new \nemo\Pesca();
    $pesca->peso = $request->valor;
    $pesca->data = $request->data;
    $pesca->hora = $request->hora;
    $pesca->ciclo_id = $ciclo->id;
		$pesca->save();
		$tanque->status = "manutencao";
		$tanque->update();
    
    return redirect()->route("tanque.listar", ['id' => $tanque->piscicultura_id]);
      
			
    }
    		
    
}
