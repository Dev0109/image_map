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

class AdminController extends Controller
{
    //

    public function login(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();
        $this->updateAuditTrail('Logged in');
        return redirect()->intended('/dashboard');
    }



    public function dashboard()
    {
        $this->updateAuditTrail('Accessed Dashboard');
        return view('adminPages.dashboard', [
            'title' => 'GL Publications | AdminPortal |  Dashboard',
            // 'alertDescription' => '',
            // 'alertTitle' => 'Cusomer Number Already Exists in our Record.',
            // 'alertIcon' => 'success'
        ]);
    }

    public function updatenewspaper()
    {
        $datetime = new DateTime('tomorrow');
        $formatedDate = $datetime->format('Y-m-d');
        $allPages = NewspaperPages::select()->where('date', $formatedDate)->get();


        return view('adminPages.updatenewspaper', [
            'title' => 'GL Publications | AdminPortal |  Dashboard',
            'allPages'=> $allPages,
            'defaultDate' =>  $formatedDate,
            // 'alertDescription' => '',
            // 'alertTitle' => 'Cusomer Number Already Exists in our Record.',
            // 'alertIcon' => 'success'
        ]);
    }

    public function updateByDate($date)
    {
        $allPages = NewspaperPages::select()->where('date', $date)->get();

        return view('adminPages.updatenewspaper', [
            'title' => 'GL Publications | AdminPortal |  Dashboard',
            'allPages'=> $allPages,
            'defaultDate' => $date,
            // 'alertDescription' => '',
            // 'alertTitle' => 'Cusomer Number Already Exists in our Record.',
            // 'alertIcon' => 'success'
        ]);
    }

    public function updatenewspaperpost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'paperId' => 'required|min:1',
            'edition' => 'required|min:1',
            'pageTitle' => 'required|min:1',
            'publishOn' => 'required|min:1',
            'pageNo' => 'required|numeric|min:1',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:10240',

        ]);
        if ($validator->fails()) {
            return $validator->errors();
        } else {
            $checkExixting = NewspaperPages::select()
            ->where('date', $request->date)
            ->where('paperId', $request->paperId)
            ->where('pageNo', $request->pageNo)
            ->get();
            if (count($checkExixting) == 0) {
                $newImage = "assets/img/".time(). ".".$request->image->extension();
                $path = $request->image->move(public_path('assets/img'), $newImage);

                $create = NewspaperPages::create([
                    'date' => $request->date,
                    'paperId'=>$request->paperId,
                    'edition'=>$request->edition,
                    'pageTitle'=>$request->pageTitle,
                    'publishOn'=>$request->publishOn,
                    'pageNo'=>$request->pageNo,
                    'pageImageUrl'=> urlencode($newImage)

                ]);
                $allPages = NewspaperPages::select()->where('date', $request->date)->get();
                return view('adminPages.updatenewspaper', [
                    'title' => 'GL Publications | AdminPortal |  Dashboard',
                    'allPages'=> $allPages,
                    'defaultDate' => $request->date,
                    // 'alertDescription' => '',
                    // 'alertTitle' => 'Cusomer Number Already Exists in our Record.',
                    // 'alertIcon' => 'success'
                ]);
            } else {
                $paperName = $this->paperName($request->paperId);

                $allPages = NewspaperPages::select()->where('date', $request->date)->get();
                return view('adminPages.updatenewspaper', [
                    'title' => 'GL Publications | AdminPortal |  Dashboard',
                    'allPages'=> $allPages,
                    'defaultDate' => $request->date,
                    'alertDescription' => 'The page number "'.$request->pageNo.'" for "'.$paperName.'"  is already present. Please delete the page for inserting a new one.',
                    'alertTitle' => 'Page already exists',
                    'alertIcon' => 'error'
                ]);
            }
        }
    }

    public function deleteNewPaperImage(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'imageId' => 'required|min:1',

        ]);
        if ($validator->fails()) {
            return $validator->errors();
        } else {
            $getImage = NewspaperPages::select()->where('id', $request->imageId)->get();

            if (count($getImage)==0) {
            } elseif (count($getImage)>0) {
                $image_path = urldecode($getImage[0]->pageImageUrl);
                if (File::exists($image_path)) {
                    File::delete($image_path);
                    $deletePhoto = NewspaperPages::select()->where('id', $request->imageId)->delete();
                    if ($deletePhoto) {
                        $allPages = NewspaperPages::select()->where('date', date('Y-m-d'))->get();
                        return view('adminPages.updatenewspaper', [
                            'title' => 'GL Publications | AdminPortal |  Dashboard',
                            'allPages'=> $allPages,
                            'alertDescription' => '',
                            'alertTitle' => 'Page Deleted Successfully',
                            'alertIcon' => 'success'
                        ]);
                    } else {
                        $allPages = NewspaperPages::select()->where('date', date('Y-m-d'))->get();
                        return view('adminPages.updatenewspaper', [
                            'title' => 'GL Publications | AdminPortal |  Dashboard',
                            'allPages'=> $allPages,
                            'alertDescription' => '',
                            'alertTitle' => 'Something went wrong',
                            'alertIcon' => 'error'
                        ]);
                    }
                }
                $deletePhoto = NewspaperPages::select()->where('id', $request->imageId)->delete();
                if ($deletePhoto) {
                    $allPages = NewspaperPages::select()->where('date', date('Y-m-d'))->get();
                    return view('adminPages.updatenewspaper', [
                        'title' => 'GL Publications | AdminPortal |  Dashboard',
                        'allPages'=> $allPages,
                        'paperCode'=> $id,
                        'alertDescription' => '',
                        'alertTitle' => 'Page Deleted Successfully',
                        'alertIcon' => 'success'
                    ]);
                } else {
                    $allPages = NewspaperPages::select()->where('date', date('Y-m-d'))->get();
                    return view('adminPages.updatenewspaper', [
                        'title' => 'GL Publications | AdminPortal |  Dashboard',
                        'allPages'=> $allPages,
                        'paperCode'=> $id,
                        'alertDescription' => '',
                        'alertTitle' => 'Something went wrong',
                        'alertIcon' => 'error'
                    ]);
                }
            }
        }
    }




    public function viewImage(Request $request)
    {
        $pageId = $request->pageId;

        $singlePages = NewspaperPages::select()->where('id', $pageId)->get();
        $paperId = $singlePages[0]->paperId;
        $paperName = $this->paperName($paperId);

        // return $singlePages;


        $date = $singlePages[0]->date;
        $paperId = $singlePages[0]->paperId;
        $pageNo = $singlePages[0]->pageNo;
        $edition = $singlePages[0]->edition;


        $allMapedArea = MapArea::select()
        ->where('date', $date)
        ->where('paperId', $paperId)
        ->where('pageNo', $pageNo)
        ->get();



        // return $allMapedArea;



        return view('adminPages.viewPage', [
            'title' => 'GL Publications | AdminPortal |  Dashboard',
            'paperName'=>$paperName,
            'singlePage'=>  $singlePages[0],
            'paperId' => $paperId,
            'edition' => $edition,
            'pageNo' => $pageNo,
            'date' => $date,
            'mapAreaData' => $allMapedArea,

            // 'alertDescription' => '',
            // 'alertTitle' => 'Something went wrong',
            // 'alertIcon' => 'error'
        ]);
    }
    // Get Audit Trail
    public function auditTrail()
    {
        $auditTrail = AuditTrail::select('id', 'task', 'IP', 'userId', 'userName', 'created_at')->limit(100)->get();
        return view('adminPages.auditTrail', [
            'title' => 'AdminPortal |  Audirt Trail',
            'auditTrails' => $auditTrail
        ]);
    }

    public function saveMappedArea(Request $request)
    {
        // return  $request->paperId;


        $create = MapArea::create([
        'date' => $request->date,
        'paperId' => $request->paperId,
        'pageNo' => $request->pageNo,
        'description' => $request->description,
        'connection' => 0,
        'x' => $request->x,
        'y' => $request->y,
        'width' => $request->width,
        'height' => $request->height,
        'edition' => $request->edition,
    ]);
        return true;
    }

    public function vnp($paperCode, $date, $pageNo)
    {
        if ($paperCode == 'AmarAsom') {
            $paperId = 1;
        }
        if ($paperCode == 'PurvanchalPrahari') {
            $paperId = 2;
        }
        if ($paperCode == 'TheMeghalayaGuardian') {
            $paperId = 3;
        }
        if ($paperCode == 'TheNorthEastTimes') {
            $paperId = 4;
        }

        $pages = NewspaperPages::select()->where('date', $date)->where('paperId', $paperId)->orderBy('pageNo', 'ASC')->get();
        $paperName = $this->paperName($paperId);
        $dateFormated = DateTime::createFromFormat("Y-m-d", $date);
        $dateFormated = $dateFormated->format("d-m-Y");

        $frontPage =  NewspaperPages::select()->where('date', $date)->where('paperId', $paperId)->where('pageNo', $pageNo)->get();

        return view('adminPages.viewNewspaper', [
            'title' => 'GL Publications | AdminPortal |  Dashboard',
            'paperName'=>$paperName,
            'allpages'=> $pages,
            'date'=>$dateFormated,
            'frontPage'=> $frontPage[0],
            'pageCode' => $paperCode,
            // 'alertDescription' => 'No data for this newspaper is found',
            // 'alertTitle' => 'No data',
            // 'alertIcon' => 'error'
        ]);
    }

    public function viewNewsPaper($id)
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
            return view('adminPages.viewNewspaper', [
                'title' => 'GL Publications | AdminPortal |  Dashboard',
                'paperName'=>$paperName,
                'paperId'=>$paperId,
                'mapData'=> array(),
                'allpages'=> array(),
                'date'=>$dateFormated,
                'frontPage'=> '',
                'pageCode' => $id,
                'pageNo' => 1,
                'alertDescription' => 'No data for this newspaper is found',
                'alertTitle' => 'No data',
                'alertIcon' => 'error'
            ]);
        } else {
            return view('adminPages.viewNewspaper', [
                'title' => 'GL Publications | AdminPortal |  Dashboard',
                'paperName'=>$paperName,
                'mapData'=> array(),
                'paperId'=>$paperId,
                'allpages'=> $pages,
                'frontPage'=> $pages[0],
                'date'=>$dateFormated,
                'pageCode' => $id,
                'pageNo' => 1,

                // 'alertDescription' => '',
                // 'alertTitle' => 'Something went wrong',
                // 'alertIcon' => 'error'
            ]);
        }
    }


    public function viewByDate($date, $paperCode)
    {
        $pages = NewspaperPages::select()->where('date', $date)->where('paperId', $paperCode)
        ->where('date', $date)->orderBy('pageNo', 'ASC')->get();

        $paperName = $this->paperName($paperCode);
        $dateFormated = DateTime::createFromFormat("Y-m-d", $date);
        $dateFormated = $dateFormated->format("d-m-Y");

        if (count($pages) == 0) {
            return view('adminPages.viewNewspaper', [
                'title' => 'GL Publications | AdminPortal |  Dashboard',
                'paperName'=>$paperName,
                'paperId'=>$paperCode,
                'allpages'=> array(),
                'date'=>$dateFormated,
                'frontPage'=> '',
                'pageCode' => 1,
                'alertDescription' => 'No data for this newspaper in this date',
                'alertTitle' => 'No data',
                'alertIcon' => 'error'
            ]);
        } else {
            return view('adminPages.viewNewspaper', [
                'title' => 'GL Publications | AdminPortal |  Dashboard',
                'paperName'=>$paperName,
                'paperId'=>$paperCode,
                'allpages'=> $pages,
                'frontPage'=> $pages[0],
                'date'=>$dateFormated,
                'pageCode' => 1,

                // 'alertDescription' => '',
                // 'alertTitle' => 'Something went wrong',
                // 'alertIcon' => 'error'
            ]);
        }
    }


    public function updateAuditTrail($task)
    {
        $userId = auth()->user()->id;
        $userName = auth()->user()->name;
        $ipAddress = $_SERVER['REMOTE_ADDR'];

        $auditTrail = new AuditTrail();

        $auditTrail->task =$task;
        $auditTrail->IP =$ipAddress;
        $auditTrail->userId = $userId;
        $auditTrail->userName = $userName;
        $auditTrail->save();
    }

    public function getConnections(Request $request)
    {
        $id=1;
        if ($request->id) {
            $id= $request->id;
            $allConnections = Connections::select()->where('from', $id)->get();

            $fromgetTo = MapArea::select()->where('id', $id)->get();
            $frompageNo = $fromgetTo[0]->pageNo;
            $frompaperId = $fromgetTo[0]->paperId;
            $fromdate = $fromgetTo[0]->date;
            $fromgetPaperDetails = NewspaperPages::select()->where('pageNo', $frompageNo)
            ->where('paperId', $frompaperId)
            ->where('date', $fromdate)->get();






            $allConnectedMappedArea = array();


            $allConnectedMappedArea[0]['imageUrl']= urldecode($fromgetPaperDetails[0]->pageImageUrl);
            $allConnectedMappedArea[0]['pageNo']= $frompageNo;
            $allConnectedMappedArea[0]['paperId']= $frompaperId;
            $allConnectedMappedArea[0]['date']= $fromdate;
            $allConnectedMappedArea[0]['x']= $fromgetTo[0]->x;
            $allConnectedMappedArea[0]['y']= $fromgetTo[0]->y;
            $allConnectedMappedArea[0]['height']= $fromgetTo[0]->height;
            $allConnectedMappedArea[0]['width']= $fromgetTo[0]->width;



            $i=1;
            foreach ($allConnections as $connection) {
                $getTo = MapArea::select()->where('id', $connection->to)->get();

                $pageNo = $getTo[0]->pageNo;
                $paperId = $getTo[0]->paperId;
                $date = $getTo[0]->date;

                $getPaperDetails = NewspaperPages::select()->where('pageNo', $pageNo)
                ->where('paperId', $paperId)
                ->where('date', $date)->get();
                $allConnectedMappedArea[$i]['imageUrl']= urldecode($getPaperDetails[0]->pageImageUrl);
                $allConnectedMappedArea[$i]['pageNo']= $pageNo;
                $allConnectedMappedArea[$i]['paperId']= $paperId;
                $allConnectedMappedArea[$i]['date']= $date;
                $allConnectedMappedArea[$i]['x']= $getTo[0]->x;
                $allConnectedMappedArea[$i]['y']= $getTo[0]->y;
                $allConnectedMappedArea[$i]['height']= $getTo[0]->height;
                $allConnectedMappedArea[$i]['width']= $getTo[0]->width;
                $i++;
            }
            return response()->json(['allMapedArea' => $allConnectedMappedArea], 200);

            // return  "Hello Successfull  ". $id;
        }
        return response()->json(['allMapedArea' =>null], 200);
    }


    public function advertisement()
    {
        $allAdv = Advterisement::select()->orderBy('id', 'DESC')->get();

        return view('adminPages.adv', [
            'title' => 'GL Publications | AdminPortal |  Dashboard',
            'allAdv' => $allAdv,
              // 'alertDescription' => '',
            // 'alertTitle' => 'Something went wrong',
            // 'alertIcon' => 'error'
        ]);
    }
    public function advertisementpost(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'advTitle' => 'required|min:1',
            'displayFrom' => 'required|min:1',
            'position' => 'required|min:1',
            'status' => 'required|min:1',
            'displayTo' => 'required|min:1',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:10240',

    ]);
        if ($validator->fails()) {
            return $validator->errors();
        } else {
            $newImage = "assets/img/advImg/".time(). ".".$request->image->extension();
            $path = $request->image->move(public_path('assets/img/advImg'), $newImage);
            $create = Advterisement::create([
                'advTitle' => $request->advTitle,
                'displayFrom' => $request->displayFrom,
                'position' => $request->position,
                'status' => $request->status,
                'displayTo' => $request->displayTo,
                'image' => $newImage,
            ]);

            $allAdv = Advterisement::select()->orderBy('id', 'DESC')->get();

            return view('adminPages.adv', [
        'title' => 'GL Publications | AdminPortal |  Dashboard',
        'allAdv' => $allAdv,
        'alertDescription' => '',
        'alertTitle' => 'New Advertisement Added successfully',
        'alertIcon' => 'success'
        ]);
        }
    }

    public function deleteAdv($advId)
    {
        $getImage = Advterisement::select()->where('id', $advId)->get();

        if (count($getImage)==0) {
        } elseif (count($getImage)>0) {
            $image_path = urldecode($getImage[0]->image);
            if (File::exists($image_path)) {
                File::delete($image_path);
                $deletePhoto = Advterisement::select()->where('id', $advId)->delete();
                if ($deletePhoto) {
                    $allAdv = Advterisement::select()->orderBy('id', 'DESC')->get();

                    return view('adminPages.adv', [
                        'title' => 'GL Publications | AdminPortal |  Dashboard',
                        'allAdv' => $allAdv,
                        'alertDescription' => '',
                        'alertTitle' => 'Advertisement Deleted successfully',
                        'alertIcon' => 'success'
                        ]);
                } else {
                    $allAdv = Advterisement::select()->orderBy('id', 'DESC')->get();

                    return view('adminPages.adv', [
                'title' => 'GL Publications | AdminPortal |  Dashboard',
                'allAdv' => $allAdv,
                'alertDescription' => '',
                'alertTitle' => 'Something Went Wrong. Try again',
                'alertIcon' => 'error'
                ]);
                }
            }
            $deletePhoto = Advterisement::select()->where('id', $advId)->delete();
            if ($deletePhoto) {
                $allAdv = Advterisement::select()->orderBy('id', 'DESC')->get();

                return view('adminPages.adv', [
                    'title' => 'GL Publications | AdminPortal |  Dashboard',
                    'allAdv' => $allAdv,
                    'alertDescription' => '',
                    'alertTitle' => 'Advertisement Deleted successfully',
                    'alertIcon' => 'success'
                    ]);
            } else {
                $allAdv = Advterisement::select()->orderBy('id', 'DESC')->get();

                return view('adminPages.adv', [
                'title' => 'GL Publications | AdminPortal |  Dashboard',
                'allAdv' => $allAdv,
                'alertDescription' => '',
                'alertTitle' => 'Something Went Wrong. Try again',
                'alertIcon' => 'error'
                ]);
            }
        }
    }

    public function uploadPDF()
    {
        $allPDFs = UploadPDF::join('newspapers', 'newspapers.id', 'upload_p_d_f_s.paperId')
        ->join('editions', 'editions.id', 'upload_p_d_f_s.edition')
        ->where('upload_p_d_f_s.date', date('Y-m-d'))
        ->orderBy('upload_p_d_f_s.id', 'DESC')
        ->get(['upload_p_d_f_s.id','newspapers.name as paperName','upload_p_d_f_s.date',
        'upload_p_d_f_s.paperId','upload_p_d_f_s.fileUrl','upload_p_d_f_s.date','upload_p_d_f_s.publishOn','editions.name as editionName']);




        return view('adminPages.uploadPDF', [
            'title' => 'GL Publications | AdminPortal |  Dashboard',
            'allPDFs' => $allPDFs,
            'defaultDate' => date('Y-m-d'),
            // 'alertDescription' => '',
            // 'alertTitle' => 'Something Went Wrong. Try again',
            // 'alertIcon' => 'error'
            ]);
    }

    public function uploadPDFpost(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'paperId' => 'required|min:1',
            'date' => 'required|min:1',
            'edition' => 'required|min:1',
            'displayFrom' => 'required|min:1',
            'image' => 'required|mimes:pdf|max:20480',

    ]);
        if ($validator->fails()) {
            return $validator->errors();
        } else {
            $paperCode = $this->paperCode($request->paperId);

            $newImage = "assets/pdf/".$paperCode."_epaper_".time(). ".".$request->image->extension();
            $path = $request->image->move(public_path('assets/pdf'), $newImage);

            $create = UploadPDF::create([
                        'paperId' => $request->paperId,
                        'date' => $request->date,
                        'edition' => $request->edition,
                        'publishOn' => $request->displayFrom,
                        'fileUrl' => urldecode($newImage),
                    ]);


            $allPDFs = UploadPDF::join('newspapers', 'newspapers.id', 'upload_p_d_f_s.paperId')
                    ->join('editions', 'editions.id', 'upload_p_d_f_s.edition')
                    ->where('upload_p_d_f_s.date', $request->date)
                    ->orderBy('upload_p_d_f_s.id', 'DESC')
                    ->get(['upload_p_d_f_s.id','newspapers.name as paperName','upload_p_d_f_s.date',
                    'upload_p_d_f_s.paperId','upload_p_d_f_s.fileUrl','upload_p_d_f_s.date','upload_p_d_f_s.publishOn','editions.name as editionName']);


            return view('adminPages.uploadPDF', [
                    'title' => 'GL Publications | AdminPortal |  Dashboard',
                    'allPDFs' => $allPDFs,
                    'defaultDate' => $request->date,
                    'alertDescription' => '',
                    'alertTitle' => 'PDF Uploaded Successfully',
                    'alertIcon' => 'success'
                ]);
        }
    }

    public function getEditions(Request $request)
    {
        if ($request->id) {
            $id= $request->id;
            $allEditions = Editions::select()->where('paperId', $id)->get();
            return response()->json(['allEditions' => $allEditions], 200);
            // return  "Hello Successfull  ". $id;
        }
        return response()->json(['allEditions' =>null], 200);
    }


    public function deletePDF(Request $request)
    {
        $advId = $request->pdfId;
        $getImage = UploadPDF::select()->where('id', $advId)->get();

        if (count($getImage)==0) {
        } elseif (count($getImage)>0) {
            $image_path = urldecode($getImage[0]->fileUrl);
            $date = urldecode($getImage[0]->date);
            if (File::exists($image_path)) {
                File::delete($image_path);
                $deletePhoto = UploadPDF::select()->where('id', $advId)->delete();
                if ($deletePhoto) {
                    $allPDFs = UploadPDF::join('newspapers', 'newspapers.id', 'upload_p_d_f_s.paperId')
                    ->join('editions', 'editions.id', 'upload_p_d_f_s.edition')
                    ->where('upload_p_d_f_s.date', $date)
                    ->orderBy('upload_p_d_f_s.id', 'DESC')
                    ->get(['upload_p_d_f_s.id','newspapers.name as paperName','upload_p_d_f_s.date',
                    'upload_p_d_f_s.paperId','upload_p_d_f_s.fileUrl','upload_p_d_f_s.date','upload_p_d_f_s.publishOn','editions.name as editionName']);


                    return view('adminPages.uploadPDF', [
                    'title' => 'GL Publications | AdminPortal |  Dashboard',
                    'allPDFs' => $allPDFs,
                    'defaultDate' => $date,
                    'alertDescription' => '',
                    'alertTitle' => 'PDF Deleted Successfully',
                    'alertIcon' => 'success'
                ]);
                } else {
                    $allPDFs = UploadPDF::join('newspapers', 'newspapers.id', 'upload_p_d_f_s.paperId')
                    ->join('editions', 'editions.id', 'upload_p_d_f_s.edition')
                    ->where('upload_p_d_f_s.date', $date)
                    ->orderBy('upload_p_d_f_s.id', 'DESC')
                    ->get(['upload_p_d_f_s.id','newspapers.name as paperName','upload_p_d_f_s.date',
                    'upload_p_d_f_s.paperId','upload_p_d_f_s.fileUrl','upload_p_d_f_s.date','upload_p_d_f_s.publishOn','editions.name as editionName']);



                    return view('adminPages.uploadPDF', [
                    'title' => 'GL Publications | AdminPortal |  Dashboard',
                    'allPDFs' => $allPDFs,
                    'defaultDate' => $date,
                    'alertDescription' => '',
                    'alertTitle' => 'Something went Wrong',
                    'alertIcon' => 'error'
                ]);
                }
            }
            $deletePhoto = UploadPDF::select()->where('id', $advId)->delete();
            if ($deletePhoto) {
                $allPDFs = UploadPDF::join('newspapers', 'newspapers.id', 'upload_p_d_f_s.paperId')
                ->join('editions', 'editions.id', 'upload_p_d_f_s.edition')
                ->where('upload_p_d_f_s.date', $date)
                ->orderBy('upload_p_d_f_s.id', 'DESC')
                ->get(['upload_p_d_f_s.id','newspapers.name as paperName','upload_p_d_f_s.date',
                'upload_p_d_f_s.paperId','upload_p_d_f_s.fileUrl','upload_p_d_f_s.date','upload_p_d_f_s.publishOn','editions.name as editionName']);


                return view('adminPages.uploadPDF', [
                    'title' => 'GL Publications | AdminPortal |  Dashboard',
                    'allPDFs' => $allPDFs,
                    'defaultDate' => $date,
                    'alertDescription' => '',
                    'alertTitle' => 'PDF Deleted Successfully',
                    'alertIcon' => 'success'
                ]);
            } else {
                $allPDFs = UploadPDF::join('newspapers', 'newspapers.id', 'upload_p_d_f_s.paperId')
                    ->join('editions', 'editions.id', 'upload_p_d_f_s.edition')
                    ->where('upload_p_d_f_s.date', $date)
                    ->orderBy('upload_p_d_f_s.id', 'DESC')
                    ->get(['upload_p_d_f_s.id','newspapers.name as paperName','upload_p_d_f_s.date',
                    'upload_p_d_f_s.paperId','upload_p_d_f_s.fileUrl','upload_p_d_f_s.date','upload_p_d_f_s.publishOn','editions.name as editionName']);


                return view('adminPages.uploadPDF', [
                        'title' => 'GL Publications | AdminPortal |  Dashboard',
                        'allPDFs' => $allPDFs,
                        'defaultDate' => $date,
                        'alertDescription' => '',
                        'alertTitle' => 'Soething went wrong',
                        'alertIcon' => 'error'
                    ]);
            }
        }
    }

    public function suspendAdv($advId)
    {
        $updateAdv = Advterisement::where('id', $advId)->update([
            'status' => '2'
        ]);
        $allAdv = Advterisement::select()->orderBy('id', 'DESC')->get();

        return view('adminPages.adv', [
        'title' => 'GL Publications | AdminPortal |  Dashboard',
        'allAdv' => $allAdv,
        'alertDescription' => '',
        'alertTitle' => 'Advertisement Suspended.',
        'alertIcon' => 'warning'
        ]);
    }

    public function activateAdv($advId)
    {
        $updateAdv = Advterisement::where('id', $advId)->update([
            'status' => '1'
        ]);
        $allAdv = Advterisement::select()->orderBy('id', 'DESC')->get();

        return view('adminPages.adv', [
        'title' => 'GL Publications | AdminPortal |  Dashboard',
        'allAdv' => $allAdv,
        'alertDescription' => '',
        'alertTitle' => 'Advertisement Activated.',
        'alertIcon' => 'success'
        ]);
    }

    public function updatePDFByDate($date)
    {
        $allPDFs = UploadPDF::join('newspapers', 'newspapers.id', 'upload_p_d_f_s.paperId')
        ->join('editions', 'editions.id', 'upload_p_d_f_s.edition')
        ->where('upload_p_d_f_s.date', $date)
        ->orderBy('upload_p_d_f_s.id', 'DESC')
        ->get(['upload_p_d_f_s.id','newspapers.name as paperName','upload_p_d_f_s.date',
        'upload_p_d_f_s.paperId','upload_p_d_f_s.fileUrl','upload_p_d_f_s.date','upload_p_d_f_s.publishOn','editions.name as editionName']);


        return view('adminPages.uploadPDF', [
            'title' => 'GL Publications | AdminPortal |  Dashboard',
            'allPDFs' => $allPDFs,
            'defaultDate' =>$date
            // 'alertDescription' => '',
            // 'alertTitle' => 'Soething went wrong',
            // 'alertIcon' => 'error'
        ]);
    }


    public function vnp_pedp($paperCode, $paperEdition, $date, $pageNo)
    {
        if ($paperCode == 'AmarAsom') {
            $paperId = 1;
        }
        if ($paperCode == 'PurvanchalPrahari') {
            $paperId = 2;
        }
        if ($paperCode == 'TheMeghalayaGuardian') {
            $paperId = 3;
        }
        if ($paperCode == 'TheNorthEastTimes') {
            $paperId = 4;
        }

        $pages = NewspaperPages::select()->where('date', $date)->where('paperId', $paperId)->orderBy('pageNo', 'ASC')->get();
        $paperName = $this->paperName($paperId);
        $dateFormated = DateTime::createFromFormat("Y-m-d", $date);
        $dateFormated = $dateFormated->format("d-m-Y");

        $frontPage =  NewspaperPages::select()->where('date', $date)->where('paperId', $paperId)->where('pageNo', $pageNo)->get();



        $allMapedArea = MapArea::select()
        ->where('date', $date)
        ->where('paperId', $paperId)
        ->where('pageNo', $pageNo)
        ->get();
        if (count($frontPage) == 0) {
            $frontPage = array();
            $frontPage[0]['imageUrl'] = 'assets%2Fimg%2FnoFrontPage.jpg';
        }




        return view('adminPages.viewNewspaper', [
            'title' => 'GL Publications | AdminPortal |  Dashboard',
            'paperName'=>$paperName,
            'allpages'=> $pages,
            'date'=>$dateFormated,
            'frontPage'=> $frontPage[0],
            'paperCode' => $paperCode,
            'paperId' => $paperId,
            'pageNo' => $pageNo,
            'edition' => $paperEdition,
            'mapAreaData'=>$allMapedArea,
            // 'alertDescription' => 'No data for this newspaper is found',
            // 'alertTitle' => 'No data',
            // 'alertIcon' => 'error'
        ]);
    }
}
