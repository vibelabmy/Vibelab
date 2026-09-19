<?php

return [

    'name' => env('BIRTHDAY_NAME', 'Madiha'),

    'email' => env('BIRTHDAY_EMAIL', 'madiha@vibelab.test'),

    'password' => env('BIRTHDAY_PASSWORD', '2091999'),

    'from' => env('BIRTHDAY_FROM', 'With all my love'),

    'greeting' => env('BIRTHDAY_GREETING', 'For u, Sayang Manja'),

    'title' => env('BIRTHDAY_TITLE', 'Happy Birthday'),

    'message' => env('BIRTHDAY_MESSAGE', <<<'TEXT'
Happy belated birthday sayangggg 🥳🥳🥳❤️

Semogaaa budak kecik 155cm i ni sentiasa dimurahkan rezekiii, dipanjangkan umurnyaaa, diberikan kesihatan yang baik, and semoga setiap langkah sayang dipermudahkan oleh Allah SWT 🥹❤️ Semoga segala impian sayang satu per satu tercapai, and may Allah always protect that precious little heart of yours wherever you go 🥰

I doakan semoga sayang sentiasa dikelilingi kebahagiaan, tak pernah rasa keseorangan, and sentiasa ada sebab untuk senyum setiap hari, especially bila dengan i hehe 🤭❤️ And of couseee, semoga makin bertambah sayangggg dekat i, makin manja dengan i, and makin kuat rasa cinta kita sampai satu hari nanti kita tak perlu wish birthday macam ni through phone dah, sebab i dah boleh peluk sayang depan mata i sendiri 🥹💗

Thank you for being someone so precious in my life, sayanggg. I may not be the perfect person, but i promise to keep learning how to love you better, to appreciate you more, and to make you feel loved in ways that words alone could never explain. I hope one day, every birthday sayang selepas ni, i get to be right beside you, holding your hand, kissing your forehead, and reminding you that you are one of the most beautiful blessings Allah has ever written into my life 🥺❤️

Happy birthday again, my little 155cm princess hehe 🤭😘 I love you so much, sayangggg, and insyaAllah, may this be one of the many birthdays that we get to celebrate together, not just as two people in love, but as husband and wife one day, amin ya Rabbal alamin 🤲🏻❤️

p.s shiap shiapp esokk mwahh ❤️💕
TEXT),

    'song' => [
        'title' => env('BIRTHDAY_SONG_TITLE', 'Sampai Jadi Debu'),
        'artist' => env('BIRTHDAY_SONG_ARTIST', 'Banda Neira'),
        'youtube_id' => env('BIRTHDAY_SONG_YOUTUBE_ID', 'JjFeJ608VKc'),
        'start_seconds' => (int) env('BIRTHDAY_SONG_START_SECONDS', 170),
    ],

];
