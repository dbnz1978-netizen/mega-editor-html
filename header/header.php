<!DOCTYPE html>
<html lang="ru" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sticky Header</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --header-bg: #ffffff;
            --header-text: #1a1a2e;
            --header-border: #e0e0e0;
            --header-hover: #f0f0f5;
            --header-btn-hover: #e8e8ef;
            --modal-bg: #ffffff;
            --modal-text: #1a1a2e;
            --modal-desc: #6c757d;
            --modal-hover: #f5f5fa;
            --modal-border: #e9ecef;
            --overlay-bg: rgba(0, 0, 0, 0.3);
            --toggle-bg: #e0e0e0;
            --toggle-knob: #ffffff;
            --toggle-icon-active: #f5c542;
            --toggle-icon-inactive: #adb5bd;
            --body-bg: #f4f4f8;
            --body-text: #333;
            --accent: #4a6cf7;
            --accent-hover: #3b5de7;
        }

        [data-theme="dark"] {
            --header-bg: #1e1e2f;
            --header-text: #e8e8f0;
            --header-border: #2e2e45;
            --header-hover: #2a2a40;
            --header-btn-hover: #33334d;
            --modal-bg: #252538;
            --modal-text: #e8e8f0;
            --modal-desc: #9a9ab0;
            --modal-hover: #2e2e48;
            --modal-border: #3a3a55;
            --overlay-bg: rgba(0, 0, 0, 0.6);
            --toggle-bg: #3a3a55;
            --toggle-knob: #1e1e2f;
            --toggle-icon-active: #7b8ec8;
            --toggle-icon-inactive: #555570;
            --body-bg: #12121e;
            --body-text: #ccc;
            --accent: #6b8cff;
            --accent-hover: #5a7bef;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--body-bg);
            color: var(--body-text);
            min-height: 200vh;
            transition: background 0.3s, color 0.3s;
        }

        /* ===== HEADER ===== */
        .header {
            position: sticky;
            top: 0;
            z-index: 1000;
            height: 56px;
            background: var(--header-bg);
            border-bottom: 1px solid var(--header-border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 16px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            transition: background 0.3s, border-color 0.3s;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .header-right {
            display: flex;
            align-items: center;
        }

        /* ===== DROPDOWN BUTTON ===== */
        .dropdown-btn {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            border: none;
            background: transparent;
            color: var(--header-text);
            font-size: 14px;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.2s;
            user-select: none;
        }

        .dropdown-btn:hover {
            background: var(--header-hover);
        }

        .dropdown-btn .arrow {
            font-size: 12px;
            transition: transform 0.25s ease;
        }

        .dropdown-btn.active .arrow {
            transform: rotate(180deg);
        }

        /* ===== ACTION ICONS ===== */
        .action-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border: none;
            background: transparent;
            color: var(--header-text);
            font-size: 18px;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.2s, color 0.2s, transform 0.1s;
            position: relative;
        }

        .action-icon:hover {
            background: var(--header-btn-hover);
        }

        .action-icon:active {
            transform: scale(0.92);
        }

        .action-icon .tooltip {
            position: absolute;
            bottom: -32px;
            left: 50%;
            transform: translateX(-50%) translateY(4px);
            background: var(--header-text);
            color: var(--header-bg);
            font-size: 11px;
            font-weight: 500;
            padding: 4px 8px;
            border-radius: 4px;
            white-space: nowrap;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.2s, transform 0.2s;
            z-index: 100;
        }

        .action-icon:hover .tooltip {
            opacity: 1;
            transform: translateX(-50%) translateY(0);
        }

        .divider {
            width: 1px;
            height: 24px;
            background: var(--header-border);
            margin: 0 4px;
        }

        /* ===== THEME TOGGLE ===== */
        .theme-toggle {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            padding: 4px;
        }

        .theme-toggle .icon {
            font-size: 18px;
            transition: color 0.3s;
        }

        .theme-toggle .icon-sun {
            color: var(--toggle-icon-inactive);
        }

        .theme-toggle .icon-moon {
            color: var(--toggle-icon-inactive);
        }

        [data-theme="light"] .theme-toggle .icon-sun {
            color: var(--toggle-icon-active);
        }

        [data-theme="dark"] .theme-toggle .icon-moon {
            color: var(--toggle-icon-active);
        }

        .toggle-track {
            width: 44px;
            height: 24px;
            background: var(--toggle-bg);
            border-radius: 12px;
            position: relative;
            transition: background 0.3s;
        }

        .toggle-knob {
            position: absolute;
            top: 2px;
            left: 2px;
            width: 20px;
            height: 20px;
            background: var(--toggle-knob);
            border-radius: 50%;
            box-shadow: 0 1px 4px rgba(0,0,0,0.2);
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), background 0.3s;
        }

        [data-theme="dark"] .toggle-knob {
            transform: translateX(20px);
        }

        /* ===== MODAL OVERLAY ===== */
        .modal-overlay {
            position: fixed;
            inset: 0;
            background: var(--overlay-bg);
            z-index: 2000;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.25s ease, visibility 0.25s ease;
        }

        .modal-overlay.open {
            opacity: 1;
            visibility: visible;
        }

        /* ===== MODAL ===== */
        .modal {
            background: var(--modal-bg);
            border-radius: 16px;
            width: 420px;
            max-width: 90vw;
            max-height: 80vh;
            box-shadow: 0 20px 60px rgba(0,0,0,0.15);
            transform: translateY(20px) scale(0.97);
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), background 0.3s;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .modal-overlay.open .modal {
            transform: translateY(0) scale(1);
        }

        .modal-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 20px;
            border-bottom: 1px solid var(--modal-border);
        }

        .modal-header h2 {
            font-size: 17px;
            font-weight: 700;
            color: var(--modal-text);
            margin: 0;
        }

        .modal-close {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            border: none;
            background: transparent;
            color: var(--modal-desc);
            font-size: 20px;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.2s, color 0.2s;
        }

        .modal-close:hover {
            background: var(--modal-hover);
            color: var(--modal-text);
        }

        .modal-body {
            padding: 12px;
            overflow-y: auto;
            flex: 1;
        }

        .modal-item {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 12px 14px;
            border-radius: 12px;
            cursor: pointer;
            transition: background 0.2s;
        }

        .modal-item:hover {
            background: var(--modal-hover);
        }

        .modal-item-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 42px;
            height: 42px;
            border-radius: 10px;
            background: linear-gradient(135deg, var(--accent), var(--accent-hover));
            color: #ffffff;
            font-size: 18px;
            flex-shrink: 0;
        }

        .modal-item-icon.green {
            background: linear-gradient(135deg, #34d399, #059669);
        }

        .modal-item-icon.orange {
            background: linear-gradient(135deg, #fb923c, #ea580c);
        }

        .modal-item-icon.purple {
            background: linear-gradient(135deg, #a78bfa, #7c3aed);
        }

        .modal-item-icon.red {
            background: linear-gradient(135deg, #f87171, #dc2626);
        }

        .modal-item-icon.cyan {
            background: linear-gradient(135deg, #22d3ee, #0891b2);
        }

        .modal-item-text {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .modal-item-title {
            font-size: 14px;
            font-weight: 600;
            color: var(--modal-text);
        }

        .modal-item-desc {
            font-size: 12px;
            color: var(--modal-desc);
            line-height: 1.3;
        }

        /* ===== TOAST ===== */
        .toast-notification {
            position: fixed;
            bottom: 24px;
            left: 50%;
            transform: translateX(-50%) translateY(10px);
            background: var(--header-text);
            color: var(--header-bg);
            padding: 10px 20px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            box-shadow: 0 4px 16px rgba(0,0,0,0.15);
            z-index: 3000;
            opacity: 0;
            transition: opacity 0.3s, transform 0.3s;
        }
    </style>
</head>
<body>

    <!-- HEADER -->
    <header class="header">
        <div class="header-left">
            <!-- Dropdown -->
            <button class="dropdown-btn" id="dropdownBtn" aria-haspopup="true" aria-expanded="false">
                <span>Настройки</span>
                <i class="bi bi-chevron-down arrow"></i>
            </button>

            <div class="divider"></div>

            <!-- Back -->
            <button class="action-icon" id="btnBack">
                <i class="bi bi-arrow-left"></i>
                <span class="tooltip">Шаг назад</span>
            </button>

            <!-- Forward -->
            <button class="action-icon" id="btnForward">
                <i class="bi bi-arrow-right"></i>
                <span class="tooltip">Шаг вперёд</span>
            </button>

            <div class="divider"></div>

            <!-- Save -->
            <button class="action-icon" id="btnSave">
                <i class="bi bi-floppy"></i>
                <span class="tooltip">Сохранить</span>
            </button>
        </div>

        <div class="header-right">
            <!-- Theme Toggle -->
            <div class="theme-toggle" id="themeToggle" role="button" tabindex="0" aria-label="Переключить тему">
                <i class="bi bi-sun-fill icon icon-sun"></i>
                <div class="toggle-track">
                    <div class="toggle-knob"></div>
                </div>
                <i class="bi bi-moon-fill icon icon-moon"></i>
            </div>
        </div>
    </header>

    <!-- MODAL OVERLAY -->
    <div class="modal-overlay" id="modalOverlay">
        <div class="modal" id="modal">
            <div class="modal-header">
                <h2>Настройки</h2>
                <button class="modal-close" id="modalClose">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-item">
                    <div class="modal-item-icon">
                        <i class="bi bi-palette"></i>
                    </div>
                    <div class="modal-item-text">
                        <span class="modal-item-title">Оформление</span>
                        <span class="modal-item-desc">Цвета, шрифты и внешний вид интерфейса</span>
                    </div>
                </div>
                <div class="modal-item">
                    <div class="modal-item-icon green">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <div class="modal-item-text">
                        <span class="modal-item-title">Безопасность</span>
                        <span class="modal-item-desc">Пароли, двухфакторная аутентификация и доступ</span>
                    </div>
                </div>
                <div class="modal-item">
                    <div class="modal-item-icon orange">
                        <i class="bi bi-bell"></i>
                    </div>
                    <div class="modal-item-text">
                        <span class="modal-item-title">Уведомления</span>
                        <span class="modal-item-desc">Push, email и SMS оповещения о событиях</span>
                    </div>
                </div>
                <div class="modal-item">
                    <div class="modal-item-icon purple">
                        <i class="bi bi-gear-wide-connected"></i>
                    </div>
                    <div class="modal-item-text">
                        <span class="modal-item-title">Общие настройки</span>
                        <span class="modal-item-desc">Язык, часовой пояс и региональные параметры</span>
                    </div>
                </div>
                <div class="modal-item">
                    <div class="modal-item-icon red">
                        <i class="bi bi-database"></i>
                    </div>
                    <div class="modal-item-text">
                        <span class="modal-item-title">Данные и хранение</span>
                        <span class="modal-item-desc">Управление файлами, кэш и резервные копии</span>
                    </div>
                </div>
                <div class="modal-item">
                    <div class="modal-item-icon cyan">
                        <i class="bi bi-plug"></i>
                    </div>
                    <div class="modal-item-text">
                        <span class="modal-item-title">Интеграции</span>
                        <span class="modal-item-desc">Подключённые сервисы и API-ключи</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const dropdownBtn = document.getElementById('dropdownBtn');
        const modalOverlay = document.getElementById('modalOverlay');
        const modalClose = document.getElementById('modalClose');
        const themeToggle = document.getElementById('themeToggle');
        const html = document.documentElement;

        // Open modal
        dropdownBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            modalOverlay.classList.add('open');
            dropdownBtn.classList.add('active');
            dropdownBtn.setAttribute('aria-expanded', 'true');
        });

        // Close modal
        function closeModal() {
            modalOverlay.classList.remove('open');
            dropdownBtn.classList.remove('active');
            dropdownBtn.setAttribute('aria-expanded', 'false');
        }

        modalClose.addEventListener('click', closeModal);

        modalOverlay.addEventListener('click', (e) => {
            if (e.target === modalOverlay) {
                closeModal();
            }
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && modalOverlay.classList.contains('open')) {
                closeModal();
            }
        });

        // Theme toggle
        themeToggle.addEventListener('click', () => {
            const current = html.getAttribute('data-theme');
            html.setAttribute('data-theme', current === 'dark' ? 'light' : 'dark');
        });

        themeToggle.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                themeToggle.click();
            }
        });

        // Toast
        function showToast(message) {
            const existing = document.querySelector('.toast-notification');
            if (existing) existing.remove();

            const toast = document.createElement('div');
            toast.className = 'toast-notification';
            toast.textContent = message;
            document.body.appendChild(toast);

            requestAnimationFrame(() => {
                toast.style.opacity = '1';
                toast.style.transform = 'translateX(-50%) translateY(0)';
            });

            setTimeout(() => {
                toast.style.opacity = '0';
                toast.style.transform = 'translateX(-50%) translateY(10px)';
                setTimeout(() => toast.remove(), 300);
            }, 1800);
        }

        // Action buttons
        document.getElementById('btnBack').addEventListener('click', () => showToast('← Шаг назад'));
        document.getElementById('btnForward').addEventListener('click', () => showToast('Шаг вперёд →'));
        document.getElementById('btnSave').addEventListener('click', () => showToast('✓ Сохранено'));

        // Modal item click
        document.querySelectorAll('.modal-item').forEach(item => {
            item.addEventListener('click', () => {
                const title = item.querySelector('.modal-item-title').textContent;
                closeModal();
                setTimeout(() => showToast('Открыто: ' + title), 200);
            });
        });
    </script>
</body>
</html>
