<style type="text/css">

    .ultima-noticia h2 {
        color: #000000 !important;
    }

    .single-blog h1 {
        color: #000000 !important;
    }

    h2 {
        color: #000000 !important;
    }

    strong {
        color: #000000;
    }

    section.search-top .call-you {
        max-width: 489px;
        cursor: pointer;
    }

    section.search-top .call-you p {
        font-size: 14px;
        font-size: .975rem;
        font-weight: bold;
        color: #36538f;
        line-height: 20px;
        text-transform: uppercase;
    }

    .links-share {
        display: -ms-flexbox;
        display: -webkit-box;
        display: flex;
        -ms-flex-pack: justify;
        -webkit-box-pack: justify;
        justify-content: space-evenly;
        -ms-flex-align: center;
        -webkit-box-align: center;
        align-items: center;
        width: 100%;
        max-width: 180px;
    }

    a.social.icon-whatsapp {
        display: inline-grid;
        justify-content: center;
        align-items: center;
        width: 36px;
        height: 36px;
        border-radius: 100%;
        background: #3bdb43;
        font-size: 1.125rem;
        color: #ffffff;
    }

    p.redehome {
        font-size: .975rem;
        font-weight: bold;
        color: #d89e27 !important;
        line-height: 20px;
        text-transform: uppercase;
        width: auto;
        width: 508px;
    }

    @media (max-width: 360px) {
        .ocultacaosocial {
            display: none;
        }
    }

    @media (max-width: 414px) {
        .ocultacaosocial {
            display: none;
        }
    }

    @media (max-width: 360px) {
        p.redehome {
            font-size: 14px;
        }

        section.search-top .search-top-box .search-title {
            display: none;
        }

        section.search-top .search-top-box button {
            display: none;
        }

        section.search-top .search-top-box input {
            display: none;
        }
    }

    @media (max-width: 414px) {
        p.redehome {

        }

        a.social.icon-whatsapp {
            width: 30px;
            height: 28px;
        }
    }

    @media (max-width: 375px) {
        p.redehome {

        }
    }

</style>
<div class="ocultaMobile">

    <?php $selecao = get_field('selecao_topo_da_pagina'); ?>

    <?php if ($selecao === 'layout1'): ?>

        <section class="search-top">
            <div class="container">
                <div class="flex flex-parent">
                    <div class="ocultacaosocial">
                        <div class="flex align-center">
                            <p class="redehome">Avaliação grátis:
                                <a class="social icon-whatsapp" href="https://wa.me/555511933365050"
                                   target="_self"><i class="fab fa-whatsapp"
                                                     aria-hidden="true"></i></a>
                                <a style="color: #d89e27;"
                                   href="https://api.whatsapp.com/send?phone=5511933365050&data=AWDCjUMpvZwoETISwSOAbi5AFfhl3vh9p4l4kxafxOhtFqqE89XlkYIWgVSJ2FT_KK7-uW-ZFl3f8nkgJ2q5ak8vUIE9S9Nik9AnSLAeS0n2GGn8fs5jvsM3vv1pS278to9XRu7el9U4O22OURRyd6Aqq7inRWoMELRvjxmaMpaK1Q7UeSl1J6l6bHE-HYjNLBSzoG7nbnBEDbINLTFyDvDlw4VzACp1pk58vN71RtNS9UWKJaiCnpp1qeqo8_dcx_NPBoAEjdOe511_lpU&source=FB_Page&app=facebook&entry_point=page_cta&fbclid=IwAR0RyLu68veJ0NHgPW9kJbHLRp7pCKWr7gDak7D0sX8vgvRfrqDgXmfWY0s">
                                    (11) 93336-5050 / (11) 4217-7700
                                    &nbsp; </a> <br/><br/>
                            </p>
                        </div>
                    </div>
                    <div class="col search-top-box flex align-center">
                        <span class="search-title">Quais tratamentos você procura:</span>
                        <form id="top-search-form" class="search-form" method="get"
                              action="<?= get_bloginfo('url') ?>/busca">
                            <div class="search-box">
                                <input data-yts-val="true" type="text" name="busca"
                                       placeholder="Digite aqui o tratamento desejado"
                                       style="height: 30px;">

                                <button type="submit" form="top-search-form" name="button"></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    <?php else: ?>
        <section class="segundo-conteudoSuperior"><br/>
            <p class="avaliacaoH">Agende já uma avaliação Gratuita</p>
            <div class="container">
                <div class="flex flex-parent">

                    <div class="formavaliacao">
                        <div class="flex align-center">
                            <<br/>
                            <form method="POST"
                                  action="https://www.palladiumestetica.com.br/wp-content/themes/topbrasil/src/reserva-realizada.php"
                                  class="search-form" name="registro" id="registro">
                                <div class="formLado">
                                    <input type="text" class="formH" name="nome" placeholder="Nome Completo" required>
                                    <input type="email" class="formH" name="email" placeholder="E-Mail" required>
                                    <input type="text" class="formH" name="telefone" placeholder="Celular (com DDD)"
                                           required>
                                    <input type="text" class="formH" name="avaliacao"
                                           placeholder="Escolha o dia da avaliação">
                                    <input type="text" class="formH" name="ajudar"
                                           placeholder="Como poderemos lhe ajudar?">
                                </div>

                                <button type="submit" class="btn-more-info conti">
                                    <i class="fa fa-info-circle flex-center align-center" aria-hidden="true"></i>
                                    <span class="flex-center align-center">Enviar</span>
                                </button>

                                <br/>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </section>


    <?php endif; ?>
</div>
<style>

    button.btn-more-info.conti {
        background: transparent;
        height: 65px;
        margin-top: 0px;
    }

    .formulario-Envio:hover {
        background: #4caf50;
    }

    button.formulario-Envio {
        height: 38px !important;
        height: 65px;
        color: #fff;
        background: #d89e27;
        padding: 0 20px 0 10px;
        font-weight: 700;
        font-size: 20px;
        font-size: 1.25rem;
        text-transform: uppercase;
        -webkit-transition: all ease .5s;
        -o-transition: all ease .5s;
        transition: all ease .5s;
    }

    input.formH.tratamento {
        width: 290px;
        margin-top: 0px;
    }

    label.label-radio {
        color: #fff;
    }

    p.conteudoTituloform {
        color: #ffffff;
        line-height: 3;
    }

    a.btn-more-info.conti {
        height: 38px !important;
        margin-top: 23px;
        margin-left: 10px;
    }

    div.formLado {
        display: flex;
        padding: 10px;
    }

    div.formavaliacao {

    }

    p.avaliacaoH {
        font-size: 16px;
        font-weight: bold;
        color: #d89e27;
        text-transform: uppercase;
        text-align: center;
        /* margin: 20px; */
        margin-bottom: -1%;
    }

    .formH {
        height: calc(2.25rem + 2px);
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        margin-left: 9px;
        margin-top: 23px;
    }

    section.segundo-conteudoSuperior {
        background-color: #000000;
        position: fixed;
    }

    section.search-top .search-top-box .search-title {
        max-width: 304px;
        color: #d89e27 !important;
    }

    a.social.icon-whatsapp {
        font-size: 27px;
    }

    a.social.icon-whatsapp {
        display: inline-grid;
        justify-content: center;
        align-items: center;
        width: 36px;
        height: 36px;
        border-radius: 100%;
        background: #3bdb43;
        font-size: 1.125rem;
        color: #ffffff;
    }

    a.social.icon-whatsapp2 {
        background: #337ab7;
        display: inline-grid;
        justify-content: center;
        align-items: center;
        width: 36px;
        height: 36px;
        border-radius: 100%;
        color: #ffffff;
        font-size: 24px;
    }

    p.redehome {
        font-size: 16px;
        font-weight: bold;
        color: #d89e27;
        line-height: 20px;
        text-transform: uppercase;
    }

    i.fas.fa-phone {
        font-size: 1.125rem;
        background: #337ab7;
        display: inline-grid;
        justify-content: center;
        align-items: center;
        width: 36px;
        height: 36px;
        border-radius: 100%;
        color: #ffffff;
        font-size: 18px;
    }

    i.fab.fa-whatsapp {
        color: #ffffff !important;
        margin-left: 2px;
    }

    section.search-top .search-top-box .search-title {
        max-width: 320px !important;
    }

    section.search-top .search-top-box {
        max-width: 611px;
    }

    .col.search-top-box.flex.align-center {
        margin-top: -18px;
    }

    section.search-top {
        padding: 10px 0px 0px 5px;
        background: #000000 !important;
    }

    section.search-top .search-top-box input {
        background-color: #ffffff;
        color: #ffffff;
    }

    section.search-top .search-top-box button {
        background: #fff url(../img/search-icon-blue.png) center center no-repeat;
        height: 106%;
    }

    .text-blue {
        color: #000000 !important;
    }

    .btn-more-info span {
        background: #d89e27;
    }

    .btn-more-info .fa {
        background: #d89e27;
    }

    header .h1-logo {
        width: 269px;
    }

    .call-you:hover {
        color: #fff;
    }

    @media screen and (max-width: 414px) and (min-width: 360px) {

        /* div.ocultaMobile {
             display: none;
         } */
        section.segundo-conteudoSuperior {
            position: relative;
        }

        div.formLado {
            display: contents;
        }

        input.formH {
            margin-bottom: 20px !important;
            padding: 0.375rem 3.75rem !important;
            margin-left: 9px !important;
        }

        div#layer-lgpd {
            bottom: 0%;
        }
    }

</style>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.js"></script>

<script type="text/javascript">

    $(document).ready(function () {

        $("#registro").validate({
            ignore: ".ignore",
            rules: {
                nome: "required",
                telefone: "required",
                avaliacao: "required",
                tratamento: "required",
                email: {
                    required: true,
                    email: true
                },
            },

            // Specify validation error messages
            messages: {
                nome: "Por favor digite seu nome",
                telefone: "Por favor digite o telefone",
                email: "Por favor digite um e-mail valido",
                avaliacao: "Por favor a avaliação",
                tratamento: "Por favor preencha o tratamento",
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    });

</script>
