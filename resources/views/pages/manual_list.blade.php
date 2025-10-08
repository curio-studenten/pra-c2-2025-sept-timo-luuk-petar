<x-layouts.app>

    <x-slot:head>
        <meta name="robots" content="index, nofollow">
    </x-slot:head>

    <x-slot:breadcrumb>
        <li><a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/" alt="Manuals for '{{$brand->name}}'" title="Manuals for '{{$brand->name}}'">{{ $brand->name }}</a></li>
    </x-slot:breadcrumb>


    <h1>{{ $brand->name }}</h1>

    <p>{{ __('introduction_texts.type_list', ['brand'=>$brand->name]) }}</p>


        <div class="manual-buttons-container" style="display: flex !important; flex-wrap: wrap !important; gap: 30px !important; margin-top: 20px;">

        <div style="display: grid; grid-template-columns: repeat(5, 1fr); gap: 30px;">
            @foreach($popularManuals as $manual)
                <div class="manual-button-wrapper">
                    @if ($manual->locally_available)
                        <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/{{ $manual->id }}/" 
                        class="btn btn-primary manual-button"
                        style="min-width: 180px; padding: 10px 15px; border-radius: 6px; display: block;"
                        alt="{{ $manual->name }}" 
                        title="{{ $manual->name }}">
                            <i class="fas fa-file-pdf"></i> {{ $manual->name }}
                            <small class="d-block text-muted">{{ $manual->filesize_human_readable }}</small>
                        </a>
                    @else
                        <a href="{{ $manual->url }}" 
                        target="_blank" 
                        class="btn btn-primary manual-button"
                        style="min-width: 180px; padding: 10px 15px; border-radius: 6px; display: block;"
                        alt="{{ $manual->name }}" 
                        title="{{ $manual->name }}">
                            <i class="fas fa-download"></i> {{ $manual->name }}
                            <small class="d-block" style="color: white !important;">Externe link ({{ $manualBrandnames }})</small>
                        </a>
                    @endif
                </div>
            @endforeach
        </div>

            <hr style="width: 100%; margin-top: 0px; margin-bottom: 10px;">

            @foreach ($manuals as $manual)
                <div class="manual-button-wrapper" style="display: inline-block !important; margin-right: 30px !important; margin-bottom: 30px !important;">
                    @if ($manual->locally_available)
                        <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/{{ $manual->id }}/" 
                           class="btn btn-primary manual-button" 
                           style="min-width: 180px; max-width: 200px; padding: 10px 15px; border-radius: 6px; display: inline-block !important;"
                           alt="{{ $manual->name }}" 
                           title="{{ $manual->name }}">
                            <i class="fas fa-file-pdf"></i> {{ $manual->name }}
                            <small class="d-block text-muted">{{$manual->filesize_human_readable}}</small>
                        </a>
                    @else
                        <a href="{{ $manual->url }}" 
                           target="new" 
                           class="btn btn-primary manual-button" 
                           style="min-width: 180px; max-width: 200px; padding: 10px 15px; border-radius: 6px; display: inline-block !important;"
                           alt="{{ $manual->name }}" 
                           title="{{ $manual->name }}">
                            <i class="fas fa-download"></i> {{ $manual->name }}
                            <small class="d-block" style="color: white !important;">Externe link</small>
                        </a>
                    @endif
                </div>
            @endforeach
        </div>

</x-layouts.app>
