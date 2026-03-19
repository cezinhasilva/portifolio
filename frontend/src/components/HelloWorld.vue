<template>
  <div class="portfolio-wrapper">

    <!-- Controle de Áudio -->
    <button class="audio-toggle" @click="toggleAudio">
      <svg v-if="!isAudioPlaying" class="audio-icon" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 0 1 0 12.728M16.463 8.288a5.25 5.25 0 0 1 0 7.424M6.75 8.25l4.72-4.72a.75.75 0 0 1 1.28.53v15.88a.75.75 0 0 1-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.009 9.009 0 0 1 2.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75Z" />
      </svg>
      <svg v-else class="audio-icon" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
         <path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 0 1 0 12.728M16.463 8.288a5.25 5.25 0 0 1 0 7.424M6.75 8.25l4.72-4.72a.75.75 0 0 1 1.28.53v15.88a.75.75 0 0 1-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.009 9.009 0 0 1 2.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75Z" />
      </svg>
      {{ isAudioPlaying ? 'Música: ON' : 'Música: OFF' }}
    </button>
    <audio ref="bgAudio" loop preload="auto">
      <source src="https://cdn.pixabay.com/audio/2022/01/18/audio_d0a13f69d2.mp3" type="audio/mpeg" />
    </audio>

    <!-- Hero Section com Vídeo de Programação -->
    <section class="hero-section">
      <div class="video-overlay"></div>
      
      <transition name="fade">
        <video 
          :key="currentVideoIndex"
          class="hero-video" 
          autoplay 
          loop 
          muted 
          playsinline
        >
          <source :src="heroVideos[currentVideoIndex]" type="video/mp4" />
        </video>
      </transition>


      <div class="hero-content">
        <h1 class="hero-title">Escale seus negócios com <br><span class="highlight">Automação Inteligente.</span></h1>
        <p class="hero-subtitle">Especialista em n8n, CodeIgniter, WordPress e Desenvolvimento Web. Transformando o complexo em resultados palpáveis.</p>
        <button class="cta-button" @click="openWhatsApp">Solicitar um Orçamento</button>
      </div>    
    </section>

    <!-- Tech Stack Section -->
    <div class="tech-stack-section">
      <div class="tech-container">
        <p class="tech-label">TECNOLOGIAS DE PONTA</p>
        <div class="tech-icons">
          <div v-for="icon in stackIcons" :key="icon.name" class="tech-icon-wrapper" :title="icon.name">
            <img :src="icon.src" :alt="icon.name" class="tech-icon" />
          </div>
        </div>
      </div>
    </div>

    <!-- Services Section con Cartões Glassmorphism e Imagens -->
    <section class="services-section">
      <div class="section-container">
        <h2 class="section-title">Minha <span class="highlight">Expertise</span></h2>
        <div class="services-grid">
          
          <div class="service-card" v-for="(card, index) in services" :key="index" ref="cards">
            <img :src="card.image" :alt="card.title" class="card-image" />
            <div class="card-content">
              <h3>{{ card.title }}</h3>
              <p>{{ card.desc }}</p>
            </div>
          </div>

        </div>
      </div>
    </section>
  </div>
</template>

<script setup>
import { onMounted, onUnmounted, ref } from 'vue';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

// Importação local dos vídeos para performance e autonomia
import videoCode from '../assets/video_code.mp4';
import videoTech from '../assets/video_tech.mp4';
import videoGlobal from '../assets/video_global.mp4';

gsap.registerPlugin(ScrollTrigger);

// Canais de Vídeo do Hero (Agora Locais)
const heroVideos = [
  videoCode,   // Programação
  videoTech,   // Tecnologia
  videoGlobal  // Conexão Global
];
const currentVideoIndex = ref(0);
let videoInterval = null;

// Controle de Áudio
const bgAudio = ref(null);
const isAudioPlaying = ref(false);

const toggleAudio = () => {
  if (bgAudio.value) {
    if (isAudioPlaying.value) {
      bgAudio.value.pause();
    } else {
      bgAudio.value.volume = 0.3; 
      bgAudio.value.play();
    }
    isAudioPlaying.value = !isAudioPlaying.value;
  }
};

const openWhatsApp = () => {
  const phone = '5511985835183';
  const message = encodeURIComponent('Olá César! Acessei seu portfólio e gostaria de falar sobre um projeto.');
  window.open(`https://wa.me/${phone}?text=${message}`, '_blank');
};

// Serviços com Imagens Atuais Adicionadas
const services = ref([
  {
    title: 'CodeIgniter & Node.js',
    desc: 'Soluções backend robustas, rápidas e nativamente otimizadas para impulsionar e escalar os negócios da sua empresa em ambientes on-premise ou na nuvem.',
    image: 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?auto=format&fit=crop&w=600&q=80'
  },
  {
    title: 'Automação com n8n',
    desc: 'Integrações em tempo real e workflows automatizados. Elimine atividades operacionais repetitivas e libere o tempo vital para pensar em estratégia de longo prazo.',
    image: 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=600&q=80'
  },
  {
    title: 'WordPress Personalizado',
    desc: 'Criação de sites dinâmicos, e-commerces (WooCommerce) e páginas institucionais escaláveis. Otimizados para SEO (Google), alta velocidade de carregamento e gestão intuitiva para sua equipe.',
    image: 'https://images.unsplash.com/photo-1611162616475-46b635cb6868?auto=format&fit=crop&w=600&q=80'
  }
]);

// Lista de Ícones das Tecnologias + WORDPRESS
const stackIcons = ref([
  { name: 'Vue.js', src: 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/vuejs/vuejs-original.svg' },
  { name: 'JavaScript', src: 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/javascript/javascript-original.svg' },
  { name: 'HTML5', src: 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/html5/html5-original.svg' },
  { name: 'CSS3', src: 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/css3/css3-original.svg' },
  { name: 'PHP', src: 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/php/php-original.svg' },
  { name: 'CodeIgniter 4', src: 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/codeigniter/codeigniter-plain.svg' },
  { name: 'WordPress', src: 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/wordpress/wordpress-original.svg' },
  { name: 'MySQL', src: 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/mysql/mysql-original.svg' },
]);

onMounted(() => {
  // Animação do Hero
  const tl = gsap.timeline();
  tl.fromTo(".hero-title", 
      { y: 50, opacity: 0 }, 
      { y: 0, opacity: 1, duration: 1, ease: 'power3.out', delay: 0.2 }
    )
    .fromTo(".hero-subtitle", 
      { y: 30, opacity: 0 }, 
      { y: 0, opacity: 1, duration: 1, ease: 'power3.out' }, 
      "-=0.6"
    )
    .fromTo(".cta-button", 
      { scale: 0.8, opacity: 0 }, 
      { scale: 1, opacity: 1, duration: 0.8, ease: 'back.out(1.7)' }, 
      "-=0.4"
    );

  // Animação do logo da stack
  gsap.fromTo(".tech-icon-wrapper",
    { scale: 0.5, opacity: 0, y: 30 },
    {
      scale: 1, opacity: 1, y: 0, duration: 0.6, stagger: 0.08, ease: 'back.out(1.5)',
      scrollTrigger: {
        trigger: ".tech-stack-section",
        start: "top 85%",
      }
    }
  );

  // Configurando Animação dos Cards de serviço
  gsap.fromTo(".service-card",
    { y: 60, opacity: 0 },
    {
      y: 0,
      opacity: 1,
      duration: 0.8,
      stagger: 0.2,
      ease: 'power3.out',
      scrollTrigger: {
        trigger: ".services-section",
        start: "top 75%",
      }
    }
  );
  
  gsap.fromTo(".section-title",
    { y: 30, opacity: 0 },
    {
      y: 0,
      opacity: 1,
      duration: 0.8,
      ease: 'power3.out',
      stagger: 0.2,
      scrollTrigger: {
        trigger: ".services-section",
        start: "top 80%",
      }
    }
  );

  // Iniciar rotação de vídeos
  videoInterval = setInterval(() => {
    currentVideoIndex.value = (currentVideoIndex.value + 1) % heroVideos.length;
  }, 10000); // 10 segundos para cada vídeo
});

onUnmounted(() => {
  if (videoInterval) clearInterval(videoInterval);
});
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;700&family=Inter:wght@300;400;600&display=swap');

.portfolio-wrapper {
  font-family: 'Inter', sans-serif;
  color: #fff;
  background-color: #0b0d11;
}

/* AUDIO TOGGLE */
.audio-toggle {
  position: fixed;
  top: 30px;
  right: 40px;
  z-index: 50;
  display: flex;
  align-items: center;
  gap: 10px;
  background: rgba(255, 255, 255, 0.05);
  backdrop-filter: blur(8px);
  -webkit-backdrop-filter: blur(8px);
  border: 1px solid rgba(255, 255, 255, 0.1);
  color: #f8fafc;
  padding: 10px 20px;
  border-radius: 50px;
  cursor: pointer;
  font-family: 'Space Grotesk', sans-serif;
  transition: all 0.3s ease;
  font-size: 0.9rem;
}

.audio-toggle:hover {
  background: rgba(6, 182, 212, 0.2);
  color: #0bdcfe;
  border-color: rgba(6, 182, 212, 0.5);
  box-shadow: 0 0 15px rgba(6, 182, 212, 0.3);
}

.audio-icon {
  width: 20px;
  height: 20px;
}

/* HERO */
.hero-section {
  position: relative;
  height: 100vh;
  min-height: 600px;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
  padding: 0 20px;
  overflow: hidden;
  background-color: #080a0f;
}

.video-container {
  position: absolute;
  top: 0; left: 0;
  width: 100%; height: 100%;
}

.hero-video {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 100vw;
  height: 100vh;
  /* Garante que o iframe cresça de forma a cobrir a tela independentemente da resolução */
  min-width: 177.77vh; 
  min-height: 56.25vw;
  transform: translate(-50%, -50%);
  object-fit: cover;
  z-index: 0;
  opacity: 0.35; 
  filter: grayscale(80%) contrast(1.1);
}

.fade-enter-active, .fade-leave-active {
  transition: opacity 1.5s ease-in-out;
}
.fade-enter-from, .fade-leave-to {
  opacity: 0;
}

.video-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: radial-gradient(circle at center, rgba(11, 13, 17, 0.3) 0%, rgba(11, 13, 17, 1) 90%);
  z-index: 1;
}

.hero-content {
  position: relative;
  z-index: 2;
  max-width: 900px;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 24px;
}

h1.hero-title {
  font-family: 'Space Grotesk', sans-serif;
  font-size: 5rem;
  font-weight: 700;
  line-height: 1.1;
  margin: 0;
  letter-spacing: -2px;
}

.highlight {
  color: #06b6d4; 
}

p.hero-subtitle {
  font-size: 1.25rem;
  color: #94a3b8;
  max-width: 650px;
  line-height: 1.6;
  font-weight: 300;
  margin: 0 0 10px 0;
}

.cta-button {
  background-color: #06b6d4;
  color: #080a0f;
  font-family: 'Space Grotesk', sans-serif;
  font-weight: 700;
  font-size: 1.1rem;
  padding: 16px 36px;
  border-radius: 50px;
  border: none;
  cursor: pointer;
  box-shadow: 0 0 20px rgba(6, 182, 212, 0.4);
  transition: all 0.3s ease;
}

.cta-button:hover {
  background-color: #0bdcfe;
  box-shadow: 0 0 35px rgba(6, 182, 212, 0.6);
  transform: translateY(-2px);
}

/* TECH STACK */
.tech-stack-section {
  padding: 60px 20px;
  background-color: #0b0d11;
  border-top: 1px solid rgba(255, 255, 255, 0.05);
  border-bottom: 1px solid rgba(255, 255, 255, 0.05);
  text-align: center;
  position: relative;
  z-index: 2;
}

.tech-container {
  max-width: 1000px;
  margin: 0 auto;
}

.tech-label {
  font-family: 'Space Grotesk', sans-serif;
  color: #94a3b8;
  font-size: 0.9rem;
  letter-spacing: 3px;
  margin-bottom: 30px;
  text-transform: uppercase;
}

.tech-icons {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  gap: 40px;
}

.tech-icon-wrapper {
  width: 50px;
  height: 50px;
  display: flex;
  align-items: center;
  justify-content: center;
  opacity: 0.6;
  transition: all 0.3s ease;
  filter: grayscale(100%);
}

.tech-icon-wrapper:hover {
  opacity: 1;
  transform: scale(1.15) translateY(-5px);
  filter: grayscale(0%);
}

.tech-icon {
  width: 100%;
  height: auto;
}

/* CARDS E SERVIÇOS (AGORA COM IMAGENS) */
.services-section {
  padding: 100px 20px;
  background-color: #0b0d11;
  min-height: 80vh;
}

.section-container {
  max-width: 1200px;
  margin: 0 auto;
}

.section-title {
  font-family: 'Space Grotesk', sans-serif;
  font-size: 3rem;
  font-weight: 700;
  text-align: center;
  margin-bottom: 70px;
}

.services-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
  gap: 40px;
}

.service-card {
  background: rgba(255, 255, 255, 0.02);
  backdrop-filter: blur(16px);
  -webkit-backdrop-filter: blur(16px);
  border: 1px solid rgba(255, 255, 255, 0.05);
  border-radius: 16px;
  text-align: left;
  transition: all 0.4s ease;
  position: relative;
  overflow: hidden;
  display: flex;
  flex-direction: column;
}

.service-card::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 3px;
  background: linear-gradient(90deg, #06b6d4, transparent);
  opacity: 0;
  z-index: 10;
  transition: opacity 0.4s ease;
}

.card-image {
  width: 100%;
  height: 200px;
  object-fit: cover;
  filter: brightness(0.8) contrast(1.1);
  transition: all 0.4s ease;
}

.card-content {
  padding: 30px;
}

.service-card:hover {
  transform: translateY(-10px);
  background: rgba(255, 255, 255, 0.05);
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
  border: 1px solid rgba(6, 182, 212, 0.2);
}

.service-card:hover::before {
  opacity: 1;
}

.service-card:hover .card-image {
  filter: brightness(1) contrast(1.1);
}

.card-content h3 {
  font-family: 'Space Grotesk', sans-serif;
  font-size: 1.4rem;
  font-weight: 700;
  margin-bottom: 12px;
  color: #f8fafc;
}

.card-content p {
  color: #94a3b8;
  line-height: 1.6;
  font-size: 1rem;
  font-weight: 300;
}

@media (max-width: 768px) {
  h1.hero-title { font-size: 2.8rem; }
  .section-title { font-size: 2.2rem; }
  .audio-toggle { top: 20px; right: 20px; padding: 8px 15px; font-size: 0.8rem; }
}
</style>
