<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Maintenance;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    public function index()
    {
        return view('maintenance.index', [
            'maintenances' => Maintenance::all()
        ]);
    }
    public function update(Request $request, Maintenance $maintenance)
    {   
        $maintenance->update(['is_active' => $request->is_active]);

        return redirect()->route('maintenance.index');
    }
}
