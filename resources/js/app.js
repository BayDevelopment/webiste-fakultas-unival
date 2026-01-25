import "./bootstrap";
import "bootstrap";

document.addEventListener("DOMContentLoaded", () => {
    const navbar = document.getElementById("mainNavbar");
    if (!navbar) return;

    const threshold = 60;
    let ticking = false;

    const setNavbarHeight = () => {
        const h = navbar.offsetHeight || 72;
        document.documentElement.style.setProperty("--navbar-height", `${h}px`);
    };

    const enableFixed = () => {
        if (navbar.classList.contains("is-fixed")) return;

        navbar.classList.add("is-fixed");
        document.body.classList.add("has-fixed-navbar");
        setNavbarHeight();

        // next frame for smooth transition
        requestAnimationFrame(() => {
            navbar.classList.add("is-visible");
        });
    };

    const disableFixed = () => {
        if (!navbar.classList.contains("is-fixed")) return;

        navbar.classList.remove("is-visible");

        // tunggu transisi selesai baru lepas fixed
        setTimeout(() => {
            const y = window.scrollY || document.documentElement.scrollTop;
            if (y <= threshold) {
                navbar.classList.remove("is-fixed");
                document.body.classList.remove("has-fixed-navbar");
            }
        }, 220);
    };

    const onScroll = () => {
        const y = window.scrollY || document.documentElement.scrollTop;
        if (y > threshold) enableFixed();
        else disableFixed();
        ticking = false;
    };

    window.addEventListener(
        "scroll",
        () => {
            if (!ticking) {
                window.requestAnimationFrame(onScroll);
                ticking = true;
            }
        },
        { passive: true },
    );

    window.addEventListener("resize", setNavbarHeight);

    // set tinggi awal + cek posisi awal
    setNavbarHeight();
    onScroll();
});
