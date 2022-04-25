<?php

namespace App\Http\Controllers;

use App\Models\Reporting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminReportController extends Controller
{
    public function delete()
    {
        $id = request("id");
                Reporting::where('id', $id)
                ->delete();
                return redirect('admin/report');
    }

    public function edit(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            
        ]);

        $id = request("id");
            $Update = $request->updated_at;
            $Update = now();
    
            $report = Reporting::where('id', $id)->update([
                "title" => $request->title,
                "description" => $request->description,
                "updated_at" => $Update
            ]);
            return Redirect::to('admin/report');
    }

    public function showone()
    {
        $id = request("id");
            $report = Reporting::where('id', $id)
            ->first();
            return view('admin.signalement.modifierreport', [
                'report'=>$report,
            ]); 
    }

    public function show()
    {
        
        $reports = Reporting::get();
        return view('admin.signalement.report',[
            'reports' => $reports,
        ]);

    }
}

