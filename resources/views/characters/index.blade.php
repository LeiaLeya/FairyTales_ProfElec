@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap');
    body {
        font-family: 'Nunito', 'Inter', Arial, sans-serif;
        background: #fff;
    }
    .fairy-header {
        display: flex;
        align-items: center;
        justify-content: flex-start;
        padding: 2.5rem 2.5rem 1.5rem 2.5rem;
        background: transparent;
    }
    .fairy-title {
        font-family: 'Dancing Script', cursive;
        font-size: 2.6rem;
        font-weight: 700;
        letter-spacing: 1px;
        color: #222;
        margin-right: auto;
    }
    .fairy-search-bar {
        display: flex;
        justify-content: flex-end;
        flex: 1;
    }
    .fairy-search-input {
        border-radius: 999px;
        border: 1.5px solid #bbb;
        padding: 0.7rem 2.5rem 0.7rem 1.2rem;
        font-size: 1.1rem;
        width: 350px;
        box-shadow: 0 2px 12px rgba(0,0,0,0.07);
        outline: none;
        background: #f7f7f7;
        transition: box-shadow 0.2s, border-color 0.2s;
    }
    .fairy-search-input:focus {
        box-shadow: 0 4px 18px rgba(0,0,0,0.13);
        border-color: #888;
    }

    .fairy-card-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 7rem;
        padding: 3rem 2.5rem 2.5rem 2.5rem;
        justify-content: center;
        margin-top: 1rem;
    }
    .fairy-card {
        width: 300px;
        height: 380px;
        border-radius: 1.5rem;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-end;
        position: relative;
        overflow: visible;
        cursor: pointer;
        transition: transform 0.13s, box-shadow 0.13s;
        box-shadow: 0 2px 12px rgba(0,0,0,0.06);
        padding: 0.5rem 1.2rem 1.2rem 1.2rem;
        margin-bottom: 0;
    }
    .fairy-card:hover {
        transform: translateY(-6px) scale(1.03);
        box-shadow: 0 8px 32px rgba(0,0,0,0.10);
    }
    .fairy-card-img {
        width: 120px;
        height: 120px;
        object-fit: contain;
        position: absolute;
        left: 50%;
        top: 18px;
        transform: translateX(-50%);
        z-index: 2;
        background: transparent;
        pointer-events: none;
    }
    .fairy-card-name {
        font-size: 1.2rem;
        font-weight: 800;
        color: #fff;
        margin-bottom: 0.2rem;
        margin-left: 0.1rem;
        text-shadow: 0 2px 8px rgba(0,0,0,0.10);
    }
    .fairy-card-origin {
        font-size: 0.98rem;
        color: #fff;
        opacity: 0.85;
        margin-left: 0.1rem;
        margin-bottom: 0.1rem;
    }
    /* Modal styles */
    .fairy-modal-bg {
        display: none;
        position: fixed;
        top: 0; left: 0; right: 0; bottom: 0;
        background: rgba(0,0,0,0.25);
        z-index: 1000;
        justify-content: center;
        align-items: center;
    }
    .fairy-modal-bg.active {
        display: flex;
    }
    .fairy-modal {
        background: #fff;
        border-radius: 2rem;
        box-shadow: 0 8px 40px rgba(0,0,0,0.18);
        padding: 2.5rem 2rem 2rem 2rem;
        max-width: 700px;
        width: 95vw;
        position: relative;
        display: flex;
        gap: 2rem;
        align-items: flex-start;
        animation: fairyModalIn 0.25s cubic-bezier(.4,2,.6,1) 1;
    }
    @keyframes fairyModalIn {
        from { transform: translateY(40px) scale(0.97); opacity: 0; }
        to { transform: none; opacity: 1; }
    }
    .fairy-modal-img {
        width: 180px;
        height: 180px;
        object-fit: contain;
        border-radius: 1.5rem;
        background: #f7f7f7;
        box-shadow: 0 2px 12px rgba(0,0,0,0.07);
    }
    .fairy-modal-content {
        flex: 1;
    }
    .fairy-modal-name {
        font-size: 2rem;
        font-weight: 800;
        color: #f5576c;
        margin-bottom: 0.5rem;
    }
    .fairy-modal-origin {
        font-size: 1.1rem;
        color: #888;
        margin-bottom: 1.2rem;
    }
    .fairy-modal-desc {
        font-size: 1.1rem;
        color: #444;
        margin-bottom: 1.2rem;
    }
    .fairy-modal-close {
        position: absolute;
        top: 1.2rem;
        right: 1.5rem;
        font-size: 1.5rem;
        color: #888;
        background: none;
        border: none;
        cursor: pointer;
        font-weight: bold;
        transition: color 0.2s;
    }
    .fairy-modal-close:hover {
        color: #f5576c;
    }
    @media (max-width: 900px) {
        .fairy-header, .fairy-card-grid { padding-left: 1rem; padding-right: 1rem; }
        .fairy-card-grid { gap: 1.2rem; }
    }

    .character-image-wrapper {
        position: absolute !important;
        top: -50px !important;
        left: 50%;
        transform: translateX(-50%);
        z-index: 2;
        width: 400px;
        height: 500px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .character-image {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .character-placeholder {
        width: 400px;
        height: 500px;
        background: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        color: #f5576c;
    }
</style>
<div class="fairy-header">
    <div class="fairy-title">Fairy Tales Characters</div>
    <div class="fairy-search-bar">
        <input type="text" class="fairy-search-input search-input" placeholder="Search Characters..." value="{{ request('search') }}">
    </div>
</div>
<div class="fairy-card-grid" id="character-grid">
    @include('characters._grid', ['characters' => $characters])
</div>
<div class="fairy-modal-bg" id="fairy-modal-bg">
    <div class="fairy-modal" id="fairy-modal">
        <img src="" class="fairy-modal-img" id="modal-img" alt="Character Image">
        <div class="fairy-modal-content">
            <div class="fairy-modal-name" id="modal-name"></div>
            <div class="fairy-modal-origin" id="modal-origin"></div>
            <div class="fairy-modal-desc" id="modal-species"></div>
            <div class="fairy-modal-desc" id="modal-story"></div>
            <div class="fairy-modal-desc" id="modal-theme"></div>
            <div class="fairy-modal-desc" id="modal-power"></div>
            <div class="fairy-modal-desc" id="modal-antagonist"></div>
            <div class="fairy-modal-desc" id="modal-sidekick"></div>
        </div>
        <button class="fairy-modal-close" id="modal-close">&times;</button>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(function() {
    // Modal logic
    $(document).on('click', '.fairy-card', function() {
        let $card = $(this);
        $('#modal-img').attr('src', $card.data('image'));
        $('#modal-name').text($card.data('name'));
        $('#modal-origin').text('Origin: ' + $card.data('origin'));
        $('#modal-species').text('Species: ' + $card.data('species'));
        $('#modal-story').text('Story: ' + $card.data('story'));
        $('#modal-theme').text('Theme: ' + $card.data('theme'));
        $('#modal-power').text('Power: ' + $card.data('power'));
        $('#modal-antagonist').text('Antagonist: ' + $card.data('antagonist'));
        $('#modal-sidekick').text('Sidekick: ' + ($card.data('sidekick') || 'None'));
        $('#fairy-modal-bg').addClass('active');
    });
    
    // Close modal when clicking outside or on close button
    $('#modal-close, #fairy-modal-bg').on('click', function(e) {
        if (e.target === this) {
            $('#fairy-modal-bg').removeClass('active');
        }
    });
    
    // Close modal with Escape key
    $(document).on('keydown', function(e) {
        if (e.key === 'Escape' && $('#fairy-modal-bg').hasClass('active')) {
            $('#fairy-modal-bg').removeClass('active');
        }
    });
    
    // AJAX search
    let typingTimer;
    const doneTypingInterval = 350;
    const $input = $(".search-input");
    $input.on('input', function() {
        clearTimeout(typingTimer);
        typingTimer = setTimeout(function() {
            const search = $input.val();
            $.ajax({
                url: "{{ route('characters.ajaxSearch') }}",
                data: { search: search },
                success: function(data) {
                    $('#character-grid').replaceWith(data);
                }
            });
        }, doneTypingInterval);
    });
    $input.on('keydown', function() {
        clearTimeout(typingTimer);
    });
});
</script>
@endsection
