<?php

namespace App\Http\Controllers;

use Validator;
use File;
use DB;
use Exception;

use Carbon\Carbon;
use DateTime;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;


use Illuminate\Http\Request;

use App\Models\AuditTrail;
use App\Models\MapArea;
use App\Models\NewspaperPages;


use App\Models\Connections;
use App\Models\UploadPDF;
use App\Models\Newspaper;
use App\Models\Editions;


use App\Models\Advterisement;

class PublicViewController extends Controller
{
    //

    public function newspaper($id)
    {
        if ($id == 'AmarAsom') {
            $paperId = 1;
        }
        if ($id == 'PurvanchalPrahari') {
            $paperId = 2;
        }
        if ($id == 'TheMeghalayaGuardian') {
            $paperId = 3;
        }
        if ($id == 'TheNorthEastTimes') {
            $paperId = 4;
        }

        $date = date('Y-m-d') ;
        $pages = NewspaperPages::select()->where('date', $date)->where('paperId', $paperId)->orderBy('pageNo', 'ASC')->get();
        $j = 0;
        $maxValues = 10;
        if (count($pages) == 0  && $j < $maxValues) {
            while (count($pages) == 0 && $j < $maxValues) {
                $date = date('Y-m-d', strtotime("-".$j." days"));
                $pages = NewspaperPages::select()->where('date', $date)->where('paperId', $paperId)->orderBy('pageNo', 'ASC')->get();
                $j++;
            }
        }
        $paperName = $this->paperName($paperId);
        $dateFormated = DateTime::createFromFormat("Y-m-d", $date);
        $dateFormated = $dateFormated->format("d-m-Y");



        if (count($pages) == 0) {
            return view('adminPages.readNewspaper', [
                'title' => 'GL Publications | AdminPortal |  Dashboard',
                'paperName'=>$paperName,
                'paperId'=>$paperId,
                'mapData'=> array(),
                'allpages'=> array(),
                'date'=>$dateFormated,
                'frontPage'=> '',
                'pageCode' => $id,
                'alertDescription' => 'No data for this newspaper is found',
                'alertTitle' => 'No data',
                'alertIcon' => 'error'
            ]);
        } else {
            return view('adminPages.readNewspaper', [
                'title' => 'GL Publications | AdminPortal |  Dashboard',
                'paperName'=>$paperName,
                'mapData'=> array(),
                'paperId'=>$paperId,
                'allpages'=> $pages,
                'frontPage'=> $pages[0],
                'date'=>$dateFormated,
                'pageCode' => $id,

                // 'alertDescription' => '',
                // 'alertTitle' => 'Something went wrong',
                // 'alertIcon' => 'error'
            ]);
        }
    }
}
