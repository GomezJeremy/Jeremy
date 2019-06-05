<?php

namespace App\Http\Controllers\Admin;

use App\User;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

use Charts;
//use Arcanedev\LogViewer\Entities\Log;
//use Arcanedev\LogViewer\Entities\LogEntry;
use Carbon\Carbon;
use App\Afiliado;
use App\RecepcionMateriaPrima;
use App\Apiario;
use App\Cera;
use App\Estanon;
use App\Ubicacion;
use App\Product;
use App\DetalleIngreso;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use DB;
use Alert;
\Carbon\Carbon::setLocale('es'); 
class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counts = [
            'users' => \DB::table('users')->count(),
           // 'users_unconfirmed' => \DB::table('users')->where('confirmed', false)->count(),
           // 'users_inactive' => \DB::table('users')->where('active', false)->count(),
           'protected_pages' => 0,
           'afi' => \DB::table('afiliados')->count(),
           'recep' =>\DB::table('recepcion_materia_primas')->count(),
           'api'=>\DB::table('apiarios')->count(),
           'cera'=>\DB::table('ceras')->count(),
           'product'=>\DB::table('products')->count(),
           
        ];
        $api =\DB::select("
SELECT 
   u.Descripcion
FROM apiarios as a , ubicacions as u
where a.ubicacion_id = u.id
");
        $chart_options = [
            'chart_title' => 'Apiarios Por Ubicación',
            'report_type' => 'group_by_string',
            'model' => 'App\Ubicacion',
            'group_by_field' =>'Descripcion',
            'chart_type' => 'pie',
            'filter_field' => 'created_at',
            //'filter_period' => 'month', // show users only registered this month
        ];

        $chart2 = new LaravelChart($chart_options);

        $users = User::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
        ->get();
$chart = Charts::database($users, 'bar', 'highcharts')
      ->title("Monthly new Register Users")
      ->elementLabel("Total Users")
      ->dimensions(1000, 500)
      ->responsive(false)
      ->groupByMonth(date('Y'), true);

//Afiliados CHART 

$afi = Afiliado::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
    				->get();
        $chart3 = Charts::database($afi, 'bar', 'highcharts')
			      ->title("Registro Mensual de Afiliados nuevos ")
			      ->elementLabel("Total Afiliados")
			      ->dimensions(1000, 500)
			      ->responsive(false)
                  ->groupByMonth(date('Y'), true);
                  ////////////////////////////////////
        $chart1 = new LaravelChart($chart_options);
        foreach (\Route::getRoutes() as $route) {
            foreach ($route->middleware() as $middleware) {
                if (preg_match("/protection/", $middleware, $matches)) $counts['protected_pages']++;
            }
        }
        

       
        Alert::success('Bienvenido!')->persistent("Close");

        return view('dashboard', ['counts' => $counts] , compact('chart', 'chart2', 'chart3', 'chart4'));
       
        
    }


    public function indexRecepcion(){

        $counts = [
            
           'afi' => \DB::table('afiliados')->count(),
           'recep' =>\DB::table('recepcion_materia_primas')->count(),
           'api'=>\DB::table('apiarios')->count(),
           'cera'=>\DB::table('ceras')->count(),
           'product'=>\DB::table('products')->count(),
           'ingreso'=>\DB::table('detalle_ingreso')->sum('precio'),
           
           
        ]; 

//Recepcion chart
$chart_options = [
    'chart_title' => 'Recepción por día',
    'report_type' => 'group_by_date',
    'model' => 'App\RecepcionMateriaPrima',
    'group_by_field' => 'created_at',
    'group_by_period' => 'day',
    'chart_type' => 'bar',
];
$chart = new LaravelChart($chart_options);

$recep = RecepcionMateriaPrima::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
    				->get();
        $chart2 = Charts::database($recep, 'line', 'highcharts')
			      ->title("Registro Mensual de Recepciones ")
			      ->elementLabel("Total Recepciones")
			      ->dimensions(1000, 500)
			      ->responsive(false)
                  ->groupByMonth(date('Y'), true);

 //RECEPCION ANUAL 

                
$chart_options = [
    'chart_title' => 'Recepción por año',
    'report_type' => 'group_by_date',
    'model' => 'App\RecepcionMateriaPrima',
    'group_by_field' => 'created_at',
    'group_by_period' => 'year',
    'chart_type' => 'line',
];
$chart3 = new LaravelChart($chart_options);
        return view('chartRecepcion' ,['counts' => $counts], compact('chart', 'chart2', 'chart3'));
    }

 

    //CHART DE INGRESO//

    public function indexIngreso(){

        $counts = [
            
           'afi' => \DB::table('afiliados')->count(),
           'recep' =>\DB::table('recepcion_materia_primas')->count(),
           'product'=>\DB::table('products')->count(),
          'ingreso'=>\DB::table('detalle_ingreso')->sum('precio'),
           
           
           
        ]; 

//Ingreso dia chart
$chart_options = [
    'chart_title' => 'Ingreso por día',
    'report_type' => 'group_by_date',
    'model' => 'App\DetalleIngreso',
    'group_by_field' => 'created_at',
    'group_by_period' => 'day',
    'aggregate_function' => 'sum',
    'aggregate_field' => 'Precio',
    'chart_type' => 'line',
];
$chart3 = new LaravelChart($chart_options);

//Ingreso por mes
$chart_options = [
    'chart_title' => 'Ingreso por mes',
    'report_type' => 'group_by_date',
    'model' => 'App\DetalleIngreso',
    'group_by_field' => 'created_at',
    'group_by_period' => 'month',
    'aggregate_function' => 'sum',
    'aggregate_field' => 'Precio',
    'chart_type' => 'line',
    'filter_field' => 'created_at',
    'filter_days' => 30, // muestra los ultimos 30 dias 
];
$chart2 = new LaravelChart($chart_options);
 
//Chart ingreso por anual 
$chart_options = [
    'chart_title' => 'Ingreso por año',
    'report_type' => 'group_by_date',
    'model' => 'App\DetalleIngreso',
    'group_by_field' => 'created_at',
    'group_by_period' => 'year',
    'aggregate_function' => 'sum',
    'aggregate_field' => 'Precio',
    'chart_type' => 'line',
    
];
$chart4 = new LaravelChart($chart_options);
        return view('chartIngreso' ,['counts' => $counts], compact('chart3', 'chart2', 'chart4'));
    }




    public function getRegistrationChartData()
    {

        $data = [
            'registration_form' => User::whereDoesntHave('providers')->count(),
            'google' => User::whereHas('providers', function ($query) {
                $query->where('provider', 'google');
            })->count(),
            'facebook' => User::whereHas('providers', function ($query) {
                $query->where('provider', 'facebook');
            })->count(),
            'twitter' => User::whereHas('providers', function ($query) {
                $query->where('provider', 'twitter');
            })->count(),
        ];

        return response($data);
    }

  
}
