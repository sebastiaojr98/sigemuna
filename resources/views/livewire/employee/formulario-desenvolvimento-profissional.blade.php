<form class="row" wire:submit="createProfessionalDevelopment({{$employee->id}})">
    <div class="col-5 form-group">
        <label for="">Código do Processo</label>
        <input type="text" class="form form-control" placeholder="código" wire:model="process_code">
        @error('process_code') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-7 form-group">
        <label for="">Departamento</label>
        <select name="" id="" class="form form-control" wire:change="setPositionCompany()" wire:model="department">
            <option value="" selected>escolha...</option>
            @foreach($departments as $department)
              <option value="{{$department->id}}">{{$department->label}}</option>
            @endforeach
        </select>
        @error('department') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-7 form-group">
        <label for="">Função Exercida</label>
        <select name="" id="" class="form form-control" wire:model="position_company">
            <option value="" selected>escolha...</option>
            @foreach($position_companies as $position_company)
              <option value="{{$position_company->id}}">{{$position_company->label}}</option>
            @endforeach
        </select>
        @error('position_company') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-5 form-group">
        <label for="">Categoria</label>
        <input type="text" class="form form-control" wire:model="category" placeholder="categoria">
        @error('category') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-5 form-group">
        <label for="">Despacho (Ano/numero)</label>
        <input type="text" class="form form-control" placeholder="Despacho ano/numero" wire:model="dispatch_process">
        @error('dispatch_process') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-7 form-group">
        <label for="">Data de Despacho</label>
        <input type="date" class="form form-control" wire:model="dispatch_date" max="{{date("Y-m-d")}}">
        @error('dispatch_date') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-6 form-group">
        <label for="">Data de Visto</label>
        <input type="date" class="form form-control" wire:model="visa_date" max="{{date("Y-m-d")}}">
        @error('visa_date') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-6 form-group">
        <label for="">Período (De)</label>
        <input type="date" class="form form-control" wire:model="begin" max="{{date("Y-m-d")}}">
        @error('begin') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-6 form-group">
        <label for="">Período (A)</label>
        <input type="date" class="form form-control" wire:model="finish">
        @error('finish') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-12 form-group">
        <label for="">Anexo de Documento</label>
        <input type="file" class="form form-control" wire:model="document">
        @error('document') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-12 my-3">
      <button class="btn btn-success px-5" type="submit">Salvar</button>
    </div>
</form>