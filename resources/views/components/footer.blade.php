<footer class="text-center text-lg-start  bg-primary text-white  ">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
        <!-- Section: Links -->
        <section class="">
            <!--Grid row-->
            <div class="row ">
                <!-- Grid column -->
                <div class="col mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold">
                        {{ config('app.name', 'Laravel') }}
                    </h6>
                    <p>
                        Aplicação de gestão de assets que junta o Frontoffice com o Backoffice.
                    </p>
                </div>
                <!-- Grid column -->


                <hr class="w-100 clearfix d-md-none" />


                <!-- Grid column -->


            </div>
            <!--Grid row-->
        </section>
        <!-- Section: Links -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class=" text-center p-3">

        <a href="{{ route('help') }}" class="text-white p-1">Ajuda</a>
        <a href="{{ route('terms') }}" class="text-white p-1">Termos e Condições
        </a>

    </div>

    <div class=" text-center p-3">
        © <?php echo date('Y'); ?>-{{ config('app.name', 'Laravel') }}
    </div>


    <!-- Copyright -->
</footer>
<!-- Footer -->
