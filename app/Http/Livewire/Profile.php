<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class Profile extends Component
{
    public $user, $email;

    public function mount($id)
    {
        $this->user = User::findOrFail($id);
        $this->email = $this->user->email;
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

        User::where('id', $this->user->id)->update(['email' => $validate['email']]);

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

    public function render()
    {
        return view('livewire.profile');
    }
}
