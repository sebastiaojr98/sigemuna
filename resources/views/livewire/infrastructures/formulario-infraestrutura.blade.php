<form class="row" wire:submit="createInfra()">
    <div class="col-12 form-group">
        <label for=""><span class="span-required">*</span>Tipo de Infraestrutura</label>
        <select name="" id="" class="form form-control" wire:model="type_infrastructure">
            <option value="" selected>escolha...</option>
            @foreach($type_infrastructures as $type_infrastructure)
              <option value="{{$type_infrastructure->id}}">{{$type_infrastructure->label}}</option>
            @endforeach
        </select>
        @error('type_infrastructure') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>

    <div class="col-7 form-group">
        <label for=""><span class="span-required">*</span>Bairro</label>
        <select name="" id="" class="form form-control" wire:model="neighborhood">
            <option value="" selected>escolha...</option>
            @foreach($neighborhoods as $neighborhood)
              <option value="{{$neighborhood->id}}">{{$neighborhood->label}}</option>
            @endforeach
        </select>
        @error('neighborhood') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    
    <div class="col-5 form-group">
        <label for=""><span class="span-required">*</span>Ano/Inauguração</label>
        <input type="text" class="form form-control" wire:model="year">
        @error('year') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>

    <div class="col-12 form-group">
        <label for="">Imagem</label>
        <input type="file" class="form form-control" wire:model="image">
        @error('image') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>

    <div class="col-12 form-group">
        <label for="">Descrição</label>
        <textarea name="" id="" rows="3" class="form form-control" wire:model="description"></textarea>
        @error('description') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>

    <div class="col-12 form-group">
        <button class="btn btn-success px-5 my-3">Cadastrar</button>
    </div>
</form>