<script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<!-- Popper JS -->
<script src="{{ asset('assets/libs/@popperjs/core/umd/popper.min.js') }}"></script>

<!-- Bootstrap JS -->
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Defaultmenu JS -->
<script src="{{ asset('assets/js/defaultmenu.min.js') }}"></script>

<!-- Node Waves JS-->
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>

<!-- Sticky JS -->
<script src="{{ asset('assets/js/sticky.js') }}"></script>

<!-- Simplebar JS -->
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/js/simplebar.js') }}"></script>

<!-- Color Picker JS -->
<script src="{{ asset('assets/libs/@simonwep/pickr/pickr.es5.min.js') }}"></script>
<!-- INTERNAL APEXCHART JS -->
<script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

<!-- Color Picker JS -->
<script src="{{ asset('assets/libs/@simonwep/pickr/pickr.es5.min.js') }}"></script>


<!-- INTERNAL INDEX JS -->
<script src="{{ asset('assets/js/index1.js') }}"></script>

<!-- include custom_switcherjs.html"-->
<script src="{{ asset('assets/js/custom-switcher.min.js') }}"></script>

<!-- Toast JS -->
<script src="{{ asset('assets/js/toast.js') }}"></script>
@yield('js')
<!-- CUSTOM JS -->
<script src="{{ asset('assets/js/custom.js') }}"></script>
 <!-- Select2 Cdn -->
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

 <!-- Internal Select-2.js -->
 <script src="{{ asset('assets/js/select2.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        @if(session('success') || session('error') || session('warning'))
            var toastElements = document.querySelectorAll('.toast');
            toastElements.forEach(function(toastElement) {
                var toast = new bootstrap.Toast(toastElement);
                toast.show();
            });
        @endif
    });

    
</script>