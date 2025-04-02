<form class="row" wire:submit="updateEmployee()">
    <div class="col-4 form-group">
        <label for="">Codigo (Numero do processo)</label>
        <input type="text" class="form form-control" placeholder="número" wire:model="code" disabled>
    </div>
    <div class="col-4 form-group">
        <label for=""><span class="span-required">*</span>NUIT</label>
        <input type="text" class="form form-control" placeholder="número" wire:model="nuit">
        @error('nuit') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-4 form-group">
        <label for=""><span class="span-required">*</span>Nomes Proprios</label>
        <input type="text" class="form form-control" placeholder="nome" wire:model="first_name">
        @error('first_name') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-4 form-group">
        <label for=""><span class="span-required">*</span>Apelido</label>
        <input type="text" class="form form-control" placeholder="apelido" wire:model="last_name">
        @error('last_name') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-3 form-group">
        <label for=""><span class="span-required">*</span>Data de Nascimento</label>
        <input type="date" class="form form-control" wire:model="birth">
        @error('birth') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-3 form-group">
        <label for=""><span class="span-required">*</span>Sexo</label>
        <select name="" id="" class="form form-control" wire:model="gender">
            <option value="" selected>escolha...</option>
            @foreach($genders as $gender)
              <option value="{{$gender->id}}">{{$gender->description}}</option>
            @endforeach
        </select>
        @error('gender') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-2 form-group">
        <label for=""><span class="span-required">*</span>Altura(m)</label>
        <input type="text" class="form form-control" placeholder="altura" wire:model="height">
        @error('height') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-3 form-group">
        <label for=""><span class="span-required">*</span>Estado Civil</label>
        <select name="" id="" class="form form-control" wire:model="marital_status">
            <option value="" selected>escolha...</option>
            @foreach($marital_statuses as $marital_statuse)
              <option value="{{$marital_statuse->id}}">{{$marital_statuse->description}}</option>
            @endforeach
        </select>
        @error('marital_status') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-5 form-group">
        <label for=""><span class="span-required">*</span>Nacionalidade</label>
        <select name="" id="" class="form form-control" wire:change="setProvinces()" wire:model="nationality">
            <option value="" selected>escolha...</option>
            @foreach($nationalities as $nationality)
              <option value="{{$nationality->id}}">{{$nationality->description}}</option>
            @endforeach
        </select>
        @error('nationality') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-4 form-group">
        <label for=""><span class="span-required">*</span>Provincia</label>
        <select name="" id="" class="form form-control" wire:change="setDistricts()" wire:model="province">
            <option value="" selected>escolha...</option>
            @foreach($provinces as $province)
              <option value="{{$province->id}}">{{$province->label}}</option>
            @endforeach
        </select>
        @error('province') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-4 form-group">
        <label for=""><span class="span-required">*</span>Distrito</label>
        <select name="" id="" class="form form-control" wire:model="district">
            <option value="" selected>escolha...</option>
            @foreach($districts as $district)
              <option value="{{$district->id}}">{{$district->label}}</option>
            @endforeach
        </select>
        @error('district') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-8 form-group">
        <label for="">Naturalidade Estrangeira</label>
        <input type="text" class="form form-control" placeholder="Dalas, Estados Unidos de America" wire:model="foreign_birthplace">
        @error('foreign_birthplace') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-6 form-group">
        <label for=""><span class="span-required">*</span>Nome do Pai (Filiacao)</label>
        <input type="text" class="form form-control" placeholder="870003334" wire:model="father_name">
        @error('father_name') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-6 form-group">
        <label for=""><span class="span-required">*</span>Nome da Mae (Filiacao)</label>
        <input type="text" class="form form-control" placeholder="870003334" wire:model="name_mother">
        @error('name_mother') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-12 form-group">
        <button class="btn btn-success px-5 my-3">Atualizar</button>
    </div>
</form>