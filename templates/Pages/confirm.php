<!--Main layout-->

<main>
    <div class="container">

        <!--Section: Main info-->
        <section class="mt-1 pt-1 wow">
            <div class="row">
                <div class="col-md-12 col-xl-10 col-sm-12 mb-4 mt-5">

                    <div class="card">
                        <div class="card-header info">
                            <?= $title==null ? '' : $title ?>
                        </div>
                        <div class="card-body">
                            <?= $message==null ? '' : $message ?>
                        </div>
                    </div>

                </div>

        </section>
    </div>
</main>