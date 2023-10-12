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
    }
});

$(".icon-close").click(function (e) {
    $(this).closest(".detailed-description").fadeOut();
    $(".mask").fadeOut();
});
