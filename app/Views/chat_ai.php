<style>
    #ai-modal {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.6);
        z-index: 9999;
        justify-content: center;
        align-items: center;
        padding: 20px;
        backdrop-filter: blur(4px);
    }

    .chat-container-ai {
        width: 100%;
        max-width: 500px;
        background: white;
        border-radius: 24px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        display: flex;
        flex-direction: column;
        height: 80vh;
        overflow: hidden;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .chat-header {
        padding: 20px;
        text-align: center;
        background: #b08d57;
        color: white;
        position: relative;
    }

    .chat-header h2 {
        margin: 0;
        font-size: 1.1rem;
        letter-spacing: 1px;
    }

    .close-btn {
        position: absolute;
        right: 20px;
        top: 18px;
        background: none;
        border: none;
        color: white;
        font-size: 24px;
        cursor: pointer;
    }

    #chat-window {
        flex: 1;
        overflow-y: auto;
        padding: 20px;
        display: flex;
        flex-direction: column;
        gap: 12px;
        background-color: #ffffff;
    }

    .bubble {
        max-width: 80%;
        padding: 12px 16px;
        border-radius: 15px;
        font-size: 14px;
        line-height: 1.5;
    }

    .ai {
        align-self: flex-start;
        background-color: #f1f3f4;
        color: black;
        border-bottom-left-radius: 2px;
    }

    .user {
        align-self: flex-end;
        background-color: #b08d57;
        color: white;
        border-bottom-right-radius: 2px;
    }

    .input-group {
        padding: 15px 20px;
        border-top: 1px solid #f0f0f0;
        display: flex;
        gap: 10px;
        background: white;
        align-items: center;
    }

    .input-group input {
        flex: 1;
        padding: 12px 20px;
        border: 1px solid #e0e0e0;
        border-radius: 12px;
        outline: none;
        background-color: #f8f9fa;
    }

    .button-actions {
        display: flex;
        gap: 8px;
        align-items: center;
    }

    .mic-container, .btn-send {
        background-color: #b08d57;
        border-radius: 10px;
        width: 42px;
        height: 42px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        border: none;
        transition: all 0.3s ease;
    }

    .mic-container svg, .btn-send svg {
        width: 20px;
        height: 20px;
        fill: #ffffff;
    }

    .listening {
        background-color: #ff4b4b !important;
        animation: pulse-ring 1.5s infinite;
    }

    @keyframes pulse-ring {
        0% { box-shadow: 0 0 0 0 rgba(255, 75, 75, 0.4); }
        70% { box-shadow: 0 0 0 10px rgba(255, 75, 75, 0); }
        100% { box-shadow: 0 0 0 0 rgba(255, 75, 75, 0); }
    }
</style>

<div id="ai-modal" onclick="closeAI(event)">
    <div class="chat-container-ai" onclick="event.stopPropagation()">
        <div class="chat-header">
            <h2>RAUDHAH PATH AI</h2>
            <button class="close-btn" onclick="toggleAI()">&times;</button>
        </div>

        <div id="chat-window">
            <div class="bubble ai">Assalamu'alaikum! Ada yang bisa saya bantu cek terkait paket Umroh hari ini?</div>
        </div>

        <div class="input-group">
            <input type="text" id="user-input" placeholder="Tanya sesuatu..." autocomplete="off">
            <div class="button-actions">
                <button class="mic-container" onclick="mulaiMic()" id="mic-btn" title="Gunakan Suara">
                    <svg viewBox="0 0 24 24"><path d="M12 14c1.66 0 3-1.34 3-3V5c0-1.66-1.34-3-3-3S9 3.34 9 5v6c0 1.66 1.34 3 3 3z" /><path d="M17 11c0 2.76-2.24 5-5 5s-5-2.24-5-5H5c0 3.53 2.61 6.43 6 6.92V21h2v-3.08c3.39-.49 6-3.39 6-6.92h-2z" /></svg>
                </button>
                <button class="btn-send" onclick="tanyaAI()" title="Kirim">
                    <svg viewBox="0 0 24 24"><path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z" /></svg>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    const inputField = document.getElementById('user-input');
    const chatWindow = document.getElementById('chat-window');

    function toggleAI() {
        const modal = document.getElementById('ai-modal');
        modal.style.display = (modal.style.display === 'flex') ? 'none' : 'flex';
        if (modal.style.display === 'flex') inputField.focus();
    }

    function closeAI(event) {
        if (event.target.id === 'ai-modal') toggleAI();
    }

    function appendMessage(sender, text) {
        const div = document.createElement('div');
        div.classList.add('bubble', sender);
        div.innerText = text;
        chatWindow.appendChild(div);
        chatWindow.scrollTop = chatWindow.scrollHeight;
    }

    // --- FIX VOICE ENGINE ---
    function playVoice(text) {
        window.speechSynthesis.cancel();
        const speech = new SpeechSynthesisUtterance(text);
        speech.lang = "id-ID";
        
        // Cari suara Indo agar lebih natural
        const voices = window.speechSynthesis.getVoices();
        const indoVoice = voices.find(v => v.lang.includes('id'));
        if (indoVoice) speech.voice = indoVoice;

        window.speechSynthesis.speak(speech);
    }

    async function tanyaAI() {
    const inputField = document.getElementById('user-input');
    const pesan = inputField.value.trim();
    if (!pesan) return;

    appendMessage('user', pesan);
    inputField.value = '';

    // LOG: Cek apakah fungsi jalan
    console.log("Mengirim pesan:", pesan);

    const formData = new FormData();
    formData.append('pesan', pesan);

    try {
        // Ganti URL ini kalau base_url() kamu bermasalah
        const response = await fetch('<?= base_url("ai/proses") ?>', {
            method: 'POST',
            body: formData
        });

        // LOG: Cek status respon server
        console.log("Status Respon:", response.status);

        if (!response.ok) {
            throw new Error('Server error: ' + response.statusText);
        }

        const data = await response.json();
        console.log("Data diterima:", data);

        if (data.jawaban) {
            appendMessage('ai', data.jawaban);
            playVoice(data.jawaban);
        } else {
            appendMessage('ai', "Server gak ngasih jawaban...");
        }

    } catch (error) {
        console.error("Error Detail:", error);
        appendMessage('ai', "Waduh, koneksi ke server putus nih.");
    }
}

    function mulaiMic() {
        const micBtn = document.getElementById('mic-btn');
        const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
        if (!SpeechRecognition) return alert("Browser tidak support Voice!");

        const rec = new SpeechRecognition();
        rec.lang = 'id-ID';
        rec.onstart = () => micBtn.classList.add('listening');
        rec.onend = () => micBtn.classList.remove('listening');
        rec.onresult = (e) => {
            inputField.value = e.results[0][0].transcript;
            tanyaAI();
        };
        rec.start();
    }

    inputField.addEventListener("keydown", (e) => { if (e.key === "Enter") tanyaAI(); });
    
    // Trigger awal agar suara ter-load
    window.speechSynthesis.getVoices();
</script>
</body>
</html>