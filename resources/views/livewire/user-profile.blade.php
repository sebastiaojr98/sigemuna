<div>
    <div class="row">
        <div class="col-12">
          <div class="card mb-3 btn-reveal-trigger">
            <div class="card-header position-relative min-vh-25 mb-8">
              <div class="cover-image">
                <div class="bg-holder rounded-3 rounded-bottom-0" style="background-image:url(../../assets/img/generic/4.jpg);"></div>
              </div>
              <div class="avatar avatar-5xl avatar-profile shadow-sm img-thumbnail rounded-circle">
                <div class="h-100 w-100 rounded-circle overflow-hidden position-relative"> 
                    @if (auth()->user()->picture)
                    <img src="{{asset('storage/'.auth()->user()->picture)}}" width="200" alt="" data-dz-thumbnail="data-dz-thumbnail" />
                    @else
                    <img src="{{asset("img/avatar.png")}}" width="200" alt="" data-dz-thumbnail="data-dz-thumbnail" />
                    @endif
                    <input class="d-none" id="profile-image" type="file" wire:change="changedFile()" wire:model="picture" />
                    <label class="mb-0 overlay-icon d-flex flex-center" for="profile-image">
                        <span class="bg-holder overlay overlay-0"></span>
                        <span class="z-1 text-white dark__text-white text-center fs--1">
                            <span class="fas fa-camera"></span>
                            <span class="d-block">Atualizar</span>
                        </span>
                    </label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row g-0">
        <div class="col-lg-8 pe-lg-2">
          <div class="card mb-3">
            <div class="card-header">
              <h5 class="mb-0">Configurações de perfil</h5>
            </div>
            <div class="card-body bg-light">
              <form class="row g-3" wire:submit="updateUser({{auth()->user()->id}})">
                <div class="col-lg-12"> <label class="form-label" for="first-name">Nome Completo</label><input class="form-control" id="first-name" type="text" wire:model="name" disabled  required/></div>
                {{--<div class="col-lg-6"> <label class="form-label" for="last-name">Apelido</label><input class="form-control" id="last-name" type="text" value="Anthony" /></div>--}}
                <div class="col-lg-7"> <label class="form-label" for="email1">Email</label><input class="form-control" id="email1" type="email" wire:model="email" disabled required/></div>
                <div class="col-lg-5"> <label class="form-label" for="email2">Telefone</label><input class="form-control" id="email2" type="text" wire:model="phone"  required/></div>
                <div class="col-lg-12"><label class="form-label" for="email3">Função</label><input class="form-control" id="email3" type="text"wire:model="role"  required/></div>
                <div class="col-lg-12"> <label class="form-label" for="intro">Biografia</label><textarea class="form-control" id="intro" name="intro" cols="30" rows="7" wire:model="biography" required></textarea></div>
                <div class="col-12 d-flex justify-content-end"><button class="btn btn-primary" type="submit">Atualizar </button></div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-4 ps-lg-2">
          <div class="sticky-sidebar">
            <div class="card mb-3">
              <div class="card-header">
                <h5 class="mb-0">Alterar Senha</h5>
              </div>
              <div class="card-body bg-light">
                <form wire:submit="updatePassword({{auth()->user()->id}})">
                    <div class="mb-3">
                        <label class="form-label" for="old-password">Senha Antiga</label>
                        <input class="form-control" id="old-password" type="password" wire:model="old_password"/>
                        @error('old_password') <small class="alert-error"> {{ $message }} </small> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="new-password">Nova Senha</label>
                        <input class="form-control" id="new-password" type="password" wire:model="new_password"/>
                        @error('new_password') <small class="alert-error"> {{ $message }} </small> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="confirm-password">Confirme Senha</label>
                        <input class="form-control" id="confirm-password" type="password" wire:model="confirm_password"/>
                        @error('confirm_password') <small class="alert-error"> {{ $message }} </small> @enderror
                        @if(session()->has('error'))
                        <small class="alert-error"> {{ session('error') }} </small>
                        @endif
                    </div>
                    <button class="btn btn-primary d-block w-100" type="submit">Atualizar Senha </button>
                </form>
              </div>
            </div>
            {{--<div class="card">
              <div class="card-header">
                <h5 class="mb-0">Danger Zone</h5>
              </div>
              <div class="card-body bg-light">
                <h5 class="fs-0">Transfer Ownership</h5>
                <p class="fs--1">Transfer this account to another user or to an organization where you have the ability to create repositories.</p><a class="btn btn-falcon-warning d-block" href="#!">Transfer</a>
                <div class="border-bottom border-dashed my-4"></div>
                <h5 class="fs-0">Delete this account</h5>
                <p class="fs--1">Once you delete a account, there is no going back. Please be certain.</p><a class="btn btn-falcon-danger d-block" href="#!">Deactivate Account</a>
              </div>
            </div>--}}
          </div>
        </div>
      </div>
</div>

<script>
    //make-payment
    window.document.addEventListener("profile-update", (event) => {
      Swal.fire({
        title: `${event.__livewire.params[0].title}`,
        text: `${event.__livewire.params[0].text}`,
        icon: `${event.__livewire.params[0].icon}`,
        showConfirmButton: true,
        customClass: {
            confirmButton: 'btn btn-primary px-4', // Adicione a classe do Bootstrap para botão de sucesso
        },
      })  
    });

    window.document.addEventListener("changed-file", (event) => {
        Swal.fire({
            title: "Atualizar Foto?",
            text: `Atenção! Ao clicar em concordar, você irá alterar a sua foto de perfil.`,
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#00d27a",
            cancelButtonColor: "#d33",
            confirmButtonText: "Concordar",
            cancelButtonText: "Cancelar"
        }).then((result) => {
        if (result.isConfirmed) {
            @this.updatePicture();
        }

        });
    });

    
  </script>
