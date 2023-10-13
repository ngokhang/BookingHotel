import Swal from "sweetalert2";
// import Swiper from "swiper";
import Swiper from "swiper/bundle";
// import Swiper and modules styles
import "swiper/css";
import "swiper/css/navigation";

// init Swiper:
const swiper = new Swiper(".swiper", {
    // configure Swiper to use modules
    direction: "horizontal",
    loop: true,
    parallax: true,
    autoplay: {
        delay: 2000,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

$(".cancel-booking-btn").on("click", function (event) {
    event.preventDefault();
    let form = $(this).closest("form");
    new Swal({
        title: "Bạn chắc chắn muốn huỷ ?",
        type: "warning",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#1d9bf9",
        confirmButtonText: "Đúng",
        cancelButtonText: "Không",
        closeOnConfirm: true,
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    });
});

$(".detail-btn").on("click", function (event) {
    event.stopPropagation();
    let target = $(this).data("target");

    // Show the corresponding details element
    $(".mask").fadeIn();
    $("#" + target).fadeIn();
});

$(".mask").click(function (e) {
    let targetElements = $(".detailed-description");
    if (
        !targetElements.is(e.target) &&
        targetElements.has(e.target).length === 0
    ) {
        targetElements.fadeOut();
        $(".mask").fadeOut();
        $("#evaluation-form").fadeOut();
    }
});

$(".icon-close").click(function (e) {
    $(this).closest(".detailed-description").fadeOut();
    $(".mask").fadeOut();
});

$(".booking-history-link").click(function (e) {
    e.preventDefault();
    $(".room-list-link").removeClass("active");
    $(this).addClass("active");
    $(".booking-table").fadeOut();
    $(".history-booking-table").fadeIn();
});

$(".room-list-link").click(function (e) {
    e.preventDefault();
    $(".booking-history-link").removeClass("active");
    $(this).addClass("active");
    $(".booking-table").fadeIn();
    $(".history-booking-table").fadeOut();
});

const evaluationBtn = document.querySelector(".evaluation-btn");
evaluationBtn.addEventListener("click", function (e) {
    $(".mask").fadeIn();
    $("#evaluation-form").fadeIn();
});
const stars = document.querySelectorAll(".star");
const valueStars = document.querySelectorAll("#evaluation-form input");
stars.forEach((star, index) => {
    star.addEventListener("click", (e) => {
        valueStars[index].checked = true;
        for (let i = index - 1; i >= 0; i--) {
            stars[i].style.color = "yellow";
            if (i > 0) valueStars[i].checked = false;
        }
        for (let i = index + 1; i < stars.length; i++) {
            stars[i].style.color = "unset";
            if (i <= stars.length - 1) valueStars[i].checked = false;
        }
    });
});
