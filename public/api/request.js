id = 0;

$(document).on("click", "#send_new_event", function () {
    $("#message_validation").hide();
    $("#message_validation_success").hide();

    add_event = $("#add_event");
    titre = document.getElementById("titre");
    date = document.getElementById("date");
    heure_debut = document.getElementById("heure_debut");
    minute_debut = document.getElementById("minute_debut");
    heure_fin = document.getElementById("heure_fin");
    minute_fin = document.getElementById("minute_fin");
    communicateur = document.getElementById("communicateur");

    $.ajax({
        url: "/api/evenement",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "POST",
        data: {
            titre: titre.value,
            date: date.value,
            heure_debut: heure_debut.value,
            minute_debut: minute_debut.value,
            heure_fin: heure_fin.value,
            minute_fin: minute_fin.value,
            communicateur: communicateur.value,
        },

        success: function (response) {
            if (!response.success) {
                $("#message_validation").html(response.message);
                $("#message_validation").show();
                $("#table_body").append(response.child);
            } else {
                $("#message_validation_success").show();
                titre.value = "";
                date.value = "";
                heure_debut.value = "";
                minute_debut.value = "";
                heure_fin.value = "";
                minute_fin.value = "";
                communicateur.value = "";
                $("#add_event").modal("hide");
                setTimeout(get_event, 0);
            }
        },
        error: function (error) {
            console.log(error);
            console.log("No");
        },
    });
});

function get_event() {
    event_table = $("#event_table");
    console.log(event_table);

    $.ajax({
        url: "/api/evenement",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "GET",
        data: {},

        success: function (response) {
            $("#table_body").html(response.body);
        },
        error: function (error) {
            setTimeout(get_event, 1000);
        },
    });
}

$(document).on("click", ".event", function () {
    $("#message_validation2").hide();
    $("#message_validation_success").hide();
    $("#send_edit_event").hide();
    $("#loading_edit_event").show();

    titre = document.getElementById("titre2");
    date = document.getElementById("date2");
    heure_debut = document.getElementById("heure_debut2");
    minute_debut = document.getElementById("minute_debut2");
    heure_fin = document.getElementById("heure_fin2");
    minute_fin = document.getElementById("minute_fin2");
    communicateur = document.getElementById("communicateur2");

    titre.value = "";
    date.value = "";
    heure_debut.value = "";
    minute_debut.value = "";
    heure_fin.value = "";
    minute_fin.value = "";
    communicateur.value = "";

    id = this.getAttribute("id");
    edit_event = $("#edit_event");
    console.log(edit_event);
    $.ajax({
        url: "/api/evenement/" + id,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "GET",
        data: {},

        success: function (response) {
            if (response.success) {
                titre.value = response.data.titre;
                date.value = response.data.date;
                heure_debut.value = parseInt(
                    response.data.heure_debut.split(":")[0]
                );
                minute_debut.value = parseInt(
                    response.data.heure_debut.split(":")[1]
                );
                heure_fin.value = parseInt(
                    response.data.heure_fin.split(":")[0]
                );
                minute_fin.value = parseInt(
                    response.data.heure_fin.split(":")[1]
                );
                communicateur.value = response.data.communicateur;

                $("#send_edit_event").show();
                $("#loading_edit_event").hide();
            } else {
                $("#message_validation2").show();
            }
        },
        error: function (error) {},
    });
});

$(document).on("click", "#send_edit_event", function () {
    $("#message_validation").hide();
    $("#message_validation_success").hide();

    titre = document.getElementById("titre2");
    date = document.getElementById("date2");
    heure_debut = document.getElementById("heure_debut2");
    minute_debut = document.getElementById("minute_debut2");
    heure_fin = document.getElementById("heure_fin2");
    minute_fin = document.getElementById("minute_fin2");
    communicateur = document.getElementById("communicateur2");

    $.ajax({
        url: "/api/evenement/edit/" + id,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "POST",
        data: {
            titre: titre.value,
            date: date.value,
            heure_debut: heure_debut.value,
            minute_debut: minute_debut.value,
            heure_fin: heure_fin.value,
            minute_fin: minute_fin.value,
            communicateur: communicateur.value,
        },

        success: function (response) {
            if (response.success) {
                $("#message_validation").html(response.message);
                $("#message_validation_success").html(
                    "Evènement modifié avec success"
                );
                $("#message_validation_success").show();
                $("#table_body").append(response.child);
                setTimeout(get_event, 0);

                $("#message_validation_success").show();
                $("#edit_event").modal("hide");

                titre.value = "";
                date.value = "";
                heure_debut.value = "";
                minute_debut.value = "";
                heure_fin.value = "";
                minute_fin.value = "";
                communicateur.value = "";
            }
        },
        error: function (error) {},
    });
});

$(document).on("click", "#send_new_pariticpant", function () {
    $("#message_validation").hide();
    $("#message_validation_success").hide();

    add_event = $("#add_event");
    nom = document.getElementById("nom");
    prenom = document.getElementById("prenom");
    email = document.getElementById("email");
    sex = document.getElementById("sex");
    universite = document.getElementById("universite");
    niveau_etude = document.getElementById("niveau");
    annee_passe_univ = document.getElementById("annee_passe_univ");
    annee_depart_univ = document.getElementById("annee_depart_univ");
    experience_entrep = document.getElementById("experience_entrep");
    projet_incub = document.getElementById("projet_incub");
    projet_numerique = document.getElementById("projet_numerique");
    projet_inter_diciplinaire = document.getElementById(
        "projet_inter_diciplinaire"
    );
    motivation = document.getElementById("motivation");
    projet = document.getElementById("projet");

    $.ajax({
        url: "/api/participant",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "POST",
        data: {
            nom: nom.value,
            prenom: prenom.value,
            email: email.value,
            sex: sex.value,
            universite: universite.value,
            niveau_etude: niveau_etude.value,
            annee_passe_univ: annee_passe_univ.value,
            annee_depart_univ: annee_depart_univ.value,
            experience_entrep: experience_entrep.checked,
            projet_incub: projet_incub.checked,
            projet_numerique: projet_numerique.checked,
            projet_inter_diciplinaire: projet_inter_diciplinaire.checked,
            motivation: motivation.value,
            projet: projet.value,
        },

        success: function (response) {
            if (response.success) {
                $("#message_validation").html(response.message);
                $("#message_validation_success").show();
                nom.value = "";
                prenom.value = "";
                email.value = "";
                sex.value = "";
                universite.value = "";
                niveau_etude.value = "";
                annee_passe_univ.value = "";
                annee_depart_univ.value = "";
                experience_entrep.checked = "";
                projet_incub.checked = "";
                projet_numerique.checked = "";
                projet_inter_diciplinaire.checked = "";
                projet.value = "";

                setTimeout(get_participant, 0);
                $("#add_parti").modal("hide");
            } else {
                $("#message_validation").html(response.message);
                $("#message_validation").show();
                $("#message_validation_success").show();
            }
        },
        error: function (error) {},
    });
});

$(document).on("click", ".edit_participant", function () {
    $("#edit_message_validation").hide();
    $("#message_validation_success").hide();
    $("#send_edit_participant").hide();

    id = this.getAttribute("id");
    edit_event = $("#edit_event");
    console.log(edit_event);
    $.ajax({
        url: "/api/participant/" + id,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "GET",
        data: {},

        success: function (response) {
            if (response.success) {
                nom2.value = response.data.nom;
                prenom2.value = response.data.prenom;
                email2.value = response.data.email;
                sex2.value = response.data.sex;
                universite2.value = response.data.universite;
                niveau2.value = response.data.niveau_etude;
                annee_passe_univ2.value = response.data.annee_passe_univ;
                annee_depart_univ2.value = response.data.annee_depart_univ;
                experience_entrep2.checked = response.data.experience_entrep;
                projet_incub2.checked = response.data.projet_incub;
                projet_numerique2.checked = response.data.projet_numerique;
                projet_inter_diciplinaire2.checked =
                    response.data.projet_inter_diciplinaire;
                motivation2.value = response.data.motivation;

                $("#send_edit_participant").show();
                setTimeout(get_participant, 0);
            }
        },
        error: function (error) {},
    });
});

function get_participant() {
    event_table = $("#participant_table");
    console.log(event_table);

    $.ajax({
        url: "/api/participant",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "GET",
        data: {},

        success: function (response) {
            $("#table_body").html(response.body);
        },
        error: function (error) {
            setTimeout(get_participant, 2000);
        },
    });
}

$(document).on("click", "#send_edit_participant", function () {
    $(".loading_edit_parti").show();
    $("#edit_message_validation").hide();
    $("#message_validation_success").hide();

    nom = document.getElementById("nom2");
    prenom = document.getElementById("prenom2");
    email = document.getElementById("email2");
    sex = document.getElementById("sex2");
    universite = document.getElementById("universite2");
    niveau_etude = document.getElementById("niveau2");
    annee_passe_univ = document.getElementById("annee_passe_univ2");
    annee_depart_univ = document.getElementById("annee_depart_univ2");
    experience_entrep = document.getElementById("experience_entrep2");
    projet_incub = document.getElementById("projet_incub2");
    projet_numerique = document.getElementById("projet_numerique2");
    projet_inter_diciplinaire = document.getElementById(
        "projet_inter_diciplinaire2"
    );
    motivation = document.getElementById("motivation2");

    $.ajax({
        url: "/api/participant/edit/" + id,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "POST",
        data: {
            nom: nom.value,
            prenom: prenom.value,
            email: email.value,
            sex: sex.value,
            universite: universite.value,
            niveau_etude: niveau_etude.value,
            annee_passe_univ: annee_passe_univ.value,
            annee_depart_univ: annee_depart_univ.value,
            experience_entrep: experience_entrep.checked,
            projet_incub: projet_incub.checked,
            projet_numerique: projet_numerique.checked,
            projet_inter_diciplinaire: projet_inter_diciplinaire.checked,
            motivation: motivation.value,
        },

        success: function (response) {
            if (response.success) {
                $("#message_validation_success").html(response.message);
                $("#message_validation").html("Evènement modifié avec success");
                $("#table_body").append(response.child);
                setTimeout(get_participant, 0);
                $(".loading_edit_parti").hide();

                $("#edit_participant").modal("hide");
                $("#message_validation_success").show();
            } else {
                $("#edit_message_validation").show();
            }
        },
        error: function (error) {},
    });
});

// Ajout partivipant a un evenement

$(document).on("click", "#send_new_participant_event", function () {
    $("#message_validation_error").hide();
    this.disabled = true;
    evenement = document.getElementById("select_even");
    id_participant = document
        .getElementById("participant_id")
        .getAttribute("value");

    $("#message_validation_success").hide();
    $("#send_new_event2").hide();

    id = this.getAttribute("id");
    edit_event = $("#edit_event");

    $.ajax({
        url: "/api/participation/" + id_participant + "/" + evenement.value,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "GET",
        data: {},

        success: function (response) {
            if (response.success) {
                $("#message_validation_success").html(response.message);
                $("#message_validation_success").show();
                $("#add_event").modal("hide");
                setTimeout(get_participant_event, 0);
            } else {
                $("#message_validation_error").html(response.message);

                $("#message_validation_error").show();
            }
            document.getElementById(
                "send_new_participant_event"
            ).disabled = false;
        },
        error: function (error) {
            document.getElementById(
                "send_new_participant_event"
            ).disabled = false;
        },
    });
});

function get_participant_event() {
    event_table = $("#event_table");
    id_participant = document
        .getElementById("participant_id")
        .getAttribute("value");

    $.ajax({
        url: "/api/liste/participation/" + id_participant,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "GET",
        data: {},

        success: function (response) {
            $("#table_body").html(response.body);
        },
        error: function (error) {
            setTimeout(get_participant_event, 2000);
        },
    });
}

function get_event_participant() {
    event_table = $("#event_table");
    id_evenement = document
        .getElementById("id_evenement")
        .getAttribute("value");

    $.ajax({
        url: "/api/liste/evenement/participation/" + id_evenement,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "GET",
        data: {},

        success: function (response) {
            if (response.body) $("#table_body").html(response.body);
            else
                $("#table_body").html(
                    "<div  classe='text-center' > <h4>Aucun Participant</h4></div>"
                );

            $("#nbr_participant").html("Nombre : " + response.nombre);
            setTimeout(get_event_participant, 1000);
        },
        error: function (error) {
            setTimeout(get_event_participant, 2000);
        },
    });
}

// idee de projet

function get_project() {
    $.ajax({
        url: "/api/projet",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "GET",
        data: {},

        success: function (response) {
            $("#table_body").html(response.body);
            setTimeout(get_project, 2000);
        },
        error: function (error) {
            setTimeout(get_project, 3000);
        },
    });
}

// groupe

$(document).on("click", "#send_new_groupe", function () {
    $("#message_validation_error").hide();
    this.disabled = true;
    $(".loading_add_groupe").show();

    nom = document.getElementById("nom");
    projet = document.getElementById("projet");
    description = document.getElementById("description");

    $("#message_validation_success").hide();
    $("#send_new_event2").hide();

    id = this.getAttribute("id");
    edit_event = $("#edit_event");

    $.ajax({
        url: "/api/groupe",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "POST",
        data: {
            nom: nom.value,
            projet: projet.value,
            description: description.value,
        },

        success: function (response) {
            if (response.success) {
                $("#message_validation_success").html(response.message);
                $("#message_validation_success").show();
                $("#add_event").modal("hide");
                $(".loading_add_groupe").hide();
            } else {
                $("#message_validation_error").html(response.message);
                $(".loading_edit_parti").hide();
                $(".loading_add_groupe").hide();

                $("#message_validation_error").show();
            }
            document.getElementById("send_new_groupe").disabled = false;
        },
        error: function (error) {
            $(".loading_add_groupe").hide();
            $("#message_validation_error").html(
                "Veuillez verifier votre connection !"
            );
            $("#message_validation_error").show();
            document.getElementById("send_new_groupe").disabled = false;
        },
    });
});

function get_groupe() {
    $.ajax({
        url: "/api/groupe",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "GET",
        data: {},

        success: function (response) {
            $("#table_body").html(response.body);
        },
        error: function (error) {
            setTimeout(get_groupe, 2000);
        },
    });
}

recherche = document.getElementById("recherche");

recherche.addEventListener("input", (e) => {
    console.log(recherche.value.length, id_groupe + "/" + recherche.value);
    val = recherche.value;
    id_groupe = document.getElementById("id_groupe").getAttribute("value");

    if (recherche.value.length)
        $.ajax({
            url: "/api/groupe/" + id_groupe + "/" + val,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "GET",
            data: {},

            success: function (response) {
                $("#liste_participants").html(response);
            },
            error: function (error) {},
        });
    else
        $.ajax({
            url: "/api/groupe/" + id_groupe,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "GET",
            data: {},

            success: function (response) {
                $("#liste_participants").html(response);
            },
            error: function (error) {},
        });
});

// VOTE

var votes_id = [0, 0, 0];
var nbr_total_vote = 0;
var id_vote = 0;

const liste_projet = document.getElementById("liste_projet");

$(document).on("click", "#choix_projet", function () {
    id_vote = this.getAttribute("value");
});

$(document).on("click", "#idee_projet", function () {
    if (id_vote == 1) {
        if (votes_id[0] == 0) nbr_total_vote++;

        votes_id[0] = this.getAttribute("value");

        $(".titre_projet_1").html($(this).find(".projet_titre")[0].innerHTML);
        $(".choix_projet_1").show();
        $(".projet_1").hide();
    }

    if (id_vote == 2) {
        if (votes_id[1] == 0) nbr_total_vote++;

        votes_id[1] = this.getAttribute("value");
        $(".titre_projet_2").html($(this).find(".projet_titre")[0].innerHTML);
        $(".choix_projet_2").show();
        $(".projet_2").hide();
    }

    if (id_vote == 3) {
        if (votes_id[2] == 0) nbr_total_vote++;

        votes_id[2] = this.getAttribute("value");
        $(".titre_projet_3").html($(this).find(".projet_titre")[0].innerHTML);
        $(".choix_projet_3").show();
        $(".projet_3").hide();
    }

    if (nbr_total_vote == 3) {
        $("#send_pull").show();
    }

    $("#liste_projet").modal("hide");
});
