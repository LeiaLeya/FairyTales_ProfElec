<div class="fairy-card-grid" id="character-grid">
@php
    $characterColors = [
        'Cinderella' => '#7ec6e3', // light blue
        'Snow White' => '#f7c6c7', // soft red/pink
        'Little Red Riding Hood' => '#e74c3c', // red
        'Rapunzel' => '#ffd54f', // yellow
        'Aladdin' => '#ba68c8', // purple
        'The Little Mermaid' => '#4dd0e1', // teal
        'Beauty (Belle)' => '#ffb74d', // orange
        'Pinocchio' => '#a1887f', // brown
        'Jack' => '#81c784', // green
        'Sleeping Beauty' => '#e57373', // pink
        'Mulan' => '#64b5f6', // blue
        'Peter Pan' => '#f093fb', // pink
        'Tiana' => '#43e97b', // green
        'Puss in Boots' => '#4facfe', // blue
        'Thumbelina' => '#fa709a', // pink
        'Hercules' => '#ff7043', // orange
        'Alice' => '#a8edea', // light blue
        'Elsa' => '#b3d8f7', // icy blue
        'Moana' => '#ffd54f', // yellow
        'Merida' => '#e74c3c', // red
    ];
    $defaultColors = ['#e57373', '#81c784', '#64b5f6', '#ffd54f', '#ba68c8', '#4dd0e1', '#ffb74d', '#a1887f'];
@endphp
@if(count($characters) > 0)
    @foreach ($characters as $character)
        @php
            $color = $characterColors[$character->name] ?? $defaultColors[$loop->index % count($defaultColors)];
        @endphp

        <div style="position: relative; display: inline-block;">
            <div class="character-image-wrapper" style="position: absolute !important; top: -120px !important; left: 50% !important; transform: translateX(-50%) !important; z-index: 2 !important; width: 350px !important; height: 400px !important; display: flex !important; align-items: center !important; justify-content: center !important;">
                @if ($character->image_path)
                    <img src="{{ asset('storage/' . $character->image_path) }}" alt="{{ $character->name }}" class="character-image" style="width: 100% !important; height: 100% !important; object-fit: contain !important;">
                @else
                    <div class="character-placeholder" style="width: 350px !important; height: 400px !important; background: #fff !important; display: flex !important; align-items: center !important; justify-content: center !important; font-size: 2.5rem !important; color: #f5576c !important;">?</div>
                @endif
            </div>
            
            <div class="fairy-card" style="background: {{ $color }};" data-character-id="{{ $character->id }}" data-name="{{ $character->name }}" data-origin="{{ $character->origin }}" data-theme="{{ $character->theme }}" data-power="{{ $character->power }}" data-antagonist="{{ $character->antagonist }}" data-sidekick="{{ $character->animal_sidekick }}" data-image="{{ $character->image_path ? asset('storage/' . $character->image_path) : '' }}" data-species="{{ $character->species }}" data-story="{{ $character->story }}">
                <div class="fairy-card-name">{{ $character->name }}</div>
                <div class="fairy-card-origin">{{ $character->origin }}</div>
            </div>
        </div>
    @endforeach
@else
    <div style="width:100%;text-align:center;padding:4rem 0;font-size:1.3rem;color:#888;grid-column:1/-1;">
        No characters found!
    </div>
@endif
</div>
