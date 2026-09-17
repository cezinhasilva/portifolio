<!DOCTYPE html>
<html class="light" lang="pt-BR"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Portfólio Desenvolvedor | 10 Anos de Experiência</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Gochi+Hand&amp;family=Patrick+Hand&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="https://unpkg.com/papercss@1.9.2/dist/paper.min.css">
<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#e64c19",
                        "background-light": "#f8f6f6",
                        "background-dark": "#211511",
                    },
                    fontFamily: {
                        "display": ["Space Grotesk", "sans-serif"],
                        "handwritten": ["Patrick Hand", "cursive"],
                        "sketchy": ["Gochi Hand", "cursive"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
<style type="text/tailwindcss">
        .sketch-border {
            border: 2px solid #181311;
            border-radius: 255px 15px 225px 15px/15px 225px 15px 255px
        }
        .sketch-border-sm {
            border: 2px solid #181311;
            border-radius: 4px 12px 6px 14px/10px 4px 12px 5px
        }
        .sketch-circle {
            border: 2px solid #181311;
            border-radius: 48% 52% 56% 44% / 43% 55% 45% 57%;
        }
        .paper-texture {
            background-color: #f8f6f6;
            background-image: url(https://lh3.googleusercontent.com/aida-public/AB6AXuBx_8l-ObnlDDWXyYzanF_jBDOv9otO-cYCapMbQlflGWkgb5Kk9ogQkm1ahCDhZpAhJswW5QAO1JJD1zjtfdgNpwJzTBq4sIK3aDeDMSDdEugJYpSLFVI9-BpR2FnAPxMWEp91vrW28fsfVCnrtCYghZDQB8we9lusYmMTPfquW_xE5sBFyecOr6xd07aSnexL9iRu1vvxZ8IweMxcHwKnDX15iXdohe9FtGx0YDLaKFuCB8tt_nHDnjKXd0dZ83WEkkBtDb1FSvg)
        }
        .dark .paper-texture {
            background-color: #211511;
            background-image: url(https://lh3.googleusercontent.com/aida-public/AB6AXuD2j9U8QwPmOVI1ytlKNWdyi47VItZefT_7UVWkSrwzg2kbv_RIzs5ANhULIdgq1Lvr6jJ6OyIexl-2KBwYClx0B9wZBD4-RKNAna12XApvCrrkmeBOkp_OVdhl0Iy-gso0Ah-v31fdzmtcy5dYfi7pB-8g-SVrKrIfZ-e12wXroiDnPqUGmZUym_VsCjC1g-EVYYHb5qwoRJ4sgqSA5L-jaBRsFq1XegOyLrr-fM6UZ4GUGqIWIPW9aOe5ZBSiENCWKmrN98IWgko)
        }
        .dark .sketch-border, .dark .sketch-border-sm, .dark .sketch-circle, .dark .wobbly-line {
            border-color: #ffffff;
        }
        .hand-underline {
            position: relative
        }
        .hand-underline::after {
            content: "";
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            height: 2px;
            background: #e64c19;
            border-radius: 100% 5% 95% 10%/15% 95% 5% 85%
        }
        .polaroid-frame {
            background: white;
            padding: 12px 12px 40px 12px;
            box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.1);
            transform: rotate(-1deg);
            border: 1px solid #ddd
        }
        .polaroid-frame:nth-child(even) {
            transform: rotate(2deg)
        }
        .sticky-note {
            background: #fff9c4;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.1);
            transform: rotate(-2deg);
            border: 1px solid rgba(0, 0, 0, 0.05)
        }
        .wobbly-line {
            width: 2px;
            background-image: linear-gradient(to bottom, currentColor 50%, transparent 50%);
            background-size: 1px 15px;
            border-left: 2px solid currentColor;
            border-radius: 100% 0% 100% 0% / 50% 0% 50% 0%;
            transform: rotate(0.5deg);
        }
        .arrow-sketch {
            position: absolute;
            width: 40px;
            height: 2px;
            background: currentColor;
            top: 50%;
            left: -40px;
            transform: rotate(-2deg);
        }
        .arrow-sketch::after {
            content: '';
            position: absolute;
            right: 0;
            top: -5px;
            width: 10px;
            height: 10px;
            border-right: 2px solid currentColor;
            border-top: 2px solid currentColor;
            transform: rotate(45deg);
        }
    </style>
</head>
<body class="paper-texture font-display text-[#181311] dark:text-white transition-colors duration-300">
<div class="relative flex h-auto min-h-screen w-full flex-col group/design-root overflow-x-hidden">
<div class="layout-container flex h-full grow flex-col">
<div class="px-4 md:px-40 flex justify-center py-5">
<div class="layout-content-container flex flex-col max-w-[960px] flex-1">
<header class="flex items-center justify-between whitespace-nowrap border-b-2 border-solid border-[#181311] px-4 py-4 sketch-border-sm">
<div class="flex items-center gap-4 text-[#181311] dark:text-white">
<div class="size-8 flex items-center justify-center">
<span class="material-symbols-outlined text-primary text-3xl">edit_note</span>
</div>
<h2 class="text-xl font-bold leading-tight tracking-[-0.015em] italic text-sketchy">DevPortfólio</h2>
</div>
<div class="flex flex-1 justify-end gap-8 items-center">
<div class="hidden md:flex items-center gap-9">
<a class="text-sm font-bold leading-normal hover:text-primary hand-underline" href="#">Trabalhos</a>
<a class="text-sm font-bold leading-normal hover:text-primary" href="#skills">Habilidades</a>
<a class="text-sm font-bold leading-normal hover:text-primary" href="#experience">Histórico</a>
<a class="text-sm font-bold leading-normal hover:text-primary" href="#contact">Contato</a>
</div>
<button class="flex min-w-[120px] cursor-pointer items-center justify-center rounded-lg h-10 px-4 bg-primary text-white text-sm font-black tracking-[0.05em] sketch-border-sm hover:scale-105 transition-transform">
<span class="truncate uppercase">Contrate-me!</span>
</button>
</div>
</header>
</div>
</div>
<div class="px-4 md:px-40 flex flex-1 justify-center py-5">
<div class="layout-content-container flex flex-col max-w-[960px] flex-1">
<div class="@container">
<div class="flex flex-col gap-8 px-4 py-10 @[864px]:flex-row @[864px]:items-center">
<div class="w-full bg-center bg-no-repeat aspect-square bg-cover sketch-border overflow-hidden rotate-[-2deg]" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCw1USLd4u2BKf2LHqvWMPXaci5gQVXRVOeadydmhEWDWQThCvlwEAxtxi4bB1bMg0arT3b3aDGf_hLxO_M6mz25Tkv0akyxWV50ZK_8Qxju2ylyHD7xcqMDxM1_VTw7SHHKQlp-Lzg-9SBNxBRghXpAnZRxyJu1LO23UmkutOSge5avgTlrwAL2miiWNWZn9EVJB3O1ZFpRPesCEwhWL_yD95Tlp5XUaEHM0K94lEpMDpbGKbD6pzWg5sgI4FrXWeY4AH4N2lhcko");'>
</div>
<div class="flex flex-col gap-6 @[480px]:min-w-[400px] @[864px]:justify-center">
<div class="flex flex-col gap-4 text-left">
<h1 class="text-[#181311] dark:text-white text-5xl font-black leading-tight tracking-[-0.033em] @[480px]:text-6xl italic">
                                        Olá, eu sou <span class="text-primary underline decoration-wavy">Seu Nome</span>
</h1>
<h2 class="text-[#181311] dark:text-gray-300 text-lg font-medium leading-relaxed bg-primary/10 p-4 sketch-border-sm">
<span class="font-bold">Desenvolvedor Full-stack há 10 anos</span>, especialista em <span class="font-bold border-b-2 border-primary">PHP, CodeIgniter e MySQL</span>. Criando experiências digitais desde 2014. Transformo ideias complexas em código limpo (que se parece com este rascunho).
                                    </h2>
</div>
<button class="flex w-fit min-w-[180px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-14 px-6 bg-[#181311] text-white text-lg font-bold tracking-widest sketch-border-sm hover:bg-primary transition-colors">
<span class="truncate uppercase text-sketchy">Explorar Meu Mural</span>
</button>
</div>
</div>
</div>
</div>
</div>
<div class="px-4 md:px-40 flex justify-center py-12" id="skills">
<div class="layout-content-container flex flex-col max-w-[960px] flex-1">
<div class="flex items-center gap-4 px-4 mb-10">
<h2 class="text-[#181311] dark:text-white text-3xl font-black italic tracking-tight">Minhas Habilidades</h2>
<div class="h-[2px] grow bg-[#181311] dark:bg-white opacity-20"></div>
</div>
<div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-8 px-4">
<div class="flex flex-col items-center gap-3 group">
<div class="size-20 flex items-center justify-center sketch-circle bg-white/50 dark:bg-white/5 transition-transform group-hover:rotate-6">
<span class="material-symbols-outlined text-4xl text-primary" style="font-variation-settings: 'FILL' 0, 'wght' 300">html</span>
</div>
<span class="font-bold italic text-sm tracking-tighter text-handwritten">HTML5</span>
</div>
<div class="flex flex-col items-center gap-3 group">
<div class="size-20 flex items-center justify-center sketch-circle bg-white/50 dark:bg-white/5 transition-transform group-hover:-rotate-3">
<span class="material-symbols-outlined text-4xl text-primary" style="font-variation-settings: 'FILL' 0, 'wght' 300">css</span>
</div>
<span class="font-bold italic text-sm tracking-tighter text-handwritten">CSS3</span>
</div>
<div class="flex flex-col items-center gap-3 group">
<div class="size-20 flex items-center justify-center sketch-circle bg-white/50 dark:bg-white/5 transition-transform group-hover:rotate-12">
<span class="material-symbols-outlined text-4xl text-primary" style="font-variation-settings: 'FILL' 0, 'wght' 300">javascript</span>
</div>
<span class="font-bold italic text-sm tracking-tighter text-handwritten">JavaScript</span>
</div>
<div class="flex flex-col items-center gap-3 group">
<div class="size-20 flex items-center justify-center sketch-circle bg-white/50 dark:bg-white/5 transition-transform group-hover:-rotate-6">
<span class="material-symbols-outlined text-4xl text-primary" style="font-variation-settings: 'FILL' 0, 'wght' 300">php</span>
</div>
<span class="font-bold italic text-sm tracking-tighter text-handwritten">PHP</span>
</div>
<div class="flex flex-col items-center gap-3 group">
<div class="size-20 flex items-center justify-center sketch-circle bg-white/50 dark:bg-white/5 transition-transform group-hover:rotate-3">
<span class="material-symbols-outlined text-4xl text-primary" style="font-variation-settings: 'FILL' 0, 'wght' 300">token</span>
</div>
<span class="font-bold italic text-sm tracking-tighter text-center leading-tight text-handwritten">CodeIgniter</span>
</div>
<div class="flex flex-col items-center gap-3 group">
<div class="size-20 flex items-center justify-center sketch-circle bg-white/50 dark:bg-white/5 transition-transform group-hover:-rotate-12">
<span class="material-symbols-outlined text-4xl text-primary" style="font-variation-settings: 'FILL' 0, 'wght' 300">database</span>
</div>
<span class="font-bold italic text-sm tracking-tighter text-handwritten">MySQL</span>
</div>
</div>
</div>
</div>
<div class="px-4 md:px-40 flex justify-center py-12" id="experience">
<div class="layout-content-container flex flex-col max-w-[960px] flex-1">
<div class="flex items-center gap-4 px-4 mb-16">
<h2 class="text-[#181311] dark:text-white text-3xl font-black italic tracking-tight">Experiência Profissional</h2>
<div class="h-[2px] grow bg-[#181311] dark:bg-white opacity-20"></div>
</div>
<div class="relative ml-8 md:ml-20">
<div class="absolute left-0 top-0 bottom-0 w-[2px] wobbly-line opacity-40"></div>
<div class="space-y-16">
<div class="relative pl-12">
<div class="absolute -left-[9px] top-2 size-4 sketch-circle bg-primary"></div>
<div class="relative sketch-border-sm p-6 bg-white/40 dark:bg-white/5 -rotate-1 max-w-xl">
<div class="arrow-sketch hidden md:block"></div>
<span class="text-primary font-sketchy text-xl">2021 - Presente</span>
<h3 class="text-xl font-black italic mt-1">Arquiteto Backend Sênior</h3>
<p class="font-handwritten text-lg mt-2 leading-snug">
                                        Gerenciando sistemas de dados em larga escala usando otimização de <span class="underline decoration-dotted">MySQL</span>. Construindo ferramentas internas robustas com <span class="font-bold">CodeIgniter</span> e frameworks <span class="font-bold">PHP</span> personalizados para mais de 50k usuários diários.
                                    </p>
</div>
</div>
<div class="relative pl-12">
<div class="absolute -left-[9px] top-2 size-4 sketch-circle bg-[#181311] dark:bg-white"></div>
<div class="relative sketch-border-sm p-6 bg-white/40 dark:bg-white/5 rotate-1 max-w-xl ml-auto md:mr-10">
<div class="arrow-sketch hidden md:block rotate-180 -right-10 left-auto"></div>
<span class="text-primary font-sketchy text-xl">2018 - 2021</span>
<h3 class="text-xl font-black italic mt-1">Desenvolvedor Full Stack</h3>
<p class="font-handwritten text-lg mt-2 leading-snug">
                                        Migração de sistemas legados para um ambiente estruturado em <span class="font-bold">CodeIgniter</span>. Foco na criação de APIs seguras em <span class="font-bold">PHP</span> e garantia da integridade de bancos de dados relacionais com <span class="underline decoration-dotted">MySQL</span>.
                                    </p>
</div>
</div>
<div class="relative pl-12">
<div class="absolute -left-[9px] top-2 size-4 sketch-circle bg-[#181311] dark:bg-white"></div>
<div class="relative sketch-border-sm p-6 bg-white/40 dark:bg-white/5 -rotate-2 max-w-xl">
<div class="arrow-sketch hidden md:block"></div>
<span class="text-primary font-sketchy text-xl">2014 - 2018</span>
<h3 class="text-xl font-black italic mt-1">Especialista Web Júnior</h3>
<p class="font-handwritten text-lg mt-2 leading-snug">
                                        Início da jornada desenvolvendo temas e plugins personalizados. Domínio dos fundamentos de <span class="font-bold">PHP</span> e gestão de banco de dados com <span class="underline decoration-dotted">MySQL</span> para pequenas e médias empresas.
                                    </p>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="px-4 md:px-40 flex justify-center py-5">
<div class="layout-content-container flex flex-col max-w-[960px] flex-1">
<div class="flex items-center gap-4 px-4 pb-3 pt-5">
<h2 class="text-[#181311] dark:text-white text-3xl font-black italic tracking-tight">Galeria de Projetos</h2>
<div class="h-[2px] grow bg-[#181311] dark:bg-white opacity-20"></div>
</div>
</div>
</div>
<div class="px-4 md:px-40 flex justify-center py-5">
<div class="layout-content-container flex flex-col max-w-[960px] flex-1">
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8 p-4">
<div class="polaroid-frame group">
<div class="bg-cover bg-center aspect-square grayscale group-hover:grayscale-0 transition-all duration-500" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAEASplv_9jnLHtLpeRpx1JGHWXtQhkAw9i_ucAmUStg_zvCmyRNaRb_uuDLA8frNDamTht20XBGz8ve_ZshhKHB4lg9WGqfLTaULrrGxIhhW4S6VLV8psBSTSCglWe-1PbzbDAldtGyeVWuTWa8G3cd7BHqPCQAZ6Uqruwli3WP6Ufm7X6HQlCbUjn2z_IgpwLtNJwgIJD4Ly5FG5EzWsw9eS5Vnb8a23UzJMg6mATegtf4GQyf63KXNgt3pHDxy2_MBC0yPJ2OlQ");'>
</div>
<p class="text-[#181311] text-lg font-bold mt-4 text-center italic font-handwritten">Motor de E-commerce</p>
</div>
<div class="polaroid-frame group">
<div class="bg-cover bg-center aspect-square grayscale group-hover:grayscale-0 transition-all duration-500" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDQSPA-8ANj0klUGkf11027o6exgIWqr9mYYEjX9A4_QQ4QJ958UAzcyQkof3Q48oeQidO8GP6bJ75QGPAFnqzB07BKgAPDYMVo0OW0tU2yDB1yqKTQzceV9h16DVcjruqXK5eE8dss-aznRB1K79bDT0RMpOWe-skY1SxUqFSw5_x6PivMr5LoWhIbQqW5_2zMKxy_2SOkTmfKua6lrOkkP6ZfybltHDdj33MmmJpHKOWubuZ8hkBdEBx-i7kwhwlQiYX0qdRpO68");'>
</div>
<p class="text-[#181311] text-lg font-bold mt-4 text-center italic font-handwritten">CRM Customizado</p>
</div>
<div class="polaroid-frame group">
<div class="bg-cover bg-center aspect-square grayscale group-hover:grayscale-0 transition-all duration-500" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCsHvNfK8wX-xRZ23XxnUiR-Z2NpS9wZrk0qvQN0BYjyosI21WFTew1nk62mhDYZRU-qAc0I9csF70b8-7ywpPQbUPwRw6N9mmxp_UV1uTtOzKJ0PhHaZQu3WaNEs9p8z4XepWNjbGtkcQIvRI7RXgp3185LMkT6KbksVmiMyr8dn-e5_M7mWtm9MTWFeexBWrcKWh0krC931Yi0bCwpy5696IabcHIZ1sk4gjs4PhPYhP1-kJiTe7G9UUi1fH0o-RHUoVq4_KyxmQ");'>
</div>
<p class="text-[#181311] text-lg font-bold mt-4 text-center italic font-handwritten">Dashboard Fintech</p>
</div>
<div class="polaroid-frame group">
<div class="bg-cover bg-center aspect-square grayscale group-hover:grayscale-0 transition-all duration-500" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCVkLM0ZnIMRIHHwzolHSpwAyl0cbbPwTTACEES2V-fm_B1Jf9Q-2PXGfU57gd7G5hEqJxfBpBG5pMRWbP2HgNc9jkPGtKV58nOqrWZzv7pX_WELuTgzxeZ61prfAHMzOoSHRT-2PS3oizoAZsYk52zxoHk1JB9SUNZ7Hk5bZztu3Jk6VeW7yWSe6aSNgOkbS2k51PHQXLNWu-ipMvf6SHorz2hhBi_UEsGiV4a33yv9g3rEVDGZQaNsNSAsGP5E0SFq1fr-RYVrHk");'>
</div>
<p class="text-[#181311] text-lg font-bold mt-4 text-center italic font-handwritten">API Social</p>
</div>
</div>
</div>
</div>
<div class="px-4 md:px-40 flex justify-center py-10">
<div class="layout-content-container flex flex-col md:flex-row gap-10 max-w-[960px] flex-1">
<div class="flex-1">
<h2 class="text-[#181311] dark:text-white text-3xl font-black italic mb-6">Minha Caixa de Ferramentas</h2>
<div class="grid grid-cols-2 gap-4">
<div class="p-4 sketch-border-sm bg-white/50 dark:bg-white/10 flex items-center gap-3">
<span class="material-symbols-outlined text-primary">terminal</span>
<span class="font-bold text-handwritten">PHP &amp; MySQL</span>
</div>
<div class="p-4 sketch-border-sm bg-white/50 dark:bg-white/10 flex items-center gap-3">
<span class="material-symbols-outlined text-primary">javascript</span>
<span class="font-bold text-handwritten">JS &amp; jQuery</span>
</div>
<div class="p-4 sketch-border-sm bg-white/50 dark:bg-white/10 flex items-center gap-3">
<span class="material-symbols-outlined text-primary">code</span>
<span class="font-bold text-handwritten">CodeIgniter</span>
</div>
<div class="p-4 sketch-border-sm bg-white/50 dark:bg-white/10 flex items-center gap-3">
<span class="material-symbols-outlined text-primary">css</span>
<span class="font-bold text-handwritten">HTML &amp; CSS</span>
</div>
</div>
</div>
<div class="flex-none w-full md:w-80">
<div class="sticky-note p-8 relative">
<div class="absolute -top-4 left-1/2 -translate-x-1/2 text-red-700">
<span class="material-symbols-outlined text-4xl" style="font-variation-settings: 'FILL' 1">push_pin</span>
</div>
<h3 class="text-[#181311] text-xl font-black mb-2 italic">Assine a Newsletter</h3>
<p class="text-[#181311]/80 text-sm mb-4 font-handwritten text-lg leading-tight">Receba pensamentos semanais sobre PHP e café.</p>
<input class="w-full bg-transparent border-b-2 border-[#181311] border-t-0 border-l-0 border-r-0 focus:ring-0 px-0 mb-4 placeholder:text-black/30 italic font-handwritten text-lg" placeholder="seu@email.com" type="email"/>
<button class="w-full py-2 bg-[#181311] text-white font-bold sketch-border-sm text-sm uppercase text-sketchy">Cadastrar!</button>
</div>
</div>
</div>
</div>
<div class="px-4 md:px-40 flex justify-center py-20 bg-primary/5" id="contact">
<div class="layout-content-container flex flex-col max-w-[600px] flex-1 text-center">
<h2 class="text-4xl font-black italic mb-2">Fale Comigo</h2>
<p class="mb-10 text-lg opacity-70 italic font-handwritten">Precisa de um site? Ou quer apenas conversar sobre otimização de SQL?</p>
<form class="flex flex-col gap-6 text-left">
<div class="flex flex-col gap-1">
<label class="font-bold text-sm uppercase ml-2 italic">Nome</label>
<input class="bg-transparent border-2 border-[#181311] dark:border-white sketch-border-sm p-4 focus:ring-primary focus:border-primary font-handwritten text-lg" placeholder="Digite seu nome" type="text"/>
</div>
<div class="flex flex-col gap-1">
<label class="font-bold text-sm uppercase ml-2 italic">Email</label>
<input class="bg-transparent border-2 border-[#181311] dark:border-white sketch-border-sm p-4 focus:ring-primary focus:border-primary font-handwritten text-lg" placeholder="ola@mundo.com.br" type="email"/>
</div>
<div class="flex flex-col gap-1">
<label class="font-bold text-sm uppercase ml-2 italic">Mensagem</label>
<textarea class="bg-transparent border-2 border-[#181311] dark:border-white sketch-border-sm p-4 focus:ring-primary focus:border-primary font-handwritten text-lg" placeholder="Conte-me sobre seu projeto..." rows="4"></textarea>
</div>
<button class="mt-4 h-16 bg-primary text-white text-xl font-black uppercase sketch-border hover:bg-primary/90 transition-all shadow-[6px_6px_0px_#181311] text-sketchy">
                            Enviar
                        </button>
</form>
</div>
</div>
<footer class="px-4 md:px-40 py-10 flex flex-col items-center justify-center gap-4 text-[#181311] dark:text-white/50 italic opacity-70">
<div class="flex gap-6">
<a class="hover:text-primary" href="#"><span class="material-symbols-outlined">data_object</span></a>
<a class="hover:text-primary" href="#"><span class="material-symbols-outlined">alternate_email</span></a>
<a class="hover:text-primary" href="#"><span class="material-symbols-outlined">psychology</span></a>
</div>
<p class="text-sm font-handwritten">Construído com ☕ e Código Feito à Mão. © 2024</p>
</footer>
</div>
</div>

</body></html>