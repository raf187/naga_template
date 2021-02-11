class DateFetch{
    constructor(){
        this.apiAddress1 = "https://public.opendatasoft.com/api/records/1.0/search/?dataset=jours-ouvres-week-end-feries-france-2010-a-2030&q=date";
        this.apiAddress2 = "&lang=fr&rows=2&sort=-date&facet=annee&facet=jour&facet=statut";
        this.date = new Date();
    }

    deliDate(arrayDates){
        let exclude = this.excludeDates(arrayDates);
        let reqAPI = this.createUrl();
        if(exclude !== ""){
            reqAPI = reqAPI + exclude
            fetch(reqAPI, {method:'get'}).then(response => response.json()).then(resulAddress => {
                $.each(resulAddress.records, (i, v) =>{
                    $("#deliDate").append(`<option value="${resulAddress.records[i].fields.date}">${resulAddress.records[i].fields.jour_et_date}</option>`);
                });
            })
        }else{
            fetch(reqAPI, {method:'get'}).then(response => response.json()).then(resulAddress => {
                $.each(resulAddress.records, (i, v) =>{
                    $("#deliDate").append(`<option value="${resulAddress.records[i].fields.date}">${resulAddress.records[i].fields.jour_et_date}</option>`);
                });
            })
        }
    }

    collectTime(){
        let today = new Date();
        let dd = String(today.getDate()).padStart(2, '0');
        let mm = String(today.getMonth() + 1).padStart(2, '0');
        let yyyy = today.getFullYear();
        today = yyyy + '-' + mm + '-' + dd;
        let daySelect = $('#deliDate  option:selected').val();

        $.get('/apiClosingDates', function (time){
            let collectTimeToday = time['collectTimeToday'];
            let collectTimeTomorow = time['collectTimeTomorow'];
            if(daySelect === today){
                $.each(collectTimeToday,function (i){
                    let collectTToday = collectTimeToday[i]['clickAndCollectTime'].slice(0, 5).replace(":", "H");
                    $('#deliTime').append(`<option class="opt" value="${collectTToday}">${collectTToday}</option>`);
                })
            }else if(daySelect === ""){
                $('#deliTime').append(`<option disabled selected value="">Choisissez une date</option>`);
            } else {
                $.each(collectTimeTomorow,function (i){
                    let collectTTomorow = collectTimeTomorow[i]['clickAndCollectTime'].slice(0, 5).replace(":", "H");
                    $('#deliTime').append(`<option class="opt" value="${collectTTomorow}">${collectTTomorow}</option>`);
                })
            }
        });

    }

    createUrl(){
        let today = this.date
        let mois = today.getMonth() + 1
        let dateDay = today.getFullYear() +"-"+ mois +"-"+ today.getDate()
        let dateClose = new Date(today.getFullYear(), today.getMonth(), today.getDate(),21,15,0);
        let reqAPI = "";
        if(today > dateClose){
            reqAPI = this.apiAddress1 + ">" + dateDay + this.apiAddress2;
            return reqAPI;
        } else{
            reqAPI = this.apiAddress1 + ">=" + dateDay + this.apiAddress2;
            return reqAPI;
        }
    }

    getdates(){
        let excludeDates = [];
        let that = this;
        $.get("/apiClosingDates",
            function (datesJson) {
                let dates = datesJson.dates;
                for (let i = 0; i < dates.length; i++) {
                    excludeDates.push(dates[i].closingDate);
                }
                that.deliDate(excludeDates);
            });
    }

    excludeDates(arrayDates){
        let allExcludeDates = "";
        let exclude = "&exclude.date="
        let dateToExclude = arrayDates;
        $.each(dateToExclude, function (ind, val) {
            allExcludeDates += exclude + dateToExclude[ind];
        });
        return allExcludeDates;
    }
}
