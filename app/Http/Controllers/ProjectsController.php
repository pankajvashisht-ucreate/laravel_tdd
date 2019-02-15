<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
class ProjectsController extends Controller
{
    //

    public function create_project(){
        $arrtibutes=request()->validate([
            'title' => 'required | min:3',
            'description' => 'required'
        ]);
        Project::create($arrtibutes);
        return redirect('project');
    }

    public function get_project(Project $project){
        $data=$project->get();
        return view('page.getproject',compact('data'));
    }

    public function show(){
        $project = Project::findorFail(request('project'));
        return view('page.view_project',compact('project'));
    }

    public function abc($a,$b){
        if(is_calable($b)){

        }
    }

}
