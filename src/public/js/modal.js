document.getElementById('searchForm').addEventListener('submit', function (e) {
    e.preventDefault(); // ページリロードを防止
    const keyword = document.querySelector('input[name="keyword"]').value;
    const priceOrder = document.querySelector('select[name="price_order"]').value;

    const query = new URLSearchParams({
        keyword: keyword,
        price_order: priceOrder
    });

    // LaravelのWebルートにGETでリダイレクト
    location.href = `/products?${query.toString()}`;
    addSearchCancelBtn();
});

document.getElementById('price_order').addEventListener('change', function () {
    const keyword = document.querySelector('input[name="keyword"]').value;
    const priceOrder = this.value;

    const query = new URLSearchParams({
        keyword: keyword,
        price_order: priceOrder
    });

    location.href = `/products?${query.toString()}`;
    addSearchCancelBtn();
});

function addSearchCancelBtn() {

    if (document.getElementById('cancelSearchButton')) return;

    const btn = document.createElement('button');
    btn.id = 'cancelSearchButton';
    btn.textContent = '❎';
    btn.style.marginLeft = '10px';
    btn.type = 'button';

    btn.addEventListener('click', () => {
        priceOrder.value = '';
        document.querySelector('input[name="keyword"]').value = '';
        location.href = '/products';
    });

    const container = document.querySelector('#price_order');
    container.appendChild(btn);
}
