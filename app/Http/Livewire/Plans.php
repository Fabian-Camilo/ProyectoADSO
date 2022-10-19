<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Plan;
use Illuminate\Support\Facades\Redirect;
use Livewire\WithPagination;

class Plans extends Component
{
    use WithPagination;
    protected $queryString = ['search' => ['except' => '']];
    public $name, $duration, $price , $search, $plan_id;
    public $isOpen = 0, $isOpenDeletePlan = 0;
    //public $isOpenTotals = 0, $isOpenDeleteTotal = 0;
    //public $totals;
    public function render()
    {
        return view('livewire.plans.index',[
            'plans' => Plan::where('name','LIKE',"%{$this->search}%")
            ->get(),
        ]);
    }
    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }
    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields(){
        $this->plan_id = '';
        $this->name = '';
        $this->duration = '';
        $this->price = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|unique:plans,name,'.$this->plan_id,
        ], [
            'name.required' => 'El nombre es obligatorio',
            'name.unique' => 'Este nombre ya está registrado',
        ]);

        Plan::updateOrCreate(['id' => $this->plan_id], [
            'name' => $this->name,
            'duration' => $this->duration,
            'price' => $this->price
        ]);

        session()->flash('message',
            $this->plan_id ? 'Plan Actualizado Correctamente.' : 'Plan Creado Correctamente.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $plan = Plan::findOrFail($id);
        $this->plan_id = $id;
        $this->name = $plan->name;
        $this->duration = $plan->duration;
        $this->price = $plan->price;

        $this->openModal();
    }

    public function delete($id)
    {
        Plan::find($id)->delete();
        $this->closeModalDeleteStore();
        session()->flash('message', 'Plan Eliminado Correctamente.');
    }


}


    /* public function totals($id)
    {
        $store = Store::findOrFail($id);
        $this->totals = $store->totals;
        $this->store_id = $id;
        session()->flash('message', $this->totals);
    }



    public function create_total($id)
    {
        $this->resetInputFields();
        $this->openModalTotal();
        $this->store_id = $id;
    }



    public function openModalTotal()
    {
        $this->isOpenTotals = true;
    }

    public function closeModalTotal()
    {
        $this->isOpenTotals = false;
    }

    public function openModalDeleteStore($id)
    {
        $this->isOpenDeleteStore = true;
        $this->store_id = $id;
    }

    public function closeModalDeleteStore()
    {
        $this->isOpenDeleteStore = false;
        $this->store_id = '';
    }

    public function openModalDeleteTotal($id)
    {
        $this->isOpenDeleteTotal = true;
        $this->total_id = $id;
    }

    public function closeModalDeleteTotal()
    {
        $this->isOpenDeleteTotal = false;
        $this->total_id = '';
    }





    public function store_total()
    {
        $this->validate([
            'name_total' => 'required',
            'balance_total' => 'required',
        ], [
            'name_total.required' => 'El nombre es obligatorio',
            'balance_total.required' => 'El saldo es obligatorio',
        ]);

        $total = Total::updateOrCreate(['id' => $this->total_id], [
            'name' => $this->name_total,
            'balance' => $this->balance_total,
            'store_id' => $this->store_id,
        ]);
        session()->flash('message',
             $this->total_id ? 'Caja Actualizada Correctamente.' : 'Caja Creada Correctamente.');

        $this->closeModalTotal();
        $this->resetInputFields();
    }



    public function edit_total($store_id, $total_id)
    {
        $this->store_id = $store_id;
        $total = Total::findOrFail($total_id);
        $this->total_id = $total_id;
        $this->name_total = $total->name;
        $this->balance_total = $total->balance;

        $this->openModalTotal();
    }


    public function delete_total($id)
    {
        Total::find($id)->delete();
        $this->closeModalDeleteTotal();
        session()->flash('message', 'Caja Eliminada Correctamente.');
    }

    public function inventory($id){
        return $this->redirect('inventory/'.$id);
    }
}
 */
