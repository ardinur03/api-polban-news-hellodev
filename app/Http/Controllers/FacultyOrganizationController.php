<?php

namespace App\Http\Controllers;

use App\Models\faculty;
use App\Models\FacultyOrganization;
use App\Tables\FacultyOrganizationsTable;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;

class FacultyOrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('super-admin.faculty-organizations.index', [
            'faculty_organizations' => FacultyOrganizationsTable::class
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('super-admin.faculty-organizations.create', [
            'data_faculty_organizations' => faculty::all()
        ]);
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
            'code_faculty_organization' => 'required|max:10|unique:faculty_organizations,code_faculty_organization',
            'name_faculty_organization' => 'required|max:100|unique:faculty_organizations,name_faculty_organization',
            'faculty_id' => 'required'
        ]);

        FacultyOrganization::create([
            'code_faculty_organization' => strtoupper($request->code_faculty_organization),
            'faculty_id' => ucwords(strtolower($request->faculty_id)),
            'name_faculty_organization' => ucwords(strtolower($request->name_faculty_organization))
        ]);

        Toast::title('Successfully!')->message('Faculty Organization Created')->success()->backdrop()->autoDismiss(3);
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FacultyOrganization  $facultyOrganization
     * @return \Illuminate\Http\Response
     */
    public function edit(FacultyOrganization $facultyOrganization)
    {
        $data_faculty_organizations = faculty::all();
        return view('super-admin.faculty-organizations.edit', compact(['facultyOrganization', 'data_faculty_organizations']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FacultyOrganization  $facultyOrganization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FacultyOrganization $facultyOrganization)
    {
        $this->validate($request, [
            'code_faculty_organization' => 'required|max:10|unique:faculty_organizations,code_faculty_organization,' . $facultyOrganization->code_faculty_organization . ',code_faculty_organization',
            'name_faculty_organization' => 'required|max:100|unique:faculty_organizations,name_faculty_organization,' . $facultyOrganization->code_faculty_organization . ',code_faculty_organization',
            'faculty_id' => 'required'
        ]);

        $facultyOrganization->update([
            'code_faculty_organization' => strtoupper($request->code_faculty_organization),
            'faculty_id' => ucwords(strtolower($request->faculty_id)),
            'name_faculty_organization' => ucwords(strtolower($request->name_faculty_organization))
        ]);

        Toast::title('Successfully!')->message('Faculty Organization Updated')->info()->backdrop()->autoDismiss(3);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FacultyOrganization  $facultyOrganization
     * @return \Illuminate\Http\Response
     */
    public function destroy(FacultyOrganization $facultyOrganization)
    {
        try {
            $facultyOrganization->delete();
            Toast::title('Successfully!')->message('Faculty Organization Deleted')->danger()->backdrop()->autoDismiss(3);
            return redirect()->back();
        } catch (\Throwable $th) {
            Toast::title('Failed!')->message('Faculty Organization Failed to Delete')->danger()->backdrop()->autoDismiss(3);
            return redirect()->back();
        }
    }
}
