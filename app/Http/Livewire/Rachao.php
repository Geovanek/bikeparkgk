<?php

namespace App\Http\Livewire;

use App\Models\Rachao as ModelsRachao;
use Livewire\Component;

class Rachao extends Component
{
    public $name, $email, $phone, $category, $exemption_term;
    public $action = false;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'email|unique:rachao,email',
        'phone' => 'nullable',
        'category' => 'required|integer',
        'exemption_term' => 'accepted',
    ];

    protected $messages = [
        'name.required' => 'Nome é obrigatório.',
        'email.email' => 'Forneça um e-mail válido',
        'email.unique' => 'Este email já esta cadastrado.',
        'category.required' => 'Escolha a categoria',
        'exemption_term' => 'Obrigatório concordar com o Termo de Isenção de responsabilidade'
    ];

    public function render()
    {
        return view('livewire.rachao');
    }

    public function updatedName($value)
    {
        $this->validateOnly('name');
    }

    public function updatedEmail($value)
    {
        $this->validateOnly('email');
    }

    public function updatedExemptionTerm($value)
    {
        $this->validateOnly('exemption_term');
    }

    public function subscribe()
    {
        $validate = $this->validate();

        $query = ModelsRachao::create($validate, $this->phone);

        if ($query) {
            $this->action = true;
            $this->resetData();
        }

        $this->emitTo('rachao-inscritos', '$refresh');
    }

    public function resetData()
    {
        $this->reset(['name', 'email', 'phone', 'exemption_term', 'category']);
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
