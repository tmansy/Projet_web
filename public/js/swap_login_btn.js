$(".login-btn").click(function () {
    $("#login-tab").trigger("click");
    $("#loginModal").modal("show");
});

$(".register-btn").click(function () {
    $("#register-tab").trigger("click");
    $("#loginModal").modal("show");
});