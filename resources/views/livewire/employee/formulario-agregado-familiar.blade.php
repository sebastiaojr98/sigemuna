<form class="row" wire:submit="createHousehold({{$employee->id}})">
    <div class="col-7 form-group">
        <label for="">Nome Completo</label>
        <input type="text" class="form form-control" placeholder="nome completo" wire:model="full_name">
        @error('full_name') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-5 form-group">
        <label for="">Grau de Parentesco</label>
        <select name="" id="" class="form form-control" wire:model="degree_of_kinship">
            <option value="" selected>escolha...</option>
            @foreach($degree_of_kinships as $degree_of_kinship)
              <option value="{{$degree_of_kinship->id}}">{{$degree_of_kinship->label}}</option>
            @endforeach
        </select>
        @error('degree_of_kinship') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-6 form-group">
        <label for="">Data de Nascimento</label>
        <input type="date" class="form form-control" placeholder="nome" wire:model="birth" max="{{date("Y-m-d")}}">
        @error('birth') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-6 form-group">
        <label for="">Sexo</label>
        <select name="" id="" class="form form-control" wire:model="gender">
            <option value="" selected>escolha...</option>
            @foreach($genders as $gender)
              <option value="{{$gender->id}}">{{$gender->description}}</option>
            @endforeach
        </select>
        @error('gender') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-5 form-group">
        <label for="">Estado Civil</label>
        <select name="" id="" class="form form-control" wire:model="marital_status">
            <option value="" selected>escolha...</option>
            @foreach($marital_statuses as $marital_statuse)
              <option value="{{$marital_statuse->id}}">{{$marital_statuse->description}}</option>
            @endforeach
        </select>
        @error('marital_status') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-7 form-group">
        <label for="">Profissão</label>
        <input type="text" class="form form-control" placeholder="profissão" wire:model="profession">
        @error('profession') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-12 form-group">
        <label for="">Local de Trabalho</label>
        <input type="text" class="form form-control" placeholder="local de trabalho" wire:model="workplace">
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