/**
 * Mobile Menu Functionality
 * Handles burger menu interactions and responsive behavior
 */

document.addEventListener("DOMContentLoaded", function () {
  // Get DOM elements
  const burgerMenu = document.getElementById("burgerMenu");
  const mobileMenu = document.getElementById("mobileMenu");
  const mobileMenuOverlay = document.getElementById("mobileMenuOverlay");
  const mobileMenuClose = document.getElementById("mobileMenuClose");

  // Check if elements exist before adding event listeners
  if (!burgerMenu || !mobileMenu || !mobileMenuOverlay || !mobileMenuClose) {
    console.warn(
      "Mobile menu elements not found. Make sure all required elements exist in the DOM."
    );
    return;
  }

  /**
   * Open mobile menu
   */
  function openMobileMenu() {
    burgerMenu.classList.add("active");
    mobileMenu.classList.add("active");
    mobileMenuOverlay.classList.add("active");
    document.body.style.overflow = "hidden";

    // Set focus to close button for accessibility
    mobileMenuClose.focus();
  }

  /**
   * Close mobile menu
   */
  function closeMobileMenu() {
    burgerMenu.classList.remove("active");
    mobileMenu.classList.remove("active");
    mobileMenuOverlay.classList.remove("active");
    document.body.style.overflow = "";

    // Return focus to burger menu button
    burgerMenu.focus();
  }

  /**
   * Toggle mobile menu
   */
  function toggleMobileMenu() {
    if (mobileMenu.classList.contains("active")) {
      closeMobileMenu();
    } else {
      openMobileMenu();
    }
  }

  // Event listeners
  burgerMenu.addEventListener("click", toggleMobileMenu);
  mobileMenuClose.addEventListener("click", closeMobileMenu);
  mobileMenuOverlay.addEventListener("click", closeMobileMenu);

  // Close menu when clicking on navigation links
  const mobileNavLinks = document.querySelectorAll(".mobile-nav a");
  mobileNavLinks.forEach((link) => {
    link.addEventListener("click", closeMobileMenu);
  });

  // Handle escape key
  document.addEventListener("keydown", function (e) {
    if (e.key === "Escape" && mobileMenu.classList.contains("active")) {
      closeMobileMenu();
    }
  });

  // Handle window resize
  let resizeTimer;
  window.addEventListener("resize", function () {
    // Debounce resize events
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(function () {
      if (window.innerWidth > 768) {
        closeMobileMenu();
      }
    }, 100);
  });

  // Handle focus trap in mobile menu
  const focusableElements =
    'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])';

  mobileMenu.addEventListener("keydown", function (e) {
    if (e.key === "Tab") {
      const focusable = mobileMenu.querySelectorAll(focusableElements);
      const firstFocusable = focusable[0];
      const lastFocusable = focusable[focusable.length - 1];

      if (e.shiftKey) {
        if (document.activeElement === firstFocusable) {
          lastFocusable.focus();
          e.preventDefault();
        }
      } else {
        if (document.activeElement === lastFocusable) {
          firstFocusable.focus();
          e.preventDefault();
        }
      }
    }
  });

  // Add smooth scroll behavior for anchor links
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
      const href = this.getAttribute("href");
      if (href === "#") return;

      const target = document.querySelector(href);
      if (target) {
        e.preventDefault();
        closeMobileMenu();

        setTimeout(() => {
          target.scrollIntoView({
            behavior: "smooth",
            block: "start",
          });
        }, 300);
      }
    });
  });
});
