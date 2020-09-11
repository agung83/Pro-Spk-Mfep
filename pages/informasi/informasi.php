<section id="services" class="services section-bg mt-5">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Informasi</li>
                </ol>
            </nav>
        </div>
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Board</h2>
                <p>Informasi</p>
            </div>

            <div class="row">
                <?php $berita = $db->tampilBerita();
                foreach ($berita as $pecah) :
                    #

                ?>
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box">
                            <img class="img-fluid mb-2" width="250" src="admin/images/berita/<?php echo $pecah['berita_gambar'] ?>" alt="kosong">
                            <h4><a href=""><?= $pecah['berita_judul'] ?></a></h4>
                            <p><?= $pecah['berita_isi'] ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>



            </div>

        </div>
</section>