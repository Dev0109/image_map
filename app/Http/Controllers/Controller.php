<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;


    public function paperName($paperId)
    {
        if ($paperId == 1) {
            return "Amar Asom";
        }
        if ($paperId == 2) {
            return "Purvanchal Prahari";
        }
        if ($paperId == 3) {
            return "The Meghalaya Guardian";
        }
        if ($paperId == 4) {
            return "The NorthEast Times";
        }
    }

    public function paperCode($paperId)
    {
        if ($paperId == 1) {
            return "AmarAsom";
        }
        if ($paperId == 2) {
            return "PurvanchalPrahari";
        }
        if ($paperId == 3) {
            return "TheMeghalayaGuardian";
        }
        if ($paperId == 4) {
            return "TheNorthEastTimes";
        }
    }
}
