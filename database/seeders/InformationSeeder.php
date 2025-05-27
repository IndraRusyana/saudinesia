<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Informations;
use Illuminate\Support\Str;
use Carbon\Carbon;

class InformationSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Informations::create([
                'title' => "Informasi Penting #$i",
                'date' => Carbon::now()->subDays(rand(0, 30))->format('Y-m-d'),
                'content' => '
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ac ultricies tortor. Duis tincidunt eros mattis accumsan maximus. Donec dictum gravida odio sit amet faucibus. Nullam porttitor, mauris a finibus fringilla, neque nibh accumsan quam, quis luctus odio ipsum id est. Nulla purus elit, iaculis et tincidunt at, sollicitudin sed magna. Nam placerat vulputate risus at accumsan. Sed pulvinar lacus ac urna vehicula blandit. Quisque sed iaculis justo, id suscipit augue. Integer nec mi vitae ipsum varius cursus vitae in metus. Fusce justo nisi, mattis ut faucibus id, viverra et lacus. Nulla tristique cursus porta. Etiam semper vitae velit efficitur venenatis. Aenean et est suscipit, dictum ante id, rhoncus diam. Sed nec erat vestibulum, consectetur mauris id, cursus nisl.
                    Nam vestibulum sem ac purus facilisis aliquam. Duis nec vestibulum ligula. Suspendisse gravida augue at ipsum fermentum, non feugiat est blandit. Etiam interdum velit interdum, luctus magna in, aliquet augue. Vestibulum eleifend nunc eu massa varius, molestie porttitor est fringilla. Integer vel orci sed leo rhoncus mollis. Integer pharetra nulla quis massa maximus, egestas placerat lectus eleifend. Nulla sagittis nulla a efficitur laoreet.
                    Donec sed hendrerit odio. Sed elementum sed mauris a eleifend. Duis euismod neque non lectus iaculis, ut sodales justo consequat. Nam semper gravida erat vel aliquam. Cras molestie fermentum eleifend. Maecenas iaculis commodo orci, id accumsan nibh egestas et. Nunc sit amet eleifend massa. Vivamus nulla magna, tincidunt ut purus nec, dapibus venenatis lacus. Vestibulum aliquam erat tellus.
                    Mauris rhoncus faucibus odio, ac rhoncus tortor. Sed condimentum justo vel magna luctus, in maximus lorem sollicitudin. Donec dolor massa, vehicula sed ligula non, convallis vulputate tellus. Sed sit amet magna vulputate, interdum dolor lacinia, vehicula ex. Etiam pulvinar finibus nisi, non facilisis dui pulvinar sed. Nulla sit amet urna sit amet nisi venenatis interdum. Mauris aliquam nisl et ex efficitur, eget tristique turpis accumsan. Ut vel mauris nec neque rhoncus tempus.', // Atau bisa pakai teks buatan
                'images' => 'images/default.png', // Ganti dengan nama file yang tersedia
            ]);
        }
    }
}
