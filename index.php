<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Фирменный мотосалон - дизайн-макет</title>
    <style>
        :root {
            --red: #d71920;
            --red-dark: #a90f16;
            --ink: #151515;
            --ink-soft: #2b2b2b;
            --muted: #777;
            --line: #e5e5e5;
            --paper: #ffffff;
            --wash: #f4f4f4;
            --cream: #fafafa;
            --gold: #f5b400;
            --blue: #0f6fbd;
            --green: #188754;
            --shadow: 0 12px 34px rgba(0, 0, 0, 0.12);
            --container: 1180px;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: var(--wash);
            color: var(--ink);
            line-height: 1.5;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button,
        input,
        select {
            font: inherit;
        }

        button {
            cursor: pointer;
        }

        .container {
            width: min(var(--container), calc(100% - 32px));
            margin: 0 auto;
        }

        .top-strip {
            background: #0f0f0f;
            color: #dcdcdc;
            font-size: 12px;
            border-bottom: 3px solid var(--red);
        }

        .top-strip__inner {
            min-height: 36px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
        }

        .top-links,
        .top-actions {
            display: flex;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
        }

        .top-links a,
        .top-actions a {
            color: #dcdcdc;
            transition: color 0.2s ease;
        }

        .top-links a:hover,
        .top-actions a:hover {
            color: #ffffff;
        }

        .cart-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-weight: 700;
        }

        .cart-link::before {
            content: "";
            width: 12px;
            height: 12px;
            border: 2px solid currentColor;
            border-top: none;
            transform: skewX(-10deg);
        }

        .site-header {
            background: var(--paper);
            box-shadow: 0 2px 16px rgba(0, 0, 0, 0.08);
        }

        .header-main {
            display: grid;
            grid-template-columns: 260px 1fr auto;
            align-items: center;
            gap: 28px;
            min-height: 110px;
        }

        .logo {
            display: inline-grid;
            grid-template-columns: 58px auto;
            align-items: center;
            gap: 12px;
            min-width: 0;
        }

        .logo-mark {
            width: 58px;
            aspect-ratio: 1;
            background:
                linear-gradient(135deg, transparent 0 48%, rgba(255, 255, 255, 0.22) 49% 56%, transparent 57%),
                var(--red);
            clip-path: polygon(12% 0, 100% 0, 88% 100%, 0 100%);
            display: grid;
            place-items: center;
            color: #ffffff;
            font-size: 28px;
            font-weight: 900;
            letter-spacing: 0;
        }

        .logo-text {
            min-width: 0;
        }

        .logo-title {
            display: block;
            font-size: 28px;
            line-height: 1;
            font-weight: 900;
            letter-spacing: 0;
            text-transform: uppercase;
        }

        .logo-subtitle {
            display: block;
            margin-top: 6px;
            color: var(--muted);
            font-size: 12px;
            text-transform: uppercase;
        }

        .contact-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(130px, 1fr));
            gap: 14px;
        }

        .contact-card {
            border-left: 3px solid var(--red);
            padding-left: 12px;
        }

        .contact-card span {
            display: block;
            color: var(--muted);
            font-size: 12px;
        }

        .contact-card strong {
            display: block;
            margin-top: 3px;
            font-size: 16px;
            white-space: nowrap;
        }

        .header-cta {
            display: grid;
            gap: 10px;
            justify-items: end;
        }

        .hours {
            color: var(--muted);
            font-size: 12px;
            text-align: right;
            max-width: 180px;
        }

        .callback {
            min-height: 40px;
            border: 0;
            background: var(--red);
            color: #ffffff;
            padding: 0 18px;
            border-radius: 4px;
            font-weight: 700;
            text-transform: uppercase;
            transition: background 0.2s ease, transform 0.2s ease;
        }

        .callback:hover {
            background: var(--red-dark);
            transform: translateY(-1px);
        }

        .main-nav {
            background: #202020;
            color: #ffffff;
        }

        .main-nav__inner {
            display: flex;
            align-items: center;
            min-height: 48px;
            gap: 1px;
            overflow-x: auto;
            scrollbar-width: thin;
        }

        .main-nav a {
            display: inline-flex;
            align-items: center;
            min-height: 48px;
            padding: 0 17px;
            font-size: 13px;
            font-weight: 800;
            text-transform: uppercase;
            background: #202020;
            white-space: nowrap;
            transition: background 0.2s ease;
        }

        .main-nav a:hover,
        .main-nav a.active {
            background: var(--red);
        }

        .mobile-menu {
            display: none;
            width: 44px;
            height: 40px;
            border: 1px solid var(--line);
            background: #ffffff;
            border-radius: 4px;
            place-items: center;
        }

        .mobile-menu span,
        .mobile-menu span::before,
        .mobile-menu span::after {
            content: "";
            display: block;
            width: 20px;
            height: 2px;
            background: var(--ink);
            border-radius: 2px;
            position: relative;
        }

        .mobile-menu span::before {
            position: absolute;
            top: -6px;
        }

        .mobile-menu span::after {
            position: absolute;
            top: 6px;
        }

        .hero-wrap {
            padding: 28px 0 24px;
        }

        .hero-layout {
            display: grid;
            grid-template-columns: 270px 1fr 260px;
            gap: 18px;
            align-items: stretch;
        }

        .side-menu,
        .service-panel,
        .finder,
        .text-panel,
        .news-card,
        .category-card,
        .partner-card {
            background: var(--paper);
            border: 1px solid var(--line);
            border-radius: 6px;
        }

        .side-title {
            min-height: 48px;
            display: flex;
            align-items: center;
            padding: 0 18px;
            background: var(--red);
            color: #ffffff;
            font-weight: 900;
            text-transform: uppercase;
        }

        .side-menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .side-menu a {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            padding: 13px 18px;
            border-bottom: 1px solid var(--line);
            font-size: 14px;
            font-weight: 700;
            transition: color 0.2s ease, background 0.2s ease;
        }

        .side-menu a:hover {
            background: #f9f9f9;
            color: var(--red);
        }

        .side-menu small {
            color: var(--muted);
            font-size: 11px;
            font-weight: 700;
        }

        .hero {
            min-height: 420px;
            border-radius: 6px;
            overflow: hidden;
            color: #ffffff;
            background:
                linear-gradient(120deg, rgba(12, 12, 12, 0.92), rgba(12, 12, 12, 0.52) 48%, rgba(215, 25, 32, 0.86)),
                radial-gradient(circle at 72% 28%, rgba(245, 180, 0, 0.55), transparent 25%),
                #171717;
            position: relative;
            display: grid;
            grid-template-columns: minmax(0, 0.98fr) minmax(300px, 1.02fr);
        }

        .hero::before {
            content: "";
            position: absolute;
            inset: auto -10% -30% 35%;
            height: 62%;
            background: rgba(255, 255, 255, 0.12);
            transform: skewX(-18deg);
        }

        .hero-copy {
            position: relative;
            z-index: 1;
            padding: 46px 36px;
            align-self: center;
        }

        .hero-kicker {
            display: inline-block;
            background: var(--gold);
            color: #1a1a1a;
            font-size: 12px;
            font-weight: 900;
            text-transform: uppercase;
            padding: 6px 10px;
            border-radius: 4px;
            margin-bottom: 18px;
        }

        .hero h1 {
            font-size: clamp(30px, 4vw, 54px);
            line-height: 1.02;
            margin: 0 0 16px;
            text-transform: uppercase;
            letter-spacing: 0;
        }

        .hero p {
            max-width: 430px;
            margin: 0 0 26px;
            color: #ededed;
            font-size: 16px;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 44px;
            padding: 0 20px;
            border-radius: 4px;
            border: 1px solid transparent;
            font-weight: 900;
            text-transform: uppercase;
            font-size: 13px;
        }

        .btn-primary {
            background: var(--red);
            color: #ffffff;
        }

        .btn-primary:hover {
            background: var(--red-dark);
        }

        .btn-light {
            background: #ffffff;
            color: var(--ink);
        }

        .btn-outline {
            background: transparent;
            color: #ffffff;
            border-color: rgba(255, 255, 255, 0.65);
        }

        .vehicle-stage {
            min-height: 340px;
            position: relative;
            align-self: end;
            z-index: 1;
            display: grid;
            place-items: end center;
            padding: 0 26px 28px 0;
        }

        .vehicle-svg {
            width: min(100%, 520px);
            filter: drop-shadow(0 28px 20px rgba(0, 0, 0, 0.45));
        }

        .slide-dots {
            position: absolute;
            left: 36px;
            bottom: 22px;
            display: flex;
            gap: 9px;
        }

        .slide-dots span {
            width: 28px;
            height: 4px;
            background: rgba(255, 255, 255, 0.35);
            border-radius: 2px;
        }

        .slide-dots span.active {
            background: #ffffff;
        }

        .service-panel {
            display: grid;
            grid-template-rows: repeat(3, 1fr);
            overflow: hidden;
        }

        .service-link {
            display: grid;
            gap: 8px;
            align-content: center;
            padding: 22px;
            border-bottom: 1px solid var(--line);
            min-height: 132px;
            position: relative;
            overflow: hidden;
        }

        .service-link:last-child {
            border-bottom: 0;
        }

        .service-link::after {
            content: "";
            position: absolute;
            right: -26px;
            bottom: -26px;
            width: 90px;
            height: 90px;
            border-radius: 50%;
            background: rgba(215, 25, 32, 0.08);
        }

        .service-link strong {
            font-size: 18px;
            line-height: 1.15;
            text-transform: uppercase;
        }

        .service-link span {
            color: var(--muted);
            font-size: 13px;
        }

        .service-link.is-red {
            background: var(--red);
            color: #ffffff;
        }

        .service-link.is-red span {
            color: rgba(255, 255, 255, 0.8);
        }

        .search-band {
            background: #ffffff;
            border-top: 1px solid var(--line);
            border-bottom: 1px solid var(--line);
            padding: 22px 0;
        }

        .search-row {
            display: grid;
            grid-template-columns: 1fr auto;
            gap: 14px;
            align-items: center;
        }

        .part-search {
            display: flex;
            min-height: 48px;
            border: 2px solid #202020;
            border-radius: 4px;
            overflow: hidden;
            background: #ffffff;
        }

        .part-search input {
            flex: 1;
            min-width: 0;
            border: 0;
            padding: 0 18px;
            outline: none;
        }

        .part-search button {
            width: 150px;
            border: 0;
            background: #202020;
            color: #ffffff;
            font-weight: 900;
            text-transform: uppercase;
        }

        .quick-contact {
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 900;
            white-space: nowrap;
        }

        .quick-contact span {
            display: grid;
            place-items: center;
            width: 42px;
            height: 42px;
            border-radius: 50%;
            color: #ffffff;
            background: var(--red);
            font-weight: 900;
        }

        .section {
            padding: 34px 0;
        }

        .section-heading {
            display: flex;
            align-items: end;
            justify-content: space-between;
            gap: 18px;
            margin-bottom: 18px;
        }

        .section-heading h2 {
            margin: 0;
            font-size: 26px;
            line-height: 1.15;
            text-transform: uppercase;
        }

        .section-heading a {
            color: var(--red);
            font-weight: 900;
            text-transform: uppercase;
            font-size: 13px;
        }

        .catalog-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
        }

        .category-card {
            min-height: 245px;
            overflow: hidden;
            display: grid;
            grid-template-rows: 132px 1fr;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .category-card:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow);
        }

        .category-visual {
            background:
                linear-gradient(145deg, rgba(0, 0, 0, 0.72), rgba(0, 0, 0, 0.18)),
                var(--red);
            position: relative;
            display: grid;
            place-items: center;
            overflow: hidden;
        }

        .category-visual.blue {
            background:
                linear-gradient(145deg, rgba(0, 0, 0, 0.7), rgba(15, 111, 189, 0.4)),
                var(--blue);
        }

        .category-visual.green {
            background:
                linear-gradient(145deg, rgba(0, 0, 0, 0.7), rgba(24, 135, 84, 0.4)),
                var(--green);
        }

        .category-visual.gold {
            background:
                linear-gradient(145deg, rgba(0, 0, 0, 0.76), rgba(245, 180, 0, 0.45)),
                #c78a00;
        }

        .category-visual::before {
            content: "";
            position: absolute;
            inset: 16px -34px auto auto;
            width: 110px;
            height: 110px;
            border: 18px solid rgba(255, 255, 255, 0.12);
            border-radius: 50%;
        }

        .mini-vehicle {
            width: 86%;
            max-width: 230px;
            position: relative;
            z-index: 1;
            filter: drop-shadow(0 12px 10px rgba(0, 0, 0, 0.35));
        }

        .category-body {
            padding: 18px;
        }

        .category-body h3 {
            margin: 0 0 8px;
            font-size: 18px;
            text-transform: uppercase;
        }

        .category-body p {
            margin: 0 0 14px;
            color: var(--muted);
            font-size: 13px;
        }

        .category-body span {
            color: var(--red);
            font-weight: 900;
            text-transform: uppercase;
            font-size: 12px;
        }

        .finder-band {
            background: #202020;
            color: #ffffff;
            padding: 36px 0;
        }

        .finder-layout {
            display: grid;
            grid-template-columns: 320px 1fr;
            gap: 22px;
            align-items: stretch;
        }

        .finder-copy h2 {
            margin: 0 0 12px;
            font-size: 28px;
            line-height: 1.1;
            text-transform: uppercase;
        }

        .finder-copy p {
            color: #cacaca;
            margin: 0;
        }

        .finder {
            border: 0;
            padding: 20px;
            color: var(--ink);
            display: grid;
            grid-template-columns: repeat(3, 1fr) auto;
            gap: 12px;
            align-items: end;
        }

        .field label {
            display: block;
            margin-bottom: 7px;
            color: var(--muted);
            font-size: 12px;
            font-weight: 900;
            text-transform: uppercase;
        }

        .field select {
            width: 100%;
            min-height: 42px;
            border: 1px solid var(--line);
            border-radius: 4px;
            background: #ffffff;
            color: var(--ink);
            padding: 0 12px;
            outline: none;
        }

        .finder button {
            min-height: 42px;
            border: 0;
            border-radius: 4px;
            background: var(--red);
            color: #ffffff;
            padding: 0 24px;
            font-weight: 900;
            text-transform: uppercase;
        }

        .promo-grid {
            display: grid;
            grid-template-columns: 1.3fr 0.9fr 0.9fr;
            gap: 16px;
        }

        .promo-card {
            min-height: 190px;
            border-radius: 6px;
            padding: 24px;
            color: #ffffff;
            overflow: hidden;
            position: relative;
            display: grid;
            align-content: end;
            background:
                linear-gradient(135deg, rgba(0, 0, 0, 0.88), rgba(0, 0, 0, 0.28)),
                var(--red);
        }

        .promo-card.dark {
            background:
                linear-gradient(135deg, rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.25)),
                #2a2a2a;
        }

        .promo-card.blue {
            background:
                linear-gradient(135deg, rgba(0, 0, 0, 0.82), rgba(15, 111, 189, 0.32)),
                var(--blue);
        }

        .promo-card::before {
            content: "";
            position: absolute;
            top: -70px;
            right: -45px;
            width: 190px;
            height: 190px;
            border: 26px solid rgba(255, 255, 255, 0.13);
            border-radius: 50%;
        }

        .promo-card h3 {
            position: relative;
            margin: 0 0 8px;
            font-size: 24px;
            line-height: 1.08;
            text-transform: uppercase;
        }

        .promo-card p {
            position: relative;
            max-width: 450px;
            margin: 0;
            color: rgba(255, 255, 255, 0.82);
        }

        .content-grid {
            display: grid;
            grid-template-columns: 1.25fr 0.75fr;
            gap: 20px;
        }

        .text-panel {
            padding: 28px;
        }

        .text-panel h2 {
            margin: 0 0 16px;
            font-size: 26px;
            text-transform: uppercase;
        }

        .text-panel p {
            color: #555;
            margin: 0 0 12px;
        }

        .benefits {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
            margin-top: 20px;
        }

        .benefit {
            padding: 15px;
            border: 1px solid var(--line);
            border-radius: 6px;
            background: #fbfbfb;
        }

        .benefit strong {
            display: block;
            font-size: 22px;
            color: var(--red);
        }

        .benefit span {
            display: block;
            color: var(--muted);
            font-size: 12px;
            text-transform: uppercase;
            font-weight: 800;
        }

        .news-stack {
            display: grid;
            gap: 14px;
        }

        .news-card {
            padding: 18px;
        }

        .news-card time {
            display: block;
            color: var(--red);
            font-size: 12px;
            font-weight: 900;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .news-card h3 {
            margin: 0 0 8px;
            font-size: 17px;
            line-height: 1.24;
        }

        .news-card p {
            margin: 0;
            color: var(--muted);
            font-size: 13px;
        }

        .partner-band {
            background: #ffffff;
            border-top: 1px solid var(--line);
            border-bottom: 1px solid var(--line);
        }

        .partner-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
        }

        .partner-card {
            padding: 18px;
            display: grid;
            grid-template-columns: 42px 1fr;
            gap: 12px;
            align-items: center;
        }

        .partner-icon {
            width: 42px;
            height: 42px;
            border-radius: 6px;
            display: grid;
            place-items: center;
            background: #f0f0f0;
            color: var(--red);
            font-weight: 900;
        }

        .partner-caption {
            display: block;
            min-width: 0;
        }

        .partner-card strong {
            display: block;
            font-size: 15px;
            text-transform: uppercase;
        }

        .partner-caption span {
            display: block;
            color: var(--muted);
            font-size: 12px;
        }

        .footer {
            background: #161616;
            color: #efefef;
            padding-top: 38px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 1.2fr 0.8fr 0.8fr 1fr;
            gap: 30px;
            padding-bottom: 34px;
        }

        .footer h3 {
            margin: 0 0 14px;
            color: #ffffff;
            font-size: 15px;
            text-transform: uppercase;
        }

        .footer p,
        .footer a {
            color: #bdbdbd;
            font-size: 13px;
        }

        .footer ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: grid;
            gap: 8px;
        }

        .footer a:hover {
            color: #ffffff;
        }

        .footer-logo {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 16px;
            font-size: 26px;
            font-weight: 900;
            text-transform: uppercase;
        }

        .footer-logo span {
            width: 34px;
            height: 34px;
            display: grid;
            place-items: center;
            background: var(--red);
            clip-path: polygon(12% 0, 100% 0, 88% 100%, 0 100%);
        }

        .footer-bottom {
            border-top: 1px solid #303030;
            min-height: 54px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            color: #999;
            font-size: 12px;
        }

        .to-top {
            width: 38px;
            height: 38px;
            border-radius: 4px;
            background: var(--red);
            color: #ffffff;
            display: grid;
            place-items: center;
            font-weight: 900;
        }

        .toast {
            position: fixed;
            left: 50%;
            bottom: 22px;
            transform: translateX(-50%) translateY(18px);
            background: #151515;
            color: #ffffff;
            border-radius: 4px;
            padding: 12px 18px;
            font-size: 13px;
            font-weight: 800;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.22s ease, transform 0.22s ease;
            z-index: 20;
            box-shadow: var(--shadow);
        }

        .toast.show {
            opacity: 1;
            transform: translateX(-50%) translateY(0);
        }

        @media (max-width: 1120px) {
            .header-main {
                grid-template-columns: 1fr auto;
                gap: 20px;
                padding: 18px 0;
            }

            .contact-grid {
                grid-column: 1 / -1;
                order: 3;
            }

            .hero-layout {
                grid-template-columns: 240px 1fr;
            }

            .service-panel {
                grid-column: 1 / -1;
                grid-template-columns: repeat(3, 1fr);
                grid-template-rows: none;
            }

            .service-link {
                border-bottom: 0;
                border-right: 1px solid var(--line);
            }

            .service-link:last-child {
                border-right: 0;
            }

            .catalog-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .finder-layout,
            .content-grid {
                grid-template-columns: 1fr;
            }

            .finder {
                grid-template-columns: repeat(3, 1fr);
            }

            .finder button {
                grid-column: 1 / -1;
            }

            .partner-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 780px) {
            .top-strip__inner,
            .footer-bottom {
                align-items: flex-start;
                flex-direction: column;
                padding: 10px 0;
            }

            .top-links {
                gap: 10px 14px;
            }

            .header-main {
                grid-template-columns: auto 1fr auto;
                min-height: auto;
            }

            .logo {
                grid-template-columns: 46px auto;
            }

            .logo-mark {
                width: 46px;
                font-size: 22px;
            }

            .logo-title {
                font-size: 21px;
            }

            .header-cta {
                display: none;
            }

            .contact-grid {
                grid-template-columns: 1fr;
            }

            .mobile-menu {
                display: grid;
                justify-self: end;
            }

            .main-nav {
                display: none;
            }

            .main-nav.open {
                display: block;
            }

            .main-nav__inner {
                flex-direction: column;
                align-items: stretch;
                padding: 8px 0;
            }

            .main-nav a {
                width: 100%;
                min-height: 42px;
            }

            .hero-layout {
                grid-template-columns: 1fr;
            }

            .hero {
                order: -1;
            }

            .hero {
                grid-template-columns: 1fr;
                min-height: auto;
            }

            .hero-copy {
                padding: 32px 24px;
            }

            .vehicle-stage {
                min-height: 230px;
                padding: 0 18px 22px;
            }

            .slide-dots {
                left: 24px;
            }

            .service-panel {
                grid-template-columns: 1fr;
            }

            .service-link {
                border-right: 0;
                border-bottom: 1px solid var(--line);
            }

            .search-row,
            .promo-grid {
                grid-template-columns: 1fr;
            }

            .quick-contact {
                justify-content: space-between;
            }

            .part-search {
                flex-direction: column;
            }

            .part-search input {
                min-height: 46px;
            }

            .part-search button {
                width: 100%;
                min-height: 44px;
            }

            .finder {
                grid-template-columns: 1fr;
            }

            .catalog-grid,
            .partner-grid,
            .footer-grid,
            .benefits {
                grid-template-columns: 1fr;
            }

            .section-heading {
                align-items: flex-start;
                flex-direction: column;
            }
        }

        @media (max-width: 460px) {
            .container {
                width: min(var(--container), calc(100% - 22px));
            }

            .logo-subtitle,
            .hours {
                display: none;
            }

            .hero h1,
            .finder-copy h2,
            .section-heading h2,
            .text-panel h2 {
                font-size: 24px;
            }

            .hero-actions {
                display: grid;
            }

            .btn {
                width: 100%;
            }

            .text-panel {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="top-strip">
        <div class="container top-strip__inner">
            <nav class="top-links" aria-label="Информационное меню">
                <a href="#">Главная</a>
                <a href="#">О нас</a>
                <a href="#">Новости</a>
                <a href="#">Контакты</a>
                <a href="#">Доставка</a>
                <a href="#">Оплата</a>
                <a href="#">Вакансии</a>
            </nav>
            <div class="top-actions">
                <a href="#">Рассрочка 0%</a>
                <a href="#">Распродажа</a>
                <a class="cart-link" href="#">Корзина 0</a>
            </div>
        </div>
    </div>

    <header class="site-header" id="top">
        <div class="container header-main">
            <a class="logo" href="#" aria-label="Главная страница">
                <span class="logo-mark">S</span>
                <span class="logo-text">
                    <span class="logo-title">Stels Moto</span>
                    <span class="logo-subtitle">Фирменный мотосалон</span>
                </span>
            </a>

            <div class="contact-grid" aria-label="Телефоны">
                <div class="contact-card">
                    <span>Отдел продаж техники</span>
                    <strong>+7 495 226-01-69</strong>
                </div>
                <div class="contact-card">
                    <span>Отдел запчастей</span>
                    <strong>+7 495 210-97-65</strong>
                </div>
                <div class="contact-card">
                    <span>Отдел сервиса</span>
                    <strong>+7 909 944-50-84</strong>
                </div>
            </div>

            <div class="header-cta">
                <div class="hours">Пн-Пт 9:00 - 19:00<br>Сб 9:00 - 16:00</div>
                <button class="callback" type="button" data-toast="Заявка на обратный звонок">Обратный звонок</button>
            </div>

            <button class="mobile-menu" type="button" aria-label="Открыть меню" aria-controls="mainNav">
                <span></span>
            </button>
        </div>

        <nav class="main-nav" id="mainNav" aria-label="Основные категории">
            <div class="container main-nav__inner">
                <a class="active" href="#">Квадроциклы STELS</a>
                <a href="#">Квадроциклы SEGWAY</a>
                <a href="#">Снегоходы</a>
                <a href="#">UTV / SSV</a>
                <a href="#">Мотоциклы</a>
                <a href="#">Аксессуары</a>
                <a href="#">Запчасти</a>
            </div>
        </nav>
    </header>

    <main>
        <section class="hero-wrap">
            <div class="container hero-layout">
                <aside class="side-menu" aria-label="Категории">
                    <div class="side-title">Категория</div>
                    <ul>
                        <li><a href="#">Квадроциклы STELS <small>ATV</small></a></li>
                        <li><a href="#">Квадроциклы SEGWAY <small>ATV</small></a></li>
                        <li><a href="#">Снегоходы STELS <small>SNOW</small></a></li>
                        <li><a href="#">Мотовездеходы <small>UTV</small></a></li>
                        <li><a href="#">Мотоциклы STELS <small>MOTO</small></a></li>
                        <li><a href="#">Каталоги запчастей <small>PDF</small></a></li>
                        <li><a href="#">Мотоаксессуары <small>SHOP</small></a></li>
                        <li><a href="#">Распродажа <small>%</small></a></li>
                    </ul>
                </aside>

                <section class="hero" aria-label="Промо">
                    <div class="hero-copy">
                        <span class="hero-kicker">Рассрочка 0%</span>
                        <h1>Мототехника для города и бездорожья</h1>
                        <p>Витрина техники, запчастей и сервиса в плотном стиле интернет-магазина: крупный промо-блок, быстрые категории и акцентные предложения.</p>
                        <div class="hero-actions">
                            <a class="btn btn-primary" href="#">Смотреть каталог</a>
                            <a class="btn btn-outline" href="#">Подобрать запчасть</a>
                        </div>
                    </div>
                    <div class="vehicle-stage" aria-hidden="true">
                        <svg class="vehicle-svg" viewBox="0 0 620 330" role="img">
                            <defs>
                                <linearGradient id="bodyRed" x1="0" y1="0" x2="1" y2="1">
                                    <stop offset="0" stop-color="#f5484e"/>
                                    <stop offset="1" stop-color="#a90f16"/>
                                </linearGradient>
                                <linearGradient id="metal" x1="0" y1="0" x2="1" y2="1">
                                    <stop offset="0" stop-color="#f8f8f8"/>
                                    <stop offset="1" stop-color="#8b8b8b"/>
                                </linearGradient>
                            </defs>
                            <ellipse cx="318" cy="281" rx="238" ry="24" fill="rgba(0,0,0,0.24)"/>
                            <circle cx="160" cy="240" r="62" fill="#101010"/>
                            <circle cx="160" cy="240" r="39" fill="#303030"/>
                            <circle cx="160" cy="240" r="17" fill="url(#metal)"/>
                            <circle cx="470" cy="240" r="62" fill="#101010"/>
                            <circle cx="470" cy="240" r="39" fill="#303030"/>
                            <circle cx="470" cy="240" r="17" fill="url(#metal)"/>
                            <path d="M103 205h88l42-62h166l53 62h79l17 32h-80l-46-51H240l-38 51h-95z" fill="#232323"/>
                            <path d="M214 133l44-52h112l70 53 48 56H189z" fill="url(#bodyRed)"/>
                            <path d="M275 88h80l43 37H242z" fill="#202020"/>
                            <path d="M381 129l94 18 39 45h-92z" fill="#f5b400"/>
                            <path d="M206 142h72l-26 45H159z" fill="#ffffff" opacity="0.18"/>
                            <path d="M438 139l54 10 30 36h-64z" fill="#ffffff" opacity="0.18"/>
                            <path d="M345 74l54-27 83 9 6 18-78 8-52 28z" fill="#1b1b1b"/>
                            <path d="M148 181l54-14 18 20-66 18z" fill="#d71920"/>
                            <path d="M492 178l54 22-10 24-74-30z" fill="#d71920"/>
                        </svg>
                    </div>
                    <div class="slide-dots" aria-hidden="true">
                        <span class="active"></span>
                        <span></span>
                        <span></span>
                    </div>
                </section>

                <aside class="service-panel" aria-label="Быстрые предложения">
                    <a class="service-link is-red" href="#">
                        <strong>Рассчитать кредит</strong>
                        <span>Быстрый переход к условиям покупки</span>
                    </a>
                    <a class="service-link" href="#">
                        <strong>Доставка по России</strong>
                        <span>Аккуратная карточка сервиса</span>
                    </a>
                    <a class="service-link" href="#">
                        <strong>Сервис и ремонт</strong>
                        <span>Отдельный акцентный блок</span>
                    </a>
                </aside>
            </div>
        </section>

        <section class="search-band" aria-label="Поиск запчастей">
            <div class="container search-row">
                <form class="part-search">
                    <input type="search" placeholder="Поиск по артикулу и коду запчастей" aria-label="Поиск по артикулу">
                    <button type="submit">Найти</button>
                </form>
                <div class="quick-contact">
                    <span>?</span>
                    <div>Нужна помощь с подбором</div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="section-heading">
                    <h2>Популярные категории</h2>
                    <a href="#">Весь каталог</a>
                </div>
                <div class="catalog-grid">
                    <a class="category-card" href="#">
                        <div class="category-visual">
                            <svg class="mini-vehicle" viewBox="0 0 360 170" aria-hidden="true">
                                <circle cx="80" cy="124" r="34" fill="#111"/>
                                <circle cx="276" cy="124" r="34" fill="#111"/>
                                <path d="M48 108h69l31-44h95l46 44h34l10 22h-58l-37-36h-91l-29 36H45z" fill="#2c2c2c"/>
                                <path d="M134 57h96l54 44H104z" fill="#ffffff"/>
                                <path d="M150 64h67l35 27H130z" fill="#d71920"/>
                            </svg>
                        </div>
                        <div class="category-body">
                            <h3>Квадроциклы</h3>
                            <p>Утилитарные и прогулочные модели для разных сценариев.</p>
                            <span>Перейти</span>
                        </div>
                    </a>
                    <a class="category-card" href="#">
                        <div class="category-visual blue">
                            <svg class="mini-vehicle" viewBox="0 0 360 170" aria-hidden="true">
                                <path d="M34 126c64 8 128 9 193 1 36-4 60-8 91-18l15 20c-38 14-86 22-147 24-55 2-105-2-151-12z" fill="#111"/>
                                <path d="M84 93h118l39-36 56 33-29 26H63z" fill="#ffffff"/>
                                <path d="M130 64h78l34 26H91z" fill="#0f6fbd"/>
                                <path d="M249 91l45 5 23 18h-71z" fill="#f5b400"/>
                            </svg>
                        </div>
                        <div class="category-body">
                            <h3>Снегоходы</h3>
                            <p>Большие промо-карточки под сезонные предложения.</p>
                            <span>Перейти</span>
                        </div>
                    </a>
                    <a class="category-card" href="#">
                        <div class="category-visual green">
                            <svg class="mini-vehicle" viewBox="0 0 360 170" aria-hidden="true">
                                <circle cx="84" cy="125" r="30" fill="#111"/>
                                <circle cx="272" cy="125" r="30" fill="#111"/>
                                <path d="M57 107h60l20-54h96l55 54h30l10 22h-58l-30-35h-91l-24 35H55z" fill="#292929"/>
                                <path d="M142 48h78l62 51H125z" fill="#ffffff"/>
                                <path d="M157 56h56l38 32h-105z" fill="#188754"/>
                            </svg>
                        </div>
                        <div class="category-body">
                            <h3>Мотовездеходы</h3>
                            <p>Блок для UTV и SSV с визуальной подачей техники.</p>
                            <span>Перейти</span>
                        </div>
                    </a>
                    <a class="category-card" href="#">
                        <div class="category-visual gold">
                            <svg class="mini-vehicle" viewBox="0 0 360 170" aria-hidden="true">
                                <circle cx="102" cy="126" r="30" fill="#111"/>
                                <circle cx="256" cy="126" r="30" fill="#111"/>
                                <path d="M88 100l47-21 31-33h62l47 38 31 10-12 21h-76l-28-28-38 27H88z" fill="#ffffff"/>
                                <path d="M150 59h59l34 25-58 4-56 23z" fill="#d71920"/>
                                <path d="M226 50l35-20 48 11 5 17-44-5-34 18z" fill="#171717"/>
                            </svg>
                        </div>
                        <div class="category-body">
                            <h3>Мотоциклы</h3>
                            <p>Карточка направления с быстрым переходом в каталог.</p>
                            <span>Перейти</span>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <section class="finder-band">
            <div class="container finder-layout">
                <div class="finder-copy">
                    <h2>Подбор оригинальных запчастей</h2>
                    <p>Структура повторяет сценарий: выбрать тип транспорта, модель и нужную группу деталей.</p>
                </div>
                <form class="finder">
                    <div class="field">
                        <label for="transport">01. Тип транспорта</label>
                        <select id="transport">
                            <option>Выберите тип транспорта</option>
                            <option>для скутеров</option>
                            <option>для мотоциклов</option>
                            <option>для квадроциклов</option>
                            <option>для снегоходов</option>
                        </select>
                    </div>
                    <div class="field">
                        <label for="model">02. Модель</label>
                        <select id="model">
                            <option>Выберите модель</option>
                            <option>ATV 650</option>
                            <option>UTV 800</option>
                            <option>Enduro 250</option>
                        </select>
                    </div>
                    <div class="field">
                        <label for="part">03. Запчасть</label>
                        <select id="part">
                            <option>Выберите запчасть</option>
                            <option>Двигатель</option>
                            <option>Подвеска</option>
                            <option>Тормозная система</option>
                        </select>
                    </div>
                    <button type="submit">Найти</button>
                </form>
            </div>
        </section>

        <section class="section">
            <div class="container promo-grid">
                <a class="promo-card" href="#">
                    <h3>Сезонные предложения</h3>
                    <p>Широкий баннер под акции, распродажи и спецусловия.</p>
                </a>
                <a class="promo-card dark" href="#">
                    <h3>Медиа партнеры</h3>
                    <p>Отдельная зона под внешние каналы и обзоры.</p>
                </a>
                <a class="promo-card blue" href="#">
                    <h3>Способы оплаты</h3>
                    <p>Банковские карты, рассрочка и безналичный расчет.</p>
                </a>
            </div>
        </section>

        <section class="section">
            <div class="container content-grid">
                <article class="text-panel">
                    <h2>Уважаемые покупатели</h2>
                    <p>Этот блок повторяет смысловую роль главной страницы интернет-магазина: коротко объяснить ассортимент, условия покупки и возможность получить персональное предложение.</p>
                    <p>В дизайне оставлена плотная подача, много навигации, контрастные промо-зоны и понятные маршруты к каталогу, доставке, оплате и сервису.</p>
                    <div class="benefits">
                        <div class="benefit">
                            <strong>24/7</strong>
                            <span>Онлайн каталог</span>
                        </div>
                        <div class="benefit">
                            <strong>0%</strong>
                            <span>Рассрочка</span>
                        </div>
                        <div class="benefit">
                            <strong>RU</strong>
                            <span>Доставка</span>
                        </div>
                    </div>
                </article>

                <aside class="news-stack" aria-label="Новости">
                    <div class="section-heading">
                        <h2>Новости</h2>
                        <a href="#">Все новости</a>
                    </div>
                    <article class="news-card">
                        <time datetime="2026-05-29">29 мая 2026</time>
                        <h3>Большое обновление витрины техники</h3>
                        <p>Карточка новости с плотным заголовком и коротким описанием.</p>
                    </article>
                    <article class="news-card">
                        <time datetime="2026-04-12">12 апреля 2026</time>
                        <h3>Новые условия доставки по регионам</h3>
                        <p>Вторая новость сохраняет ритм правой колонки.</p>
                    </article>
                    <article class="news-card">
                        <time datetime="2026-03-18">18 марта 2026</time>
                        <h3>Подбор запчастей стал быстрее</h3>
                        <p>Небольшой текст удерживает карточки компактными.</p>
                    </article>
                </aside>
            </div>
        </section>

        <section class="section partner-band">
            <div class="container">
                <div class="section-heading">
                    <h2>Информационные разделы</h2>
                    <a href="#">Карта сайта</a>
                </div>
                <div class="partner-grid">
                    <a class="partner-card" href="#">
                        <span class="partner-icon">i</span>
                        <span class="partner-caption"><strong>Все о технике</strong><span>Статьи и обзоры</span></span>
                    </a>
                    <a class="partner-card" href="#">
                        <span class="partner-icon">%</span>
                        <span class="partner-caption"><strong>Акции</strong><span>Спецпредложения</span></span>
                    </a>
                    <a class="partner-card" href="#">
                        <span class="partner-icon">P</span>
                        <span class="partner-caption"><strong>Оплата</strong><span>Разные способы</span></span>
                    </a>
                    <a class="partner-card" href="#">
                        <span class="partner-icon">M</span>
                        <span class="partner-caption"><strong>Наш магазин</strong><span>Адрес и контакты</span></span>
                    </a>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container footer-grid">
            <div>
                <div class="footer-logo"><span>S</span> Stels Moto</div>
                <p>Дизайн-макет главной страницы мотосалона: шапка, каталог, подбор запчастей, промо-блоки и футер.</p>
            </div>
            <div>
                <h3>Информация</h3>
                <ul>
                    <li><a href="#">О нас</a></li>
                    <li><a href="#">Новости</a></li>
                    <li><a href="#">Пресса о нас</a></li>
                    <li><a href="#">Контакты</a></li>
                    <li><a href="#">Карта сайта</a></li>
                </ul>
            </div>
            <div>
                <h3>Категории</h3>
                <ul>
                    <li><a href="#">Мототехника</a></li>
                    <li><a href="#">Мотоаксессуары</a></li>
                    <li><a href="#">Запчасти</a></li>
                    <li><a href="#">Доставка</a></li>
                    <li><a href="#">Кредит</a></li>
                </ul>
            </div>
            <div>
                <h3>Контакты</h3>
                <p>Пн-Пт 9:00 - 19:00<br>Сб 9:00 - 16:00<br>Вс выходной</p>
                <p>+7 495 226-01-69<br>+7 495 226-00-86</p>
                <p>г. Москва, Волоколамское шоссе</p>
            </div>
        </div>
        <div class="container footer-bottom">
            <span>© 2026 - дизайн-макет для локального проекта.</span>
            <a class="to-top" href="#top" aria-label="Наверх">↑</a>
        </div>
    </footer>

    <div class="toast" id="toast" role="status" aria-live="polite"></div>

    <script>
        const menuButton = document.querySelector('.mobile-menu');
        const mainNav = document.querySelector('.main-nav');
        const toast = document.getElementById('toast');

        menuButton.addEventListener('click', () => {
            mainNav.classList.toggle('open');
        });

        document.querySelectorAll('form').forEach((form) => {
            form.addEventListener('submit', (event) => {
                event.preventDefault();
                showToast('Форма работает как демо-элемент дизайна');
            });
        });

        document.querySelectorAll('[data-toast]').forEach((button) => {
            button.addEventListener('click', () => showToast(button.dataset.toast));
        });

        function showToast(message) {
            toast.textContent = message;
            toast.classList.add('show');
            clearTimeout(window.__toastTimer);
            window.__toastTimer = setTimeout(() => toast.classList.remove('show'), 1800);
        }
    </script>
</body>
</html>
