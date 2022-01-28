<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Song;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //HIP HOP SONGS

        Song::create([
            'artist' => 'Lil Tjay',
            'songname' => 'F.N',
            'genre' => 'Hip-Hop',
            'img' => 'https://t2.genius.com/unsafe/234x234/https%3A%2F%2Fimages.genius.com%2F645587e20411c12f2423ab02c7a2ed56.1000x1000x1.jpg',
            'duration' => '224',
        ]);

        Song::create([
            'artist' => 'Polo G',
            'songname' => 'Epidemic',
            'genre' => 'Hip-Hop',
            'img' => 'https://t2.genius.com/unsafe/276x276/https%3A%2F%2Fimages.genius.com%2Fb0070d14be229e2f7fbcccf45ef68181.1000x1000x1.png',
            'duration' => '178',
        ]);

        Song::create([
            'artist' => 'Drake',
            'songname' => 'In My Feelings',
            'genre' => 'Hip-Hop',
            'img' => 'https://t2.genius.com/unsafe/279x279/https%3A%2F%2Fimages.genius.com%2Fae0cd04ff9417b23861f674772ded07f.1000x1000x1.jpg',
            'duration' => '199',
        ]);

        Song::create([
            'artist' => 'Rod Wave',
            'songname' => 'Cold December',
            'genre' => 'Hip-Hop',
            'img' => 'https://t2.genius.com/unsafe/327x327/https%3A%2F%2Fimages.genius.com%2F5a5d6240552af5a85f1aef11b5abfda1.1000x1000x1.png',
            'duration' => '193',
        ]);

         //POP SONGS

        Song::create([
            'artist' => 'Carly Rae Jepsen',
            'songname' => 'Call Me Maybe',
            'genre' => 'Pop',
            'img' => 'https://t2.genius.com/unsafe/327x327/https%3A%2F%2Fimages.genius.com%2F283abd59015ade77f957552c4af32f76.1000x1000x1.jpg',
            'duration' => '194',
        ]);

        Song::create([
            'artist' => 'The Weekend',
            'songname' => 'Blinding Lights',
            'genre' => 'Pop',
            'img' => 'https://t2.genius.com/unsafe/327x327/https%3A%2F%2Fimages.genius.com%2F22ca9d47b12db20bbfc88da431fba87b.1000x1000x1.png',
            'duration' => '201',
        ]);

        Song::create([
            'artist' => 'Rihanna',
            'songname' => 'Umbrella',
            'genre' => 'Pop',
            'img' => 'https://t2.genius.com/unsafe/284x284/https%3A%2F%2Fimages.genius.com%2F9971bfbea4efdc425c909d8795c85dda.1000x1000x1.jpg',
            'duration' => '257',
        ]);

        Song::create([
            'artist' => 'Adele',
            'songname' => 'Rolling in the Deep',
            'genre' => 'Pop',
            'img' => 'https://t2.genius.com/unsafe/327x327/https%3A%2F%2Fimages.genius.com%2F68266747aa7bd27b0055506437c13438.1000x1000x1.jpg',
            'duration' => '229',
        ]);

         //ROCK SONGS

        Song::create([
            'artist' => 'Pink Floyd',
            'songname' => 'Comfortably Numb',
            'genre' => 'Rock',
            'img' => 'https://t2.genius.com/unsafe/327x306/https%3A%2F%2Fimages.genius.com%2F22bab4e270d6297beeccc687f9197e81.600x561x1.jpg',
            'duration' => '383',
        ]);

        Song::create([
            'artist' => 'Deep Purple',
            'songname' => 'Smoke on the Water',
            'genre' => 'Rock',
            'img' => 'https://t2.genius.com/unsafe/327x327/https%3A%2F%2Fimages.genius.com%2Fbb865dcf124f908ed180cd82ae29bd60.600x600x1.jpg',
            'duration' => '341',
        ]);

        Song::create([
            'artist' => 'Led Zeppelin',
            'songname' => 'Kashmir',
            'genre' => 'Rock',
            'img' => 'https://t2.genius.com/unsafe/315x315/https%3A%2F%2Fimages.genius.com%2F5fcd5c712091d86147008e0de3b04630.1000x1000x1.jpg',
            'duration' => '518',
        ]);

        Song::create([
            'artist' => 'The Rolling Stones',
            'songname' => 'Gimme Shelter',
            'genre' => 'Rock',
            'img' => 'https://t2.genius.com/unsafe/327x327/https%3A%2F%2Fimages.genius.com%2F10295d9940ad3573ed1faed683d398a5.1000x1000x1.jpg',
            'duration' => '271',
        ]);

        //JAZZ SONGS

        Song::create([
            'artist' => 'Miles Davis',
            'songname' => 'So What',
            'genre' => 'Jazz',
            'img' => 'https://t2.genius.com/unsafe/304x304/https%3A%2F%2Fimages.genius.com%2Fcda383ad971af6b01a55276657739341.1000x1000x1.jpg',
            'duration' => '548',
        ]);

        Song::create([
            'artist' => 'Peggy Lee',
            'songname' => 'Fever',
            'genre' => 'Jazz',
            'img' => 'https://t2.genius.com/unsafe/276x276/https%3A%2F%2Fimages.genius.com%2F6042ad9230d2d435bbb6df03081f111b.1000x1000x1.jpg',
            'duration' => '341',
        ]);

        Song::create([
            'artist' => 'Louis Armstrong',
            'songname' => 'Summertime',
            'genre' => 'Jazz',
            'img' => 'https://t2.genius.com/unsafe/327x327/https%3A%2F%2Fimages.genius.com%2F83cfde922ed63f864df0f5e4d261aeff.381x381x1.jpg',
            'duration' => '299',
        ]);

        Song::create([
            'artist' => 'Billie Holiday',
            'songname' => 'Strange Fruit',
            'genre' => 'Jazz',
            'img' => 'https://t2.genius.com/unsafe/327x327/https%3A%2F%2Fimages.genius.com%2F5c7580dafc235ade6805b5d1cf09ba8d.1000x1000x1.jpg',
            'duration' => '191',
        ]);

        //DANCE SONGS

        Song::create([
            'artist' => 'Daft Punk',
            'songname' => 'One More Time',
            'genre' => 'Dance',
            'img' => 'https://t2.genius.com/unsafe/327x327/https%3A%2F%2Fimages.genius.com%2F1f68dda22b514be9e8b0555a49ac372b.1000x1000x1.png',
            'duration' => '321',
        ]);

        Song::create([
            'artist' => 'Avicii',
            'songname' => 'Wake Me Up',
            'genre' => 'Dance',
            'img' => 'https://t2.genius.com/unsafe/291x291/https%3A%2F%2Fimages.genius.com%2F458e6b68cac89d7f94a082f21fddf25c.1000x1000x1.png',
            'duration' => '251',
        ]);

        Song::create([
            'artist' => 'PSY',
            'songname' => 'Gangnam Style',
            'genre' => 'Dance',
            'img' => 'https://t2.genius.com/unsafe/327x327/https%3A%2F%2Fimages.genius.com%2Fed62846fca4d8043ed3ebdfbb273d7f1.1000x1000x1.jpg',
            'duration' => '220',
        ]);

        Song::create([
            'artist' => 'Darude',
            'songname' => 'Sandstorm',
            'genre' => 'Dance',
            'img' => 'https://t2.genius.com/unsafe/292x292/https%3A%2F%2Fimages.genius.com%2F2437bc26e1e6308905b165e4a98be6f4.700x700x1.jpg',
            'duration' => '226',
        ]);
    }
}
