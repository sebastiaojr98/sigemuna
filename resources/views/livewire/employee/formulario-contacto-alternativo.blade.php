<form class="row" wire:submit="createContact({{$employee->id}})">
    <div class="col-12 form-group">
        <label for="">Nome da Pessoa</label>
        <input type="text" class="form form-control" placeholder="nome completo" wire:model="full_name">
        @error('full_name') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-12 form-group">
        <label for="">Relação de Parentesco</label>
        <select name="" id="" class="form form-control" wire:model="degree_of_kinship">
            <option value="" selected>escolha...</option>
            @foreach($degree_of_kinships as $degree_of_kinship)
              <option value="{{$degree_of_kinship->id}}">{{$degree_of_kinship->label}}</option>
            @endforeach
        </select>
        @error('degree_of_kinship') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-12 form-group">
        <label for="">Telefone</label>
        <input type="text" class="form form-control" placeholder="telefone" wire:model="phone">
        @error('phone') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-12 my-3">
      <button class="btn btn-success px-5" type="submit">Salvar</button>
    </div>
</form>