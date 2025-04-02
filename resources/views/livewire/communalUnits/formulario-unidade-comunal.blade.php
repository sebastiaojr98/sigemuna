<form class="row" wire:submit="createNeighborhood()">
    <div class="col-12 form-group">
        <label for=""><span class="span-required">*</span>Bairro</label>
        <select name="" id="" class="form form-control" wire:model="neighborhood">
            <option value="" selected>escolha...</option>
            @foreach ($neighborhoods as $neighborhood)
            <option value="{{$neighborhood->id}}">{{$neighborhood->label}}</option> 
            @endforeach
        </select>
        @error('neighborhood') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-12 form-group">
        <label for=""><span class="span-required">*</span>Unidade Comunal</label>
        <input type="text" class="form form-control" placeholder="nome" wire:model="name">
        @error('name') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-12 form-group">
        <button class="btn btn-success px-5 my-3">Cadastrar</button>
    </div>
</form>