<form class="row" wire:submit="createSpouse({{$employee->id}})">
    <div class="col-7 form-group">
        <label for="">Nível Acadêmico</label>
        <input type="text" class="form form-control" placeholder="nível acadêmico" wire:model="academic_level">
        @error('academic_level') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-5 form-group">
        <label for="">Ano de Conclusão (0000)</label>
        <input type="text" class="form form-control" placeholder="ano de conclusão" wire:model="conclusion_year">
        @error('conclusion_year') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-12 form-group">
        <label for="">Curso</label>
        <input type="text" class="form form-control" placeholder="curso" wire:model="course">
        @error('course') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-12 form-group">
        <label for="">País de Formação</label>
        <select name="" id="" class="form form-control" wire:model="country_of_training">
            <option value="" selected>escolha...</option>
            @foreach($nationalities as $nationality)
              <option value="{{$nationality->id}}">{{$nationality->country}}</option>
            @endforeach
        </select>
        @error('country_of_training') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-12 form-group">
        <label for="">Instituição de Ensino</label>
        <input type="text" class="form form-control" placeholder="instituição de ensino" wire:model="educational_institution">
        @error('educational_institution') <small class="alert-error"> {{ $message }} </small> @enderror
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