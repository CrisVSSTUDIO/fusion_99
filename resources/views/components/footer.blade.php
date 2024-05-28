
<footer class="text-center text-lg-start  bg-primary text-white  ">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
        <!-- Section: Links -->
        <section class="">
            <!--Grid row-->
            <div class="row">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
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

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold">Siga-nos</h6>
                    <!-- Google -->
                    <a class="btn btn-primary btn-floating m-1" style="background-color: #dd4b39" href="#!" role="button" aria-label="Google plus link"><i class="fab fa-google"></i></a>

                    <!-- Linkedin -->
                    <a class="btn btn-primary btn-floating m-1" style="background-color: #0082ca" href="#!" role="button" aria-label="linkedin-in link"><i class="fab fa-linkedin-in"></i></a>
                    <!-- Github -->
                    <a class="btn btn-primary btn-floating m-1" style="background-color: #333333" href="#!" role="button" aria-label="Github author link"><i class="fab fa-github"></i></a>
                </div>
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
        © <?php echo date("Y"); ?>-{{ config('app.name', 'Laravel') }}
    </div>


    <!-- Copyright -->
</footer>
<!-- Footer -->