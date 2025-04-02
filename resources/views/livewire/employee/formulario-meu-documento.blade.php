<form class="row" wire:submit="createMyDocument({{$employee->id}})">
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
        <label for="">Numero</label>
        <input type="text" class="form form-control" placeholder="número" wire:model="number">
        @error('number') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-12 form-group">
        <label for="">Local de Emissão</label>
        <input type="text" class="form form-control" placeholder="local de emissão" wire:model="place_of_issue">
        @error('place_of_issue') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-6 form-group">
        <label for="">Data de Emissão</label>
        <input type="date" class="form form-control" wire:model="date_of_issue">
        @error('date_of_issue') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-6 form-group">
        <label for="">Data de Validade</label>
        <input type="date" class="form form-control" placeholder="nome" wire:model="expiration_date">
        @error('expiration_date') <small class="alert-error"> {{ $message }} </small> @enderror
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