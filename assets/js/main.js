/**
 * BlueWireSEO Main JavaScript
 * Vanilla JS — no jQuery dependency
 *
 * @package BlueWireSEO
 */

(function () {
    'use strict';

    // ============================================
    // STICKY HEADER
    // ============================================
    var header = document.getElementById('bws-header');
    var lastScrollY = 0;

    function handleScroll() {
        var scrollY = window.scrollY || window.pageYOffset;

        if (header) {
            if (scrollY > 20) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        }

        lastScrollY = scrollY;
    }

    window.addEventListener('scroll', handleScroll, { passive: true });

    // ============================================
    // MOBILE MENU
    // ============================================
    var mobileToggle = document.getElementById('bws-mobile-toggle');
    var mobileNav    = document.getElementById('bws-mobile-nav');
    var iconMenu     = document.querySelector('.bws-mobile-toggle .icon-menu');
    var iconClose    = document.querySelector('.bws-mobile-toggle .icon-close');

    function openMobileMenu() {
        if (!mobileNav || !mobileToggle) return;
        mobileNav.removeAttribute('hidden');
        mobileNav.classList.add('is-open');
        mobileToggle.setAttribute('aria-expanded', 'true');
        if (iconMenu) iconMenu.setAttribute('hidden', '');
        if (iconClose) iconClose.removeAttribute('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeMobileMenu() {
        if (!mobileNav || !mobileToggle) return;
        mobileNav.setAttribute('hidden', '');
        mobileNav.classList.remove('is-open');
        mobileToggle.setAttribute('aria-expanded', 'false');
        if (iconMenu) iconMenu.removeAttribute('hidden');
        if (iconClose) iconClose.setAttribute('hidden', '');
        document.body.style.overflow = '';
    }

    if (mobileToggle) {
        mobileToggle.addEventListener('click', function () {
            var isOpen = mobileToggle.getAttribute('aria-expanded') === 'true';
            if (isOpen) {
                closeMobileMenu();
            } else {
                openMobileMenu();
            }
        });
    }

    // Close mobile menu on outside click
    document.addEventListener('click', function (e) {
        if (mobileNav && !mobileNav.classList.contains('is-open')) return;
        if (mobileToggle && mobileToggle.contains(e.target)) return;
        if (mobileNav && mobileNav.contains(e.target)) return;
        closeMobileMenu();
    });

    // Close mobile menu on Escape
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            closeMobileMenu();
        }
    });

    // Close mobile menu on resize to desktop
    window.addEventListener('resize', function () {
        if (window.innerWidth >= 1024) {
            closeMobileMenu();
        }
    });

    // ============================================
    // FAQ ACCORDION
    // ============================================
    var faqItems = document.querySelectorAll('.bws-faq-item');

    faqItems.forEach(function (item) {
        var question = item.querySelector('.bws-faq-question');
        if (!question) return;

        question.addEventListener('click', function () {
            var isOpen = item.classList.contains('open');

            // Close all others
            faqItems.forEach(function (otherItem) {
                otherItem.classList.remove('open');
                var otherQuestion = otherItem.querySelector('.bws-faq-question');
                if (otherQuestion) otherQuestion.setAttribute('aria-expanded', 'false');
            });

            // Toggle current
            if (!isOpen) {
                item.classList.add('open');
                question.setAttribute('aria-expanded', 'true');
            }
        });

        // Keyboard support
        question.addEventListener('keydown', function (e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                question.click();
            }
        });
    });

    // ============================================
    // CASE STUDY FILTER
    // ============================================
    var filterBtns = document.querySelectorAll('.bws-filter-btn');
    var caseCards  = document.querySelectorAll('#bws-case-grid .bws-case-card');

    filterBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
            var filter = btn.getAttribute('data-filter');

            // Update active state
            filterBtns.forEach(function (b) { b.classList.remove('active'); });
            btn.classList.add('active');

            // Filter cards
            caseCards.forEach(function (card) {
                if (filter === 'all') {
                    card.style.display = '';
                } else {
                    var tags = card.querySelectorAll('.bws-card-tag');
                    var match = false;
                    tags.forEach(function (tag) {
                        if (tag.textContent.toLowerCase().indexOf(filter.replace(/-/g, ' ').toLowerCase()) !== -1) {
                            match = true;
                        }
                    });
                    card.style.display = match ? '' : 'none';
                }
            });
        });
    });

    // ============================================
    // SMOOTH ANCHOR SCROLLING
    // ============================================
    document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
        anchor.addEventListener('click', function (e) {
            var target = document.querySelector(this.getAttribute('href'));
            if (target) {
                e.preventDefault();
                var headerHeight = (header ? header.offsetHeight : 0) + 40; // topbar estimate
                var offsetTop = target.getBoundingClientRect().top + window.scrollY - headerHeight - 20;
                window.scrollTo({ top: offsetTop, behavior: 'smooth' });
            }
        });
    });

    // ============================================
    // INIT
    // ============================================
    handleScroll();

}());
