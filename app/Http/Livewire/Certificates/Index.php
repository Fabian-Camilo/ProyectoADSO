<?php

namespace App\Http\Livewire\Certificates;

use Livewire\Component;
use App\Models\Certificate;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Index extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    protected $queryString = ['search' => ['except' => ''], 'company_id' => ['except' => ''], 'perPage'];
    public $company_id;
    public $isOpenQrModal  = false;
    public $isOpenModal = false;
    public $isOpenDeleteModal = false;
    public $element = array(
        "name"  => NULL,
        "type"  => "text",
        "value"  => NULL
    );
    public $certificate;
    public $elements = [];
    public $created_by, $code, $valid_since = NULL, $valid_until = NULL, $search, $certificate_id, $perPage = 5;
    public $code_in_use = false;
    public $company;
    public $qr_image;
    public $url_certificate;
    public function mount()
    {
        $this->company = Auth::user()->company;
    }

    public function render()
    {
        if ($this->company) {
            $search = $this->search;
            return view('livewire.certificates.index', [
                'certificates' => Certificate::with('company')->where('company_id', $this->company->id)
                    ->where(function ($query) use ($search) {
                        $query->where('code', 'like', '%' . $search . '%');
                    })
                    ->paginate($this->perPage)
            ]);
        }
    }

    public function addElement()
    {
        $this->authorize('create certificates');
        $this->validate([
            'element.name' => 'required',
            'element.value' => 'required',
        ], [
            'element.name.required' => 'El nombre del campo es obligatorio',
            'element.value.required' => 'El valor del campo es obligatorio',
        ]);
        array_push($this->elements, $this->element);
        $this->element = [
            "name"  => NULL,
            "type"  => "text",
            "value"  => NULL
        ];
    }
    public function deleteElement($element)
    {
        try {
            unset($this->elements[$element]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function store()
    {
        $this->authorize('create certificates');
        $this->validate([
            'code' => [
                'required',
                Rule::unique('certificates')->ignore($this->certificate_id, 'id')->where(function ($query) {
                    return $query->where('company_id', $this->company->id);
                })
            ],
            'elements' => 'nullable',
            'valid_since' => 'nullable',
            'valid_until' => 'nullable',
        ], [
            'code.unique' => 'El código ya está en uso',
            'code.required' => 'El código es obligatorio',
        ]);
        //validar fecha desde y hasta cuando actualiza
        if (!$this->valid_until) $this->valid_until = null;
        if (!$this->valid_since) $this->valid_since = null;
        $certificate = Certificate::updateOrCreate(['id' => $this->certificate_id], [
            'code' => $this->code,
            'company_id' => $this->company->id,
            'created_by' => Auth::user()->name,

            'valid_since' => $this->valid_since,
            'valid_until' => $this->valid_until,
            'elements' => json_encode($this->elements)
        ]);
        session()->flash(
            'message',
            $this->certificate_id ? 'Certificado actualizado correctamente.' : 'Certificado registrado correctamente.'
        );

        $this->closeModal();
        $this->resetInputFields();
    }


    public function view_qr($id)
    {
        $this->authorize('view certificates');
        $this->certificate = Certificate::findOrFail($id);
        //http://onlinevalidator.test/certificate?name=A-Team+SAS&code=qwe123
        $this->url_certificate = route('viewCertificate') . "?name="
            . urlencode($this->certificate->company->name) . "&code=" . urlencode($this->certificate->code);
        $this->isOpenQrModal = true;
        $this->qr_image = "data:image/png;base64,".
            base64_encode(QrCode::format('png')
            ->size(1000)
            ->mergeString(Storage::get('public/' . Auth::user()->company->icon_photo_path), 0.3)
            ->errorCorrection('H')
            ->margin(2)
            ->generate(url($this->url_certificate)));
    }
    public function edit($id)
    {
        $this->authorize('update certificates');
        $certificate = Certificate::findOrFail($id);
        $this->certificate_id = $id;
        $this->code = $certificate->code;
        $this->created_by = $certificate->created_by;
        if($certificate->valid_since) $this->valid_since = date('Y-m-d', strtotime($certificate->valid_since));
        if($certificate->valid_until) $this->valid_until = date('Y-m-d', strtotime($certificate->valid_until));
        if ($certificate->elements) {
            foreach (json_decode($certificate->elements) as $item) {
                array_push($this->elements, json_decode(json_encode($item), true));
            }
        }
        $this->openModal();
    }
    public function delete()
    {
        $this->authorize('delete certificates');
        $certificate = Certificate::find($this->certificate_id);
        $certificate->delete();
        $this->isOpenDeleteModal = false;
        session()->flash('message', 'Certificado Eliminado Correctamente.');
        $this->resetInputFields();
    }
    public function openModal()
    {
        $this->authorize('view certificates');
        $this->isOpenModal = true;
    }
    public function openDeleteModal($id)
    {
        $this->certificate_id = $id;
        $this->isOpenDeleteModal = true;
    }
    public function resetInputFields()
    {
        $this->created_by = "";
        $this->code = "";
        $this->valid_since = NULL;
        $this->valid_until = NULL;
        $this->elements = [];
        $this->certificate_id = "";
        $this->element = [
            "name"  => NULL,
            "type"  => "text",
            "value"  => NULL
        ];
        $this->resetValidation();
    }
    public function closeModal()
    {
        $this->isOpenModal = false;
        $this->resetInputFields();
    }
    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }
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
}
