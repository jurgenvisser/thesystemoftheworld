export function initMentorshipModal() {
    const modal = document.getElementById('infoModal');
    const backdrop = document.getElementById('modalBackdrop');
    const panel = document.getElementById('modalPanel');
    const titleEl = document.getElementById('modalTitle');
    const descEl = document.getElementById('modalDescription');

    // Als de modal niet bestaat op deze pagina: niks doen
    if (!modal || !window.planData) return;

    function openInfoModal(planId) {
        const plan = window.planData.find(p => p.id === planId);
        if (!plan) return;

        titleEl.textContent = plan.title;
        descEl.innerHTML = '';

        if (Array.isArray(plan.modal_description)) {
            plan.modal_description.forEach(paragraph => {
                const p = document.createElement('p');
                p.className = 'mb-4 last:mb-0';
                p.textContent = paragraph;
                descEl.appendChild(p);
            });
        } else if (plan.modal_description) {
            const p = document.createElement('p');
            p.textContent = plan.modal_description;
            descEl.appendChild(p);
        } else {
            descEl.textContent = 'Geen extra informatie beschikbaar.';
        }

        modal.classList.remove('hidden');

        setTimeout(() => {
            backdrop.classList.remove('opacity-0');
            panel.classList.remove('opacity-0', 'translate-y-4', 'sm:translate-y-0', 'sm:scale-95');
            panel.classList.add('opacity-100', 'translate-y-0', 'sm:scale-100');
        }, 10);
    }

    function closeInfoModal() {
        backdrop.classList.add('opacity-0');
        panel.classList.remove('opacity-100', 'translate-y-0', 'sm:scale-100');
        panel.classList.add('opacity-0', 'translate-y-4', 'sm:translate-y-0', 'sm:scale-95');

        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }

    // Info buttons
    document.querySelectorAll('[data-open-plan]').forEach(button => {
        button.addEventListener('click', () => {
            openInfoModal(button.dataset.openPlan);
        });
    });

    // Backdrop sluiten
    backdrop.addEventListener('click', closeInfoModal);

    // Sluit-knop in modal
    modal.querySelectorAll('[data-close-modal]').forEach(btn => {
        btn.addEventListener('click', closeInfoModal);
    });
}