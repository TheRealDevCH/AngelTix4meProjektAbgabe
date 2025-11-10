<p align="center">
  <img src="public/tix4me.svg" width="400" alt="Tix4me Logo">
</p>

<h1 align="center">Tix4me - Ticketing System</h1>

<p align="center">
  <strong>Von Grenchen für Grenchen</strong><br>
  Eine moderne Ticketing-Plattform für Events und Veranstaltungen
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-12.37.0-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
  <img src="https://img.shields.io/badge/Vue.js-3-4FC08D?style=for-the-badge&logo=vue.js&logoColor=white" alt="Vue.js">
  <img src="https://img.shields.io/badge/Inertia.js-1.0-9553E9?style=for-the-badge&logo=inertia&logoColor=white" alt="Inertia.js">
  <img src="https://img.shields.io/badge/Tailwind_CSS-3-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="Tailwind CSS">
</p>

---

## 📋 Über das Projekt

**Tix4me** ist ein modernes, benutzerfreundliches Ticketing-System, das speziell für die Stadt Grenchen entwickelt wurde. Die Plattform ermöglicht es Veranstaltern, Events zu erstellen und Tickets zu verkaufen, während Besucher einfach und sicher Tickets für ihre Lieblingsveranstaltungen erwerben können.

### ✨ Hauptfunktionen

- 🎫 **Event-Management**: Erstellen und verwalten Sie Events mit allen wichtigen Details
- 👤 **Benutzerregistrierung**: Umfassende Registrierung mit E-Mail-Verifizierung
- 🔐 **Sichere Authentifizierung**: Login, Logout und Passwort-Reset-Funktionalität
- 🌙 **Dark Mode**: Automatischer Dark Mode für angenehmes Arbeiten bei Nacht
- 📱 **Responsive Design**: Optimiert für alle Geräte - vom Smartphone bis zum Desktop
- ♿ **Barrierefreiheit**: Hilfe-System für ältere und weniger technikaffine Benutzer
- 🍪 **DSGVO-konform**: Cookie-Consent-Banner mit detaillierten Einstellungen
- 🇩🇪 **Vollständig auf Deutsch**: Alle Texte und Meldungen in deutscher Sprache

### 🎨 Design-Features

- **Glassmorphism-Design**: Moderne, transparente UI-Elemente mit Backdrop-Blur
- **Smooth Animations**: Flüssige Übergänge und Hover-Effekte
- **Gradient-Hintergründe**: Ansprechende Farbverläufe für ein modernes Erscheinungsbild
- **Interaktive Hilfe**: Schritt-für-Schritt-Anleitungen für alle wichtigen Funktionen

---

## 🚀 Technologie-Stack

### Backend
- **Laravel 12.37.0**: Modernes PHP-Framework für robuste Webanwendungen
- **Laravel Breeze**: Authentifizierungs-Starter-Kit mit Vue.js/Inertia.js
- **SQLite**: Leichtgewichtige Datenbank für Entwicklung und Testing
- **Brevo SMTP**: E-Mail-Versand für Verifizierung und Benachrichtigungen

### Frontend
- **Vue.js 3**: Progressive JavaScript-Framework mit Composition API
- **Inertia.js**: SPA-Erlebnis ohne separate API
- **Tailwind CSS**: Utility-First CSS-Framework für schnelles Styling
- **Vite**: Schneller Build-Tool und Dev-Server mit Hot Module Replacement

### Zusätzliche Features
- **OpenStreetMap Nominatim API**: Echtzeit-Adresssuche
- **Password Generator**: Automatische Generierung sicherer Passwörter
- **Password Strength Indicator**: Visuelle Anzeige der Passwortstärke
- **Inter Font**: Moderne, gut lesbare Schriftart von Google Fonts

---

## 📦 Installation

### Voraussetzungen

- PHP >= 8.2
- Composer
- Node.js >= 18
- NPM oder Yarn

### Schritt-für-Schritt-Anleitung

1. **Repository klonen**
   ```bash
   git clone https://github.com/TheRealDevCH/AngelTix4meProjektAbgabe.git
   cd AngelTix4meProjektAbgabe
   ```

2. **PHP-Abhängigkeiten installieren**
   ```bash
   composer install
   ```

3. **Node.js-Abhängigkeiten installieren**
   ```bash
   npm install
   ```

4. **Umgebungsvariablen konfigurieren**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Datenbank migrieren**
   ```bash
   php artisan migrate
   ```

6. **Frontend-Assets kompilieren**
   ```bash
   npm run dev
   ```

7. **Entwicklungsserver starten**
   ```bash
   php artisan serve
   ```

Die Anwendung ist nun unter `http://localhost:8000` erreichbar.

---

## 🗂️ Projektstruktur

```
Tix4meV1/
├── app/                    # Laravel-Anwendungslogik
│   ├── Http/              # Controller und Middleware
│   ├── Models/            # Eloquent-Modelle
│   └── Providers/         # Service Provider
├── database/              # Datenbank-Migrationen und Seeders
│   └── migrations/        # Datenbank-Schema
├── public/                # Öffentlich zugängliche Dateien
│   ├── tix4me.svg        # Hauptlogo
│   └── vongrenchenfuergrenchen.svg
├── resources/             # Frontend-Ressourcen
│   ├── css/              # Stylesheets
│   ├── js/               # Vue.js-Komponenten
│   │   ├── Components/   # Wiederverwendbare Komponenten
│   │   ├── Layouts/      # Layout-Komponenten
│   │   └── Pages/        # Seiten-Komponenten
│   └── views/            # Blade-Templates
├── routes/                # Routing-Definitionen
│   ├── web.php           # Web-Routen
│   └── auth.php          # Authentifizierungs-Routen
└── lang/                  # Sprachdateien
    └── de/               # Deutsche Übersetzungen
```

---

## 📄 Seiten und Funktionen

### Öffentliche Seiten
- **Startseite** (`/`): Übersicht mit Event-Erstellung und Navigation
- **Login** (`/login`): Benutzeranmeldung mit "Angemeldet bleiben"-Option
- **Registrierung** (`/register`): Umfassende Benutzerregistrierung mit:
  - Persönliche Daten (Vorname, Nachname, Geburtsdatum)
  - Kontaktdaten (E-Mail, Telefon)
  - Adresse mit Echtzeit-Suche
  - Passwort mit Stärke-Indikator und Generator
- **Passwort vergessen** (`/forgot-password`): Passwort-Reset per E-Mail

### Rechtliche Seiten
- **Impressum** (`/impressum`): Rechtliche Informationen
- **Datenschutzerklärung** (`/datenschutz`): DSGVO-konforme Datenschutzinformationen
- **AGBs** (`/agbs`): Allgemeine Geschäftsbedingungen

### Authentifizierte Bereiche
- **Dashboard**: Benutzer-Dashboard nach erfolgreicher Anmeldung
- **Profil**: Benutzerprofil-Verwaltung
- **Event-Erstellung**: Formular zum Erstellen neuer Events

---

## 🎯 Besondere Features

### 1. Hilfe-System für ältere Benutzer
- **Toggle-Button**: Unten rechts auf jeder Seite
- **Schritt-für-Schritt-Anleitungen**: Detaillierte Erklärungen für jede Seite
- **Visuelle Fortschrittsanzeige**: Punkte zeigen aktuellen Schritt
- **Tipps und Hinweise**: Zusätzliche Informationen für besseres Verständnis

### 2. Cookie-Consent-Banner
- **DSGVO-konform**: Erfüllt alle rechtlichen Anforderungen
- **Zwei Optionen**: "Nur notwendige" oder "Alle akzeptieren"
- **Detaillierte Informationen**: Ausklappbare Details zu Cookie-Typen
- **Persistente Speicherung**: Einstellung wird in localStorage gespeichert

### 3. Echtzeit-Adresssuche
- **OpenStreetMap Integration**: Suche nach Adressen in der Schweiz
- **Automatische Vervollständigung**: Vorschläge während der Eingabe
- **Automatisches Ausfüllen**: Alle Adressfelder werden automatisch ausgefüllt

### 4. Passwort-Features
- **Stärke-Indikator**: Visuelle Anzeige der Passwortstärke
- **Automatischer Generator**: Generiert sichere Passwörter
- **Anzeigen/Verbergen**: Toggle zum Ein-/Ausblenden des Passworts
- **Lustige Nachrichten**: Motivierende Texte bei starken Passwörtern

---

## 🎨 Design-Prinzipien

### Farbschema
- **Primärfarbe**: Indigo (`#4F46E5`)
- **Sekundärfarben**: Rot, Blau, Grün für Gradienten
- **Dark Mode**: Automatische Anpassung an Systemeinstellungen

### Responsive Breakpoints
- **Mobile**: < 640px
- **Tablet**: 640px - 1024px
- **Desktop**: > 1024px

### Accessibility
- **Keyboard Navigation**: Vollständige Tastaturunterstützung
- **Screen Reader**: Optimiert für Screenreader
- **Kontraste**: WCAG 2.1 AA-konform
- **Fokus-Indikatoren**: Deutlich sichtbare Fokus-Zustände

---

## 🔧 Konfiguration

### E-Mail-Konfiguration (.env)
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp-relay.brevo.com
MAIL_PORT=587
MAIL_USERNAME=your-email@example.com
MAIL_PASSWORD=your-brevo-api-key
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@tix4me.ch
MAIL_FROM_NAME="Tix4me"
```

### Sprache und Lokalisierung
```env
APP_LOCALE=de
APP_FALLBACK_LOCALE=de
APP_FAKER_LOCALE=de_CH
```

---

## 🤝 Mitwirken

Beiträge sind willkommen! Bitte beachten Sie folgende Schritte:

1. Fork das Repository
2. Erstellen Sie einen Feature-Branch (`git checkout -b feature/AmazingFeature`)
3. Committen Sie Ihre Änderungen (`git commit -m 'Add some AmazingFeature'`)
4. Pushen Sie zum Branch (`git push origin feature/AmazingFeature`)
5. Öffnen Sie einen Pull Request

---

## 📝 Lizenz

Dieses Projekt ist unter der MIT-Lizenz lizenziert. Siehe [LICENSE](LICENSE) für weitere Informationen.

---

## 👨‍💻 Entwickler

Entwickelt mit ❤️ für die Stadt Grenchen

**Projekt-Repository**: [https://github.com/TheRealDevCH/AngelTix4meProjektAbgabe](https://github.com/TheRealDevCH/AngelTix4meProjektAbgabe)

---

## 🙏 Danksagungen

- **Laravel**: Für das großartige PHP-Framework
- **Vue.js**: Für das reaktive Frontend-Framework
- **Tailwind CSS**: Für das flexible CSS-Framework
- **OpenStreetMap**: Für die kostenlose Geocoding-API
- **Stadt Grenchen**: Für die Inspiration und Unterstützung

---

<p align="center">
  <a href="https://www.grenchen.ch" target="_blank">
    <img src="public/vongrenchenfuergrenchen.svg" height="80" alt="Von Grenchen für Grenchen">
  </a>
</p>

<p align="center">
  <strong>Tix4me - Ihr Ticketing-Partner für unvergessliche Events</strong>
</p>
