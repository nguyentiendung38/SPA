<!DOCTYPE html>
<html lang="en">

<head>
    <title>Lalisa spa</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Clean Beauty Spa with predefined web elements which helps you to build your own site. These template is suitable for spa, beauty, care, girly, hair, health, beauty parlour, massage, skincare, saloon, make up, physiotherapy, salon, wellness, yoga website. Yoga & Meditation centers, Barbershop, Health & Wellness Centers, Medical, Physiotherapy, Cosmetic Treatment centers, ayurvedic treatments, pedicure, manicure procedures.">
    <meta name="keywords"
        content="spa, beauty, care, girly, hair, health, beauty parlour, massage, skincare, saloon, make up, physiotherapy, salon, wellness, yoga website. Yoga & Meditation centers, Barbershop, Health & Wellness Centers, Medical, Physiotherapy, Cosmetic Treatment centers, ayurvedic treatments, pedicure, manicure procedures">
    <meta name="author" content="ThemeWar">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Start Include All CSS -->
    <link rel="stylesheet" href="{{ asset('makeover/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('makeover/css/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('makeover/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('makeover/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('makeover/css/icofont.css') }}" />
    <link rel="stylesheet" href="{{ asset('makeover/css/nounicon.css') }}" />
    <link rel="stylesheet" href="{{ asset('makeover/css/makeover-icon.css') }}" />
    <link rel="stylesheet" href="{{ asset('makeover/css/nice-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('makeover/css/jquery.datetimepicker.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('makeover/css/slick.css') }}" />
    <link rel="stylesheet" href="{{ asset('makeover/css/lightcase.css') }}" />
    <link rel="stylesheet" href="{{ asset('makeover/css/lightslider.css') }}" />

    <!-- Revolution Slider Setting CSS -->
    <link rel="stylesheet" href="{{ asset('makeover/css/settings.css') }}">

    <link rel="stylesheet" href="{{ asset('makeover/css/preset.css') }}" />
    <link rel="stylesheet" href="{{ asset('makeover/css/ignore_for_wp.css') }}" />
    <link rel="stylesheet" href="{{ asset('makeover/css/theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('makeover/css/responsive.css') }}" />

    <link rel="stylesheet" href="{{ asset('/css/profile.css') }}" />
    <!-- End Include All CSS -->

    <!-- Favicon Icon -->
    <link rel="icon" type="image/png" href="makeover/images/favicon.png">
    <!-- Favicon Icon -->
</head>

<body>
    <!-- Preloading -->
    <div class="preloader text-center">
        <div class="la-ball-scale-multiple la-2x">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- Preloading -->

    <!-- Begin:: Header Section -->


    @include('header')


    @yield('content')

    @include('footer')


    <!-- Start Include All JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('makeover/js/jquery.js') }}"></script>
    <script src="{{ asset('makeover/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('makeover/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('makeover/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('makeover/js/jquery.appear.js') }}"></script>
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyBJtPMZ_LWZKuHTLq5o08KSncQufIhPU3o"></script>
    <script src="{{ asset('makeover/js/gmaps.js') }}"></script>
    <script src="{{ asset('makeover/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('makeover/js/jquery.datetimepicker.full.min.js') }}"></script>
    <script src="{{ asset('makeover/js/slick.js') }}"></script>
    <script src="{{ asset('makeover/js/lightcase.js') }}"></script>
    <script src="{{ asset('makeover/js/lightslider.js') }}"></script>
    <script src="{{ asset('makeover/js/tweenmax.min.js') }}"></script>
    <script src="{{ asset('makeover/js/theia-sticky-sidebar.min.js') }}"></script>
    <script src="{{ asset('makeover/js/ResizeSensor.min.js') }}"></script>

    <!-- Slider Revolution Main Files -->
    <script src="{{ asset('makeover/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('makeover/js/jquery.themepunch.revolution.min.js') }}"></script>

    <!-- Slider Revolution Extension -->
    <script src="{{ asset('makeover/js/extensions/revolution.extension.actions.min.js') }}"></script>
    <script src="{{ asset('makeover/js/extensions/revolution.extension.carousel.min.js') }}"></script>
    <script src="{{ asset('makeover/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
    <script src="{{ asset('makeover/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
    <script src="{{ asset('makeover/js/extensions/revolution.extension.migration.min.js') }}"></script>
    <script src="{{ asset('makeover/js/extensions/revolution.extension.navigation.min.js') }}"></script>
    <script src="{{ asset('makeover/js/extensions/revolution.extension.parallax.min.js') }}"></script>
    <script src="{{ asset('makeover/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
    <script src="{{ asset('makeover/js/extensions/revolution.extension.video.min.js') }}"></script>

    <script src="{{ asset('makeover/js/theme.js') }}"></script>
    <!-- End Include All JS -->
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

        function validateForm() {
            var password = document.getElementById('password').value;
            var passwordError = document.getElementById('password-error');

            // Reset error message
            passwordError.innerHTML = "Vui lòng nhập mật khẩu.";
            document.getElementById('password').classList.remove('is-invalid');

            // Check if password has at least 8 characters
            if (password.length < 8) {
                passwordError.innerHTML = "Mật khẩu phải có ít nhất 8 ký tự.";
                document.getElementById('password').classList.add('is-invalid');
                return false; // Prevent form submission
            }

            return true; // Allow form submission if validation passes
        }
    </script>

    @stack('scripts')
</body>

</html>
