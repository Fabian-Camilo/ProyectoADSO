<?php

namespace App\Http\Livewire\Certificates;
use App\Models\Certificate;
use App\Models\Company;

use Livewire\Component;

class View extends Component
{
    public $name,$code,$company,$certificate;
    public $elements = [];
    protected $queryString = ['name','code'];

    public function render()
    {
        $this->company = Company::where('name', $this->name)->firstOrFail();
        $this->certificate = Certificate::where('company_id', $this->company->id)->where('code', $this->code)->firstOrFail();

        if ($this->certificate->elements) {
            foreach (json_decode($this->certificate->elements) as $item) {
                array_push($this->elements, json_decode(json_encode($item),true));
            }
        }

        return view('livewire.certificates.view')->layout('layouts.certificates');;
    }
}
