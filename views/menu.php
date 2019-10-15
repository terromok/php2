<? if ($username == 'admin') :?>
	<a href="/admin/">Админка</a>
	<a href="/goodsedit/">Редактор каталога</a>
	<a href="/orders/"> Заказы </a>		
<?endif;?>
<br>
<a href="/"> Главная </a>
<a href="/product/catalog/"> Каталог </a>
<a href="/basket/"> Корзина <span id="count"><?=$count?></span></a>
<p >Общая сумма заказа <span id="totalPriceMenu"><?=$totalPrice?></span></p>

<br>
