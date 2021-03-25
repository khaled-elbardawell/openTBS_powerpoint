<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

include_once(base_path()."\\vendor\\tinybutstrong\opentbs\demo\\tbs_class.php"); // Load the TinyButStrong template engine
include_once(base_path()."\\vendor\\tinybutstrong\opentbs\\tbs_plugin_opentbs.php"); // Load the TinyButStrong template engine


class employeeController extends Controller
{

    public $tbs;

    public function index(){
        $emps =  Employee::all();
        return view('welcome')->with("emps",$emps);
    }

    public function exportField($field){
        $this->tbs->MergeField('f', $field);
    }

    public function exportImg($field){
        $this->tbs->MergeField('img', $field);
    }

    public function exportTable($field){
        $this->tbs->MergeBlock('a', $field,true);
    }


    public function export(){
        // data
        $data =  Employee::select('id','name','age','company')->get()->toArray();
        $data_field = [ 'yourname' => "khaled","test" => "kkkkkk"];
        $data_img = [ 'x' => public_path().'\Files\1.jpg' , 'x2' => public_path().'\Files\2.png'];


        // Initialize the TBS instance
        $this->tbs = new \clsTinyButStrong; // new instance of TBS
        $this->tbs->Plugin(TBS_INSTALL, OPENTBS_PLUGIN); // load the OpenTBS plugin


        // load template
        $template = public_path() . '\Files\test4.pptx';
        $this->tbs->LoadTemplate($template, OPENTBS_ALREADY_UTF8); // Also merge some [onload] automatic fields (depends of the type of document).




        // change data


        // get num of slide
        $number_of_slide = $this->tbs->Plugin(OPENTBS_COUNT_SLIDES);


//        $this->tbs->Plugin(OPENTBS_SELECT_SLIDE, 1);
//        $this->exportField($data_field);

//        $this->tbs->Plugin(OPENTBS_SELECT_SLIDE, 2);
//        $this->exportField($data_field);


        // select slide
        for ($i = 1 ; $i < $number_of_slide ; $i++){
            $this->tbs->Plugin(OPENTBS_SELECT_SLIDE, $i);
            $this->exportField($data_field);
            $this->exportTable($data);
            $this->exportImg($data_img);

        }


        // export file
        $this->tbs->Show(OPENTBS_DOWNLOAD,date('Y_m_d').'_export_'.'.pptx'); // Also merges all [onshow] automatic fields.

    }
}



