<?php

namespace App\Http\Controllers;

use App\Models\Cursos;
use Illuminate\Http\Request;
use \Intervention\Image\Facades\Image;

class CursosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $page = 'Cursos';
        $title = 'Listar Cursos';
        return view('admin.cursos.index', compact('page', 'title'));
    }

    public function datatable(Request $request)
    {

        $columns = array(
            0 => 'title',
            1 => 'description',
            3 => 'status',
            4 => 'acoes',
        );

        $totalData = Cursos::get()->where("status_db", "1")->count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
            $datatables = Cursos::where("status_db", "1")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        }
        else {
            $search = $request->input('search.value');

            $datatables =  Cursos::where("status_db", "1")
                ->where('title', 'LIKE', '%'.$search.'%')
                ->orWhere('description', 'LIKE', '%'.$search.'%')
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

            $totalFiltered = Cursos::where("status_db", "1")
                ->count();
        }

        $data = array();
        if (!empty($datatables)) {
            foreach ($datatables as $key => $datatable) {
                if ($datatable->status) {
                    $newData['status'] = 'Ativo';
                }else{
                    $newData['status'] = 'Inativo';
                }
                $newData['title'] = $datatable->title;
                $newData['description'] = $datatable->description;
                $newData['acoes'] = '<div class="acoes"><a class="edit bg-warning" href="'.route('admin.cursos.edit', ['cursos'=>$datatable->id_curso]).'"><i class="fa fa-edit"></i></a><a data-csrf="'.csrf_token().'" data-rota="'.route('admin.cursos.destroy', ['cursos'=>$datatable->id_curso]).'" data-title="'.$datatable->title.'" data-id="'.$datatable->id_curso.'" class="deleta bg-danger"><i class="fa fa-trash"></i></a></div>';
                $data[] = $newData;
            }
        }
        $json_data = array(
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data,
        );
        return json_encode($json_data);
    }

    public function create()
    {
        $page = 'Cursos';
        $method = 'post';
        $route = 'admin.cursos.store';
        $title = 'Novo Curso';

        return view('admin.cursos.form', compact('page', 'method', 'route', 'title'));
    }

    public function store(Request $request)
    {
        $curso = new Cursos();
        $curso->title = $request->title;
        $curso->description = $request->description;
        $curso->status = $request->status;
        $curso->status_db = 1;
        $curso->save();
        return redirect()->route('admin.cursos.index');
    }

    public function edit(Cursos $cursos)
    {
        $page = 'Cursos';
        $method = 'put';
        $route = 'admin.cursos.update';
        $title = 'Editar Curso';

        return view('admin.cursos.form', compact('page', 'method', 'route', 'title', 'cursos'));
    }

    public function update(Request $request, Cursos $cursos)
    {
        $cursos->title = $request->title;
        $cursos->description = $request->description;
        $cursos->status = $request->status;

        $cursos->save();
        return redirect()->route('admin.cursos.index');
    }

    public function destroy(Cursos $cursos)
    {
        $cursos->status_db = 0;
        if($cursos->save()){
            return json_encode(array('status' => true));
        }else{
            return json_encode(array('status' => false));
        }
    }
}
