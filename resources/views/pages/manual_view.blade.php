<x-layouts.app>

    <x-slot:head>
        <meta name="robots" content="index, nofollow">
    </x-slot:head>

    <x-slot:breadcrumb>
        <li><a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/" alt="Manuals for '{{$brand->name}}'" title="Manuals for '{{$brand->name}}'">{{ $brand->name }}</a></li>
        <li><a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/" alt="Manuals for '{{$brand->name}} {{ $type->name }}'" title="Manuals for '{{$brand->name}} {{ $type->name }}'">{{ $type->name }}</a></li>
        <li><a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/{{ $manual->id }}/" alt="View manual for '{{$brand->name}} '" title="View manual for '{{$brand->name}} {{ $type->name }}'">View</a></li>
    </x-slot:breadcrumb>

    <h1>{{ $brand->name }} - {{ $type->name }}</h1>

    @if ($manual->locally_available)
        <div class="manual-view-container mb-4">
            <iframe src="{{ $manual->url }}" width="780" height="600" frameborder="0" marginheight="0" marginwidth="0" class="manual-iframe">
            Iframes are not supported<br />
            <a href="{{ $manual->url }}" target="new" class="btn btn-primary btn-lg manual-download-btn" alt="Download your manual here" title="Download your manual here">
                <i class="fas fa-file-pdf"></i> Download Manual
            </a>
            </iframe>
        </div>
        <div class="manual-actions text-center">
            <a href="{{ $manual->url }}" target="new" class="btn btn-primary btn-lg manual-download-btn" alt="Download your manual here" title="Download your manual here">
                <i class="fas fa-download"></i> Download Manual
            </a>
        </div>
    @else
        <div class="manual-actions text-center">
            <a href="{{ $manual->url }}" target="new" class="btn btn-success btn-lg manual-download-btn" alt="Download your manual here" title="Download your manual here">
                <i class="fas fa-external-link-alt"></i> Open External Manual
            </a>
        </div>
    @endif

</x-layouts.app>
