<form class="row" wire:submit="createNewLicense()">
    <div class="col-12 form-group">
        <label for=""><span class="span-required">*</span>Tipo de Licença</label>
        <select name="" id="" class="form form-control" wire:model="type_license">
            <option value="" selected>escolha...</option>
            @foreach ($type_licenses as $type_license)
            <option value="{{$type_license->id}}">{{$type_license->description}}</option> 
            @endforeach
        </select>
        @error('type_license') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-12 form-group">
        <label for=""><span class="span-required">*</span>Especificação</label>
        <input type="text" class="form form-control" placeholder="especificação" wire:model="especification">
        @error('especification') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-12 form-group">
        <label for=""><span class="span-required">*</span>Custo</label>
        <input type="text" class="form form-control" placeholder="montante" wire:model="amount">
        @error('amount') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-12 form-group">
        <button class="btn btn-success px-5 my-3">Cadastrar</button>
    </div>
</form>