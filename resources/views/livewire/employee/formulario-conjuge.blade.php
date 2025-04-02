<form class="row" wire:submit="createSpouse({{$employee->id}})">
    <div class="col-6 form-group">
        <label for="">Nome Completo</label>
        <input type="text" class="form form-control" placeholder="número" wire:model="full_name">
        @error('full_name') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-6 form-group">
        <label for="">Data de Nascimento</label>
        <input type="date" class="form form-control" placeholder="nome" wire:model="birth">
        @error('birth') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-4 form-group">
        <label for="">Nacionalidade</label>
        <select name="" id="" class="form form-control" wire:model="nationality">
            <option value="" selected>escolha...</option>
            @foreach($nationalities as $nationality)
              <option value="{{$nationality->id}}">{{$nationality->description}}</option>
            @endforeach
        </select>
        @error('nationality') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-4 form-group">
        <label for="">Profissao</label>
        <input type="text" class="form form-control" placeholder="nome" wire:model="profession">
        @error('profession') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-4 form-group">
        <label for="">Local de Trabalho</label>
        <input type="text" class="form form-control" placeholder="nome" wire:model="workplace">
        @error('workplace') <small class="alert-error"> {{ $message }} </small> @enderror
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