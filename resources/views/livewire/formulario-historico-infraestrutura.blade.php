<form class="row" wire:submit="createLog({{$infra->id}})">
    <div class="col-12">
        @if ($errors->has('image'))
            <div class="alert alert-danger">{{ $errors->first('image') }}</div>
        @endif
    </div>
    <div class="form-group col-6">
        <label for="">Data da Atividade</label>
        <input type="date" class="form form-control" wire:model="activity_date" max="{{date("Y-m-d")}}">
        @error('activity_date') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="form-group col-6">
        <label for="">Inicio</label>
        <input type="time" class="form form-control" wire:model="begin_time">
        @error('begin_time') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="form-group col-5">
        <label for="">Termino</label>
        <input type="time" class="form form-control" wire:model="end_time">
        @error('end_time') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="form-group col-7">
        <label for="">Estado</label>
        <select name="" id="" class="form form-control" wire:model="status">
            <option value="">escolha</option>
            <option value="0">encerado</option>
            <option value="1">funcionamento</option>
            <option value="2">manutenção</option>
        </select>
        @error('status') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="form-group col-12">
        <label for="">Técnico Responsável</label>
        <input type="text" class="form form-control" placeholder="nome" wire:model="responsible_technician">
        @error('responsible_technician') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>

    <div class="col-12 form-group">
        <label for="">Anexo de Imagens</label>
        <input type="file" class="form form-control" placeholder="nome" wire:model="images" multiple>
        @error('images.*') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>

    <div class="col-12 form-group">
        <label for="">Atividades executadas</label>
        <textarea name="" id="" rows="3" class="form form-control" wire:model="activities_performed"></textarea>
        @error('activities_performed') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>

    <div class="col-12 form-group">
        <button class="btn btn-success px-5 my-3">Cadastrar</button>
    </div>
</form>