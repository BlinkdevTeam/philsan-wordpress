class GsapScrollAnimation {
    constructor() {
        gsap.registerPlugin(ScrollTrigger);

        // Loop through all sections
        gsap.utils.toArray(".gsap-container").forEach((section) => {
            const elements = section.querySelectorAll(".gsap-fade-up");

            // Only animate if section has elements
            if (elements.length > 0) {
            
            gsap.from(elements, {
                scrollTrigger: {
                trigger: section,
                start: "top 80%",   // when section top hits 80% of viewport height
                toggleActions: "play none none none", // play once
                },
                opacity: 0,
                y: 40,
                duration: 0.8,
                ease: "power2.out",
                stagger: 0.2,
            });
            }
        });
    }
}

export default GsapScrollAnimation;