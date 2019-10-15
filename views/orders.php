<? if ($username == 'admin') :?>

<h2>Заказы</h2><hr>

<? foreach ($orders as $item): ?>
<div id="<?= $item['id'] ?>" style="font-weight: bold; background-color: grey;">
    <p>Заказ № <?=$item['id']?></p>
    <h2><?=$item['name']?></h2>
    <p>Телефон:<?=$item['phone']?></p>
    <p>"E-mail":<?=$item['email']?></p>
    <p>"Статус заявки: <?=$item['status_name']?></p>
    <a href="/orders/order/?id=<?= $item['id'] ?>"><button data-id="<?= $item['session_id']?>" class="edit">Просмотр</button></a>

</div>
<? endforeach; ?>

<script>
    let buttons = document.querySelectorAll('.edit1');

    buttons.forEach((elem) => {
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
                document.getElementById(id).remove();
            })();
        })
    })
</script>
<?endif;?>