import "./bootstrap";
import "bootstrap";

document.addEventListener("DOMContentLoaded", () => {
    // ===== Navbar code kamu tetap =====
    const navbar = document.getElementById("mainNavbar");
    if (navbar) {
        const threshold = 60;
        let ticking = false;

        const setNavbarHeight = () => {
            const h = navbar.offsetHeight || 72;
            document.documentElement.style.setProperty(
                "--navbar-height",
                `${h}px`,
            );
        };

        const enableFixed = () => {
            if (navbar.classList.contains("is-fixed")) return;
            navbar.classList.add("is-fixed");
            document.body.classList.add("has-fixed-navbar");
            setNavbarHeight();
            requestAnimationFrame(() => navbar.classList.add("is-visible"));
        };

        const disableFixed = () => {
            if (!navbar.classList.contains("is-fixed")) return;
            navbar.classList.remove("is-visible");
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
        setNavbarHeight();
        onScroll();
    }
});
document.addEventListener("DOMContentLoaded", () => {
    const waCard = document.getElementById("waCard");
    const waToggle = document.getElementById("waToggle");
    const waClose = document.getElementById("waClose");
    const waForm = document.getElementById("waForm");
    const waMessage = document.getElementById("waMessage");

    if (!waCard || !waToggle || !waClose) return;

    // Restore state (open/closed)
    const isClosed = localStorage.getItem("wa_widget_closed") === "1";
    if (isClosed) {
        waCard.classList.add("d-none");
        waToggle.classList.remove("d-none");
    }

    // Close card -> show WA button
    waClose.addEventListener("click", () => {
        waCard.classList.add("d-none");
        waToggle.classList.remove("d-none");
        localStorage.setItem("wa_widget_closed", "1");
    });

    // Click WA button -> show card
    waToggle.addEventListener("click", () => {
        waToggle.classList.add("d-none");
        waCard.classList.remove("d-none");
        localStorage.setItem("wa_widget_closed", "0");
        if (waMessage) waMessage.focus();
    });

    // Submit -> open WhatsApp
    if (waForm && waMessage) {
        waForm.addEventListener("submit", (e) => {
            e.preventDefault();

            const msg = waMessage.value.trim();
            if (!msg) return;

            const phone = waForm.dataset.phone; // dari data-phone
            if (!phone) return;

            const url = `https://wa.me/${phone}?text=${encodeURIComponent(msg)}`;
            window.open(url, "_blank");
        });
    }
});
