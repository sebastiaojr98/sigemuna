<form class="row" wire:submit="createResponsiblePerson({{$client->id}})">
    <div class="col-12 form-group">
        <label for="">Nome Completo</label>
        <input type="text" class="form form-control" placeholder="número" wire:model="full_name">
        @error('full_name') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-7 form-group">
        <label for="">Tipo de Documento</label>
        <select name="" id="" class="form form-control" wire:model="document_type">
            <option value="" selected>escolha...</option>
            @foreach($document_types as $document_type)
              <option value="{{$document_type->id}}">{{$document_type->description}}</option>
            @endforeach
        </select>
        @error('document_type') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>

    <div class="col-5 form-group">
        <label for="">Numero do Documento</label>
        <input type="text" class="form form-control" placeholder="número" wire:model="number">
        @error('number') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>

    <div class="col-12 form-group">
        <label for="">Telefone</label>
        <input type="text" class="form form-control" placeholder="número" wire:model="phone">
        @error('phone') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>

    <div class="col-12 form-group">
        <label for="">Anexo de Documento</label>
        <input type="file" class="form form-control" placeholder="nome" wire:model="document">
        @error('document') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-12 my-3">
      <button class="btn btn-success px-5" type="submit">Salvar</button>
    </div>
</form>