$(document).ready(function () {
    $('body').removeClass('dark-theme');

    $(".ourMissionbtn").click(function () {
        $(".ourMission").removeClass('d-none');
        $(this).hide();
    });

    $("button.btnConsulting").click(function () {
        $("#consulting").modal('show');
    });

    $("button.btnAppMngt").click(function () {
        $("#AppMngt").modal('show');
    });

    $("button.btnTesting").click(function () {
        $("#testing").modal('show');
    });

    $('#theme-button').click(function (e) {
        $('.services__container img').css('background', '#fff');
        $('div#consulting p,.modal-body, .modal-title').css('color', '#000');
    });
});
