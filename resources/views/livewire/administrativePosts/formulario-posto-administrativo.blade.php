<form class="row" wire:submit="createAdministrativePost()">
    <div class="col-12 form-group">
        <label for=""><span class="span-required">*</span>Nome do Posto</label>
        <input type="text" class="form form-control" placeholder="nome completo" wire:model="name">
        @error('name') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-12 form-group">
        <button class="btn btn-success px-5 my-3">Cadastrar</button>
    </div>
</form>