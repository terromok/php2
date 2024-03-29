<h2>Каталог</h2>
<? foreach ($catalog as $item): ?>
    <a href="/product/card/?id=<?= $item['id'] ?>"><h3><?= $item['name'] ?></h3></a>
    <p>Цена: <?= $item['price'] ?></p>
    <button data-id="<?= $item['id'] ?>" class="buy">Купить</button>
<? endforeach; ?>

<script>
    let buttons = document.querySelectorAll('.buy');

    buttons.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            (async () => {
                const response = await fetch('/Api/AddBasket/', {
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
                document.getElementById('totalPriceMenu').innerText = answer.totalPrice; //не хочет работать
                document.getElementById('count').innerText = answer.count;


            })();
        })
    })
</script>