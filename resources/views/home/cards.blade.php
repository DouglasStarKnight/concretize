@foreach ($destaques ?? [] as $destaque)
    <x-produto-card
        :title="$destaque['nome']"
        :destaques="collect([$destaque])"
    />
@endforeach
