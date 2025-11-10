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

## Über das Projekt

Also, Tix4me soll mal ein Ticketing-System für Grenchen werden. Hab mir gedacht es wär cool wenn die Stadt was eigenes hätte für lokale Events. Hab das ganze mit Angel besprochen und dann einfach mal angefangen.

Am Anfang wollt ich natürlich gleich alles machen - komplettes System mit Ticketverkauf und so. Aber dann hab ich gemerkt das wird zu viel auf einmal. Deswegen hab ich erstmal nur das Frontend gemacht. Das Backend kommt später, im Moment ist halt nur die Oberfläche da, Registrierung, Login und so. Aber immerhin sieht's schonmal gut aus.

### Was ist bisher fertig?

Hab ziemlich viel Zeit ins Design gesteckt muss ich sagen. Wollte das es modern aussieht aber trotzdem einfach zu bedienen ist. Meine Oma kommt mit Computern nicht so klar, und wenn die das versteht dann passts.

Die Registrierung funktioniert schon ganz gut. Man kann sich anmelden, kriegt ne Mail zur Bestätigung, Passwort zurücksetzen geht auch. Hab sogar nen Passwort-Generator eingebaut weil ich selbst immer zu faul bin mir was auszudenken. Die Adresssuche mit OpenStreetMap läuft auch, einfach anfangen zu tippen und es kommen Vorschläge.

Das Hilfe-System find ich persönlich am besten. Hab das mit Angel besprochen weil mir aufgefallen ist das viele Leute nicht wissen wo sie anfangen sollen bei neuen Seiten. Jetzt gibt's unten rechts so nen blauen Button, klickt man drauf wird alles Schritt für Schritt erklärt. Für ältere Leute in Grenchen sicher hilfreich.

Beim Design hab ich mich für so nen Glassmorphism-Look entschieden, sieht halt modern aus. Und responsive ist alles auch, funktioniert also auf dem Handy genauso. War mir wichtig weil die meisten eh nur noch am Smartphone sind.

### Was fehlt noch?

Wie gesagt, Backend fehlt komplett. Also Events erstellen, Tickets verkaufen, Zahlungen - kommt alles noch. Momentan ist es mehr ne schöne Hülle aber die Basis steht. Laravel als Framework war ne gute Wahl denk ich, damit kann ich später gut weitermachen.

Arbeite nebenbei dran wenn Zeit ist. Ist auch n bisschen zum Lernen für mich. Die Idee ist halt das Grenchen irgendwann ne eigene Plattform hat wo Veranstalter ihre Events reinstellen können. Von Grenchen für Grenchen halt.

---

##  Technologie-Stack

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

##  Installation

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

##  Projektstruktur

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

##  Besondere Features

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

##  Design-Prinzipien

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

##  Konfiguration

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

##  Mitwirken

Beiträge sind willkommen! Bitte beachten Sie folgende Schritte:

1. Fork das Repository
2. Erstellen Sie einen Feature-Branch (`git checkout -b feature/AmazingFeature`)
3. Committen Sie Ihre Änderungen (`git commit -m 'Add some AmazingFeature'`)
4. Pushen Sie zum Branch (`git push origin feature/AmazingFeature`)
5. Öffnen Sie einen Pull Request

---

## Lizenz

Dieses Projekt ist unter der MIT-Lizenz lizenziert. Siehe [LICENSE](LICENSE) für weitere Informationen.

---

## Wer steckt dahinter?

Hab das Projekt gestartet weil ich dachte Grenchen könnte ne eigene Ticketing-Lösung gebrauchen. Arbeite dran wenn ich Zeit hab. Alles was ich gemacht hab wurde mit Angel abgesprochen, er ist sozusagen mein Ansprechpartner für das Projekt.

Falls jemand Fragen hat oder Ideen einbringen will, am besten bei Angel melden. Freu mich über Feedback, mach das ganze ja für die Leute hier.

**Ansprechperson**: Angel
**Projekt-Repository**: [https://github.com/TheRealDevCH/AngelTix4meProjektAbgabe](https://github.com/TheRealDevCH/AngelTix4meProjektAbgabe)

Momentan steht halt nur das Frontend. Backend kommt noch, aber ich bleib dran.

---

## Danksagungen

Ein grosses Dankeschön geht an alle, die dieses Projekt möglich gemacht haben. Besonders möchten wir Laravel für das robuste PHP-Framework danken, Vue.js für das reaktive Frontend-Framework, Tailwind CSS für das flexible Styling-System und OpenStreetMap für die kostenlose Geocoding-API. Natürlich gilt unser Dank auch der Stadt Grenchen für die Inspiration und Unterstüzung bei diesem Projekt.

---

<p align="center">
  <a href="https://www.grenchen.ch" target="_blank">
    <img src="public/vongrenchenfuergrenchen.svg" height="80" alt="Von Grenchen für Grenchen">
  </a>
</p>

<p align="center">
  <strong>Tix4me - Dein Ticketing-Partner für unvergessliche Events</strong>
</p>
