<?php

namespace App\Http\Controllers;

use App\CentropobladoDistrito;
use App\Cliente;
use App\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $vi = 1;
            return view('intranet.mantenimiento.agregarcliente')->with(array('vi' => $vi));
        } catch (\Exception $e) {
            SErrorController::saveerror($e->getMessage(), "ClienteController", "index");
            return response(array('error' => $e->getMessage()));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                if($request->tipdoc==1){
                    if($request->sit==1){
                        if($request->idcp!=='0'){
                            $centropd=CentroPobladoDistritoController::getExistcPD($request->iddist,$request->idcp);

                            if(count($centropd)==0){
                                $centpd = new CentropobladoDistrito();
                                $centpd->idCentroPoblado = $request->idcp;
                                $centpd->idDt =$request->iddist;
                                $centpd->cPDUsuReg = Auth::user()->id;
                                $centpd->cPDFecCrea = UtilController::fecha();
                                $centpd->save();
                                $idcpd= $centpd->cPDId;
                            }else{
                                foreach ($centropd as $cpd) {
                                    $idcpd=$cpd->cPDId;
                                }
                            }
                            $person = New Persona();

                            $person->idUser = null;
                            $person->cPDId = $idcpd;
                            $person->peNombres = $request->snombre;
                            $person->peAPPaterno = $request->appaterno;
                            $person->peAPMaterno = $request->apmaterno;
                            $person->peNumeroDoc = $request->dni;
                            $person->idTD = $request->tipdoc;
                            $person->peDireccion = $request->direccion;
                            $person->peReferencia = $request->referencia;
                            $person->peFecNac = date('Y-m-d', strtotime($request->fecNac));
                            $person->peFecActualiza = UtilController::fecha();;
                            $person->peUsuActuali = Auth::user()->id;
                            $person->peUsuReg = Auth::user()->id;
                            $person->peFecCreacion = UtilController::fecha();
                            $person->peTelefono = $request->telefo;
                            $person->save();
                            $idpersona= $person->peId;

                            $clien = new Cliente();
                            $clien->idPe =$idpersona;
                            $clien->clUsuReg = Auth::user()->id;
                            $clien->clFecCrea = UtilController::fecha();
                            $clien->save();
                        }else{
                            $person = New Persona();

                            $person->idUser = null;
                            $person->idDt = $request->iddist;
                            $person->peNombres = $request->nombres;
                            $person->peAPPaterno = $request->appaterno;
                            $person->peAPMaterno = $request->apmaterno;
                            $person->peNumeroDoc = $request->dni;
                            $person->idTD = $request->tipdoc;
                            $person->peDireccion = $request->dir;
                            $person->peReferencia = $request->referencia;
                            $person->peFecNac =date('Y-m-d', strtotime($request->fecNac));
                            $person->peFecActualiza = UtilController::fecha();
                            $person->peUsuActuali = Auth::user()->id;
                            $person->peUsuReg = Auth::user()->id;
                            $person->peFecCreacion = UtilController::fecha();
                            $person->peTelefono = $request->telefo;
                            $person->save();
                            $idpersona= $person->peId;

                            $clien = new Cliente();
                            $clien->idPe =$idpersona;
                            $clien->clUsuReg = Auth::user()->id;
                            $clien->clFecCrea = UtilController::fecha();
                            $clien->save();
                        }
                    }else{
                        $clien = new Cliente();
                        $clien->idPe =$request->idperson;
                        $clien->clUsuReg = Auth::user()->id;
                        $clien->clFecCrea = UtilController::fecha();
                        $clien->save();

                    }
                }else{
                    $person = New Persona();

                    $person->idUser = null;
                    $person->idDt = $request->iddist;
                    $person->peNombres = $request->razons;
                    $person->peNumeroDoc = $request->dni;
                    $person->idTD = $request->tipdoc;
                    $person->peDireccion = $request->dir;
                    $person->peReferencia = $request->referencia;
                    $person->peFecActualiza = UtilController::fecha();
                    $person->peUsuActuali = Auth::user()->id;
                    $person->peUsuReg = Auth::user()->id;
                    $person->peFecCreacion = UtilController::fecha();
                    $person->peTelefono = $request->telefo;
                    $person->save();
                    $idpersona= $person->peId;

                    $clien = new Cliente();
                    $clien->idPe =$idpersona;
                    $clien->clUsuReg = Auth::user()->id;
                    $clien->clFecCrea = UtilController::fecha();
                    $clien->save();
                }

            });
            return response()->json(array('error' => 0));

        } catch (\Exception $e) {
            SErrorController::saveerror($e->getMessage(),"ClienteController","store");
            return response()->json(array('error' => $e->getMessage()));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                //dd($request);
                if($request->siti==1){

                    if($request->idcp!=='0'){
                        $centropd=CentroPobladoDistritoController::getExistcPD($request->iddist,$request->idcp);
                        if(count($centropd)==0){
                            $centpd = new CentropobladoDistrito();
                            $centpd->idCentroPoblado = $request->idcp;
                            $centpd->idDistrito =$request->iddist;
                            $centpd->cPDUsuReg = Auth::user()->id;
                            $centpd->cPDFecCrea = UtilController::fecha();
                            $centpd->save();
                            $idcpd= $centpd->cPDId;
                        }else{
                            foreach ($centropd as $cpd) {
                                $idcpd=$cpd->cPDId;
                            }
                        }
                    }
                    $person=Persona::findOrfail($request->idpers);

                    $person->idUser = null;
                    if($request->idcp!=='0'){
                        $person->idDt = null;
                        $person->cPDId = $idcpd;
                    }else{
                        $person->idDt = $request->iddist;
                    }
                    $person->peNombres = $request->nombres;
                    $person->peAPPaterno = $request->appaterno;
                    $person->peAPMaterno = $request->apmaterno;
                    $person->peNumeroDoc = $request->dni;
                    $person->idTD = $request->tipdoc;
                    $person->peDireccion = $request->dir;
                    $person->peReferencia = $request->referencia;
                    $person->peFecNac = date('Y-m-d', strtotime($request->fecnac));
                    $person->peFecActualiza = UtilController::fecha();;
                    $person->peUsuActuali = Auth::user()->id;
                    $person->peUsuReg = Auth::user()->id;
                    $person->peFecCreacion = UtilController::fecha();
                    $person->peTelefono = $request->telefo;
                    $person->save();

                    $clien=Cliente::findOrfail($request->idclient);
                    $clien->idPe =$request->idperson;
                    $clien->clUsuReg = Auth::user()->id;
                    $clien->clFecActualiza = UtilController::fecha();
                    $clien->save();

                }else{
                    if($request->idcp!=='0'){
                        $centropd=CentroPobladoDistritoController::getExistcPD($request->iddist,$request->idcp);

                        if(count($centropd)==0){
                            $centpd = new CentropobladoDistrito();
                            $centpd->idCentroPoblado = $request->idcp;
                            $centpd->idDt =$request->iddist;
                            $centpd->cPDUsuReg = Auth::user()->id;
                            $centpd->cPDFecCrea = UtilController::fecha();
                            $centpd->save();
                            $idcpd= $centpd->cPDId;
                        }else{
                            foreach ($centropd as $cpd) {
                                $idcpd=$cpd->cPDId;
                            }
                        }
                    }
                    $person=Persona::findOrfail($request->idpers);

                    $person->idUser = null;
                    if($request->idcp!=='0'){
                        $person->cPDId = $idcpd;
                    }else{
                        $person->idDt = $request->iddist;
                        $person->cPDId = null;
                    }
                    $person->peNombres = $request->nombres;
                    $person->peAPPaterno = $request->appaterno;
                    $person->peAPMaterno = $request->apmaterno;
                    $person->peNumeroDoc = $request->dni;
                    $person->idTD = $request->tipdoc;
                    $person->peDireccion = $request->dir;
                    $person->peFecNac = date('Y-m-d', strtotime($request->fecnac));
                    $person->peFecActualiza = UtilController::fecha();;
                    $person->peUsuActuali = Auth::user()->id;
                    $person->peUsuReg = Auth::user()->id;
                    $person->peTelefono = $request->telefo;
                    $person->save();

                    $clien=Cliente::findOrfail($request->idclient);
                    $clien->idPe =$request->idpers;
                    $clien->clUsuReg = Auth::user()->id;
                    $clien->clFecActualiza = UtilController::fecha();
                    $clien->save();

                }

            });
            return response()->json(array('error' => 0));

        } catch (\Exception $e) {
            SErrorController::saveerror($e->getMessage(),"ClienteController","update");
            return response()->json(array('error' => $e->getMessage()));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            DB::transaction(function () use ($id) {
                $clien=Cliente::findOrfail($id);

                ($clien->clEst === 1) ? $clien->clEst = 0 : $clien->clEst = 1;
                $clien->clFecCrea = UtilController::fecha();
                $clien->save();
            });
            return response()->json(array('error' => 0));
        } catch (\Exception $e) {
            SErrorController::saveerror($e->getMessage(),"RePacienteController","destroy");
            return response()->json(array('error' => $e->getMessage()));
        }
    }
    function getClienteDni($dni)
    {

        try {
            $client= Cliente::getClienteDni($dni);
            //dd($client);
            $person = Persona::buscarPersonaDni($dni);
            return response()->json(array('error' => 0,'person'=>$person,'cliente'=>$client));
        } catch (\Exception $e) {
            SErrorController::saveerror($e->getMessage(),"Cliente","getClienteDni");
            return response()->json(array('error' => $e->getMessage()));
        }
    }
    public function getClientes(){
        try{
            Return datatables(Cliente::getClientes())->make(true);
        } catch (\Exception $e) {
            return response()->json(array('error' => $e->getMessage()));
        }
    }
    public function obtenerCliente(Request $request)
    {
        $term = $request->input('term');
        return Cliente::obtenerCliente($term);
    }
    public function getApiDni($tipdoc,$ndoc){
         //dd($tipdoc);
        // Datos
        $token = 'apis-token-8102.T8eOCgVKnAqbnBGu7--AaatEblvmWHVG';

        // Iniciar llamada a API
        $curl = curl_init();

        if($tipdoc==="1"){
            // Buscar dni
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.apis.net.pe/v2/reniec/dni?numero=' . $ndoc,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_SSL_VERIFYPEER => 0,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 2,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'Referer: https://apis.net.pe/consulta-dni-api',
                    'Authorization: Bearer ' . $token
                ),
            ));
        }else{
            if($tipdoc==="3"){
                // Buscar ruc sunat
                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://api.apis.net.pe/v2/sunat/ruc?numero=' . $ndoc,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_SSL_VERIFYPEER => 0,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_CUSTOMREQUEST => 'GET',
                    CURLOPT_HTTPHEADER => array(
                        'Referer: http://apis.net.pe/api-ruc',
                        'Authorization: Bearer ' . $token
                    ),
                ));
            }

        }
        $response = curl_exec($curl);

        curl_close($curl);

        // Datos listos para usar
        $persona = json_decode($response);
        //var_dump($persona);
        return response()->json(array('error' => 0,'apicliente'=>$persona));

    }
}
