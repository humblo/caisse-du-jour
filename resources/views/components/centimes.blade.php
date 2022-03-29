<?php
$total = 0;
?>
<div class="mb-3 mt-5">
    <h2>Centimes</h2>
</div>
<div class="p-4 box-centime" data-type="centime">
    @if(empty($content))
        @php
            $counter = 1;
        @endphp
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="operation" class="form-label">Nominal</label>
                <select id="centime_operation_1" name="centime[1][operation]"
                        class="form-select form-control">
                    @foreach($centimes as $centime)
                        <option value="{{ $centime / 100 }}">{{ $centime }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="" class="form-label">Quantité</label>
                <input name="centime[1][quantite]" id="centime_quantite_1" class="form-control"/>
            </div>
            <div class="col-md-4 centime-value display-input-1">
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
                    <select id="centime_operation_{{ $key }}" name="centime[{{ $key }}][operation]"
                            class="form-select form-control">
                        @foreach($centimes as $centime)
                            @php
                                $selected = ($centime == $item->operation) ? 'selected':'';
                            @endphp
                            <option value="{{ $centime / 100 }}" {{ $selected }}>{{ $centime }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label">Quantité</label>
                    <input name="centime[{{ $key }}][quantite]" id="centime_quantite_{{ $key }}" class="form-control" value="{{ $item->quantite }}"/>
                </div>
                @if($key==1)
                    <div class="col-md-4 centime-value display-input-1">
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
    <input type="hidden" name="counter-centime" id="counter-centime" value="{{ $counter }}">
    <input type="hidden" name="total-centime" id="total-centime" value="{{ $total }}">
    <button type="submit" class="btn btn-success cta-add" id="add-centime"
            data-type="centime">Ajouter
    </button>
</div>
