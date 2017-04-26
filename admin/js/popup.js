$(document).ready(function() {
    var deleteForm = null;

    $( "#dialog-confirm" ).dialog({
        resizable: false,
        height:160,
        width:500,
        autoOpen: false,
        modal: true,
        buttons: {
            "Oui": function() {
                $( this ).dialog( "close" );
                deleteForm.submit();
            },
            "Annuler": function() {
                $( this ).dialog( "close" );
                deleteForm = null;
            }
        }
    });

    $("form.form-delete").submit(function(e) {
        if (deleteForm == null) {
            e.preventDefault();
            deleteForm = $(this);
            $("#dialog-confirm").dialog("open");
        }
    });
});
