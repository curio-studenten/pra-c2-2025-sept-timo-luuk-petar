<x-layouts.app>

    <h1>
        <x-slot:title>
            {{ __('misc.all_brands') }}
        </x-slot:title>
    </h1>

    <h2>Alle merkletters</h2>


    <div class="brand-letters" style="display: flex; flex-wrap: wrap; gap: 20px; font-size: 1.5rem;">
        @foreach($letters as $letter)
            <a href="#{{ $letter }}"
            style="width: 40px; text-align: center; font-weight: bold; text-decoration: none; color: #007bff;">
                {{ $letter }}
            </a>
        @endforeach
    </div>

    <hr style="margin: 30px 0;">

    <h2>Populaire merken</h2>

    <table cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Naam</th>
            </tr>
        </thead>
        <tbody>
            @foreach($popularManuals as $manual)
                <tr>
                    <td>{{ $manual->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <!-- Developer info - TICKET 04 -->
    <p><strong>Hallo! Ik ben {{ $developerName ?? 'Petar' }}</strong></p>

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
                                <h2 id="' . $current_first_letter . '"><a href="' . route('brands.byLetter', ['letter' => $current_first_letter]) . '">' . $current_first_letter . '</a></h2>
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
