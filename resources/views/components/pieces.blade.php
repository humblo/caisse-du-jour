<?php
$total = 0;
?>
<div class="mb-3 mt-5">
    <h2>Pièces</h2>
</div>
<div class="p-4 box-piece" data-type="piece">
    @if(empty($content))
        @php
            $counter = 1;
        @endphp
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="operation" class="form-label">Nominal</label>
                <select name="piece[1][operation]" id="piece_operation_1"
                        class="form-select form-control">
                    @foreach($pieces as $piece)
                        <option value="{{ $piece }}">{{ $piece }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label for="" class="form-label">Quantité</label>
                <input name="piece[1][quantite]" id="piece_quantite_1" class="form-control"/>
            </div>
            <div class="col-md-4 piece-value display-input-1">
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
                    <select name="piece[{{ $key }}][operation]" id="piece_operation_{{ $key }}"
                            class="form-select form-control">
                        @foreach($pieces as $piece)
                            @php
                                $selected = ($piece == $item->operation) ? 'selected':'';
                            @endphp
                            <option value="{{ $piece }}" {{ $selected }}>{{ $piece }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="" class="form-label">Quantité</label>
                    <input name="piece[{{ $key }}][quantite]" id="piece_quantite_{{ $key }}" class="form-control"
                           value="{{ $item->quantite }}"/>
                </div>
                @if($key==1)
                    <div class="col-md-4 piece-value display-input-1">
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
    <input type="hidden" name="counter-piece" id="counter-piece" value="{{ $counter }}">
    <input type="hidden" name="total-piece" id="total-piece" value="{{ $total }}">
    <button type="button" class="btn btn-success cta-add" id="add-piece" data-type="piece">
        Ajouter
    </button>
</div>
