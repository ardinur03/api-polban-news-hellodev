<?php

namespace App\View\Components;

use App\Models\CampusOrganization;
use App\Models\FacultyOrganization;
use Illuminate\View\Component;

class OptionRegister extends Component
{
    public $data_campus_organizations;
    public $data_association_organizations;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $this->data_campus_organizations = CampusOrganization::whereNotIn('code_campus_organization', function ($query) {
            $query->select('campus_organization_code')->from('user_campus_organizations');
        })->get();

        $this->data_association_organizations = FacultyOrganization::whereNotIn('code_faculty_organization', function ($query) {
            $query->select('faculty_organization_code')->from('user_association_organizations');
        })->get();
        return view('components.option-register');
    }
}
