<x-layouts.app>

    <x-slot:introduction_text>
        <p><img src="img/afbl_logo.png" align="right" width="100" height="100">{{ __('introduction_texts.homepage_line_1') }}</p>
        <p>{{ __('introduction_texts.homepage_line_2') }}</p>
        <p>{{ __('introduction_texts.homepage_line_3') }}</p>
        
        <div style="background: red; color: white; padding: 20px; font-size: 24px; text-align: center; margin: 20px 0; border: 5px solid yellow;">
            🚨 TICKET 04 TEST - IF YOU SEE THIS IT WORKS! 🚨
        </div>
        
        <!-- Developer info section -->
        <div class="alert alert-info mt-3" style="background: #d1ecf1; border: 1px solid #bee5eb; padding: 15px; margin: 15px 0;">
            <h4 style="color: #0c5460; margin-top: 0;">👋 Hallo! Ik ben Petar</h4>
            <p style="margin: 5px 0;"><strong>Welkom:</strong> Welkom bij de 4S Manuals database!</p>
            <p style="margin: 5px 0;"><strong>Vandaag:</strong> 19-09-2025</p>
            <p style="margin: 5px 0 0 0;"><strong>Beschikbare merken:</strong> 43 verschillende merken</p>
        </div>
    </x-slot:introduction_text>

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
