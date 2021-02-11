class UpdateForm{
constructor() {
}
    removeReadonly(){
        $(document).on('click','#updateForm', function(){
            $('.updateUser').prop("readonly" , false);
            $(".newsletterGroup").html(`
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="newsletter" id="newsletter1" value="1" checked>
                  <label class="form-check-label" for="newsletter1">
                    Se abonner à notre newsletter
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="newsletter" id="newsletter2" value="0">
                  <label class="form-check-label" for="newsletter2">
                    Se desabonner de notre newsletter
                  </label>
                </div>
            `);
            $('.btnDivUpdate').html(`
                <a id="updateReturn" href="/" class="btn btn-secondary col-md-12">
                    Anuller
                </a>
                <button id="sendUpdate" class="btn btn-success col-md-12 mt-2">
                    Confirmer
                </button>`);
        })
    }
}
