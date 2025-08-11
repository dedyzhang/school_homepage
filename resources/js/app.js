import "./bootstrap";
import.meta.glob(["../images/**"]);
import $ from "jquery";
window.jQuery = window.$ = $;
import "slick-carousel";
import ScrollReveal from "scrollreveal";
// Flowbite
import "flowbite";
import { DataTable } from "simple-datatables";

//Alert
import { cAlert, oAlert, cConfirm } from "./alert";
window.cAlert = cAlert;
window.oAlert = oAlert;
window.cConfirm = cConfirm;
cAlert("green", "Berhasil", "Data berhasil dimuat", false, null);

//Loading
import { loading, removeLoading } from "./loading";
window.loading = loading;
window.removeLoading = removeLoading;

//modal
import { Modal } from "flowbite";
window.modal = Modal;

//Moment.js
import moment from "moment";
window.moment = moment;

//Apex Js
import ApexCharts from "apexcharts";
window.ApexCharts = ApexCharts;

$(".has-submenu").on("mouseenter", function () {
    var target = $(this).data("target");
    var ini = this;
    $(".sub-menu").removeClass("flex").removeClass("active").addClass("hidden");

    if ($(target).hasClass("active")) {
    } else {
        $(this)
            .closest("header")
            .addClass("bg-white")
            .removeClass("bg-black/50");
        $(target).removeClass("hidden").addClass("flex").addClass("active");
        $(this)
            .closest("header")
            .find(".ganti-warna")
            .addClass("text-black")
            .removeClass("text-white");
    }

    $(target).on("mouseleave", function () {
        if ($(window).scrollTop() > 50) {
            if ($(target).hasClass("active")) {
                $(target)
                    .removeClass("flex")
                    .addClass("hidden")
                    .removeClass("active");
            }
        } else {
            if ($("#first-div").hasClass("header-besar")) {
                if ($(target).hasClass("active")) {
                    $(target)
                        .removeClass("flex")
                        .addClass("hidden")
                        .removeClass("active");
                    $(ini)
                        .closest("header")
                        .removeClass("bg-white")
                        .addClass("bg-black/50");
                    $(ini)
                        .closest("header")
                        .find(".ganti-warna")
                        .addClass("text-white")
                        .removeClass("text-black");
                }
            } else {
                if ($(target).hasClass("active")) {
                    $(target)
                        .removeClass("flex")
                        .addClass("hidden")
                        .removeClass("active");
                }
            }
        }
    });
});
$(".open-main-menu").on("click", function () {
    $("#mobile-menu").removeClass("hidden").addClass("flex");

    $(".tutup-menu").on("click", function () {
        $("#mobile-menu").removeClass("flex").addClass("hidden");
    });
});
$(".mobile-submenu").on("click", function () {
    var target = $(this).data("target");

    if ($(target).hasClass("active")) {
        $(target)
            .removeClass("mt-2 visible max-h-200 opacity-100 active ease-out")
            .addClass("invisible max-h-0 opacity-0 ease-in");
        $(this).find("svg").removeClass("rotate-180");
    } else {
        $(target)
            .addClass("mt-2 visible max-h-200 opacity-100 active ease-out")
            .removeClass("invisible max-h-0 opacity-0 ease-in");
        $(this).find("svg").addClass("rotate-180");
    }
});
$(window).on("load", function () {
    if ($("#first-div").hasClass("header-besar")) {
        if ($(window).scrollTop() > 50) {
            $("header").addClass("bg-white").removeClass("bg-black/10");
            $("header")
                .find(".ganti-warna")
                .addClass("text-black")
                .removeClass("text-white");
        } else {
            //remove the background property so it comes transparent again (defined in your css)
            $("header").removeClass("bg-white").addClass("bg-black/10");
            $("header")
                .find(".ganti-warna")
                .removeClass("text-black")
                .addClass("text-white");
        }
    } else {
        $("header").addClass("bg-white").removeClass("bg-black/10");
        $("header")
            .find(".ganti-warna")
            .addClass("text-black")
            .removeClass("text-white");
    }
    // if ($("#body-place").hasClass("header-besar")) {
    //     console.log($(this).html());
    // } else {
    //     console.log("tidak");
    // }
});

$(window).on("scroll", function () {
    if ($("#first-div").hasClass("header-besar")) {
        if ($(window).scrollTop() > 50) {
            $("header").addClass("bg-white").removeClass("bg-black/10");
            $("header")
                .find(".ganti-warna")
                .addClass("text-black")
                .removeClass("text-white");
        } else {
            //remove the background property so it comes transparent again (defined in your css)
            $("header").removeClass("bg-white").addClass("bg-black/10");
            $("header")
                .find(".ganti-warna")
                .removeClass("text-black")
                .addClass("text-white");
        }
    }
});

ScrollReveal().reveal(".reveal", {
    distance: "20px",
    easing: "ease-in-out",
});
ScrollReveal().reveal(".reveal-250", {
    distance: "20px",
    easing: "ease-in-out",
    delay: 250,
});
ScrollReveal().reveal(".reveal-500", {
    distance: "20px",
    easing: "ease-in-out",
    delay: 500,
});
ScrollReveal().reveal(".reveal-750", {
    distance: "20px",
    easing: "ease-in-out",
    delay: 750,
});
ScrollReveal().reveal(".reveal-1000", {
    distance: "20px",
    easing: "ease-in-out",
    delay: 1000,
});
const dataTable = new DataTable("#table-sekolah", {
    searchable: true,
    sortable: true,
    pagination: true,
    perPage: 10,
    perPageSelect: [10, 25, 50, 100],
    labels: {
        placeholder: "Cari...",
        perPage: "baris per halaman",
        noRows: "Tidak ada data yang ditemukan",
    },
});
