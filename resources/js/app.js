// Melody Cafe - Client-side scripts
document.addEventListener('DOMContentLoaded', () => {
    // Accessible Mobile Navigation Toggle
    const navToggles = document.querySelectorAll('[data-nav-toggle]');
    navToggles.forEach(toggle => {
        const targetId = toggle.getAttribute('aria-controls');
        const target = targetId ? document.getElementById(targetId) : null;
        if (!target) return;

        const toggleMenu = (expand) => {
            toggle.setAttribute('aria-expanded', expand.toString());
            if (expand) {
                target.classList.remove('hidden');
                target.classList.add('flex');
            } else {
                target.classList.add('hidden');
                target.classList.remove('flex');
            }
        };

        toggle.addEventListener('click', () => {
            const isExpanded = toggle.getAttribute('aria-expanded') === 'true';
            toggleMenu(!isExpanded);
        });

        // Close on escape
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && toggle.getAttribute('aria-expanded') === 'true') {
                toggleMenu(false);
                toggle.focus();
            }
        });

        // Close on clicking links inside
        target.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                toggleMenu(false);
            });
        });
    });
});
