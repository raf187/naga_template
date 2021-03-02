class Animation{
    constructor() {
    }

    colapseNav(){
        $(document).on('click','.linkCollapse', function(){
            $('.navbar-collapse').collapse('hide');
        });
    }

    modifPayMethod(){
        $(document).on('click', '.modifPayMethod',function (){
            $('#TRConfirm').modal("hide");
            $('#orderConfirm').modal("show");
        })
    }

    homeMsg(){
        let status = $('#ModalisActived').val()
        $(window).on('load', function() {
            if(status == 1) {
                $("#openStore").modal("show");
            }
        });
    }

    deleteConfirm(){
        var buttons = document.querySelectorAll(".deleteBtnConfirm");
        for (var i = 0; i < buttons.length; i++)
        {
            buttons[i].addEventListener("click", function (e){
                e.preventDefault();
                let conf = confirm("Êtes-vous sûr de vouloir supprimer ?");
                if (conf) {
                    window.location.href = $(this).attr("href");
                }
            })
        }
    }

    msgSession(div, timeOut){
        setTimeout(function (){
            $(div).fadeOut(1000);
        },timeOut)
    }

    printTicket(){
        $(document).on('click', '.startPrint', function (e){
            e.preventDefault();
            let id = $(this).attr('data-dataId');
            window.print();
            setTimeout(function () {
                $('#orderStatusUpdate').submit();
            }, 2000);

        })
    }

    infoService(){
        $('#myTab a:first').addClass('active');
        $('#myTabContent div:first').addClass('active show');
        $('#myTab a').on('click', function (e){
            e.preventDefault();
            $($(this).prop('id')).tab('show')
        })

    }

    updatePayMethod(){
        $(document).on('click', '.btnModalPay', function (){
            let idOrder = $(this).attr("data-id");
            $('#modPayForm').attr('action',"/update-pay-method/" + idOrder);
            $('#modPayMethod').modal('show')
        })
    }

    btnAnimationAddToCart(){
        document.querySelectorAll('.buttonAddToCart').forEach(button => button.addEventListener('click', e => {
            if(!button.classList.contains('loading')) {
                button.classList.add('loading');
                setTimeout(() => button.classList.remove('loading'), 3700);
            }
        }));
    }

    dataSpy(){
        $('body').scrollspy({ target: '#navMobilMenu', offset: 350 })
    }

}

