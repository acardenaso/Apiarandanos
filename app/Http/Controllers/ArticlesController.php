<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use App\Article;
use App\Category;
use App\SubCategory;
use App\Operation;
use App\OperationDetail;
use App\ArticleState;
use App\Berrie;
use App\Worker;
use App\App;
use Toastr;


class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::paginate(10);
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $operations = Operation::all();
        $article_states = ArticleState::all();
        

        return view('admin.inventories.index')->with(compact('articles','categories','subcategories','operations','article_states'));
    }

    public function gpdfa(Request $request)
    {
        $filter = $request->input('filter');
        $articles;
        if($filter){
            $articles = Article::leftjoin('categories','articles.category_id','=','categories.id')
            ->leftjoin('sub_categories','articles.sub_category_id','=','sub_categories.id')
            ->leftjoin('users','articles.user_id','=','users.id')
            ->leftjoin('article_states','articles.article_state_id','=','article_states.id')
            ->where('categories.categoria', 'like',"%$filter%")
            ->orwhere('descripcion', 'like',"%$filter%")
            ->orwhere('cant', 'like',"%$filter%")
            ->orwhere('min_stock', 'like',"%$filter%")
            ->orwhere('sub_categories.subcategoria', 'like',"%$filter%")
            ->orwhere('users.name', 'like',"%$filter%")
            ->orwhere('article_states.estado','like',"%$filter%")->get();
        }else{

            $articles = Article::all();
        }
        

        $view = \View::make('admin.inventories.pdf', compact('articles'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');
    }

    public function gpdfq(Request $request)
    {
        $filter = $request->input('filter');
        $articles;
        if($filter){
            $articles = Article::where('articles.category_id','=','10')
            ->join('sub_categories','articles.sub_category_id','=','sub_categories.id')
            ->where('articles.nombre_articulo', 'like',"%$filter%")
            ->orwhere('articles.descripcion', 'like',"%$filter%")
            ->orwhere('sub_categories.subcategoria', 'like',"%$filter%")
            ->get(); 
            
        }else{

            $articles = Article::join('sub_categories','articles.sub_category_id','=','sub_categories.id')
            ->select('articles.id','articles.nombre_articulo','articles.cant','articles.descripcion','sub_categories.subcategoria')
            ->where('articles.category_id','=','10')
            ->get();
        }
        

        $view = \View::make('admin.chemicals.pdf', compact('articles'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');
    }

    public function gpdfqs(Request $request)
    {
        $filter = $request->input('filter');
        $operations;
        if($filter){
            $operations = Operation::where('operations.operation_type_id','=','2')
            ->where('articles.category_id','=','10')
            ->join('articles','operations.article_id','=','articles.id')
            ->join('operation_details','operations.operation_detail_id','=','operation_details.id')
            ->where('articles.nombre_articulo', 'like',"%$filter%")
            ->orwhere('operation_details.descripcion', 'like',"%$filter%")
            ->get();    
            
        }else{

            $operations = Operation::where('operations.operation_type_id','=','2')
            ->where('articles.category_id','=','10')
            ->join('articles','operations.article_id','=','articles.id')
            ->join('operation_details','operations.operation_detail_id','=','operation_details.id')
            ->get();
        }
        

        $view = \View::make('admin.chemicals.pdfs', compact('operations'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');
    }

    public function showa(Request $request)
    {
        
        $query = $request->input('query');
        $articles = Article::leftjoin('categories','articles.category_id','=','categories.id')
        ->leftjoin('sub_categories','articles.sub_category_id','=','sub_categories.id')
        ->leftjoin('users','articles.user_id','=','users.id')
        ->leftjoin('article_states','articles.article_state_id','=','article_states.id')
        ->select('articles.*','categories.categoria')
        ->where('nombre_articulo', 'like',"%$query%")
        ->orwhere('descripcion', 'like',"%$query%")
        ->orwhere('categories.categoria', 'like',"%$query%")
        ->orwhere('cant', 'like',"%$query%")
        ->paginate(10); 
        
        if(empty($query)){
            
            $title = "ingrese un criterio para la búsqueda";
            Toastr::warning($title);
            return redirect('/admin/inventories/');
        }   
        return view('admin.inventories.index')->with(compact('articles','query'));

        
    }

    public function showq(Request $request)
    {
        $query = $request->input('query'); 

    
        $articles = Article::where('articles.category_id','=','10')
        ->join('sub_categories','articles.sub_category_id','=','sub_categories.id')
        ->where('articles.nombre_articulo', 'like',"%$query%")
        ->orwhere('articles.descripcion', 'like',"%$query%")
        ->orwhere('sub_categories.subcategoria', 'like',"%$query%")
        ->get(); 

        if(empty($query)){
            
            $title = "ingrese un criterio para la búsqueda";
            Toastr::warning($title);
            
            return redirect('/admin/chemicals_in/');
            
        }

        return view('admin.chemicals.chemicals_in')->with(compact('articles','query')); 

    }

    public function showqs(Request $request)
    {
        
        $query = $request->input('query');

        $operations = Operation::where('operations.operation_type_id','=','2')
        ->where('articles.category_id','=','10')
        ->join('articles','operations.article_id','=','articles.id')
        ->join('operation_details','operations.operation_detail_id','=','operation_details.id')
        ->where('articles.nombre_articulo', 'like',"%$query%")
        ->orwhere('operation_details.descripcion', 'like',"%$query%")
     
        ->get();
        
        
        return view('admin.chemicals.chemicals_out')->with(compact('operations','query'));

    }

    public function create()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $article_states = ArticleState::all();
        $user = Auth::user();

        return view('admin.inventories.create')->with(compact('articles','categories','subcategories','article_states','user'));
    }

    public function store(Request $request)
    
    {
        //validar Articulo
        $messages = [
            'nombre_articulo.unique' => 'Este articulo ya se encuentra registrado',
            'category_id.required' => 'Campo categoria es necesario',
            'article_state_id.required' => 'Campo estado es necesario',
            'min_stock.numeric' => 'Campo stock minimo solo numeros',
            'min_stock.numeric' => 'Campo inventario inicial minimo solo numeros',
        ];    

        $rules = [
            'nombre_articulo' => 'unique:articles',
            'category_id' => 'required',
            'article_state_id' => 'required',
            'min_stock' => 'numeric',
        ];

        $this->validate($request, $rules,$messages);

        //crear un nuevo articulo
        
        $articles = new Article();
        $articles->nombre_articulo = $request->input('nombre_articulo');
        $articles->descripcion = $request->input('descripcion');
        $articles->cant = $request->input('cantidad');
        $articles->min_stock = $request->input('min_stock');
        $articles->category_id = $request->input('category_id');
        $articles->sub_category_id = $request->input('sub_category_id');
        $articles->article_state_id = $request->input('article_state_id');
        $articles->user_id = $request->input('user_id');
        $articles->save();//INSERT

        //almacena el articulo_id y la cantidad correspondiente al producto, segun el tipo de operacion, en este caso, entrada
        
        $operations = new Operation();
        $operations->cantidad = $request->input('cantidad');
        $operations->article_id = $articles->id;
        $operations->operation_type_id = '1';
        $operations->save();//INSERT

        $title = "Artículo creado correctamente!";
        Toastr::success($title);

        return redirect('/admin/inventories');
    }

    public function edit($id)
    {
        $categories = Category::orderBy('categoria')->get();
        $subcategories = SubCategory::orderBy('subcategoria')->get();
        $article_states = ArticleState::orderBy('estado')->get();
        $article = Article::find($id);
        $user = Auth::user();

        return view('admin.inventories.edit')->with(compact('article','categories','subcategories','article_states','user'));
    }

    public function update(Request $request, $id)
    {
         //validar Articulo
         $messages = [
            'nombre_articulo.required' => 'Articulo es requerido',
            'category_id.required' => 'Campo categoria es necesario',
            'article_state_id.required' => 'Campo estado es necesario',
            'min_stock.numeric' => 'Campo stock minimo solo numeros',
            'min_stock.numeric' => 'Campo inventario inicial minimo solo numeros',
        ];    

        $rules = [
            'nombre_articulo' => 'required',
            'category_id' => 'required',
            'article_state_id' => 'required',
            'min_stock' => 'numeric',
        ];

        $this->validate($request, $rules,$messages);     

        //Editar articulo en la bd, edita todos los campos, menos la cantidad, ya que ese campo es 
        //una operación realizada con las entradas y salidas, de la tabla operations
    
        $articles = Article::find($id);
        $articles->nombre_articulo = $request->input('nombre_articulo');
        $articles->descripcion = $request->input('descripcion');
        $articles->min_stock = $request->input('min_stock');
        $articles->category_id = $request->input('category_id');
        $articles->sub_category_id = $request->input('sub_category_id');
        $articles->article_state_id = $request->input('article_state_id');
        $articles->user_id = $request->input('user_id');
        $articles->save();//UPDATE

        $title = "Artículo editado correctamente!";
        Toastr::success($title);

        return redirect('/admin/inventories');
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();

        $title = "Artículo eliminado correctamente!";
        Toastr::success($title);

        return back(); 
    }

    //listado de bandejas prestadas

    public function trays_out()
    {
        $operations = DB::table('operations')
        ->leftjoin('articles','operations.article_id','=','articles.id')
        ->leftjoin('operation_details','operations.operation_detail_id','=','operation_details.id')
        ->leftjoin('berries','operation_details.berrie_id','=','berries.id')
        ->select('operations.id','operations.cantidad','operation_details.folio','operation_details.fecha','articles.nombre_articulo','berries.nombre_berrie')
        ->where('articles.category_id','=','9')
        ->where('operations.operation_type_id','=','2')
        ->get();

        return view('admin.trays.trays_out')->with(compact('operations'));    
    }
    
    //formulario de prestamo de bandejas
    public function tray_out(Request $request,$article_id)
    {
        $articles = Article::find($article_id);
        $berries = Berrie::all();
        $workers = Worker::all();
        
        
        $entradas = DB::table('operations')
        ->select(DB::raw('SUM(cantidad) as cantidad'))
        ->where('operations.article_id','=',$article_id)
        ->where('operations.operation_type_id','=','1')
        ->first();
        
        $salidas = DB::table('operations')
        ->select(DB::raw('SUM(cantidad) as cantidad'))
        ->where('operations.article_id','=',$article_id)
        ->where('operations.operation_type_id','=','2')
        ->first();
             
        $stock = $entradas->cantidad-$salidas->cantidad;   
               
        return view('admin.trays.tray_out')->with(compact('articles','berries','workers','stock')); 
    }

    //guarda en db las bandejas prestadas
    public function tray_out_store(Request $request,$id)
    
    {
         //validar trabajador
         $messages = [
            'folio.numeric' => 'Campo folio solo numeros',
            'cantidad.numeric'  => 'Campo cantidad solo numeros',
            'berrie_id.required'  => 'Campo berrie es requerido',     
        ];    

        $rules = [
            'folio' => 'numeric',
            'cantidad'  => 'numeric',
            'berrie_id' => 'required',
        ];

        $this->validate($request, $rules,$messages);
       
        if($request->input('cantidad')>= $request->input('new_cant')){

            $title = "La cantidad solicitada es mayor al stock diponible";
            Toastr::error($title);

            return redirect()->back();

        }else
        {

        $operation_details = new OperationDetail();
        $operation_details->folio = $request->input('folio');
        $operation_details->berrie_id = $request->input('berrie_id');
        $operation_details->worker_id = $request->input('worker_id');
        $operation_details->fecha = $request->input('fecha');
        $operation_details->descripcion = $request->input('descripcion');
        $operation_details->save();//INSERT            

        $operations = new Operation();
        $operations->cantidad = $request->input('cantidad');
        $operations->operation_type_id = '2';
        $operations->operation_detail_id = $operation_details->id;
        $operations->article_id = $request->input('article_id');
        $operations->save();//INSERT

        $articles = Article::find($id);
        $articles->cant = $request->input('new_cant')-$operations->cantidad = $request->input('cantidad');
        $articles->save();//SAVE

        return redirect('/admin/trays_out');
        }
    }

    //lstado de bandejas devueltas
    public function trays_return()
    {
        $operations = DB::table('operations')
        ->leftjoin('articles','operations.article_id','=','articles.id')
        ->leftjoin('operation_details','operations.operation_detail_id','=','operation_details.id')
        ->leftjoin('berries','operation_details.berrie_id','=','berries.id')
        ->select('operations.id','operations.cantidad','operation_details.folio','operation_details.fecha','articles.nombre_articulo','berries.nombre_berrie')
        ->where('articles.category_id','=','9')
        ->where('operations.operation_type_id','=','2')
        ->get();

        return view('admin.trays.trays_return')->with(compact('operations')); 

    }


    //formulario de devolucion de bandejas
    public function tray_return(Request $request,$id)
    {
        $berries = Berrie::all();
        $workers = Worker::all();

        $operations = DB::table('operations')
        ->leftjoin('articles','operations.article_id','=','articles.id')
        ->leftjoin('operation_details','operations.operation_detail_id','=','operation_details.id')
        ->leftjoin('berries','operation_details.berrie_id','=','berries.id')
        ->select('operations.id','operations.cantidad','operation_details.folio','operation_details.fecha','operation_details.descripcion','operation_details.berrie_id','operation_details.worker_id','articles.nombre_articulo','berries.nombre_berrie')
        ->where('articles.category_id','=','9')
        ->where('operations.operation_type_id','=','2')
        ->where('operations.id','=',$id)
        ->first();

        return view('admin.trays.tray_return')->with(compact('operations','berries','workers'));

    }

    //formulario detalle de prestamo de bandejas
    public function tray_out_view(Request $request,$id)
    {
        $berries = Berrie::all();
        $workers = Worker::all();

        $operations = DB::table('operations')
        ->leftjoin('articles','operations.article_id','=','articles.id')
        ->leftjoin('operation_details','operations.operation_detail_id','=','operation_details.id')
        ->leftjoin('berries','operation_details.berrie_id','=','berries.id')
        ->select('operations.id','operations.cantidad','operation_details.folio','operation_details.fecha','operation_details.descripcion','operation_details.berrie_id','operation_details.worker_id','articles.nombre_articulo','berries.nombre_berrie')
        ->where('articles.category_id','=','9')
        ->where('operations.operation_type_id','=','2')
        ->where('operations.id','=',$id)
        ->first();

        return view('admin.trays.tray_out_view')->with(compact('operations','berries','workers'));

    }

     //formulario detalle de edición guía de despacho PENDIENTE
     public function tray_out_edit(Request $request,$id)
     {
         $berries = Berrie::all();
         $workers = Worker::all();
 
         $operations = DB::table('operations')
         ->leftjoin('articles','operations.article_id','=','articles.id')
         ->leftjoin('operation_details','operations.operation_detail_id','=','operation_details.id')
         ->leftjoin('berries','operation_details.berrie_id','=','berries.id')
         ->select('operations.id','operations.cantidad','operation_details.folio','operation_details.fecha','operation_details.descripcion','operation_details.berrie_id','operation_details.worker_id','articles.nombre_articulo','berries.nombre_berrie')
         ->where('articles.category_id','=','9')
         ->where('operations.operation_type_id','=','2')
         ->where('operations.id','=',$id)
         ->first();
 
         return view('admin.trays.tray_out_edit')->with(compact('operations','berries','workers'));
 
     }
 

    //listado de bandejas almacenadas en bd
    public function trays_in()
    {
        $articles = DB::table('articles')
        ->where('articles.category_id','=','9')
        ->paginate(10);
        return view('admin.trays.trays_in')->with(compact('articles'));   
    }

    //guarda en la db la devolución de bandejas
    public function trays_in_store(Request $request,$id)
    
    {
        $operations = new Operation();
        $operations->folio = $request->input('folio');
        $operations->cantidad = $request->input('cantidad');
        $operations->operation_type_id = '2';
        $operations->article_id = $request->input('article_id');
        $operations->berrie_id = $request->input('berrie_id');
        $operations->fecha = $request->input('fecha');
        $operations->save();//INSERT

        $articles = Article::find($id);
        $articles->stock = $request->input('stock')-$operations->cantidad = $request->input('cantidad');
        $articles->save();//UPDATE
        

        return redirect('/admin/inventories');
    }

    //listado de salida de productos químicos
    
        public function chemicals_out()
        {
            
            $operations = DB::table('operations')
            ->leftjoin('articles','operations.article_id','=','articles.id')
            ->leftjoin('operation_details','operations.operation_detail_id','=','operation_details.id')
            ->leftjoin('berries','operation_details.berrie_id','=','berries.id')
            ->select('operations.id','operations.cantidad','operation_details.folio','operation_details.fecha','operation_details.descripcion','articles.nombre_articulo','berries.nombre_berrie')
            ->where('articles.category_id','=','10')
            ->where('operations.operation_type_id','=','2')
            ->get();
            
    
            return view('admin.chemicals.chemicals_out')->with(compact('operations'));    
        }
        
        //formulario de prestamo de bandejas
        public function chemical_out(Request $request,$article_id)
        {
            $articles = Article::find($article_id);
            
            $entradas = DB::table('operations')
            ->select(DB::raw('SUM(cantidad) as cantidad'))
            ->where('operations.article_id','=',$article_id)
            ->where('operations.operation_type_id','=','1')
            ->first();
            
            $salidas = DB::table('operations')
            ->select(DB::raw('SUM(cantidad) as cantidad'))
            ->where('operations.article_id','=',$article_id)
            ->where('operations.operation_type_id','=','2')
            ->first();
                 
            $stock = $entradas->cantidad-$salidas->cantidad;   
                   
            return view('admin.chemicals.chemical_out')->with(compact('articles','stock')); 
        }
    
        //guarda en db las las salidas de productos quimicos
        public function chemicaloutstore(Request $request,$id)
        
        {
                //validar prestamo de bandejas
         $messages = [
            'cantidad.numeric' => 'Campo cantidad de salida solo numeros',
            'description.alpha'  => 'Campo sector solo letras',    
        ];    

        $rules = [
            'cantidad' => 'numeric',
            'description'  => 'alpha',
        ];
        $this->validate($request, $rules,$messages);

        $operation_details = new OperationDetail();
        $operation_details->berrie_id = $request->input('berrie_id');
        $operation_details->worker_id = $request->input('worker_id');
        $operation_details->fecha = $request->input('fecha');
        $operation_details->descripcion = $request->input('descripcion');
        $operation_details->save();//INSERT     

        $operations = new Operation();
        $operations->cantidad = $request->input('cantidad');
        $operations->operation_type_id = '2';
        $operations->operation_detail_id = $operation_details->id;
        $operations->article_id = $request->input('article_id');
        $operations->save();//INSERT

        $articles = Article::find($id);
        $articles->cant = $request->input('new_cant')-$operations->cantidad = $request->input('cantidad');
        $articles->save();//UPDATE
        
             
            $title = "Salida realizada correctamente!";
            Toastr::success($title);
            return redirect('/admin/chemicals_out');
        }
    
        //listado de quimicos almacenados en bd
        public function chemicals_in()
        {   
            /*$operations = DB::table('operations')
            ->leftjoin('articles','operations.article_id','=','articles.id')
            ->leftjoin('sub_categories','articles.sub_category_id','=','sub_categories.id')
            ->select('operations.id','articles.nombre_articulo','articles.cant','articles.descripcion','sub_categories.subcategoria')
            ->where('articles.category_id','=','10')
            ->where('operations.operation_type_id','=','2')
            ->get();*/

            $articles = DB::table('articles')
            ->leftjoin('sub_categories','articles.sub_category_id','=','sub_categories.id')
            ->select('articles.*','sub_categories.subcategoria')
            ->where('articles.category_id','=','10')
            ->get();
            
    
            return view('admin.chemicals.chemicals_in')->with(compact('articles','subcategories'));  
           
        }
    
        //detalle de quimicos
        public function chemicalin($id)
        {
            $berries = Berrie::all();
            $operations = Operation::all();
            $articles = Article::find($id);
           
            $entradas = DB::table('operations') 
            ->select(DB::raw('SUM(cantidad) as cantidad'))
            ->where('operations.article_id','=',$id)
            ->where('operations.operation_type_id','=','1')
            ->first();
            
            $salidas = DB::table('operations')
            ->select(DB::raw('SUM(cantidad) as cantidad'))
            ->where('operations.article_id','=',$id)
            ->where('operations.operation_type_id','=','2')
            ->first();
                 
            $stock = $entradas->cantidad-$salidas->cantidad;   
         
            return view('admin.trays.tray_in')->with(compact('articles','berries','operations','stock'));
    
        }
    
        //salida de quimicos
        public function chemicalsinstore(Request $request,$id)
        
        {
            $operation_details = new OperationDetail();
            $operation_details->berrie_id = $request->input('berrie_id');
            $operation_details->worker_id = $request->input('worker_id');
            $operation_details->fecha = $request->input('fecha');
            $operation_details->descripcion = $request->input('descripcion');
            $operation_details->save();//INSERT     

            $operations = new Operation();
            $operations->cantidad = $request->input('cantidad');
            $operations->operation_type_id = '1';
            $operations->operation_detail_id = $operation_details->id;
            $operations->article_id = $request->input('article_id');
            $operations->save();//INSERT
    
            $articles = Article::find($id);
            $articles->cant = $request->input('stock')+$operations->cantidad = $request->input('cantidad');
            $articles->save();//UPDATE
            

    
            return redirect('/admin/inventories');
        }


    //abrir formulario de reabastecimiento de articulos
    public function re($id)
    {
        $articles = Article::find($id);

        $entradas = DB::table('operations')
        ->select(DB::raw('SUM(cantidad) as cantidad'))
        ->where('operations.article_id','=',$id)
        ->where('operations.operation_type_id','=','1')
        ->first();
        
        $salidas = DB::table('operations')
        ->select(DB::raw('SUM(cantidad) as cantidad'))
        ->where('operations.article_id','=',$id)
        ->where('operations.operation_type_id','=','2')
        ->first();
             
        $stock = $entradas->cantidad-$salidas->cantidad;   

        return view('admin.inventories.re')->with(compact('articles','stock'));
    }

    //guarda en bd el reabastecimiento de los artículos
    public function res(Request $request,$id)
    
    {
        $operations = new Operation();
        $operations->cantidad = $request->input('cantidad');
        $operations->article_id = $request->input('article_id');
        $operations->operation_type_id = '1';
        $operations->save();//INSERT


        $articles = Article::find($id);
        $articles->cant = $request->input('new_cant')+$operations->cantidad = $request->input('cantidad');
        $articles->save();//SAVE
        
        $title = "Reabastecimiento realizado correctamente!";
        Toastr::success($title);
        return redirect('/admin/inventories');
    }
}
