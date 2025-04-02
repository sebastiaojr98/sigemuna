<form class="row" wire:submit="createFinancier()">
    <div class="col-5 form-group">
        <label for=""><span class="span-required">*</span>Codigo do Processo</label>
        <input type="text" class="form form-control" placeholder="processo" wire:model="process_code">
        @error('process_code') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>

    <div class="col-7 form-group">
        <label for=""><span class="span-required">*</span>Tipo de Financiador</label>
        <select name="" id="" class="form form-control" wire:model="financier_type">
            <option value="" selected>escolha...</option>
            @foreach($financier_types as $financier_type)
              <option value="{{$financier_type->id}}">{{$financier_type->label}}</option>
            @endforeach
        </select>
        @error('financier_type') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>

    <div class="col-12 form-group">
        <label for=""><span class="span-required">*</span>Nome Completo</label>
        <input type="text" class="form form-control" placeholder="nome completo" wire:model="name">
        @error('name') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    
    <div class="col-7 form-group">
        <label for=""><span class="span-required">*</span>País</label>
        <input type="text" class="form form-control" wire:model="country" placeholder="país">
        @error('country') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>

    <div class="col-5 form-group">
        <label for=""><span class="span-required">*</span>Cidade</label>
        <input type="text" class="form form-control" wire:model="city" placeholder="cidade">
        @error('city') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>

    <div class="col-12 form-group">
        <label for=""><span class="span-required">*</span>Endereco</label>
        <input type="text" class="form form-control" wire:model="address" placeholder="endereco">
        @error('address') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>

    <div class="col-5 form-group">
        <label for=""><span class="span-required">*</span>Telefone</label>
        <input type="text" class="form form-control" wire:model="phone" placeholder="telefone">
        @error('phone') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>

    <div class="col-7 form-group">
        <label for=""><span class="span-required">*</span>Website</label>
        <input type="text" class="form form-control" wire:model="site" placeholder="website">
        @error('site') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    
    <div class="col-12 form-group">
        <label for=""><span class="span-required">*</span>E-mail</label>
        <input type="text" class="form form-control" wire:model="email" placeholder="e-mail">
        @error('email') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>

    <div class="col-12 form-group">
        <button class="btn btn-success px-5 my-3">Cadastrar</button>
    </div>
</form>