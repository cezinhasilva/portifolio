/**
 * cez-motion.js — Interactive Creative Motion & Mouse Physics Engine
 * Magnus Media / Cezinha Silva — Engine.Core Standard
 */

document.addEventListener('DOMContentLoaded', () => {
    // 1. Check if device supports fine hover (mouse)
    const hasFinePointer = window.matchMedia('(pointer: fine)').matches;

    // 2. Custom Cursor & Spotlight Follower Setup
    const cursorDot = document.getElementById('cez-cursor-dot');
    const cursorAura = document.getElementById('cez-cursor-aura');

    if (hasFinePointer && cursorDot && cursorAura) {
        document.body.classList.add('custom-cursor-active');

        // GSAP quickTo for zero-lag 60fps tracking
        const xToDot = gsap.quickTo(cursorDot, "x", { duration: 0.08, ease: "power3.out" });
        const yToDot = gsap.quickTo(cursorDot, "y", { duration: 0.08, ease: "power3.out" });

        const xToAura = gsap.quickTo(cursorAura, "x", { duration: 0.35, ease: "power2.out" });
        const yToAura = gsap.quickTo(cursorAura, "y", { duration: 0.35, ease: "power2.out" });

        window.addEventListener('mousemove', (e) => {
            xToDot(e.clientX);
            yToDot(e.clientY);
            xToAura(e.clientX);
            yToAura(e.clientY);

            // Update global CSS custom properties for ambient flashlight / border glow
            document.documentElement.style.setProperty('--mouse-screen-x', `${e.clientX}px`);
            document.documentElement.style.setProperty('--mouse-screen-y', `${e.clientY}px`);
        });

        // Interactive hover states on clickable elements
        const hoverTargets = document.querySelectorAll('a, button, input, textarea, .interactive-hover, .project-card, [data-magnetic]');
        hoverTargets.forEach(el => {
            el.addEventListener('mouseenter', () => {
                cursorDot.classList.add('cursor-hover-active');
                cursorAura.classList.add('aura-hover-active');
            });
            el.addEventListener('mouseleave', () => {
                cursorDot.classList.remove('cursor-hover-active');
                cursorAura.classList.remove('aura-hover-active');
            });
        });
    }

    // 3. 3D Tilt Effect on Cards (data-tilt)
    const tiltCards = document.querySelectorAll('[data-tilt]');
    tiltCards.forEach(card => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left; // x position within card
            const y = e.clientY - rect.top;  // y position within card

            // Calculate card-local percentage for dynamic radial sheen
            const percentX = (x / rect.width) * 100;
            const percentY = (y / rect.height) * 100;
            card.style.setProperty('--card-mouse-x', `${percentX}%`);
            card.style.setProperty('--card-mouse-y', `${percentY}%`);

            // Rotation angles (-7 to +7 deg)
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            const rotateX = ((y - centerY) / centerY) * -7;
            const rotateY = ((x - centerX) / centerX) * 7;

            gsap.to(card, {
                rotateX: rotateX,
                rotateY: rotateY,
                transformPerspective: 1000,
                duration: 0.3,
                ease: 'power1.out',
                overwrite: 'auto'
            });
        });

        card.addEventListener('mouseleave', () => {
            gsap.to(card, {
                rotateX: 0,
                rotateY: 0,
                duration: 0.6,
                ease: 'elastic.out(1, 0.5)',
                overwrite: 'auto'
            });
        });
    });

    // 4. Magnetic Buttons & Links (data-magnetic)
    const magneticElements = document.querySelectorAll('[data-magnetic]');
    if (hasFinePointer) {
        magneticElements.forEach(el => {
            const strength = parseFloat(el.getAttribute('data-magnetic-strength') || '0.35');

            el.addEventListener('mousemove', (e) => {
                const rect = el.getBoundingClientRect();
                const centerX = rect.left + rect.width / 2;
                const centerY = rect.top + rect.height / 2;
                const deltaX = (e.clientX - centerX) * strength;
                const deltaY = (e.clientY - centerY) * strength;

                gsap.to(el, {
                    x: deltaX,
                    y: deltaY,
                    duration: 0.25,
                    ease: 'power2.out',
                    overwrite: 'auto'
                });
            });

            el.addEventListener('mouseleave', () => {
                gsap.to(el, {
                    x: 0,
                    y: 0,
                    duration: 0.6,
                    ease: 'elastic.out(1.1, 0.4)',
                    overwrite: 'auto'
                });
            });
        });
    }

    // 5. GSAP ScrollTrigger Stagger Entrance
    if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
        gsap.registerPlugin(ScrollTrigger);

        // Hero Entrance Timeline
        const heroTl = gsap.timeline({ defaults: { ease: 'power3.out' } });
        heroTl.from('.hero-badge', { y: -20, opacity: 0, duration: 0.8 })
              .from('.hero-title-line', { y: 40, opacity: 0, stagger: 0.15, duration: 1 }, '-=0.5')
              .from('.hero-subtitle', { y: 20, opacity: 0, duration: 0.8 }, '-=0.6')
              .from('.hero-cta-group', { y: 20, opacity: 0, stagger: 0.1, duration: 0.7 }, '-=0.5')
              .from('.hero-cockpit', { scale: 0.95, opacity: 0, duration: 1 }, '-=0.6');

        // Scroll sections reveals
        gsap.utils.toArray('.reveal-on-scroll').forEach(section => {
            gsap.from(section, {
                scrollTrigger: {
                    trigger: section,
                    start: 'top 85%',
                    toggleActions: 'play none none none'
                },
                y: 35,
                opacity: 0,
                duration: 0.8,
                ease: 'power2.out'
            });
        });
    }

    // 6. Audio/Click Feedback (Optional Micro-interaction)
    console.log('%c[Engine.Core] cez-motion.js ativo — 60 FPS Mouse Physics', 'color: #00E599; font-weight: bold; background: #0B0D11; padding: 4px 8px; border-radius: 4px;');
});
