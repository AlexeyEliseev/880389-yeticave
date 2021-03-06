    <section class="promo">
        <h2 class="promo__title">Нужен стафф для катки?</h2>
        <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
        <ul class="promo__list">
          <?php $index = 0;                   //заполните этот список из массива категорий
                  $num = count($categories);
                  while ($index < $num): ?>
            <li class="promo__item promo__item--boards">
                <a class="promo__link" href="pages/all-lots.html"><?=$categories[$index];?></a>
            </li>
          <?php $index++; ?>
          <?php endwhile; ?>
        </ul>
    </section>
    <section class="lots">
        <div class="lots__header">
            <h2>Открытые лоты</h2>
        </div>
        <ul class="lots__list">
            <!-- заполните этот список из массива с товарами   -->
            <?php foreach ($lots_sql as $item): ?>
                <li class="lots__item lot">
                <div class="lot__image">
                    <img src="<?=$item[image];?>" width="350" height="260" alt="">
                </div>
                <div class="lot__info">
                    <span class="lot__category"><?=htmlspecialchars($item[categotie_id]);?></span>
                    <h3 class="lot__title"><a class="text-link" href='lot.php?tab=<?=$item[id]?>'><?=htmlspecialchars($item[lotname]);?></a></h3>
                    <div class="lot__state">
                        <div class="lot__rate">
                            <span class="lot__amount">Стартовая цена</span>
                            <span class="lot__cost"><?=htmlspecialchars(form($item[cost]));?><b class="rub">р</b></span>
                        </div>
                        <div class="lot__timer timer">
                            <?=lotTimer();?>
                        </div>
                    </div>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </section>
    