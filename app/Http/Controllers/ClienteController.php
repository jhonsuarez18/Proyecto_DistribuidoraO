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
                //dd($request);
                if($request->sit==1){
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
                        $person = New Persona();

                        $person->idUser = null;
                        $person->cPDId = $idcpd;
                        $person->pNombre = $request->pnombre;
                        $person->sNombre = $request->snombre;
                        $person->apPaterno = $request->appaterno;
                        $person->apMaterno = $request->apmaterno;
                        $person->numeroDoc = $request->dni;
                        $person->tipoDoc = $request->tipdoc;
                        $person->direccion = $request->direccion;
                        $person->referencia = $request->referencia;
                        $person->fecNac = date('Y-m-d', strtotime($request->fecNac));
                        $person->fecActualiza = UtilController::fecha();;
                        $person->usuActuali = Auth::user()->id;
                        $person->usuReg = Auth::user()->id;
                        $person->fecCreacion = UtilController::fecha();
                        $person->telefono = $request->telefo;
                        $person->save();
                        $idpersona= $person->idPersona;

                        $clien = new Cliente();
                        $clien->idPersona =$idpersona;
                        $clien->clUsuReg = Auth::user()->id;
                        $clien->clFecCrea = UtilController::fecha();
                        $clien->save();
                    }else{
                        $person = New Persona();

                        $person->idUser = null;
                        $person->idDistrito = $request->iddist;
                        $person->pNombre = $request->pnombre;
                        $person->sNombre = $request->snombre;
                        $person->apPaterno = $request->appaterno;
                        $person->apMaterno = $request->apmaterno;
                        $person->numeroDoc = $request->dni;
                        $person->tipoDoc = $request->tipdoc;
                        $person->direccion = $request->dir;
                        $person->referencia = $request->referencia;
                        $person->fecNac =date('Y-m-d', strtotime($request->fecNac));
                        $person->fecActualiza = UtilController::fecha();
                        $person->usuActuali = Auth::user()->id;
                        $person->usuReg = Auth::user()->id;
                        $person->fecCreacion = UtilController::fecha();
                        $person->telefono = $request->telefo;
                        $person->save();
                        $idpersona= $person->idPersona;

                        $clien = new Cliente();
                        $clien->idPersona =$idpersona;
                        $clien->clUsuReg = Auth::user()->id;
                        $clien->clFecCrea = UtilController::fecha();
                        $clien->save();
                    }
                }else{
                    $clien = new Cliente();
                    $clien->idPersona =$request->idperson;
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
                        $person->idDistrito = null;
                        $person->cPDId = $idcpd;
                    }else{
                        $person->idDistrito = $request->iddist;
                    }
                    $person->pNombre = $request->pnombre;
                    $person->sNombre = $request->snombre;
                    $person->apPaterno = $request->appaterno;
                    $person->apMaterno = $request->apmaterno;
                    $person->numeroDoc = $request->dni;
                    $person->tipoDoc = $request->tipdoc;
                    $person->direccion = $request->dir;
                    $person->referencia = $request->referencia;
                    $person->fecNac = date('Y-m-d', strtotime($request->fecnac));
                    $person->fecActualiza = UtilController::fecha();;
                    $person->usuActuali = Auth::user()->id;
                    $person->usuReg = Auth::user()->id;
                    $person->fecCreacion = UtilController::fecha();
                    $person->telefono = $request->telefo;
                    $person->save();

                    $clien=Cliente::findOrfail($request->idclient);
                    $clien->idPersona =$request->idperson;
                    $clien->clUsuReg = Auth::user()->id;
                    $clien->clFecActualiza = UtilController::fecha();
                    $clien->save();

                }else{
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
                        $person->cPDId = $idcpd;
                    }else{
                        $person->idDistrito = $request->iddist;
                        $person->cPDId = null;
                    }
                    $person->pNombre = $request->pnombre;
                    $person->sNombre = $request->snombre;
                    $person->apPaterno = $request->appaterno;
                    $person->apMaterno = $request->apmaterno;
                    $person->numeroDoc = $request->dni;
                    $person->tipoDoc = $request->tipdoc;
                    $person->direccion = $request->dir;
                    $person->fecNac = date('Y-m-d', strtotime($request->fecnac));
                    $person->fecActualiza = UtilController::fecha();;
                    $person->usuActuali = Auth::user()->id;
                    $person->usuReg = Auth::user()->id;
                    $person->telefono = $request->telefo;
                    $person->save();

                    $clien=Cliente::findOrfail($request->idclient);
                    $clien->idPersona =$request->idpers;
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
            //dd(Cliente::getClientes());
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
}
