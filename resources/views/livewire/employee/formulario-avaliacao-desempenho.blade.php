<form class="row" wire:submit="createPerformanceEvaluation({{$employee->id}})">
    <div class="col-5 form-group">
        <label for="">Ano</label>
        <input type="text" class="form form-control" placeholder="ano" wire:model="year">
        @error('year') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-7 form-group">
        <label for="">Nota</label>
        <input type="text" class="form form-control" placeholder="nota" wire:model="note">
        @error('note') <small class="alert-error"> {{ $message }} </small> @enderror
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