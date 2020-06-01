<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha256-aAr2Zpq8MZ+YA/D6JtRD3xtrwpEz2IqOS+pWD/7XKIw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/theme.css">
    <title>Inscription WEBINAR</title>
</head>
<body>
<div class="container p-0 shadow">
    <div id="header">
        <img src="{{ asset('img/1x/header.png') }}"  class="mb-0 img-fluid" alt="">
        <img src="{{ asset('img/1x/inscription.png')}}"  class="mt-0 img-fluid" alt="">
    </div>
    <div class="p-3" id="app">
        <form action="{{ url('/inscription') }}" method="post">
            @csrf
            <div class="row w-100 d-flex justify-content-center">
                @if(Session::has('message'))
                    <div class="col-md-8">
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                    </div>
                @endif
                <div class="col-md-8 px-4 bg-form my-5">
                    <div class="row my-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="input form-control rounded shad" placeholder="Prénom" name="prenom" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="input form-control rounded shad" placeholder="Email" name="email" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="input form-control rounded shad" placeholder="Affiliation" id="affiliation" name="affiliation" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="input form-control rounded shad" placeholder="Télephone" name="telephone" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="input form-control rounded shad" placeholder="Nom" name="nom" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="input form-control rounded shad" placeholder="Spécialité" id="specialite" name="specialite" required>
                            </div>
                            <div class="form-group">

                                <input id="wilaya" class="typeahead form-control input rounded shad " type="text" name="wilaya" placeholder="Wilaya" required>
                            </div>
                        </div>
                        <input class=" mx-auto mt-3" type="image" src="{{ asset('img/1x/button.png') }}" style="outline: none;">
                    </div>
                </div>
            </div>
            <div class="text-white text-left">
                <div class="mx-auto">
                    <img src="{{ asset('img/1x/hr.png') }}" class="img-fluid" alt="">
                    <p> Avis IMPORTANT </p>
                    <div style="line-height: 15px !important;text-align: justify;">
                        <small>Une nutrition optimale pour les mères et leurs bébés pendant les 1000 premiers jours est fondamentale pour la santé à vie. Nous croyons que la meilleure façon de nourrir un bébé est d'allaiter. Le lait maternel constitue le régime alimentaire équilibré idéal et une protection contre les maladies des bébés. Une alimentation saine pendant et après la grossesse de la mère contribue à la constitution de réserves nutritifs nécessaires à une grossesse en bonne santé et à la préparation et au maintien de la lactation. Décider de ne pas allaiter est difficile à inverser est a des implications sociales et financières. L'introduction non fondée d'allaitement partiel au biberon ou d'autres aliments et boissons a un effet négatif sur l'allaitement au sein. Si une mère choisit de ne pas allaiter, il est important de communiquer les messages ci-dessus et de donner des instructions sur les méthodes de préparation appropriées, en soulignant que de l'eau non bouillie, des biberons non stérilisés ou une dilution incorrecte peuvent tous entraîner une maladie chez son bébé.</small>
                        <br><br>
                        Matériel destiné exclusivement aux professionnels de santé.
                    </div>


                </div>
            </div>
        </form>
    </div>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.js" integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM=" crossorigin="anonymous"></script>
<script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>
<script>
    var substringMatcher = function(strs) {
        return function findMatches(q, cb) {
            var matches, substringRegex;

            // an array that will be populated with substring matches
            matches = [];

            // regex used to determine if a string contains the substring `q`
            substrRegex = new RegExp(q, 'i');

            // iterate through the pool of strings and for any string that
            // contains the substring `q`, add it to the `matches` array
            $.each(strs, function(i, str) {
                if (substrRegex.test(str)) {
                    matches.push(str);
                }
            });

            cb(matches);
        };
    };

    var states = ["Adrar","Chlef","Laghouat","Oum El Bouaghi","Batna","B\u00e9ja\u00efa","Biskra","B\u00e9char","Blida","Bouira","Tamanrasset","T\u00e9bessa","Tlemcen","Tiaret","Tizi Ouzou","Alger","Djelfa","Jijel","S\u00e9tif","Sa\u00efda","Skikda","Sidi Bel Abb\u00e8s","Annaba","Guelma","Constantine","M\u00e9d\u00e9a","Mostaganem","M'Sila","Mascara","Ouargla","Oran","El Bayadh","Illizi","Bordj Bou Arreridj","Boumerd\u00e8s","El Tarf","Tindouf","Tissemsilt","El Oued","Khenchela","Souk Ahras","Tipaza","Mila","A\u00efn Defla","Na\u00e2ma","A\u00efn T\u00e9mouchent","Gharda\u00efa","Relizane"];

    $('#wilaya').typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        },
        {
            name: 'states',
            source: substringMatcher(states)
        });

    $('#affiliation').typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        },
        {
            name: 'affiliation',
            source: substringMatcher(["Privé","Public"])
        });

    $('#specialite').typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        },
        {
            name: 'specialite',
            source: substringMatcher(["Pédiatre " , "Médecin Généraliste" , "Autres Généraliste"])
        });

    $('.twitter-typeahead').addClass('w-100');
    $('.tt-menu').addClass('listd');
</script>
</body>
</html>
