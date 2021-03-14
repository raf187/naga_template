
$(window).ready(function () {

    const ajax = new AjaxCalls();
    ajax.singIn();
    ajax.logIn();
    ajax.payUpdate();
    ajax.payUpdateAuto();

    const anim = new Animation();
    anim.btnAnimationAddToCart();
    anim.colapseNav();
    anim.homeMsg();
    anim.dataSpy();
    anim.msgSession('.msgDivAlert',15000);

    const orderList = new MyOrders();
    orderList.saveOnSession();

    const update = new UpdateForm();
    update.removeReadonly();

    const date = new DateFetch();
    date.deliDate();
    $(document).change('#deliTime', function(){
        $('#deliTime').empty();
        $('.deliTimeInput').removeClass('d-none');
        date.collectTime();
    })

    const json = new MyCart();
    json.cartBtnAdd('.addCartForm');
    json.cartBtnUpdates('.btnMinus', '/remove-from-cart/');
    json.cartBtnUpdates('.btnAddDI', '/add-to-cart/');
    json.cartBtnUpdates('.incrase', '/incrase-from-cart/');
    json.cartBtnUpdates('.btnDelete', '/delete-from-cart/');
    json.cartJson();
    json.confimOrder();

    const alert = new Alert();
    alert.beforeSingUp("#btnSubLogin", '#subSingInForm');
    alert.beforeUpdateUser("#sendUpdate", '#updateUserForm');
})
