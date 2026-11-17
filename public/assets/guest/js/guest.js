/* ==========================================================================
   PrimesLedger — guest interactions
   Small, dependency-free enhancements. Every feature degrades gracefully.
   ========================================================================== */
(function () {
    "use strict";

    document.documentElement.classList.add("js");

    /* ----------------------------------------------------------------------
       Sticky header state
       ---------------------------------------------------------------------- */
    var header = document.querySelector("[data-site-header]");

    if (header) {
        var syncHeader = function () {
            header.classList.toggle("is-scrolled", window.scrollY > 8);
        };

        syncHeader();
        window.addEventListener("scroll", syncHeader, { passive: true });
    }

    /* ----------------------------------------------------------------------
       Mobile navigation drawer
       ---------------------------------------------------------------------- */
    var toggle = document.querySelector("[data-nav-toggle]");
    var drawer = document.querySelector("[data-mobile-nav]");
    var overlay = document.querySelector("[data-nav-overlay]");
    var closeBtn = document.querySelector("[data-nav-close]");
    var lastFocused = null;

    if (toggle && drawer) {
        var isOpen = function () {
            return drawer.classList.contains("is-open");
        };

        var focusables = function () {
            return Array.prototype.slice
                .call(
                    drawer.querySelectorAll(
                        'a[href], button:not([disabled]), input, select, textarea, [tabindex]:not([tabindex="-1"])'
                    )
                )
                .filter(function (el) {
                    return el.offsetParent !== null;
                });
        };

        var openNav = function () {
            lastFocused = document.activeElement;
            drawer.inert = false;
            drawer.removeAttribute("inert");
            drawer.classList.add("is-open");
            drawer.setAttribute("aria-hidden", "false");
            if (overlay) {
                overlay.hidden = false;
                // force a frame so the opacity transition runs
                void overlay.offsetWidth;
                overlay.classList.add("is-open");
            }
            toggle.setAttribute("aria-expanded", "true");
            toggle.setAttribute("aria-label", "Close menu");
            document.body.classList.add("nav-open");
            window.setTimeout(function () {
                var first = focusables()[0];
                if (first) first.focus();
            }, 80);
        };

        var closeNav = function (restoreFocus) {
            drawer.classList.remove("is-open");
            drawer.setAttribute("aria-hidden", "true");
            drawer.inert = true;
            drawer.setAttribute("inert", "");
            if (overlay) {
                overlay.classList.remove("is-open");
                window.setTimeout(function () {
                    overlay.hidden = true;
                }, 260);
            }
            toggle.setAttribute("aria-expanded", "false");
            toggle.setAttribute("aria-label", "Open menu");
            document.body.classList.remove("nav-open");
            if (restoreFocus !== false && lastFocused && lastFocused.focus) {
                lastFocused.focus();
            }
        };

        toggle.addEventListener("click", function () {
            if (isOpen()) {
                closeNav();
            } else {
                openNav();
            }
        });

        if (closeBtn) {
            closeBtn.addEventListener("click", function () {
                closeNav();
            });
        }

        if (overlay) {
            overlay.addEventListener("click", function () {
                closeNav();
            });
        }

        drawer.addEventListener("click", function (event) {
            var link = event.target.closest("a[href]");
            if (link) closeNav(false);
        });

        document.addEventListener("keydown", function (event) {
            if (!isOpen()) return;

            if (event.key === "Escape") {
                event.preventDefault();
                closeNav();
                return;
            }

            if (event.key === "Tab") {
                var items = focusables();
                if (!items.length) return;

                var first = items[0];
                var last = items[items.length - 1];

                if (event.shiftKey && document.activeElement === first) {
                    event.preventDefault();
                    last.focus();
                } else if (!event.shiftKey && document.activeElement === last) {
                    event.preventDefault();
                    first.focus();
                }
            }
        });

        var desktop = window.matchMedia("(min-width: 961px)");
        var onDesktop = function (event) {
            if (event.matches && isOpen()) closeNav(false);
        };

        if (desktop.addEventListener) {
            desktop.addEventListener("change", onDesktop);
        } else if (desktop.addListener) {
            desktop.addListener(onDesktop);
        }
    }

    /* ----------------------------------------------------------------------
       Password visibility toggles
       ---------------------------------------------------------------------- */
    document.addEventListener("click", function (event) {
        var button = event.target.closest("[data-password-toggle]");
        if (!button) return;

        var field = document.getElementById(button.getAttribute("data-password-toggle"));
        if (!field) return;

        var show = field.type === "password";
        field.type = show ? "text" : "password";
        button.classList.toggle("is-on", show);
        button.setAttribute("aria-label", show ? "Hide password" : "Show password");
        button.setAttribute("aria-pressed", show ? "true" : "false");
    });

    /* ----------------------------------------------------------------------
       FAQ accordion: keep one answer open in an explicit group
       ---------------------------------------------------------------------- */
    Array.prototype.forEach.call(document.querySelectorAll("[data-faq-accordion]"), function (group) {
        var items = Array.prototype.slice.call(group.querySelectorAll("details"));

        items.forEach(function (item) {
            item.addEventListener("toggle", function () {
                if (!item.open) return;
                items.forEach(function (other) {
                    if (other !== item && other.open) other.open = false;
                });
            });
        });
    });

    /* ----------------------------------------------------------------------
       Reveal on scroll
       ---------------------------------------------------------------------- */
    var revealItems = document.querySelectorAll("[data-reveal]");

    if (revealItems.length) {
        if ("IntersectionObserver" in window) {
            var observer = new IntersectionObserver(
                function (entries) {
                    entries.forEach(function (entry) {
                        if (!entry.isIntersecting) return;
                        entry.target.classList.add("is-visible");
                        observer.unobserve(entry.target);
                    });
                },
                { rootMargin: "0px 0px -8% 0px", threshold: 0.08 }
            );

            Array.prototype.forEach.call(revealItems, function (item) {
                observer.observe(item);
            });
        } else {
            Array.prototype.forEach.call(revealItems, function (item) {
                item.classList.add("is-visible");
            });
        }
    }

    /* ----------------------------------------------------------------------
       Smooth focus for same-page anchor navigation
       ---------------------------------------------------------------------- */
    document.addEventListener("click", function (event) {
        var link = event.target.closest('a[href^="#"]');
        if (!link) return;

        var id = link.getAttribute("href");
        if (!id || id === "#") return;

        var target = document.querySelector(id);
        if (!target) return;

        event.preventDefault();
        target.scrollIntoView({ behavior: "smooth", block: "start" });

        if (history.replaceState) {
            history.replaceState(null, "", id);
        }

        if (target.hasAttribute("tabindex")) {
            target.focus({ preventScroll: true });
        }
    });
})();
