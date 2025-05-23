   document.addEventListener('DOMContentLoaded', function() {
        // Funcionamiento del FAQ
        const faqItems = document.querySelectorAll('.faq-item');
        
        faqItems.forEach(item => {
            const question = item.querySelector('.faq-question');
            
            question.addEventListener('click', () => {
                // Cerrar todos los items abiertos
                faqItems.forEach(otherItem => {
                    if (otherItem !== item) {
                        otherItem.classList.remove('active');
                    }
                });
                
                // Alternar estado actual
                item.classList.toggle('active');
            });
        });

        // Animación inicial para mostrar el primer FAQ
        setTimeout(() => {
            faqItems[0].classList.add('active');
        }, 1000);
    });

       // Animación de las partículas al hacer scroll
        function animateParticles() {
            const particles = document.querySelectorAll('.particle');
            particles.forEach(particle => {
                const randomDelay = Math.random() * 2;
                const randomDuration = 8 + Math.random() * 4;
                particle.style.animationDelay = randomDelay + 's';
                particle.style.animationDuration = randomDuration + 's';
            });
        }

        // Efecto de entrada cuando es visible
        function checkFooterVisibility() {
            const footer = document.querySelector('.footer');
            const footerRect = footer.getBoundingClientRect();
            const isVisible = footerRect.top < window.innerHeight && footerRect.bottom > 0;
            
            if (isVisible) {
                footer.style.animation = 'slideUp 1s ease forwards';
            }
        }

        // Estilo CSS para la animación de entrada
        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideUp {
                from {
                    transform: translateY(50px);
                    opacity: 0;
                }
                to {
                    transform: translateY(0);
                    opacity: 1;
                }
            }
        `;
        document.head.appendChild(style);

        // Inicializar animaciones
        document.addEventListener('DOMContentLoaded', function() {
            animateParticles();
            checkFooterVisibility();
        });

        // Agregar efecto hover a los elementos interactivos
        document.querySelectorAll('.social-link').forEach(link => {
            link.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-8px) scale(1.15) rotate(5deg)';
            });
            
            link.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1) rotate(0deg)';
            });
        });

        // Efecto de ripple en el logo
        document.querySelector('.logo-icon').addEventListener('click', function() {
            this.style.animation = 'none';
            setTimeout(() => {
                this.style.animation = 'pulse 3s ease-in-out infinite, rotate 4s linear infinite';
            }, 10);
        });