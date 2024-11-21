
var votes_id = [0, 0, 0]
$('.choix_projet_1_valide').hide()
$('.choix_projet_2_valide').hide()
$('.choix_projet_3_valide').hide()

$(document).on('click', '.choix_projet_1', function () {

    if (this.checked) {
        if (votes_id[0] != 0) {
            $('#projet_choix_1_' + votes_id[0])[0].checked = false

            if (votes_id[1] != votes_id[0] && votes_id[2] != votes_id[0]) {
                document.getElementById('projet_' + votes_id[0]).classList.remove("vote-50")
            }
        }

        votes_id[0] = this.getAttribute("value")
        $('.choix_projet_1_valide').show()

    }
    else {
        if (votes_id[0] == this.getAttribute("value")) {
            $('.choix_projet_1_valide').hide()
            votes_id[0] = 0
        }
    }

    if (votes_id[0] != 0 && votes_id[1] != 0 && votes_id[2] != 0) {
        $(".send_pull").show()
    }
    else {
        $(".send_pull").hide()

    }


    if (votes_id[0] == this.getAttribute("value") || votes_id[1] == this.getAttribute("value") || votes_id[2] == this.getAttribute("value")) {
        document.getElementById('projet_' + this.getAttribute("value")).classList.add("vote-50")
    }
    else {
        document.getElementById('projet_' + this.getAttribute("value")).classList.remove("vote-50")
    }

});


$(document).on('click', '.choix_projet_2', function () {

    if (this.checked) {
        if (votes_id[1] != 0) {

            $('#projet_choix_2_' + votes_id[1])[0].checked = false

            if (votes_id[0] != votes_id[1] && votes_id[2] != votes_id[1]) {
                document.getElementById('projet_' + votes_id[1]).classList.remove("vote-50")

            }
        }
        votes_id[1] = this.getAttribute("value")
        $('.choix_projet_2_valide').show()
    }
    else {
        if (votes_id[1] == this.getAttribute("value")) {
            $('.choix_projet_2_valide').hide()
            votes_id[1] = 0
        }
    }

    if (votes_id[0] != 0 && votes_id[1] != 0 && votes_id[2] != 0) {
        $(".send_pull").show()
    }
    else {
        $(".send_pull").hide()

    }

    if (votes_id[0] == this.getAttribute("value") || votes_id[1] == this.getAttribute("value") || votes_id[2] == this.getAttribute("value")) {
        document.getElementById('projet_' + this.getAttribute("value")).classList.add("vote-50")

    }
    else {
        document.getElementById('projet_' + this.getAttribute("value")).classList.remove("vote-50")


    }

});

$(document).on('click', '.choix_projet_3', function () {

    if (this.checked) {
        if (votes_id[2] != 0) {

            $('#projet_choix_3_' + votes_id[2])[0].checked = false

            if (votes_id[0] != votes_id[2] && votes_id[1] != votes_id[2]) {
                document.getElementById('projet_' + votes_id[2]).classList.remove("vote-50")

            }
        }
        $('.choix_projet_3_valide').show()
        votes_id[2] = this.getAttribute("value")
    }
    else {
        if (votes_id[2] == this.getAttribute("value")) {
            $('.choix_projet_3_valide').hide()
            votes_id[2] = 0
        }
    }

    if (votes_id[0] != 0 && votes_id[1] != 0 && votes_id[2] != 0) {
        $(".send_pull").show()
    }
    else {
        $(".send_pull").hide()

    }

    if (votes_id[0] == this.getAttribute("value") || votes_id[1] == this.getAttribute("value") || votes_id[2] == this.getAttribute("value")) {
        document.getElementById('projet_' + this.getAttribute("value")).classList.add("vote-50")

    }
    else {
        document.getElementById('projet_' + this.getAttribute("value")).classList.remove("vote-50")


    }

});

$(document).on('click', '.send_pull', function () {

    id = document.getElementById("parti").getAttribute("value")

    $.ajax({
        url: "/api/send/pull/" + id,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        data: {
            "vote": votes_id,
        },

        success: function (response) {


            if (response.success) {
                window.location.replace("/vote-fin");
            }
            else {
                $('#message_validation_error').show()
            }
        },
        error: function (error) {
            $('.loading_add_groupe').hide()
            $('#message_validation_error').html("Veuillez verifier votre connection !");
            $('#message_validation_error').show();
        }
    });

});