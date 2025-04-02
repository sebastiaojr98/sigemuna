<form class="row" wire:submit="createHiring({{$employee->id}})">
    <div class="col-12 form-group">
        <label for="">Código do Processo</label>
        <input type="text" class="form form-control" placeholder="código do Processo" wire:model="process_code">
        @error('process_code') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-6 form-group">
        <label for="">Despacho (Ano/numero)</label>
        <input type="text" class="form form-control" placeholder="Despacho ano/numero" wire:model="dispatch_process">
        @error('dispatch_process') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-6 form-group">
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
        <label for="">Início de Funções</label>
        <input type="date" class="form form-control" wire:model="start_of_functions" max="{{date("Y-m-d")}}">
        @error('start_of_functions') <small class="alert-error"> {{ $message }} </small> @enderror
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