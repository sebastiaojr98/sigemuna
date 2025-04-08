<div class="row">

    <div class="col-7 form-group mb-2">
        <label for="">Fornecedor</label>
        <input type="text" class="form form-control" wire:model='supplier' disabled>
    </div>

    <div class="col-5 form-group">
        <label for="">Referente (Factura)</label>
        <input type="text" class="form form-control" wire:model='invoiceNumber'>
        @error('invoiceNumber') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>

    <div class="col-5 form-group mb-2">
        <label for="">Valor</label>
        <input type="text" class="form form-control" wire:model='amountPaid'>
        @error('amountPaid') <small class="alert-error"> {{ $message }} </small> @enderror
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

    <div class="col-6 form-group mb-2">
        <label for="">Ref. Transação</label>
        <input type="text" class="form form-control" wire:model='reference'>
        @error('reference') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>

    <div class="col-6 form-group">
        <label for="">Data de Pagamento</label>
        <input type="date" class="form form-control" wire:model='paymentDate' max="{{date('Y-m-d')}}">
        @error('paymentDate') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>

    <div class="col-12 form-group">
        <label for="">Comprovativo (Opcional)</label>
        <input type="file" class="form form-control" wire:model="file">
        @error('file') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>

    <div class="col-12">
        <button class="btn btn-success my-3 form-control" type="submit" wire:click='confirmPay()'>Processar</button>
    </div>
</div>