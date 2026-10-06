<!-- 🤖 WIDGET CHATBOT IA SOFIA (CEZINHA SILVA - COCKPIT & CONSULTORIA) -->
<style>
.cez-chat-btn {
    position: fixed;
    bottom: 25px;
    right: 25px;
    width: 58px;
    height: 58px;
    border-radius: 50%;
    background: #00e599;
    color: #0b0d11;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    cursor: pointer;
    box-shadow: 0 8px 25px rgba(0, 229, 153, 0.4);
    border: 2px solid rgba(255,255,255,0.2);
    z-index: 1050;
    transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
}
.cez-chat-btn:hover {
    transform: scale(1.08) translateY(-3px);
    box-shadow: 0 12px 30px rgba(0, 229, 153, 0.65);
}
.cez-chat-badge {
    position: absolute;
    top: 2px;
    right: 2px;
    width: 14px;
    height: 14px;
    background: #00b4d8;
    border: 2px solid #0b0d11;
    border-radius: 50%;
}
.cez-chat-badge::after {
    content: '';
    position: absolute;
    top: -2px; left: -2px;
    width: 14px; height: 14px;
    background: #00b4d8;
    border-radius: 50%;
    animation: cezChatPulse 2s infinite;
    opacity: 0.7;
}
@keyframes cezChatPulse {
    0% { transform: scale(1); opacity: 0.8; }
    70% { transform: scale(2.2); opacity: 0; }
    100% { transform: scale(2.2); opacity: 0; }
}

.cez-chat-window {
    position: fixed;
    bottom: 95px;
    right: 25px;
    width: 380px;
    max-width: calc(100vw - 32px);
    height: 560px;
    max-height: calc(100vh - 120px);
    background: #0b0d11;
    border: 1px solid #1f242d;
    border-radius: 14px;
    box-shadow: 0 20px 50px rgba(0,0,0,0.85);
    display: flex;
    flex-direction: column;
    overflow: hidden;
    z-index: 1060;
    opacity: 0;
    pointer-events: none;
    transform: translateY(20px) scale(0.95);
    transition: all 0.28s cubic-bezier(0.16, 1, 0.3, 1);
}
.cez-chat-window.open {
    opacity: 1;
    pointer-events: auto;
    transform: translateY(0) scale(1);
}

.cez-chat-header {
    background: #15181d;
    border-bottom: 1px solid #222733;
    padding: 14px 16px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.cez-chat-header-info {
    display: flex;
    align-items: center;
    gap: 12px;
}
.cez-chat-avatar {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    background: linear-gradient(135deg, #00e599, #00b4d8);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #0b0d11;
    font-size: 18px;
    font-weight: 800;
}
.cez-chat-title {
    font-family: 'Space Grotesk', sans-serif;
    font-size: 15px;
    font-weight: 700;
    color: #fff;
    margin: 0;
    line-height: 1.2;
}
.cez-chat-status {
    font-size: 11px;
    color: #00e599;
    display: flex;
    align-items: center;
    gap: 5px;
    margin-top: 2px;
}
.cez-chat-status-dot {
    width: 7px;
    height: 7px;
    background: #00e599;
    border-radius: 50%;
}
.cez-chat-close-btn {
    background: none;
    border: none;
    color: #8b949e;
    font-size: 18px;
    cursor: pointer;
    padding: 4px;
    transition: color 0.2s;
}
.cez-chat-close-btn:hover {
    color: #fff;
}

.cez-chat-messages {
    flex: 1;
    padding: 16px;
    overflow-y: auto;
    display: flex;
    flex-direction: column;
    gap: 12px;
}
.cez-chat-messages::-webkit-scrollbar {
    width: 5px;
}
.cez-chat-messages::-webkit-scrollbar-thumb {
    background: #222733;
    border-radius: 4px;
}

.cez-chat-bubble {
    max-width: 86%;
    padding: 11px 14px;
    border-radius: 12px;
    font-size: 13.5px;
    line-height: 1.5;
    word-break: break-word;
}
.cez-chat-bubble-bot {
    background: #15181d;
    border: 1px solid #222733;
    color: #e6edf3;
    align-self: flex-start;
    border-bottom-left-radius: 2px;
}
.cez-chat-bubble-bot a {
    color: #00e599;
    font-weight: 600;
    text-decoration: underline;
}
.cez-chat-bubble-user {
    background: #00e599;
    color: #0b0d11;
    font-weight: 500;
    align-self: flex-end;
    border-bottom-right-radius: 2px;
}

.cez-chat-quick-replies {
    padding: 8px 14px;
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
    background: #11141a;
    border-top: 1px solid #1f242d;
}
.cez-chat-chip {
    background: #181c24;
    color: #c9d1d9;
    border: 1px solid #272d3b;
    padding: 6px 10px;
    border-radius: 20px;
    font-size: 11.5px;
    cursor: pointer;
    transition: all 0.2s;
    white-space: nowrap;
}
.cez-chat-chip:hover {
    background: #00e599;
    color: #0b0d11;
    border-color: #00e599;
}

.cez-chat-input-area {
    padding: 12px 14px;
    background: #15181d;
    border-top: 1px solid #222733;
    display: flex;
    align-items: center;
    gap: 8px;
}
.cez-chat-input {
    flex: 1;
    background: #0b0d11;
    border: 1px solid #272d3b;
    color: #fff;
    border-radius: 8px;
    padding: 9px 12px;
    font-size: 13.5px;
    outline: none;
    transition: border-color 0.2s;
}
.cez-chat-input:focus {
    border-color: #00e599;
}
.cez-chat-send-btn {
    background: #00e599;
    border: none;
    color: #0b0d11;
    width: 38px;
    height: 38px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s;
    font-size: 14px;
}
.cez-chat-send-btn:hover {
    background: #00ffaa;
    transform: translateY(-1px);
}
.cez-chat-typing {
    display: flex;
    align-items: center;
    gap: 4px;
    padding: 8px 12px;
    background: #15181d;
    border: 1px solid #222733;
    border-radius: 12px;
    width: fit-content;
    align-self: flex-start;
}
.cez-chat-typing-dot {
    width: 6px;
    height: 6px;
    background: #00e599;
    border-radius: 50%;
    animation: cezTypingBounce 1.4s infinite ease-in-out both;
}
.cez-chat-typing-dot:nth-child(1) { animation-delay: -0.32s; }
.cez-chat-typing-dot:nth-child(2) { animation-delay: -0.16s; }
@keyframes cezTypingBounce {
    0%, 80%, 100% { transform: scale(0); }
    40% { transform: scale(1); }
}
</style>

<!-- Botão Ativador -->
<div id="cezChatToggle" class="cez-chat-btn" title="Falar com Sofia (IA Comercial)">
    <span class="cez-chat-badge"></span>
    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 8V4H8"></path><rect width="16" height="12" x="4" y="8" rx="2"></rect><path d="M2 14h2"></path><path d="M20 14h2"></path><path d="M15 13v2"></path><path d="M9 13v2"></path></svg>
</div>

<!-- Janela do Chat -->
<div id="cezChatWindow" class="cez-chat-window">
    <div class="cez-chat-header">
        <div class="cez-chat-header-info">
            <div class="cez-chat-avatar">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
            </div>
            <div>
                <p class="cez-chat-title">Sofia • Tech Lead & IA</p>
                <div class="cez-chat-status">
                    <span class="cez-chat-status-dot"></span> Online agora • Cezinha Silva
                </div>
            </div>
        </div>
        <button id="cezChatClose" class="cez-chat-close-btn" title="Fechar">&times;</button>
    </div>

    <div id="cezChatMessages" class="cez-chat-messages">
        <div class="cez-chat-bubble cez-chat-bubble-bot">
            Olá! Sou a <strong>Sofia</strong>, consultora comercial e tech lead junto ao <strong>Cezinha Silva</strong>.<br><br>
            Como posso ajudar você hoje? Posso tirar dúvidas sobre a nossa arquitetura <strong>Engine.Core</strong>, automações com IA ou te passar <strong>faixas de investimento e prazos</strong>!
        </div>
    </div>

    <!-- Quick Replies -->
    <div class="cez-chat-quick-replies" id="cezChatChips">
        <button class="cez-chat-chip" data-msg="Quanto custa uma Landing Page?">💰 Landing Page</button>
        <button class="cez-chat-chip" data-msg="Quanto custa um Site Institucional?">🏢 Site Institucional</button>
        <button class="cez-chat-chip" data-msg="Quero automação com IA e n8n">🤖 Automação IA</button>
        <button class="cez-chat-chip" data-msg="Por que o Monólito Engine.Core é melhor que WordPress?">⚡ Engine.Core vs WP</button>
    </div>

    <div class="cez-chat-input-area">
        <input type="text" id="cezChatInput" class="cez-chat-input" placeholder="Digite sua mensagem..." autocomplete="off">
        <button id="cezChatSend" class="cez-chat-send-btn" title="Enviar">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
        </button>
    </div>
</div>

<script>
(function() {
    const toggleBtn = document.getElementById('cezChatToggle');
    const chatWin = document.getElementById('cezChatWindow');
    const closeBtn = document.getElementById('cezChatClose');
    const sendBtn = document.getElementById('cezChatSend');
    const inputField = document.getElementById('cezChatInput');
    const msgContainer = document.getElementById('cezChatMessages');
    const chips = document.querySelectorAll('.cez-chat-chip');

    let sessionId = localStorage.getItem('cez_chat_session');
    if (!sessionId) {
        sessionId = 'sess_cez_' + Date.now() + '_' + Math.random().toString(36).substring(2, 8);
        localStorage.setItem('cez_chat_session', sessionId);
    }

    function toggleChat() {
        chatWin.classList.toggle('open');
        if (chatWin.classList.contains('open')) {
            inputField.focus();
            scrollToBottom();
        }
    }

    toggleBtn.addEventListener('click', toggleChat);
    closeBtn.addEventListener('click', toggleChat);

    function scrollToBottom() {
        msgContainer.scrollTop = msgContainer.scrollHeight;
    }

    function formatText(text) {
        if (!text) return '';
        let html = text
            .replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>')
            .replace(/\*(.*?)\*/g, '<em>$1</em>')
            .replace(/\[(.*?)\]\((https?:\/\/.*?)\)/g, '<a href="$2" target="_blank" rel="noopener noreferrer">$1</a>')
            .replace(/\n/g, '<br>');
        return html;
    }

    function addMessage(text, sender) {
        const bubble = document.createElement('div');
        bubble.className = 'cez-chat-bubble ' + (sender === 'user' ? 'cez-chat-bubble-user' : 'cez-chat-bubble-bot');
        bubble.innerHTML = sender === 'user' ? text.replace(/</g, '&lt;') : formatText(text);
        msgContainer.appendChild(bubble);
        scrollToBottom();
    }

    function showTyping() {
        const typing = document.createElement('div');
        typing.className = 'cez-chat-typing';
        typing.id = 'cezChatTypingIndicator';
        typing.innerHTML = '<span class="cez-chat-typing-dot"></span><span class="cez-chat-typing-dot"></span><span class="cez-chat-typing-dot"></span>';
        msgContainer.appendChild(typing);
        scrollToBottom();
    }

    function removeTyping() {
        const typing = document.getElementById('cezChatTypingIndicator');
        if (typing) typing.remove();
    }

    let chatHistory = [];
    try {
        const stored = sessionStorage.getItem('cez_chat_history');
        if (stored) {
            chatHistory = JSON.parse(stored);
            chatHistory.forEach(item => {
                addMessage(item.content, item.role === 'user' ? 'user' : 'bot');
            });
        }
    } catch(e) { chatHistory = []; }

    async function sendMessage(msg) {
        const text = msg || inputField.value.trim();
        if (!text) return;

        addMessage(text, 'user');
        chatHistory.push({ role: 'user', content: text });
        try { sessionStorage.setItem('cez_chat_history', JSON.stringify(chatHistory)); } catch(e){}

        inputField.value = '';
        showTyping();

        const previousTurns = chatHistory.slice(0, -1).slice(-6);
        const historyText = previousTurns.length > 0 
            ? previousTurns.map(h => (h.role === 'user' ? 'Visitante: ' : 'Sofia: ') + h.content).join('\n')
            : '';

        try {
            const resp = await fetch('https://n8n.cezinhasilva.com/webhook/chat-assistente', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    message: text,
                    sessionId: sessionId,
                    origem: 'Site Cezinha Silva',
                    historyText: historyText
                })
            });

            const data = await resp.json();
            removeTyping();

            if (data && data.response) {
                addMessage(data.response, 'bot');
                chatHistory.push({ role: 'assistant', content: data.response });
                try { sessionStorage.setItem('cez_chat_history', JSON.stringify(chatHistory)); } catch(e){}
            } else {
                addMessage('Poxa, tive uma instabilidade momentânea. Você pode me chamar direto no WhatsApp: [Falar com Cezinha no WhatsApp](https://wa.me/5511985835183?text=Ol%C3%A1%21+Vim+pelo+site+Cezinha+Silva)', 'bot');
            }
        } catch (err) {
            removeTyping();
            addMessage('Não consegui conectar ao servidor no momento. Se preferir, [clique aqui para falar no WhatsApp](https://wa.me/5511985835183?text=Ol%C3%A1%21+Vim+pelo+site+Cezinha+Silva).', 'bot');
        }
    }

    sendBtn.addEventListener('click', () => sendMessage());
    inputField.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') sendMessage();
    });

    chips.forEach(chip => {
        chip.addEventListener('click', () => {
            const msg = chip.getAttribute('data-msg');
            sendMessage(msg);
        });
    });
})();
</script>
