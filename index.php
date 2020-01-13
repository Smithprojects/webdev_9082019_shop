<?php 
    $headerConfig = [
        'title'=>'Главная страница',
        'styles'=>['style.css', 'main.css']
    ];
    include('modules/header.php');
?>

<section class="main">
    <h1 class="main__header">Новые поступления весны</h1>
    <p class="main__text">Мы подготовыили для Вас лучшие новинки сезона</p>
    <button class="main__btn-news">посмотреть новинки</button>
    <div class="main__info ">
        <div class="main__info__left info">
            <div class="info__ferst ferst">
                <div class="ferst__arrival ferst__arrival_fl-l">
                    <div class="ferst__arrival__img ferst__arrival__img_pic-one">
                        <p class="ferst__arrival__img__text">Джинсовые куртки<br>new arrival</p>
                    </div>
                </div>
                <div class="ferst__advertising advertising">
                    <div class="advertising__novelty">
                        <div class="advertising__novelty__icon">!</div>
                        <P class="advertising__novelty__text">каждый сезон мы подготавливаем для Вас исключительно лучшую модную одежду. Следите за нашими новинками</P>
                    </div>
                    <div class="advertising__min-price">
                        <div class="advertising__min-price__img advertising__min-price__img_pic-one">
                            <p class="advertising__min-price__img__text">Джинсы<br><span>от 3200 руб.</span></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="info__next next">
                <div class="next__pic">
                    <div class="next__pic__img next__pic__img_pic-one"></div>

                </div>
                <div class="next__text">
                    <div class="next__text__icon">&larr;</div>
                    <p class="next__text__p">Аксесуары</p>
                </div>
            </div>
        </div>
        <div class="main__info__right info">
            <div class="info__next next">
                <div class="next__pic">
                    <div class="next__pic__img next__pic__img_pic-two"></div>
                </div>
                <div class="next__text">
                    <div class="next__text__icon">&larr;</div>
                    <p class="next__text__p">Элегантная обувь<br><span>ботинки, кросовки</span></p>
                </div>
            </div>
            <div class="info__ferst ferst">
                <div class="ferst__arrival ferst__arrival_fl-r">
                    <div class="ferst__arrival__img ferst__arrival__img_pic-two">
                        <p class="ferst__arrival__img__text">Джинсовые куртки<br>new arrival</p>
                    </div>
                </div>
                <div class="ferst__advertising advertising">
                    <div class="advertising__novelty">
                        <div class="advertising__novelty__icon">!</div>
                        <P class="advertising__novelty__text">свмые низкие цены в Москве. Найдете дешевле? Вернем разницу.</P>
                    </div>
                    <div class="advertising__min-price">
                        <div class="advertising__min-price__img advertising__min-price__img_pic-two">
                            <p class="advertising__min-price__img__text">Спортивная одежда<br><span>от 590 руб.</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main__subscribe subscribe ">
        <p class="subscribe__header ">Будь всегда в курсе выгодных предложений</p>
        <p class="subscribe__text ">подписыввайся и следи за новинками и выгодными предложениями.</p>
        <form class="subscribe__main-form main-form " action="">
            <input class="main-form__inp" type="text" name="email" placeholder="e-mail"><button class="main-form__btn-subscribe">подписаться</button>
        </form>
        <p class="subscribe__error active ">Некорректный e-mail, попробуйте еще раз</p>
    </div>

</section>

<?php 
    $footerConfig = [
        'scripts'=>['script.js', 'main.js']    
    ];
    include('modules/footer.php');
?>