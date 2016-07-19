<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class JobController extends Controller
{

    public function __construct(){
        $this->job = new \App\Job;
    }

    public function index()
    {
        //DB::enableQueryLog();

        $clients = DB::table('clients')
            ->where([               
                ['user_id', '=', Auth::user()->id],
            ])->get();

        //Log::info(DB::getQueryLog());

        return view('job.listar', ['clients'  => $clients]);
    }

    public function listar(Request $request)
    {

        Log::info('CAMPOS: '.$request->campos);

        $campos = explode(", ", $request->campos);

        $jobs = DB::table('jobs')
            ->select($campos)
            ->where([
                [$request->campoPesquisa, 'like', "%$request->dadoPesquisa%"],
                ['user_id', '=', Auth::user()->id],
            ])
            ->orderBy($request->ordem, $request->sentido)
            ->paginate($request->itensPorPagina);
        return $jobs;
    }

    public function inserir(Request $request)
    {
        $request->merge(['user_id'=>Auth::user()->id]);//adiciona user_id do usuario no request 
        $data = $request->all();
        //return($data);
        $this->job->create($data);
        return $data;
    }

    public function detalhar($id)
    {
        $job = $this->job->where([
            ['id', '=', $id],
            ['user_id', '=', Auth::user()->id],
        ])->firstOrFail();
        return view('job.detalhar', ['job' => $job]);
    }

    public function alterar(Request $request, $id)
    {
        $job = $this->job->where([
            ['id', '=', $id],
            ['user_id', '=', Auth::user()->id],
        ])->firstOrFail();
        $job->update($request->all());
        return "Gravado com sucesso";
    }

    public function excluir($id)
    {
       
        $job = $this->job->where([
            ['id', '=', $id],
            ['user_id', '=', Auth::user()->id],
        ])->firstOrFail();
        $job->delete();

    }
}
