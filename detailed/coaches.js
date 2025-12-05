(function () {
  'use strict';

  const coaches = {
    1: {
      name: "Marcus Rivera",
      role: "Head Coach & Director of Development",
      image: "coach1.jpg",
      longBio:
        "Marcus has 15+ years working with elite athletes. He focuses on shooting mechanics, individual footwork progressions, and preparing players for professional competition through advanced practice design and film study.",
      specialties: ["Shooting Mechanics", "Footwork Progressions", "Pro Player Prep"]
    },
    2: {
      name: "Ken Morales",
      role: "Bigs Coach",
      image: "coach2.jpg",
      longBio:
        "Ken specializes in interior scoring, low-post footwork, rim protection techniques, and strength integration for bigs. He emphasizes modern big-man spacing and finishing skills.",
      specialties: ["Post Moves", "Interior Defense", "Strength & Power"]
    },
    3: {
      name: "Marco Villanueva",
      role: "Youth Skills Coach",
      image: "coach3.jpg",
      longBio:
        "Marco builds ball-handling fundamentals and confidence through structured progressive drills. He designs age-appropriate sessions that are fun, repeatable, and measurable.",
      specialties: ["Ball Handling", "Youth Development", "Fundamentals"]
    },
    4: {
      name: "Stephen “Steve” Del Rosario",
      role: "Youth & Mental Skills",
      image: "coach4.jpg",
      longBio:
        "Steve focuses on mindset, confidence-building and teaching foundational basketball IQ to young athletes. He integrates mental skills training into on-court practice.",
      specialties: ["Mental Skills", "Confidence Building", "Foundations"]
    },
    5: {
      name: "Tyler Miles",
      role: "Strength & Conditioning",
      image: "coach5.jpg",
      longBio:
        "Tyler builds mobility and athletic-strength programs that improve durability, explosiveness, and recovery for adult athletes.",
      specialties: ["Mobility", "Conditioning", "Load Management"]
    },
    6: {
      name: "Andre Santos",
      role: "Analytics Coach",
      image: "coach6.jpg",
      longBio:
        "Andre uses data, video breakdowns, and measurable KPIs to track player progress and design individualized skill plans based on objective insight.",
      specialties: ["Film Analysis", "Data-driven Coaching", "Skill Metrics"]
    },
    7: {
      name: "Justin Park",
      role: "Tactical Coach",
      image: "coach7.jpg",
      longBio:
        "Justin specializes in defensive schemes, rotations, and improving team-level game IQ. His sessions focus on situational decision-making.",
      specialties: ["Team Defense", "Tactical Prep", "Game IQ"]
    },
    8: {
      name: "Lester Manalo",
      role: "Shooting Coach",
      image: "coach8.jpg",
      longBio:
        "Lester focuses on perimeter mechanics, catch-and-shoot training, and dynamic guard creation patterns to boost shooting efficiency.",
      specialties: ["Shooting Mechanics", "Guards", "Perimeter Development"]
    }
  };

  const modal = document.querySelector('.modal');
  const modalPanel = modal ? modal.querySelector('.modal-panel') : null;
  const modalImage = modal ? modal.querySelector('.modal-image img') : null;
  const modalName = modal ? modal.querySelector('.modal-name') : null;
  const modalRole = modal ? modal.querySelector('.modal-role') : null;
  const modalLongBio = modal ? modal.querySelector('.modal-long-bio') : null;
  const modalSpecs = modal ? modal.querySelector('.modal-specs') : null;
  const modalCloseBtn = modal ? modal.querySelector('.modal-close') : null;

  if (!modal) return;

  let lastFocusedElement = null;

  function openModal() {
    modal.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';
    lastFocusedElement = document.activeElement;
    if (modalCloseBtn) modalCloseBtn.focus();
  }

  function closeModal() {
    modal.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
    if (lastFocusedElement) lastFocusedElement.focus();
  }

  function populateModal(coachId) {
    const data = coaches[coachId];
    if (!data) return;

    if (modalImage) {
      modalImage.src = data.image;
      modalImage.alt = data.name;
    }
    if (modalName) modalName.textContent = data.name;
    if (modalRole) modalRole.textContent = data.role;
    if (modalLongBio) modalLongBio.textContent = data.longBio;

    if (modalSpecs) {
      modalSpecs.innerHTML = '';
      data.specialties.forEach(spec => {
        const d = document.createElement('div');
        d.className = 'spec-pill';
        d.textContent = spec;
        modalSpecs.appendChild(d);
      });
    }
  }

  function onViewBioClick(e) {
    const btn = e.currentTarget;
    const coachId = btn.getAttribute('data-coach');
    populateModal(coachId);
    openModal();
  }

  const bioButtons = Array.from(document.querySelectorAll('.btn-more'));
  bioButtons.forEach(btn => btn.addEventListener('click', onViewBioClick));

  if (modalCloseBtn) {
    modalCloseBtn.addEventListener('click', closeModal);
  }

  modal.addEventListener('click', (e) => {
    if (e.target === modal) closeModal();
  });

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && modal.getAttribute('aria-hidden') === 'false') {
      closeModal();
    }
  });

  document.addEventListener('focus', function (event) {
    if (modal.getAttribute('aria-hidden') === 'false' && modalPanel && !modalPanel.contains(event.target)) {
      if (modalCloseBtn) modalCloseBtn.focus();
    }
  }, true);

})();
