<div>
    @for($i = 1; $i <= 5; $i++)
        <span class="{{ $i <= $rating ? 'text-yellow-500' : 'text-gray-300' }}">
            <i class="fas fa-star"></i>
        </span>
    @endfor
</div>
