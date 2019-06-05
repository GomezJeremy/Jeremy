<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;
use App\Afiliado;
use App\Apiario;
use DB;

class ChartController extends Controller
{
    //
    public function index()
    {

		
    	$afi = Afiliado::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
    				->get();
        $chart = Charts::database($afi, 'bar', 'highcharts')
			      ->title("Registro Mensual de Afiliados nuevos ")
			      ->elementLabel("Total Afiliados")
			      ->dimensions(1000, 500)
			      ->responsive(false)
				  ->groupByMonth(date('Y'), true);


				  $today_afi = Afiliado::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
				  ->get();
$yesterday_afi = Afiliado::whereDate('created_at', today()->subDays(1))->count();
$afi_2_days_ago = Afiliado::whereDate('created_at', today()->subDays(2))->count();

				  $pie  =	 Charts::database($today_afi,$yesterday_afi,$afi_2_days_ago,'pie', 'highcharts')
				  ->title('My nice chart')
				  ->labels(['Hoy', 'Ayer', 'Hace 2 Dias'])
				  ->values([$today_afi,$yesterday_afi,$afi_2_days_ago])
				  ->dimensions(1000,500)
				  ->responsive(false);
				
        return view('chart',compact('chart', 'pie'));
    }
}
