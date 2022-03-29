<?php
$total = 0;
?>
<div class="mb-3 mt-5">
    <h2>Billets</h2>
</div>
<div class="p-4 box-billet" data-type="billet">
    @if(empty($content))
        @php
        $counter = 1;
        @endphp
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="operation" class="form-label">Nominal</label>
                <select name="billet[1][operation]" id="billet_operation_1"
                        class="form-select form-control">
                    @foreach($billets as $billet)
                        <option value="{{ $billet }}">{{ $billet }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label for="" class="form-label">Quantité</label>
                <input name="billet[1][quantite]" id="billet_quantite_1" class="form-control"/>
            </div>
            <div class="col-md-4 billet-value display-input-1">
                0 €
            </div>
        </div>
    @else
        @php
            $counter = 0;
        @endphp
        @foreach($content as $item)
            @php
            $total = $total + ($item->operation * $item->quantite);
            @endphp
        @endforeach
        @foreach($content as $key=>$item)
            @php
                $counter += 1;
            @endphp
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="operation" class="form-label">Nominal</label>
                    <select name="billet[{{ $key }}][operation]" id="billet_operation_{{ $key }}"
                            class="form-select form-control">
                        @foreach($billets as $billet)
                            @php
                                $selected = ($billet == $item->operation) ? 'selected':'';
                            @endphp
                            <option value="{{ $billet }}" {{ $selected }}>{{ $billet }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="" class="form-label">Quantité</label>
                    <input name="billet[{{ $key }}][quantite]" id="billet_quantite_{{ $key }}" class="form-control"
                           value="{{ $item->quantite }}"/>
                </div>
                @if($key==1)
                    <div class="col-md-4 billet-value display-input-1">
                        {{ $total }} €
                    </div>
                @else
                    <div class="col-md-4 display-input-2 pt-3">
                        <a class="btn btn-danger delete">
                            Supprimer
                        </a>
                    </div>
                @endif
            </div>
        @endforeach
    @endif
</div>
<div class="col-12 px-4 py-2">
    <input type="hidden" name="counter-billet" id="counter-billet" value="{{ $counter }}">
    <input type="hidden" name="total-billet" id="total-billet" value="{{ $total }}">
    <button type="button" class="btn btn-success cta-add" id="add-billet"
            data-type="billet">Ajouter
    </button>
</div>
