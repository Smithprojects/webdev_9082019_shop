        <footer class="footer">
            <div class="footer__collection collection">
                <p class="collection__title">Коллекции</p>
                <a class="collection__href" href="#">Мужчинам</a>
                <a class="collection__href" href="#">Женщинам</a>
                <a class="collection__href" href="#">Детям</a>
                <a class="collection__href" href="#">Новинки</a>
            </div>
            <div class="footer__shop shop">
                <p class="shop__title">Магазин</p>
                <a class="shop__href" href="#">О нас</a>
                <a class="shop__href" href="#">Доставка</a>
                <a class="shop__href" href="#">Работай с нами</a>
                <a class="shop__href" href="#">Контакты</a>
            </div>
            <div class="footer__social social">
                <p class="social__title">Мы в социальных сетях</p>
                <p class="social__right">Сайт разработан inorsic.ru</p>
                <p class="social__right">2019 Все права защищены</p>
                <div class="social__emblems emblems">
                    <a class="emblems__tv" href="#"><i class="fa fa-twitter"></i></a>
                    <a class="emblems__fb" href="#"><i class="fa fa-facebook"></i></a>
                    <a class="emblems__in" href="#"></a>
                    
                   
                </div>
            </div>
        </footer>
    <!-- конец wrapper -->
    </div> 
    
    <?php foreach( $footerConfig['scripts'] as $scriptPath):?>
        <script src="/scripts/<?=$scriptPath?>"></script>
    <?php endforeach;?>
</body>
</html>