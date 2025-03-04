<?php get_header(); ?>

<section class="hero-home">
    <div class="hero-content">

        <img class="heart-hero" src="<?php bloginfo('template_url') ?>/img/heart-hero.svg" alt="fabricadecarimbos.com.br" />
        <p>Mulheres incríveis nunca saem de moda</p>
        <img class="amor-hero" src="<?php bloginfo('template_url') ?>/img/amor-hr.svg" alt="fabricadecarimbos.com.br" />

        <a href="<?php bloginfo('home') ?>/loja">Ver produtos -></a>

    </div>
</section>


<section class="meta-section">
    <div class="container">
        <div class="custom-meta-home">

            <div class="frete-gratis">
                <i class="bx bx-package"></i> Frete Grátis<br /> acima de R$500
            </div>

            <div class="frete-gratis">
                <i class="bx bx-credit-card-alt"></i> Parcele em até<br />12x no cartão
            </div>

            <div class="frete-gratis">
                <i class='bx bxs-dollar-circle'></i> Descontos de<br /> até 40% OFF
            </div>

            <div class="frete-gratis">
                <i class='bx bxs-plane-alt'></i> Enviamos para<br /> todo o Brasil
            </div>

        </div>
    </div>
</section>



<div class="container woocommerce">
    <?php echo do_shortcode('[products limit="4" columns="4" visibility="featured" orderby="rand" class="outofstock"]'); ?>
</div>


<div class="categories-home">
    <div class="container">
        <div class="categories-home-content">

            <a href="<?php bloginfo('home') ?>/categoria/carimbos" class="cat-home-sing">
                <div class="content-cat">
                    <h1>Carimbos</h1>
                    <span>Ver produtos -></span>
                </div>
                <img src="<?php bloginfo('template_url') ?>/img/carimbos.webp" alt="fabricadecarimbos.com.br" />
            </a>

            <a href="<?php bloginfo('home') ?>/categoria/embalagens" class="cat-home-sing">
                <div class="content-cat">
                    <h1>Embalagens</h1>
                    <span>Ver produtos -></span>
                </div>
                <img src="<?php bloginfo('template_url') ?>/img/carimbos.webp" alt="fabricadecarimbos.com.br" />
            </a>

            <a href="<?php bloginfo('home') ?>/categoria/acessorios" class="cat-home-sing">
                <div class="content-cat">
                    <h1>Acessórios</h1>
                    <span>Ver produtos -></span>
                </div>
                <img src="<?php bloginfo('template_url') ?>/img/carimbos.webp" alt="fabricadecarimbos.com.br" />
            </a>

        </div>
    </div>
</div>








<section class="testimonials">
    <div class="container">
        <div class="testimonial-item">
            <div class="stars">
                <svg lass="icon--root icon--star" width="34" height="32" viewBox="0 0 34 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.8245 0.871837C16.1356 -0.0857332 17.4903 -0.0857309 17.8015 0.871839L20.9885 10.6804C21.1276 11.1086 21.5267 11.3986 21.9769 11.3986H32.2903C33.2971 11.3986 33.7157 12.687 32.9012 13.2788L24.5575 19.3408C24.1933 19.6055 24.0408 20.0746 24.18 20.5028L27.367 30.3114C27.6781 31.2689 26.5821 32.0652 25.7676 31.4734L17.4239 25.4114C17.0596 25.1467 16.5663 25.1467 16.2021 25.4114L7.85842 31.4734C7.04386 32.0652 5.94788 31.2689 6.25901 30.3114L9.446 20.5028C9.58515 20.0746 9.43272 19.6055 9.06843 19.3408L0.724784 13.2788C-0.0897735 12.687 0.328856 11.3986 1.3357 11.3986H11.649C12.0993 11.3986 12.4984 11.1086 12.6375 10.6804L15.8245 0.871837Z" fill="#343434"></path>
                </svg>

                <svg lass="icon--root icon--star" width="34" height="32" viewBox="0 0 34 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.8245 0.871837C16.1356 -0.0857332 17.4903 -0.0857309 17.8015 0.871839L20.9885 10.6804C21.1276 11.1086 21.5267 11.3986 21.9769 11.3986H32.2903C33.2971 11.3986 33.7157 12.687 32.9012 13.2788L24.5575 19.3408C24.1933 19.6055 24.0408 20.0746 24.18 20.5028L27.367 30.3114C27.6781 31.2689 26.5821 32.0652 25.7676 31.4734L17.4239 25.4114C17.0596 25.1467 16.5663 25.1467 16.2021 25.4114L7.85842 31.4734C7.04386 32.0652 5.94788 31.2689 6.25901 30.3114L9.446 20.5028C9.58515 20.0746 9.43272 19.6055 9.06843 19.3408L0.724784 13.2788C-0.0897735 12.687 0.328856 11.3986 1.3357 11.3986H11.649C12.0993 11.3986 12.4984 11.1086 12.6375 10.6804L15.8245 0.871837Z" fill="#343434"></path>
                </svg>

                <svg lass="icon--root icon--star" width="34" height="32" viewBox="0 0 34 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.8245 0.871837C16.1356 -0.0857332 17.4903 -0.0857309 17.8015 0.871839L20.9885 10.6804C21.1276 11.1086 21.5267 11.3986 21.9769 11.3986H32.2903C33.2971 11.3986 33.7157 12.687 32.9012 13.2788L24.5575 19.3408C24.1933 19.6055 24.0408 20.0746 24.18 20.5028L27.367 30.3114C27.6781 31.2689 26.5821 32.0652 25.7676 31.4734L17.4239 25.4114C17.0596 25.1467 16.5663 25.1467 16.2021 25.4114L7.85842 31.4734C7.04386 32.0652 5.94788 31.2689 6.25901 30.3114L9.446 20.5028C9.58515 20.0746 9.43272 19.6055 9.06843 19.3408L0.724784 13.2788C-0.0897735 12.687 0.328856 11.3986 1.3357 11.3986H11.649C12.0993 11.3986 12.4984 11.1086 12.6375 10.6804L15.8245 0.871837Z" fill="#343434"></path>
                </svg>

                <svg lass="icon--root icon--star" width="34" height="32" viewBox="0 0 34 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.8245 0.871837C16.1356 -0.0857332 17.4903 -0.0857309 17.8015 0.871839L20.9885 10.6804C21.1276 11.1086 21.5267 11.3986 21.9769 11.3986H32.2903C33.2971 11.3986 33.7157 12.687 32.9012 13.2788L24.5575 19.3408C24.1933 19.6055 24.0408 20.0746 24.18 20.5028L27.367 30.3114C27.6781 31.2689 26.5821 32.0652 25.7676 31.4734L17.4239 25.4114C17.0596 25.1467 16.5663 25.1467 16.2021 25.4114L7.85842 31.4734C7.04386 32.0652 5.94788 31.2689 6.25901 30.3114L9.446 20.5028C9.58515 20.0746 9.43272 19.6055 9.06843 19.3408L0.724784 13.2788C-0.0897735 12.687 0.328856 11.3986 1.3357 11.3986H11.649C12.0993 11.3986 12.4984 11.1086 12.6375 10.6804L15.8245 0.871837Z" fill="#343434"></path>
                </svg>

                <svg lass="icon--root icon--star" width="34" height="32" viewBox="0 0 34 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.8245 0.871837C16.1356 -0.0857332 17.4903 -0.0857309 17.8015 0.871839L20.9885 10.6804C21.1276 11.1086 21.5267 11.3986 21.9769 11.3986H32.2903C33.2971 11.3986 33.7157 12.687 32.9012 13.2788L24.5575 19.3408C24.1933 19.6055 24.0408 20.0746 24.18 20.5028L27.367 30.3114C27.6781 31.2689 26.5821 32.0652 25.7676 31.4734L17.4239 25.4114C17.0596 25.1467 16.5663 25.1467 16.2021 25.4114L7.85842 31.4734C7.04386 32.0652 5.94788 31.2689 6.25901 30.3114L9.446 20.5028C9.58515 20.0746 9.43272 19.6055 9.06843 19.3408L0.724784 13.2788C-0.0897735 12.687 0.328856 11.3986 1.3357 11.3986H11.649C12.0993 11.3986 12.4984 11.1086 12.6375 10.6804L15.8245 0.871837Z" fill="#343434"></path>
                </svg>
            </div>

            <div class="client-text">
                <h4>"Impressionante a qualidade dos produtos, sem dúvidas a Fábrica de Carimbos se tornou a melhor amiga da minha loja."</h4>

                <p>Rafaela Chagas, Curitiba/PR</p>
            </div>

        </div>
    </div>
</section>



<div class="container woocommerce">

    <h2 class="title-section" style="margin-top: 40px">Essenciais</h2>

    <?php echo do_shortcode('[products limit="4" tag="essentials" columns="4" orderby="rand" class="outofstock"]'); ?>

</div>




<?php get_footer(); ?>