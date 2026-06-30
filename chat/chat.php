<!DOCTYPE html>
<html lang="ru" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Демо-чат с памятью фраз</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        * {
            box-sizing: border-box;
        }

        :root,
        [data-theme="light"] {
            --header-bg: #ffffff;
            --header-text: #1a1a2e;
            --header-border: #e0e0e0;
            --header-hover: #f0f0f5;
            --body-bg: #f4f4f8;
            --body-text: #333;
            --accent: #4a6cf7;
            --accent-hover: #3b5de7;
            --panel-bg: #ffffff;
            --panel-border: #dfe3f0;
            --muted-text: #6c757d;
            --message-user-bg: #edf2ff;
            --message-assistant-bg: #f7f8fc;
            --input-bg: #ffffff;
            --input-border: #ccd3e3;
            --memory-btn-border: #c0c0d0;
            --memory-btn-color: #888;
            --memory-badge-bg: #e8eaf6;
            --memory-badge-text: #1a237e;
            --memory-badge-border: #c5cae9;
            --memory-badge-hover: #c5cae9;
        }

        [data-theme="dark"] {
            --header-bg: #1e1e2f;
            --header-text: #e8e8f0;
            --header-border: #2e2e45;
            --header-hover: #2a2a40;
            --body-bg: #12121e;
            --body-text: #ccc;
            --accent: #6b8cff;
            --accent-hover: #5a7bef;
            --panel-bg: #1b1b2b;
            --panel-border: #30304a;
            --muted-text: #9a9ab0;
            --message-user-bg: #26355f;
            --message-assistant-bg: #232338;
            --input-bg: #161625;
            --input-border: #3a3a55;
            --memory-btn-border: #3a3a55;
            --memory-btn-color: #6666aa;
            --memory-badge-bg: #2a2a48;
            --memory-badge-text: #b0b8ff;
            --memory-badge-border: #3a3a65;
            --memory-badge-hover: #35355a;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--body-bg);
            color: var(--body-text);
            transition: background 0.3s, color 0.3s;
        }

        .demo-shell {
            min-height: 100vh;
            padding: 32px 16px;
            display: flex;
            justify-content: center;
        }

        .chat-demo {
            width: min(100%, 880px);
            background: var(--panel-bg);
            border: 1px solid var(--panel-border);
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.12);
            overflow: hidden;
        }

        .chat-demo__header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding: 18px 22px;
            background: var(--header-bg);
            border-bottom: 1px solid var(--header-border);
        }

        .chat-demo__title h1 {
            margin: 0 0 4px;
            font-size: 20px;
            color: var(--header-text);
        }

        .chat-demo__title p {
            margin: 0;
            font-size: 13px;
            color: var(--muted-text);
        }

        .theme-toggle {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 10px;
            border: 1px solid var(--header-border);
            border-radius: 999px;
            background: transparent;
            color: var(--header-text);
            font-size: 13px;
            cursor: pointer;
            transition: background 0.2s, border-color 0.2s;
        }

        .theme-toggle:hover {
            background: var(--header-hover);
        }

        .chat-demo__body {
            padding: 22px;
        }

        .messages {
            display: flex;
            flex-direction: column;
            gap: 12px;
            min-height: 240px;
            margin-bottom: 18px;
        }

        .message {
            max-width: min(100%, 540px);
            padding: 12px 14px;
            border-radius: 16px;
            font-size: 14px;
            line-height: 1.45;
        }

        .message--assistant {
            background: var(--message-assistant-bg);
            border: 1px solid var(--panel-border);
            color: var(--body-text);
        }

        .message--user {
            align-self: flex-end;
            background: var(--message-user-bg);
            color: var(--header-text);
        }

        .composer {
            border: 1px solid var(--panel-border);
            border-radius: 18px;
            padding: 14px 16px 16px;
            background: color-mix(in srgb, var(--panel-bg) 88%, transparent);
        }

        .memory-toolbar {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 6px 0;
        }

        .memory-add-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 12px;
            border: 1.5px solid var(--memory-btn-border, #c0c0d0);
            border-radius: 20px;
            background: transparent;
            color: var(--memory-btn-color, #888);
            font-size: 13px;
            cursor: default;
            opacity: 0.45;
            transition: opacity 0.2s, color 0.2s, border-color 0.2s, background 0.2s;
            user-select: none;
        }

        .memory-add-btn:not(:disabled) {
            color: var(--accent, #4a6cf7);
            border-color: var(--accent, #4a6cf7);
            opacity: 1;
            cursor: pointer;
        }

        .memory-add-btn:not(:disabled):hover {
            background: rgba(74, 108, 247, 0.08);
        }

        .memory-phrases {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            padding: 4px 0 8px;
            min-height: 0;
        }

        .memory-phrases:empty {
            display: none;
        }

        .memory-badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 4px 8px 4px 10px;
            border-radius: 16px;
            background: var(--memory-badge-bg, #e8eaf6);
            color: var(--memory-badge-text, #1a237e);
            border: 1px solid var(--memory-badge-border, #c5cae9);
            font-size: 13px;
            font-weight: 500;
            transition: background 0.15s, transform 0.1s;
            user-select: none;
        }

        .memory-badge:hover {
            background: var(--memory-badge-hover, #c5cae9);
            transform: translateY(-1px);
        }

        .memory-badge__text {
            max-width: 220px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            cursor: pointer;
        }

        .memory-badge__remove {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 16px;
            height: 16px;
            padding: 0;
            border: none;
            border-radius: 50%;
            background: transparent;
            color: var(--memory-badge-text, #1a237e);
            font-size: 14px;
            line-height: 1;
            cursor: pointer;
            opacity: 0.55;
            transition: opacity 0.15s, background 0.15s;
            flex-shrink: 0;
        }

        .memory-badge__remove:hover {
            opacity: 1;
            background: rgba(0, 0, 0, 0.1);
        }

        .input-row {
            display: flex;
            align-items: flex-end;
            gap: 12px;
            margin-top: 8px;
        }

        #chatInput {
            width: 100%;
            min-height: 108px;
            resize: vertical;
            padding: 14px 16px;
            border: 1px solid var(--input-border);
            border-radius: 16px;
            background: var(--input-bg);
            color: var(--body-text);
            font: inherit;
            line-height: 1.5;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s, background 0.3s, color 0.3s;
        }

        #chatInput:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(74, 108, 247, 0.14);
        }

        .send-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-width: 144px;
            min-height: 48px;
            padding: 0 16px;
            border: none;
            border-radius: 16px;
            background: var(--accent);
            color: #fff;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s, transform 0.1s;
        }

        .send-btn:hover {
            background: var(--accent-hover);
        }

        .send-btn:active {
            transform: translateY(1px);
        }

        .composer__hint {
            margin: 10px 0 0;
            font-size: 12px;
            color: var(--muted-text);
        }

        @media (max-width: 720px) {
            .chat-demo__header,
            .chat-demo__body {
                padding: 18px;
            }

            .input-row {
                flex-direction: column;
            }

            .send-btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="demo-shell">
        <section class="chat-demo">
            <header class="chat-demo__header">
                <div class="chat-demo__title">
                    <h1>Демо-чат</h1>
                    <p>Компонент с памятью часто используемых фраз для текущего проекта.</p>
                </div>
                <button class="theme-toggle" id="themeToggle" type="button" aria-label="Переключить тему">
                    <i class="bi bi-circle-half"></i>
                    <span>Тема</span>
                </button>
            </header>

            <div class="chat-demo__body">
                <div class="messages" id="messages">
                    <div class="message message--assistant">Здравствуйте! Сохраните часто используемые фразы и вставляйте их в поле одним кликом.</div>
                    <div class="message message--user">Например: “Сделай краткую сводку по проекту”.</div>
                </div>

                <div class="composer">
                    <div class="memory-toolbar">
                        <button class="memory-add-btn" id="memoryAddBtn" type="button" disabled title="Добавить запрос в память">
                            <i class="bi bi-plus-circle"></i>
                            <span>Добавить в память</span>
                        </button>
                    </div>

                    <div class="memory-phrases" id="memoryPhrases"></div>

                    <div class="input-row">
                        <textarea id="chatInput" placeholder="Введите сообщение или заготовку для памяти фраз..."></textarea>
                        <button class="send-btn" id="sendBtn" type="button">
                            <i class="bi bi-send"></i>
                            <span>Отправить</span>
                        </button>
                    </div>

                    <p class="composer__hint">Фразы сохраняются локально в браузере отдельно для каждого проекта.</p>
                </div>
            </div>
        </section>
    </div>

    <script>
        (function () {
            const projectId = document.documentElement.dataset.projectId
                || document.body.dataset.projectId
                || 'default';
            const LS_KEY = 'memory_phrases_' + projectId;
            const MAX_PHRASES = 30;
            const MAX_PHRASE_LENGTH = 500;

            const html = document.documentElement;
            const inputEl = document.getElementById('chatInput');
            const addBtn = document.getElementById('memoryAddBtn');
            const phrasesEl = document.getElementById('memoryPhrases');
            const sendBtn = document.getElementById('sendBtn');
            const messagesEl = document.getElementById('messages');
            const themeToggle = document.getElementById('themeToggle');

            function loadPhrases() {
                try {
                    const parsed = JSON.parse(localStorage.getItem(LS_KEY));
                    return Array.isArray(parsed)
                        ? parsed.filter((item) => {
                            return typeof item === 'string'
                                && item.trim()
                                && item.trim().length <= MAX_PHRASE_LENGTH;
                        }).slice(0, MAX_PHRASES)
                        : [];
                } catch (error) {
                    return [];
                }
            }

            function savePhrases(phrases) {
                localStorage.setItem(LS_KEY, JSON.stringify(phrases));
            }

            function normalizePhrase(text) {
                return text.trim().toLowerCase();
            }

            function syncAddButtonState() {
                addBtn.disabled = !inputEl.value.trim();
            }

            function renderPhrases() {
                const phrases = loadPhrases();
                phrasesEl.innerHTML = '';

                phrases.forEach((phrase, idx) => {
                    const badge = document.createElement('span');
                    const text = document.createElement('span');
                    const removeBtn = document.createElement('button');

                    badge.className = 'memory-badge';
                    text.className = 'memory-badge__text';
                    text.textContent = phrase;
                    removeBtn.className = 'memory-badge__remove';
                    removeBtn.type = 'button';
                    removeBtn.setAttribute('aria-label', 'Удалить фразу');
                    removeBtn.dataset.idx = String(idx);
                    removeBtn.textContent = '×';

                    text.addEventListener('click', function () {
                        inputEl.value = phrase;
                        inputEl.focus();
                        inputEl.dispatchEvent(new Event('input', { bubbles: true }));
                    });

                    removeBtn.addEventListener('click', function (event) {
                        event.stopPropagation();
                        removePhrase(idx);
                    });

                    badge.appendChild(text);
                    badge.appendChild(removeBtn);
                    phrasesEl.appendChild(badge);
                });
            }

            function addPhrase(text) {
                const trimmed = text.trim();
                if (!trimmed || trimmed.length > MAX_PHRASE_LENGTH) {
                    return;
                }

                const phrases = loadPhrases();
                const normalized = normalizePhrase(trimmed);

                if (phrases.length >= MAX_PHRASES) {
                    return;
                }

                if (phrases.some((phrase) => normalizePhrase(phrase) === normalized)) {
                    return;
                }

                phrases.push(trimmed);
                savePhrases(phrases);
                renderPhrases();
            }

            function removePhrase(idx) {
                const phrases = loadPhrases();
                phrases.splice(idx, 1);
                savePhrases(phrases);
                renderPhrases();
            }

            function appendMessage(text, variant) {
                const message = document.createElement('div');
                message.className = 'message message--' + variant;
                message.textContent = text;
                messagesEl.appendChild(message);
            }

            inputEl.addEventListener('input', syncAddButtonState);

            addBtn.addEventListener('click', function () {
                if (addBtn.disabled) {
                    return;
                }

                addPhrase(inputEl.value);
            });

            sendBtn.addEventListener('click', function () {
                const text = inputEl.value.trim();
                if (!text) {
                    inputEl.focus();
                    return;
                }

                appendMessage(text, 'user');
                appendMessage('Демо-ответ: фраза добавлена в диалог. При необходимости её можно сохранить в память.', 'assistant');
                inputEl.value = '';
                syncAddButtonState();
                inputEl.focus();
            });

            themeToggle.addEventListener('click', function () {
                html.setAttribute('data-theme', html.getAttribute('data-theme') === 'dark' ? 'light' : 'dark');
            });

            renderPhrases();
            syncAddButtonState();
        }());
    </script>
</body>
</html>
