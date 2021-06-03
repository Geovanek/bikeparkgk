<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class Profile extends Component
{
    public $user, $email;

    public function mount()
    {
        $this->user = User::findOrFail(request()->id);
        $this->email = $this->user->email;
    }

    public function render()
    {
        return view('livewire.profile');
    }

    public function update()
    {
        $validate = $this->validate(
            ['email' => "email|unique:users,email,{$this->email},email"],
            [
                'email.email' => 'Forneça um e-mail válido.',
                'email.unique' => 'Este e-mail já está cadastrado.',
            ],
        );

        $user = User::where('id', $this->user->id)->firstOrFail();
        $user->update($validate);

        $this->user = $user;

        $this->emit('message', [
            'type' => 'success', 
            'message' => 'Email atualizado.'
        ]);

        $this->resetInputFields();
        $this->emit('closeModal');
    }

    public function cancel()
    {
        $this->resetInputFields();
    }

    private function resetInputFields(){
        $this->reset([
            'email'
        ]);
        $this->resetErrorBag('email');
    }
}
