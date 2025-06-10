document.addEventListener('DOMContentLoaded', function () {
    const trashBoxes = document.querySelectorAll('.trash-box');

    trashBoxes.forEach(function (img) {
        img.addEventListener('click', function () {
            if (confirm('本当に削除しますか？')) {
                const productId = img.getAttribute('data-product-id');
                const form = document.getElementById(`delete-form-${productId}`);
                if (form) {
                    form.submit();
                }
            }
        });
    });

    //検索して取得したデータをModalで変換させる SPAを目指そう

});


