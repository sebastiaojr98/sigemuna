<form class="row" wire:submit="createExperience({{$employee->id}})">
    <div class="col-12 form-group">
        <label for="">Empregador</label>
        <input type="text" class="form form-control" placeholder="empregador" wire:model="employer">
        @error('employer') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-12 form-group">
        <label for="">Função Exercida</label>
        <input type="text" class="form form-control" placeholder="função exercida" wire:model="function_performed">
        @error('function_performed') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-6 form-group">
        <label for="">Período (De)</label>
        <input type="date" class="form form-control" placeholder="curso" wire:model="begin">
        @error('begin') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-6 form-group">
        <label for="">Período (A)</label>
        <input type="date" class="form form-control" placeholder="curso" wire:model="finish">
        @error('finish') <small class="alert-error"> {{ $message }} </small> @enderror
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