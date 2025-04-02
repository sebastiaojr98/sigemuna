<form class="row" wire:submit="createOccurrence({{$employee->id}})">
    <div class="col-12 form-group">
        <label for="">Estado</label>
        <select name="" id="" class="form form-control" wire:model="status" required>
            <option value="">escolha...</option>
            @foreach ($statuses as $key => $status)
            @if ($key != $employee->working_status && $employee->working_status != 0)
                <option value="{{$key}}">{{$status}}</option>
            @endif
                
            @endforeach
        </select>
        @error('status') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-6 form-group">
        <label for="">Inicio</label>
        <input type="date" class="form form-control"  wire:model="start_date" max="{{date("Y-m-d")}}" required>
        @error('start_date') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-6 form-group">
        <label for="">Termino</label>
        <input type="date" class="form form-control"  wire:model="end_date"  max="{{date("Y-m-d")}}">
        @error('end_date') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-12 form-group">
        <label for="">Anexo de Documento</label>
        <input type="file" class="form form-control" wire:model="document">
        @error('document') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-12 form-group">
        <label for="">Descrição</label>
        <textarea name="" id="" cols="30" rows="5" class="form form-control" wire:model="description"></textarea>
        @error('description') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-12 my-3">
      <button class="btn btn-success px-5" type="submit">Salvar</button>
    </div>
</form>