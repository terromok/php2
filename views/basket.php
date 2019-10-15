<? $summ = 0;?>
<h2>Корзина</h2>
<button><a href="/api/regOrder/">Оформить заказ</a></button> 
<hr>

<? foreach ($products as $item): ?>
<div id="<?= $item['id_basket'] ?>">
    <h2><?=$item['name']?></h2>
    <p>Описание:<?=$item['description']?></p>
    <p>Цена:<?=$item['price']?> руб.</p>
    <p>Количество:<span id="<?= $item['id_prod']?>"><?=$item['quantity']?></span> шт 
        <button data-id="<?= $item['id_prod']?>" basket="<?= $item['id_basket']?>" class="plus">+</button> 
        <button data-id="<?= $item['id_prod']?>" basket="<?= $item['id_basket']?>" class="minus">-</button></p>
    <p>Стоимость:<span id="s<?= $item['id_prod']?>"><?=$item['summ_row']?></span> руб.</p>
    <? $summ += $item['summ_row']?>
    <button data-id="<?= $item['id_basket']?>" class="delete">Удалить</button>
</div>
<? endforeach; ?>

<hr>
<h3>Общая стоимость товаров: <span id = 'totalPrice'><?=$summ ?></span> руб.</h3>
<script>
    let buttonsDel = document.querySelectorAll('.delete');

    buttonsDel.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            (async () => {
                const response = await fetch('/Api/delFromBasket/', {
                    method: 'POST',
                    headers: new Headers({
                        'Content-Type': 'application/json'
                    }),
                    body: JSON.stringify({
                        id: id
                    }),
                });
                const answer = await response.json();
                document.getElementById('count').innerText = answer.count;
                document.getElementById('totalPriceMenu').innerText = answer.totalPrice;
                document.getElementById('totalPrice').innerText = answer.totalPrice;
                document.getElementById(id).remove();
            })();
        })
    })
</script>
<script>
    let buttonsPlus = document.querySelectorAll('.plus');

    buttonsPlus.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            let id_basket = elem.getAttribute('basket');
            let sign = 'plus';
            console.log(elem);
            (async () => {
                const response = await fetch('/Api/AddBasket/', {
                    method: 'POST',
                    headers: new Headers({
                        'Content-Type': 'application/json'
                    }),
                    body: JSON.stringify({
                        id: id,
                        id_basket: id_basket,
                        sign: sign
                    }),
                });
                const answer = await response.json();
                document.getElementById('s'+answer.product_id).innerText = answer.summ_row;
                document.getElementById(answer.product_id).innerText = answer.quantity;
                document.getElementById('totalPriceMenu').innerText = answer.totalPrice;
                document.getElementById('totalPrice').innerText = answer.totalPrice;
                document.getElementById('count').innerText = answer.count;

                //document.getElementById(id).remove();
            })();
        })
    })
</script>
<script>
    let buttonsMinus = document.querySelectorAll('.minus');

    buttonsMinus.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            let id_basket = elem.getAttribute('basket');
            let sign = 'minus';
            console.log(elem);
            (async () => {
                const response = await fetch('/Api/delFromBasketMinus/', {
                    method: 'POST',
                    headers: new Headers({
                        'Content-Type': 'application/json'
                    }),
                    body: JSON.stringify({
                        id: id,
                        id_basket: id_basket,
                        sign: sign
                    }),
                });
                const answer = await response.json();

                document.getElementById('s'+answer.product_id).innerText = answer.summ_row;
                document.getElementById(answer.product_id).innerText = answer.quantity;
                document.getElementById('totalPriceMenu').innerText = answer.totalPrice;
                document.getElementById('totalPrice').innerText = answer.totalPrice;
                document.getElementById('count').innerText = answer.count;

                if (answer.remove) {
                    document.getElementById(id_basket).remove();
                };

            })();
        })
    })
</script>