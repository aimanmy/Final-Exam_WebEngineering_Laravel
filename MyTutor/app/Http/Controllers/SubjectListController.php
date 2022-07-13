<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubjectListItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class SubjectListController extends Controller
{
    public function mainpage()
    {
        if (Auth::check()) {
            return view('main_page', ['listSubject' => SubjectListItem::all()]);
        }
        return redirect("login_page")->withSuccess('You do not have access');
    }

    public function saveSubject(Request $request)
    {
        echo json_encode($request->all());
        $newSubjectItem = new SubjectListItem();
        $newSubjectItem->subject_title = $request->subtitle;
        $newSubjectItem->subject_description = $request->subdesc;
        $newSubjectItem->subject_price = $request->subprice;
        $newSubjectItem->subject_learningHours = $request->sublearnhours;
        $newSubjectItem->save();
        return redirect('main_page')->with('save', 'Success')->withErrors('error', 'Failed');
    }

    public function markDelete($subject_id)
    {
        $subjectList = SubjectListItem::find($subject_id);
        $subjectList->delete();
        return redirect('main_page');
    }

    public function markUpdate($subject_id, Request $request)
    {
        $subjectListItem= SubjectListItem::find($subject_id);
        $subjectListItem->subject_title = $request->subtitle;
        $subjectListItem->subject_description = $request->subdesc;
        $subjectListItem->subject_price = $request->subprice;
        $subjectListItem->subject_learningHours = $request->sublearnhours;
        $subjectListItem->update();
        return redirect('main_page');
    }

    
   
}
