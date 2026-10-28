<?php

use App\Helpers\Menu;

$logo = Menu::get_logo();
$infosa = Menu::get_info_acceuil();
$couleur = Menu::get_info_couleur();
?>

<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light-style layout-wide customizer-hide" dir="ltr"
    data-theme="theme-default" data-assets-path="{{ asset('assets/') }}"
    data-template="horizontal-menu-template-no-customizer">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <?php if (isset($logo->mot_cle)){ ?>
    <title><?php echo @$logo->mot_cle; ?> | Connexion</title>
    <?php } ?>

    <meta name="description" content="" />

    <!-- Favicon -->
    <?php if (isset($logo->logo_logo)){ ?>
    <link rel="<?php echo @$logo->mot_cle; ?>" type="image/x-icon" href="{{ asset('/frontend/logo/' . @$logo->logo_logo) }}" />
    <?php } ?>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/tabler-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/flag-icons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/theme-default.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/node-waves/node-waves.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css') }}" />
    <!-- Vendor -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css') }}" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:opsz,wght@6..72,400&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet" />
    <style>
        .panneau-stats {
            position: relative; width: 100%; display: flex; align-items: center; overflow: hidden; color: #dfe8fb;
            background: linear-gradient(160deg, #0a1838 0%, #0d2150 55%, #1a3fae 100%) !important;
        }
        .panneau-stats .grille-plan {
            position: absolute; inset: 0; opacity: .5; pointer-events: none;
            background-image: linear-gradient(rgba(156, 192, 255, .08) 1px, transparent 1px), linear-gradient(90deg, rgba(156, 192, 255, .08) 1px, transparent 1px);
            background-size: 32px 32px; animation: glisse-grille 30s linear infinite;
        }
        @keyframes glisse-grille { to { background-position: 32px 32px, 32px 32px; } }
        .panneau-stats .mono { font-family: 'IBM Plex Mono', monospace; font-size: .74rem; letter-spacing: .03em; }
        .contenu-stats { position: relative; width: 100%; max-width: 720px; margin: 0 auto; padding: 48px 56px; }
        .entete-stats { display: flex; justify-content: space-between; color: #9cc0ff; padding-bottom: 14px; border-bottom: 1px solid rgba(156, 192, 255, .25); }
        .contenu-stats h2 { font-family: 'Newsreader', Georgia, serif; font-weight: 400; color: #fff; font-size: 2.5rem; margin: 28px 0 30px; }
        .tuiles { display: grid; grid-template-columns: repeat(4, 1fr); border-top: 1px solid rgba(156, 192, 255, .35); }
        .tuile { padding: 20px 16px 0 0; opacity: 0; animation: apparait .8s cubic-bezier(.16, 1, .3, 1) forwards; }
        .tuile + .tuile { padding-left: 16px; border-left: 1px solid rgba(156, 192, 255, .18); }
        .tuile b { display: block; font-family: 'Newsreader', Georgia, serif; font-weight: 400; font-size: 2.8rem; line-height: 1; color: #fff; }
        .tuile span { display: block; margin-top: 8px; font-size: .82rem; color: #9fb2d8; }
        .deux-blocs { display: grid; grid-template-columns: 1fr 1fr; gap: 40px; margin-top: 44px; }
        .titre-bloc { display: block; color: #9cc0ff; text-transform: uppercase; margin-bottom: 16px; }
        .ligne-app { margin-bottom: 14px; }
        .ligne-app .lib { display: flex; justify-content: space-between; font-size: .86rem; margin-bottom: 6px; color: #dfe8fb; }
        .ligne-app .rail { height: 4px; background: rgba(156, 192, 255, .15); }
        .ligne-app .rail i { display: block; height: 100%; width: 0; background: #2f66ff; animation: remplit 1.2s cubic-bezier(.16, 1, .3, 1) forwards; }
        @keyframes remplit { to { width: var(--v); } }
        .histo { display: flex; align-items: flex-end; gap: 10px; height: 150px; border-bottom: 1px solid rgba(156, 192, 255, .35); }
        .colonne { flex: 1; height: 100%; display: flex; flex-direction: column; justify-content: flex-end; align-items: center; position: relative; }
        .colonne i { display: block; width: 100%; height: 0; background: linear-gradient(180deg, #5b8cff, #1f4fd8); animation: pousse 1.1s cubic-bezier(.16, 1, .3, 1) forwards; }
        @keyframes pousse { to { height: max(3px, calc(var(--h) - 24px)); } }
        .colonne .val { color: #fff; margin-bottom: 4px; }
        .colonne .mois { position: absolute; bottom: -22px; color: #9fb2d8; text-transform: capitalize; }
        @keyframes apparait { from { opacity: 0; transform: translateY(12px); } to { opacity: 1; transform: none; } }
        @media (max-width: 1300px) { .contenu-stats { padding: 40px 36px; } .tuile b { font-size: 2.2rem; } .deux-blocs { gap: 28px; } }
        @media (prefers-reduced-motion: reduce) {
            .panneau-stats *, .panneau-stats { animation-duration: .01ms !important; animation-delay: 0s !important; }
        }
    </style>

    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/js/config.js') }}"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body>
    <!-- Content -->

    <div class="authentication-wrapper authentication-cover authentication-bg">
        <div class="authentication-inner row">
            <!-- /Left Text -->
            <div class="d-none d-lg-flex col-lg-7 p-0">
                <div class="auth-cover-bg panneau-stats">
                    @php
                        $demandes = \App\Models\DemandeAcces::query();
                        $stats = [
                            ['Demandes reçues', (clone $demandes)->count()],
                            ['Comptes ouverts', (clone $demandes)->where('statut', 'TRAITEE')->count()],
                            ['En attente', (clone $demandes)->whereIn('statut', ['EN_ATTENTE', 'EN_COURS'])->count()],
                            ['Messages reçus', \App\Models\MessageContact::count()],
                        ];
                        $parApplication = (clone $demandes)->selectRaw('application, count(*) as total')->groupBy('application')->pluck('total', 'application');
                        $maxApplication = max(1, $parApplication->max() ?? 0);

                        $debut = now()->subMonths(5)->startOfMonth();
                        $parMois = (clone $demandes)->where('created_at', '>=', $debut)->get(['created_at'])
                            ->countBy(fn ($d) => $d->created_at->format('Y-m'));
                        $mois = collect(range(5, 0))->map(fn ($i) => now()->subMonths($i)->startOfMonth())
                            ->map(fn ($m) => ['lib' => $m->translatedFormat('M'), 'total' => $parMois[$m->format('Y-m')] ?? 0]);
                        $maxMois = max(1, $mois->max('total'));
                    @endphp

                    <div class="grille-plan"></div>
                    <div class="contenu-stats">
                        <div class="entete-stats">
                            <span class="mono">Portfolio · Traoré Mohamed</span>
                            <span class="mono">{{ now()->translatedFormat('d M Y') }}</span>
                        </div>

                        <h2>Activité du portfolio</h2>

                        <div class="tuiles">
                            @foreach ($stats as $i => [$libelle, $valeur])
                                <div class="tuile" style="animation-delay: {{ .15 + $i * .1 }}s">
                                    <b data-compte="{{ $valeur }}">0</b>
                                    <span>{{ $libelle }}</span>
                                </div>
                            @endforeach
                        </div>

                        <div class="deux-blocs">
                            <div class="bloc">
                                <span class="mono titre-bloc">Demandes par logiciel</span>
                                @foreach (config('portfolio.applications') as $code => $app)
                                    @php($total = $parApplication[$code] ?? 0)
                                    <div class="ligne-app">
                                        <div class="lib"><span>{{ $app['nom'] }}</span><span class="mono">{{ $total }}</span></div>
                                        <div class="rail"><i style="--v: {{ round($total / $maxApplication * 100) }}%; animation-delay: {{ .5 + $loop->index * .12 }}s"></i></div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="bloc">
                                <span class="mono titre-bloc">Demandes, 6 derniers mois</span>
                                <div class="histo">
                                    @foreach ($mois as $m)
                                        <div class="colonne">
                                            <span class="mono val">{{ $m['total'] }}</span>
                                            <i style="--h: {{ max(4, round($m['total'] / $maxMois * 100)) }}%; animation-delay: {{ .6 + $loop->index * .08 }}s"></i>
                                            <span class="mono mois">{{ $m['lib'] }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Left Text -->

            <!-- Login -->
            <div class="d-flex col-12 col-lg-5 align-items-center p-sm-5 p-4">
                <div class="w-px-400 mx-auto">
                    <!-- Logo -->
                    <div class="app-brand mb-4">
                        <a href="{{ route('/') }}" class="app-brand-link gap-2">
                            <span class="app-brand-logo demo">
                                <img src="{{ asset('/frontend/logo/' . @$logo->logo_logo) }}" width="90" />
                            </span>
                        </a>
                    </div>
                    <!-- /Logo -->
                    <h3 class="mb-1">Bienvenue !</h3>
                    <p class="mb-4">Connectez-vous à votre compte</p>
                    <form id="formAuthentication" class="mb-3" action="{{ url('connexion') }}" method="POST"
                        autocomplete="off">
                        {{ csrf_field() }}
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <div class="alert-body">
                                    <b>Succès: </b> {{ $message }}
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <div class="alert-body">
                                    <b>Echec: </b> {{ $message }}
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <div class="alert-body">
                                        {{ $error }}
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endforeach
                        @endif
                        <div class="mb-3">
                            <label for="username" class="form-label">Mon identifiant</label>
                            <input type="text" class="form-control form-control-sm" id="username" name="username"
                                placeholder="Mon identifiant" autofocus />
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">Mon mot de passe</label>
                            </div>
                            <div class="input-group input-group-sm ">
                                <input type="password" id="password" class="form-control form-control-sm"
                                    name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                            </div>
                        </div>
                        <!--<div class="mb-3">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="remember-me" />
                        <label class="form-check-label" for="remember-me"> Souvenez-vous de moi </label>
                      </div>
                    </div>-->
                        <!--<div class="form-group mt-4 mb-4">
                <div class="captcha">
                    <span><?php //echo captcha_img();
                    ?></span>
                    <button type="button" class="btn-label-secondary waves-effect" class="reload" id="reload">
                    &#x21bb;
                    </button>
                </div>
                </div>-->

                        <!--<div class="form-group mb-4">
                        <span></span>
                        <label class="form-label">Saisir les caractères ci-dessus</label>
                        <input id="captcha" type="text" class="form-control" placeholder="Saisir les caractères ci-dessus" name="captcha">
                    </div>-->

                         {{-- <div class="form-group mb-4">
                            <div class="form-group">
                                <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                                @endif
                            </div>
                        </div><div class="form-group mb-4">
                            <div class="form-group">
                                <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                                @endif
                            </div>
                        </div><div class="form-group mb-4">
                            <div class="form-group">
                                <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                                @endif
                            </div>
                        </div><div class="form-group mb-4">
                            <div class="form-group">
                                <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                                @endif
                            </div>
                        </div> --}}

                        <button type="submit" class="btn btn-primary d-grid w-100">Se connecter</button>
                    </form>

{{--                     <p class="text-center">
                        <span>Vous êtes nouveau sur la plateforme ?</span> <br>
                        <a href="#">
                            <span>Enrôlez vous ici</span>
                        </a>
                    </p> --}}

                    <div class="divider my-4">
                        <div class="divider-text">Nous suivre</div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <a href="javascript:;" class="btn btn-icon btn-label-facebook me-3">
                            <i class="tf-icons fa-brands fa-facebook-f fs-5"></i>
                        </a>

                        <a href="javascript:;" class="btn btn-icon btn-label-google-plus me-3">
                            <i class="tf-icons fa-brands fa-google fs-5"></i>
                        </a>

                        <a href="javascript:;" class="btn btn-icon btn-label-twitter">
                            <i class="tf-icons fa-brands fa-twitter fs-5"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /Login -->
        </div>
    </div>

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/node-waves/node-waves.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/hammer/hammer.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/i18n/i18n.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/js/pages-auth.js') }}"></script>

    <script type="text/javascript">
        document.querySelectorAll('.panneau-stats [data-compte]').forEach(function (el) {
            var cible = +el.dataset.compte, debut = performance.now();
            (function pas(t) {
                var p = Math.min((t - debut) / 1300, 1);
                el.textContent = Math.round(cible * (1 - Math.pow(1 - p, 4)));
                if (p < 1) requestAnimationFrame(pas);
            })(debut);
        });

        $('#reload').click(function() {
            //alert('tesr');
            $.ajax({
                type: 'GET',
                url: 'reload-captcha',
                success: function(data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });
    </script>
</body>

</html>
