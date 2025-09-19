<x-layouts.app>

    <x-slot:introduction_text>
        <p><img src="img/afbl_logo.png" align="right" width="100" height="100">{{ __('introduction_texts.homepage_line_1') }}</p>
        <p style="background: red; color: white; padding: 10px; font-size: 20px; font-weight: bold;">TEST - LARAGON IS WORKING - {{ now() }}</p>
        <p>{{ __('introduction_texts.homepage_line_2') }}</p>
        <p>{{ __('introduction_texts.homepage_line_3') }}</p>
        
        <!-- Developer info section -->
        <div class="alert alert-info mt-3" style="border: 2px solid red; background-color: #d1ecf1;">
            <h4>👋 Hallo! Ik ben {{ $developerName ?? 'NO NAME' }}</h4>
            <p class="mb-1"><strong>Welkom:</strong> {{ $welcomeMessage ?? 'NO MESSAGE' }}</p>
            <p class="mb-1"><strong>Vandaag:</strong> {{ $currentDate ?? 'NO DATE' }}</p>
            <p class="mb-0"><strong>Beschikbare merken:</strong> {{ $totalBrands ?? 'NO COUNT' }} verschillende merken</p>
            <p><strong>DEBUG:</strong> Variables passed: {{ isset($developerName) ? 'YES' : 'NO' }}</p>
        </div>
    </x-slot:introduction_text>

    <!-- TEST: Direct content outside of slots -->
    <div style="background: yellow; padding: 20px; margin: 20px; border: 3px solid green;">
        <h2>DIRECT TEST - This should be visible!</h2>
        <p>Developer: {{ $developerName ?? 'NO NAME' }}</p>
        <p>Time: {{ now() }}</p>
    </div>

    <h1>
        <x-slot:title>
            {{ __('misc.all_brands') }}
        </x-slot:title>
    </h1>


    <?php
    $size = count($brands);
    $columns = 3;
    $chunk_size = ceil($size / $columns);
    ?>

    <div class="container">
        <!-- Example row of columns -->
        <div class="row">

            @foreach($brands->chunk($chunk_size) as $chunk)
                <div class="col-md-4">

                    <ul>
                        @foreach($chunk as $brand)

                            <?php
                            $current_first_letter = strtoupper(substr($brand->name, 0, 1));

                            if (!isset($header_first_letter) || (isset($header_first_letter) && $current_first_letter != $header_first_letter)) {
                                echo '</ul>
						<h2>' . $current_first_letter . '</h2>
						<ul>';
                            }
                            $header_first_letter = $current_first_letter
                            ?>

                            <li>
                                <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/">{{ $brand->name }}</a>
                            </li>
                        @endforeach
                    </ul>

                </div>
                <?php
                unset($header_first_letter);
                ?>
            @endforeach

        </div>

    </div>
</x-layouts.app>
