<form class="row" wire:submit="createContact({{$employee->id}})">
    <div class="col-12 form-group">
        <label for="">Tipo de Contacto</label>
        <select name="" id="" class="form form-control" wire:model="type_contact">
            <option value="" selected>escolha...</option>
            @foreach($type_contacts as $type_contact)
              <option value="{{$type_contact->id}}">{{$type_contact->label}}</option>
            @endforeach
        </select>
        @error('type_contact') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-12 form-group">
        <label for="">Contacto</label>
        <input type="text" class="form form-control" placeholder="contacto" wire:model="contact">
        @error('contact') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-12 my-3">
      <button class="btn btn-success px-5" type="submit">Salvar</button>
    </div>
</form>