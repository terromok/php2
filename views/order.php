<? if ($username == 'admin') :?>
<h2>Заказ № <?=$order->id?></h2>
<p>Покупатель: <?=$order->name?></p>
<p>Телефон: <?=$order->phone?></p>
<p>Электронная почта: <?=$order->email?></p>
<p>Адрес доставки: <?=$order->adres?></p>
<p>Статус заявки: <?=$order->status_name?></p>   
<form method="post" action='/Api/EditOrderStatus/?id=<?=$order->id?>'>
   <p><select name="select" size="1" >
    <option selected value="<?=$order->status_name?>" ><?=$order->status_name?></option>
    <option value="В работе" >Оформлен</option>
    <option value="В работе" >В работе</option>
    <option value="Оплачен" >Оплачен</option>
    <option value="Обработан" >Обработан </option>
   </select>
    <button data-id=<?=$order->id?> class="select">Изменить статус</button>
</form>

<!--<script>
    let buttons = document.querySelectorAll('.selectqqq');

    buttons.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            (async () => {
                const response = await fetch('/Api/EditOrderStatus/', {
                    method: 'POST',
                    headers: new Headers({
                        'Content-Type': 'application/json'
                    }),
                    body: JSON.stringify({
                        id: id
                    }),
                });
                const answer = await response.json();
                console.log(answer);
                document.getElementById('totalPrice').innerText = answer.totalPrice; //не хочет работать
                document.getElementById('count').innerText = answer.count;


            })();
        })
    })
</script>-->
<?endif;?>
