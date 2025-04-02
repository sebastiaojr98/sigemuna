<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;

class UserProfile extends Component
{
    use WithFileUploads;

    public $name, $email, $phone, $role, $biography;

    public $old_password, $new_password, $confirm_password;
    
    public $picture;

    public function mount()
    {
        $user = auth()->user();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->role = $user->role;
        $this->biography = $user->biography;
    }

    public function render()
    {
        return view('livewire.user-profile');
    }

    public function updateUser(User $user)
    {
        try {
            $update = $user->update([
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'role' => $this->role,
                'biography' => $this->biography
            ]);
            return $this->dispatch("profile-update", [
                "title" => "Dados da Conta!",
                "icon" => "success",
                "text" => "Os seus dados foram atualizados com sucesso."
            ]);
        } catch (\Exception $e) {
            return $this->dispatch("profile-update", [
                "title" => "Dados da Conta!",
                "icon" => "error",
                "text" => "Falha ao atualizar os seus dados tenta novamente mais tarde."
            ]);
        }

    }

    public function updatePassword(User $user)
    {
        $this->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|min:8'
        ]);

        //Vou fazer a checagem...
        if (Hash::check($this->old_password, $user->password)) {
            //Verificar a igualdade de senhas
            if ($this->new_password != $this->confirm_password) {
                //Retornamos o erro de inegualdade
                $this->clearPassword();
                return $this->dispatch("profile-update", [
                    "title" => "Password!",
                    "icon" => "warning",
                    "text" => "O campo nova senha não confere com o campo confirme senha."
                ]);
            }else{
                //Atualizar a senha
                try {
                    $user->update([
                        "password" => Hash::make($this->confirm_password)
                    ]);
                    //Mensagem de successo
                    $this->clearPassword();
                    return $this->dispatch("profile-update", [
                        "title" => "Password!",
                        "icon" => "success",
                        "text" => "A sua senha foi atualizada com sucesso."
                    ]);
                } catch (\Exception $e) {
                    $this->clearPassword();
                    return $this->dispatch("profile-update", [
                        "title" => "Password!",
                        "icon" => "error",
                        "text" => "Falha ao atualizar a senha tenta novamente mais tarde."
                    ]);
                }
            }
        }else{
            $this->clearPassword();
            return $this->dispatch("profile-update", [
                "title" => "Password!",
                "icon" => "warning",
                "text" => "A senha antiga digita não é valida."
            ]);
        }
    }

    public function changedFile()
    {
        return $this->dispatch("changed-file");
    }

    public function updatePicture()
    {
        try {
            $this->validate([
                "picture" => "required|mimes:jpg,png,jpeg|max:3240"
            ]);

            try {
                $path_picture = $this->picture->store('profile/pictures');
                auth()->user()->update([
                    'picture' => $path_picture
                ]);
                return $this->dispatch("profile-update", [
                    "title" => "Foto de Perfil!",
                    "icon" => "success",
                    "text" => "A sua foto de perfil foi atualizada com sucesso."
                ]);
            } catch (\Exception $e) {
                return $this->dispatch("profile-update", [
                    "title" => "Foto de Perfil!",
                    "icon" => "error",
                    "text" => "Falha ao atualizar a sua foto de perfil tenta novamente mais tarde."
                ]);
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            return $this->dispatch("profile-update", [
                "title" => "Foto de Perfil!",
                "icon" => "error",
                "text" => $e->getMessage()
            ]);
        }
    }

    private function clearPassword()
    {
        $this->old_password = "";
        $this->new_password = "";
        $this->confirm_password = "";
    }
}
