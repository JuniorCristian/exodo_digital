<?php

namespace App\Http\Controllers;

use App\Models\Cursos;
use App\Models\Produtos;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProdutosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $page = 'Produtos';
        $title = 'Listar Produtos';
        return view('admin.produtos.index', compact('page', 'title'));
    }

    public function datatable(Request $request)
    {

        $columns = array(
            0 => 'title',
            1 => 'price',
            2 => 'image',
            3 => 'status',
            4 => 'acoes',
        );

        $totalData = Produtos::get()->where("status_db", "1")->count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $datatables = Produtos::where("status_db", "1")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');

            $datatables = Produtos::where("status_db", "1")
                ->where('title', 'LIKE', '%'.$search.'%')
                ->orWhere('description', 'LIKE', '%'.$search.'%')
                ->orWhere('price', 'LIKE', '%'.str_replace('.', '/', str_replace(',', '.', str_replace('/', '', $search))).'%')
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = Produtos::where("status_db", "1")
                ->count();
        }

        $data = array();
        if (!empty($datatables)) {
            foreach ($datatables as $key => $datatable) {
                if ($datatable->status) {
                    $newData['status'] = 'Ativo';
                } else {
                    $newData['status'] = 'Inativo';
                }
                $newData['title'] = $datatable->title;
                $newData['price'] = $datatable->current . number_format($datatable->price, '2', ',', '.');
                $newData['image'] = '<img class="preview" src="' . env('APP_URL') . '/storage/' . $datatable->image . '">';
                $newData['acoes'] = '<div class="acoes"><a class="edit bg-warning" href="' . route('admin.produtos.edit',
                        ['produtos' => $datatable->id_produto]) . '"><i class="fa fa-edit"></i></a><a data-csrf="' . csrf_token() . '" data-rota="' . route('admin.produtos.destroy',
                        ['produtos' => $datatable->id_produto]) . '" data-id="' . $datatable->id_produto . '" data-title="' . $datatable->title . '" class="deleta bg-danger"><i class="fa fa-trash"></i></a></div>';
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
        $page = 'Produto';
        $method = 'post';
        $route = 'admin.produtos.store';
        $title = 'Novo Produto';

        return view('admin.produtos.form', compact('page', 'method', 'route', 'title'));
    }

    public function store(Request $request)
    {

        $filename = 'img_' . $this->urlAmigavel($request->title) . '.' . $request->file('imagem')->extension();
        $path = public_path('storage/produtos/' . $filename);
        Image::make($request->file('imagem'))->crop(intval($request->width), intval($request->height),
            intval($request->x), intval($request->y))->resize('310', (310*intval($request->height))/intval($request->width))->save($path);
        $produto = new Produtos();
        $produto->title = $request->title;
        $produto->description = $request->description;
        $produto->price = floatval(str_replace(',', '.', $request->price));
        $produto->link = $request->link;
        $produto->status = $request->status;
        $produto->current = $request->current;
        $produto->image = 'produtos/' . $filename;
        $produto->status_db = 1;
        $produto->save();
        return redirect()->route('admin.produtos.index');
    }

    public function show(Produtos $produtos)
    {
        //
    }

    public function edit(Produtos $produtos)
    {
        $page = 'Produto';
        $method = 'put';
        $route = 'admin.produtos.update';
        $title = 'Editar Produto';

        return view('admin.produtos.form', compact('page', 'method', 'route', 'title', 'produtos'));
    }

    public function update(Request $request, Produtos $produtos)
    {
        if ($request->file('imagem') !== null) {
            $filename = 'img_' . $this->urlAmigavel($request->title) . '.' . $request->file('imagem')->extension();
            $path = public_path('storage/produtos/' . $filename);
            Image::make($request->file('imagem'))->crop(intval($request->width), intval($request->height),
                intval($request->x), intval($request->y))->resize('310', (310*intval($request->height))/intval($request->width))->save($path);
            $produtos->image = 'produtos/' . $filename;
        }
        $produtos->title = $request->title;
        $produtos->description = $request->description;
        $produtos->price = floatval(str_replace(',', '.', $request->price));
        $produtos->link = $request->link;
        $produtos->status = $request->status;
        $produtos->current = $request->current;

        $produtos->save();
        return redirect()->route('admin.produtos.index');
    }

    public function destroy(Produtos $produtos)
    {
        $produtos->status_db = 0;
        if($produtos->save()){
            return json_encode(array('status' => true));
        }else{
            return json_encode(array('status' => false));
        }
    }
}
