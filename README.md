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

Hey Angel, hier ist also das Projekt, von dem ich dir erzählt habe! Tix4me soll mal ein Ticketing-System für Grenchen werden. Die Idee kam mir, als ich gemerkt habe, dass es hier keine richtig gute lokale Lösung für Events gibt. Also dachte ich mir, ich bau einfach selbst eine.

Ich muss ehrlich sagen, am Anfang hatte ich ziemlich grosse Pläne. Ich wollte ein komplettes Ticketing-System mit allem Drum und Dran. Aber wie das so ist bei Projekten - man fängt irgendwo an. Deshalb hab ich mich erstmal voll aufs Frontend konzentriert. Das Backend mit der ganzen Event-Verwaltung, Ticketverkauf und Zahlungsabwicklung kommt später. Im Moment siehst du hier also hauptsächlich die Benutzeroberfläche, die Registrierung, das Login-System und all die schönen Design-Elemente, die ich mir ausgedacht hab.

### Was hab ich bisher gemacht?

Ehrlich gesagt hab ich ziemlich viel Zeit ins Design gesteckt. Ich wollte, dass sich die Seite modern anfühlt, aber gleichzeitig nicht zu kompliziert ist. Gerade für ältere Leute sollte es einfach sein - meine Oma zum Beispiel ist nicht so der Computer-Profi, und ich wollte, dass auch sie damit klarkommt.

Das Registrierungssystem ist schon ziemlich ausgereift. Man kann sich anmelden, bekommt eine Bestätigungsmail, und das ganze Passwort-Zeug funktioniert auch. Ich hab sogar einen Passwort-Generator eingebaut, weil ich selbst immer zu faul bin, mir sichere Passwörter auszudenken. Und die Adresssuche mit OpenStreetMap hab ich auch integriert - funktioniert super, man muss nur anfangen zu tippen und die Vorschläge kommen automatisch.

Was mir persönlich am besten gefällt, ist das Hilfe-System. Das war eigentlich meine Idee, weil ich gemerkt hab, dass viele Leute bei neuen Webseiten erstmal nicht wissen, wo sie anfangen sollen. Jetzt gibt es diesen kleinen blauen Button unten rechts, und wenn man draufklickt, führt das System einen Schritt für Schritt durch alles. Ich glaube, gerade für die Zielgruppe in Grenchen ist das perfekt.

Das Design hab ich bewusst hell und freundlich gehalten, mit diesem Glassmorphism-Effekt, den man gerade überall sieht. Sieht einfach gut aus, finde ich. Und natürlich funktioniert alles auch auf dem Handy - das war mir wichtig, weil die meisten Leute heutzutage eh nur noch am Smartphone sind.

### Was kommt noch?

Wie gesagt, das Backend fehlt noch komplett. Also die ganze Logik für Events erstellen, Tickets verkaufen, Zahlungen abwickeln - das kommt alles noch. Im Moment ist es eher eine schöne Hülle, aber die Grundlage steht. Ich hab Laravel als Framework genommen, weil das einfach solide ist und ich damit später gut weiterbauen kann.

Ich arbeite nebenbei daran, wenn ich Zeit hab. Es ist ein bisschen ein Lernprojekt für mich, aber ich zieh es durch. Die Vision ist, dass Grenchen irgendwann seine eigene Ticketing-Plattform hat, wo lokale Veranstalter ihre Events einstellen können und die Leute aus der Region ihre Tickets kaufen können. Von Grenchen für Grenchen eben.

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

Das Projekt hab ich gestartet, weil ich Grenchen eine eigene Ticketing-Lösung geben wollte. Ich arbeite daran, wenn ich Zeit hab. Ist noch ein langer Weg, aber ich bleib dran.

Falls du Fragen hast, Ideen einbringen willst oder einfach mal quatschen möchtest über das Projekt, meld dich gerne bei Angel. Er ist meine Ansprechperson für dieses Projekt und kann dir weiterhelfen. Ich freu mich immer über Feedback, gerade weil ich das Ganze ja für die Leute in Grenchen mache.

**Ansprechperson**: Angel
**Projekt-Repository**: [https://github.com/TheRealDevCH/AngelTix4meProjektAbgabe](https://github.com/TheRealDevCH/AngelTix4meProjektAbgabe)

Wie gesagt, im Moment ist hauptsächlich das Frontend fertig. Das Backend kommt noch, aber ich arbeite daran. Rom wurde auch nicht an einem Tag erbaut, oder?

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
