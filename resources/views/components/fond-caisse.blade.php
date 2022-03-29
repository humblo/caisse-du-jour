<?php
$total = 0;
?>
<div class="row p-4">
    <div class="col-md-6 mb-3">
        <label for="operation" class="form-label">Type d'opération</label>
        <select id="operation" name="operation" class="form-select">
            @foreach($type_operations as $type)
                @php
                    $selected = ($typeoperation_id == $type['id']) ? 'selected':'';
                @endphp
                <option value="{{ $type['id'] }}" {{ $selected }}>{{ $type['title'] }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6 operation-value display-input" id="total-caisse">
        @if(empty($content))
            0 €
        @else
            @foreach(['billet','piece','centime'] as $type)
                @foreach($content->$type as $item)
                        @php
                            $total = $total + ($item->operation * $item->quantite);
                        @endphp
                @endforeach
            @endforeach
                {{ $total }} €
        @endif

    </div>
    <!-- /type d'operation -->
    <!-- Date --->
    <div class="col-md-6 mb-3">
        <label for="date" class="form-label">Date</label>
        <input type="date" class="form-control" name="date" id="date" value="{{ $date }}">
    </div>
    <div class="col-md-6">
        &nbsp;
    </div>
    <!-- / date -->
    <!-- Note -->
    <div class="col-12">
        <label for="note" class="form-label">Note</label>
        <textarea rows="3" cols="" name="note" id="note" class="form-control">{{ $note }}</textarea>
    </div>
    <!-- /Note -->
</div>
