class DateFetch{

    deliDate(){
        $.get('/apiClosingDates', function (dates){
            let dateApi = dates['orderDates'];
            $('#deliDate').append('<option disabled selected hidden value="">Choisissez une date</option>');
            $.each(dateApi, (i, v) =>{
                $("#deliDate").append(`<option id="dateOption${dateApi[i].name}" value="${dateApi[i].dateFormat}">${dateApi[i].dayWeek}</option>`);
            });
        })
    }

    collectTime(){
        $.get('/apiClosingDates', function (time){
            let collectTimeToday = time['collectTimeToday'];
            let collectTimeTomorow = time['collectTimeTomorow'];
            if($('#dateOptiontoday').is(':selected')){
                $('#deliTime').empty();
                $('#deliTime').append('<option disabled selected hidden value="">Choisissez un horaire</option>');
                $.each(collectTimeToday,function (i){
                    let collectTToday = collectTimeToday[i]['clickAndCollectTime'].slice(0, 5).replace(":", "H");
                    $('#deliTime').append(`<option class="opt" value="${collectTToday}">${collectTToday}</option>`);
                })
            } else if($('#dateOptiontomorow').is(':selected')) {
                $('#deliTime').empty();
                $('#deliTime').append('<option disabled selected hidden value="">Choisissez un horaire</option>');
                $.each(collectTimeTomorow,function (i){
                    let collectTTomorow = collectTimeTomorow[i]['clickAndCollectTime'].slice(0, 5).replace(":", "H");
                    $('#deliTime').append(`<option class="opt" value="${collectTTomorow}">${collectTTomorow}</option>`);
                })
            }else{
                $('#deliTime').empty();
                $('#deliTime').append(`<option disabled selected value="">Choisissez une date</option>`);
            }
        });
    }

    displayTime(){
        $(document).on('change','#deliTime',()=>{
            $('#deliTime').empty();
            $('.deliTimeInput').removeClass('d-none');
            $this.collectTime();
        })
    }
}
