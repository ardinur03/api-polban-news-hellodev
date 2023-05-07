<?php

namespace App\Http\Controllers;

use App\Tables\LogTable;
use Spatie\Activitylog\Models\Activity;

class LogController extends Controller
{
    public function index()
    {
        return view(
            'super-admin.logs.index',
            [
                'logs' => LogTable::class
            ]
        );
    }

    public function show($id)
    {
        $data_activity = Activity::findOrFail($id);
        return view(
            'super-admin.logs.show',
            [
                'logs' => $data_activity->properties
            ]
        );
    }
}
