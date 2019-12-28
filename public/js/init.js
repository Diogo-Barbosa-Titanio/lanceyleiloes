(function ($) {
    $(function () {

        M.updateTextFields();

        $('.tabs').tabs();


        $('.sidenav').sidenav();

        $('select').formSelect();

        $('input.autocomplete').autocomplete({
            data: {
                "Apple": null,
                "Microsoft": null,
                "Google": 'https://placehold.it/250x250'
            },
        });

    }); // end of document ready
})(jQuery); // end of jQuery name space
