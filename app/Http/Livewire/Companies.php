<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Company;
use Illuminate\Support\Facades\Redirect;
use Livewire\WithPagination;

class Companies extends Component
{
    use WithPagination;

    protected $queryString = ['search' => ['except' => ''],'perPage'];
    public $name, $nit, $logo_photo_path, $icon_photo_path, $website, $email, $telephone , $search, $company_id;
    public $isOpen = 0, $isOpenDeleteCompany = 0;
    public $perPage=5;

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function clear()
    {
        $this->resetPage();
        $this->search = '';
        $this->perPage = 5;
    }
    public function render()
    {
        return view('livewire.companies.index',[
            'companies' => Company::with('users')->where('name','LIKE',"%{$this->search}%")
            ->orWhere('telephone','LIKE',"%{$this->search}%")
            ->orWhere('nit','LIKE',"%{$this->search}%")
            ->paginate($this->perPage)
        ]);
    }
}
