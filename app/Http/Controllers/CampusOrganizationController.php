<?php

namespace App\Http\Controllers;

use App\Models\CampusOrganization;
use App\Tables\CampusOrganizationsTable;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;

class CampusOrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('super-admin.campus-organizations.index', [
            'campus_organizations' => CampusOrganizationsTable::class
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('super-admin.campus-organizations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'code_campus_organization' => 'required|max:10|unique:campus_organizations,code_campus_organization',
            'name_campus_organization' => 'required|max:100|unique:campus_organizations,name_campus_organization'
        ]);

        CampusOrganization::create([
            'code_campus_organization' => strtoupper($request->code_campus_organization),
            'name_campus_organization' => ucwords(strtolower($request->name_campus_organization))
        ]);

        Toast::title('Successfully!')->message('Campus Organization Created')->success()->backdrop()->autoDismiss(3);
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CampusOrganization  $campusOrganization
     * @return \Illuminate\Http\Response
     */
    public function edit(CampusOrganization $campusOrganization)
    {
        return view('super-admin.campus-organizations.edit', compact('campusOrganization'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CampusOrganization  $campusOrganization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CampusOrganization $campusOrganization)
    {
        $this->validate($request, [
            'code_campus_organization' => 'required|max:10|unique:campus_organizations,code_campus_organization,' . $campusOrganization->code_campus_organization . ',code_campus_organization',
            'name_campus_organization' => 'required|max:100|unique:campus_organizations,name_campus_organization,' . $campusOrganization->code_campus_organization . ',code_campus_organization'
        ]);

        $campusOrganization->update([
            'code_campus_organization' => strtoupper($request->code_campus_organization),
            'name_campus_organization' => ucwords(strtolower($request->name_campus_organization))
        ]);

        Toast::title('Successfully!')->message('Campus Organization Updated')->info()->backdrop()->autoDismiss(3);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CampusOrganization  $campusOrganization
     * @return \Illuminate\Http\Response
     */
    public function destroy(CampusOrganization $campusOrganization)
    {
        try {
            $campusOrganization->delete();
            Toast::title('Successfully!')->message('Campus Organization Deleted')->danger()->backdrop()->autoDismiss(3);
            return redirect()->back();
        } catch (\Throwable $th) {
            Toast::title('Failed!')->message('Campus Organization Failed to Delete')->danger()->backdrop()->autoDismiss(3);
            return redirect()->back();
        }
    }
}
