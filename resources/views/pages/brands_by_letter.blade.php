<x-layouts.app>
    <h1>Merken beginnend met "{{ $letter }}"</h1>

    <div class="brand-letters" style="display: flex; flex-wrap: wrap; gap: 15px; font-size: 1.3rem; margin-bottom: 20px;">
        @foreach($letters as $ltr)
            <a href="{{ route('brands.byLetter', ['letter' => $ltr]) }}"
               style="width: 35px; text-align: center; font-weight: bold; text-decoration: none; color: {{ $ltr == $letter ? 'red' : '#007bff' }};">
                {{ $ltr }}
            </a>
        @endforeach
    </div>

    <hr>

    @if($brands->isEmpty())
        <p>Geen merken gevonden die beginnen met "{{ $letter }}".</p>
    @else
        <ul>
            @foreach($brands as $brand)
                <li>
                    <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/">
                        {{ $brand->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif

    <p><strong>Hallo! Ik ben {{ $developerName ?? 'Petar' }}</strong></p>
</x-layouts.app>
