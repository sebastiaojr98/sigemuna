<div class="row">

    <div class="col-5 form-group">
        <label for="">Referente (Factura)</label>
        <input type="text" class="form form-control" wire:model='invoiceNumber' disabled>
    </div>


    <div class="col-7 form-group">
        <label for="">Metodo de Pagamento</label>
        <select name="" id="" class="form form-control" wire:model="paymentMethod">
            <option value="" selected>escolha...</option>
            @foreach ($paymentMethods as $pm)
                <option value="{{$pm->id}}">{{$pm->label}}</option>
            @endforeach
        </select>
        @error('paymentMethod') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>

    <div class="col-7 form-group">
        <label for="">Valor a pagar</label>
        <input type="text" class="form form-control" wire:model='amountPaid'>
        @error('amountPaid') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>

    <div class="col-5 form-group">
        <label for="">Data de Pagamento</label>
        <input type="date" class="form form-control" wire:model='paymentDate' @if(count($this->accountReceivable)) min="{{date("Y-m-d", strtotime($this->accountReceivable['created_at']))}}" @endif max="{{date("Y-m-d")}}">
        @error('paymentDate') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>

    <div class="col-12 form-group">
        <label for="">Comprovativo (Opcional)</label>
        <input type="file" class="form form-control" wire:model="file">
        @error('file') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>

    <div class="col-12">
      <button class="btn btn-success my-3 form-control" type="submit" wire:click='pay()'>Processar</button>
    </div>
</div>