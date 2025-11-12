<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import HelpButton from '@/Components/HelpButton.vue';
import CookieBanner from '@/Components/CookieBanner.vue';

const darkMode = ref(false);

const toggleDarkMode = () => {
    darkMode.value = !darkMode.value;
    if (darkMode.value) {
        document.documentElement.classList.add('dark');
        localStorage.setItem('darkMode', 'true');
    } else {
        document.documentElement.classList.remove('dark');
        localStorage.setItem('darkMode', 'false');
    }
};

if (localStorage.getItem('darkMode') === 'true') {
    darkMode.value = true;
    document.documentElement.classList.add('dark');
}

const helpSteps = [
    {
        title: 'Datenschutzerklärung',
        description: 'Die Datenschutzerklärung erklärt, wie wir Ihre persönlichen Daten sammeln, verwenden und schützen. Es ist wichtig, dass Sie diese Informationen lesen und verstehen.',
        tips: 'Ihre Privatsphäre ist uns sehr wichtig. Wir behandeln Ihre Daten vertraulich.'
    },
    {
        title: 'Welche Daten sammeln wir?',
        description: 'In der Datenschutzerklärung finden Sie detaillierte Informationen darüber, welche Daten wir sammeln (z.B. Name, E-Mail, Adresse) und warum wir diese benötigen.',
        tips: 'Wir sammeln nur Daten, die für den Betrieb der Website notwendig sind.'
    },
    {
        title: 'Ihre Rechte',
        description: 'Sie haben das Recht, Auskunft über Ihre gespeicherten Daten zu erhalten, diese zu korrigieren oder löschen zu lassen. Kontaktieren Sie uns dafür über die im Impressum angegebenen Kontaktdaten.',
        tips: 'Sie können jederzeit Ihre Einwilligung zur Datenverarbeitung widerrufen.'
    },
    {
        title: 'Cookies',
        description: 'Wir verwenden Cookies, um die Website zu verbessern. Beim ersten Besuch werden Sie gefragt, ob Sie Cookies akzeptieren möchten. Sie können Ihre Einstellungen jederzeit ändern.',
        tips: 'Cookies helfen uns, die Website benutzerfreundlicher zu gestalten.'
    }
];
</script>

<template>
    <div :class="darkMode ? 'dark' : ''" class="min-h-screen transition-colors duration-300">
        <Head title="Datenschutz" />

        <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 dark:bg-gradient-to-br dark:from-gray-900 dark:to-gray-800 transition-colors duration-300">
            <nav class="bg-white/80 dark:bg-gray-900/80 backdrop-blur-md shadow-sm border-b border-gray-200 dark:border-gray-700 transition-colors duration-300">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-center items-center h-20">
                        <Link href="/">
                            <img src="/tix4me.svg" alt="Tix4me Logo" class="h-12 w-auto">
                        </Link>
                    </div>
                </div>
            </nav>

            <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
                <div class="bg-white/80 dark:bg-gray-900/80 backdrop-blur-md rounded-2xl shadow-xl p-8 sm:p-12 border border-gray-200 dark:border-gray-700">
                    <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-8">Datenschutzerklärung</h1>

                    <div class="prose prose-gray dark:prose-invert max-w-none">
                        <section class="mb-8">
                            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">§1 PRÄAMBEL</h2>
                            <p class="text-gray-700 dark:text-gray-300 mb-4">
                                Herzlich Willkommen auf der Webpräsenz der 4me GmbH. Auf den Schutz Ihrer Daten sowie auf die Wahrung Ihrer Privatsphäre wird grössten Wert gelegt. In der folgenden Erklärung möchten wir Ihnen darstellen, welche Daten wann und zu welchem Zweck erhoben, verarbeitet und abgespeichert werden.
                            </p>
                            <p class="text-gray-700 dark:text-gray-300">
                                Um diese Datenschutzerklärung übersichtlich zu gestalten, wird an verschiedenen stellen auf Datenschutzhinweise und weiterführende Informationen auf externen Webseiten verwiesen.
                            </p>
                        </section>

                        <!-- §2 VERANTWORTLICHE STELLE -->
                        <section class="mb-8">
                            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">§2 VERANTWORTLICHE STELLE</h2>
                            <div class="text-gray-700 dark:text-gray-300">
                                <p>4me GmbH</p>
                                <p>Rainstrasse 19</p>
                                <p>CH-2540 Grenchen</p>
                                <p>E-Mail: <a href="mailto:info@tix4me.ch" class="text-blue-600 dark:text-blue-400 hover:underline">info@tix4me.ch</a></p>
                                <p>Internet: <a href="https://www.tix4me.ch" class="text-blue-600 dark:text-blue-400 hover:underline">www.tix4me.ch</a></p>
                            </div>
                        </section>

                        <!-- §3 ANSPRECHPARTNER FÜR DATENSCHUTZ -->
                        <section class="mb-8">
                            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">§3 ANSPRECHPARTNER FÜR DATENSCHUTZ</h2>
                            <p class="text-gray-700 dark:text-gray-300 mb-4">
                                Bei Fragen zur Verarbeitung Ihrer personenbezogenen Daten sowie zu Ihren Rechten rund um den Datenschutz wenden Sie sich bitte an:
                            </p>
                            <div class="text-gray-700 dark:text-gray-300">
                                <p>4me GmbH</p>
                                <p>Rainstrasse 19</p>
                                <p>CH-2540 Grenchen</p>
                                <p>E-Mail: <a href="mailto:info@tix4me.ch" class="text-blue-600 dark:text-blue-400 hover:underline">info@tix4me.ch</a></p>
                            </div>
                        </section>

                        <!-- §4 GELTUNGSBEREICH -->
                        <section class="mb-8">
                            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">§4 GELTUNGSBEREICH</h2>
                            <p class="text-gray-700 dark:text-gray-300">
                                Die vorliegende Datenschutzerklärung gilt ausschliesslich für die von der 4me GmbH betriebene Domäne www.tix4me.ch.
                            </p>
                        </section>

                        <!-- §5 ERHEBUNG UND NUTZUNG PERSONENBEZOGENER DATEN -->
                        <section class="mb-8">
                            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">§5 ERHEBUNG UND NUTZUNG PERSONENBEZOGENER DATEN BEI DER NUTZUNG DER WEBSITE www.tix4me.ch</h2>
                            <p class="text-gray-700 dark:text-gray-300">
                                Beim Besuch unserer Website speichern unsere Server temporär jeden Zugriff in einer Protokolldatei. Folgende technischen Daten werden dabei, wie grundsätzlich bei jeder Verbindung mit einem Webserver, ohne Ihr Zutun erfasst und bis zur automatisierten Löschung nach spätestens 12 Monaten von uns gespeichert: die IP-Adresse des anfragenden Rechners, der Name des Inhabers des IP-Adressbereichs (i.d.R. Ihr Internet-Access-Provider), das Datum und die Uhrzeit des Zugriffs, die Website, von der aus der Zugriff erfolgte (Referrer URL) ggf. mit verwendetem Suchwort, der Name und die URL der abgerufenen Datei, den Status-Code (z.B. Fehlermeldung), das Betriebssystem Ihres Rechners, der von Ihnen verwendete Browser (Typ, Version und Sprache), das verwendete Übertragungsprotokoll (z.B. HTTP/1.1) Die Erhebung und Verarbeitung dieser Daten erfolgt zu dem Zweck, die Nutzung unserer Website zu ermöglichen (Verbindungsaufbau), die Systemsicherheit und -stabilität dauerhaft zu gewährleisten und die Optimierung unseres Internetangebots zu ermöglichen sowie zu internen statistischen Zwecken. Hierin besteht unser berechtigtes Interesse an der Datenverarbeitung im Sinne von: Art. 6 Abs. 1 lit. f DSGVO.
                            </p>
                        </section>

                        <!-- §6 VERANSTALTERDATENSPEICHERUNG -->
                        <section class="mb-8">
                            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">§6 VERANSTALTERDATENSPEICHERUNG UND VERWENDUNG</h2>
                            <p class="text-gray-700 dark:text-gray-300">
                                Zur Abwicklung der durch diese Prozesse entstandenen Vertragsbeziehungen, erhebt, verarbeitet, nutzt und speichert die 4me GmbH personen- bzw. organisationsbezogene Daten. Diese Daten werden nur an Dritte weitergegeben, sofern dies zur Geschäftsabwicklung notwendig ist.
                            </p>
                        </section>

                        <!-- §7 DATENERHEBUNG IM BESTELL-, KAUF-, ANMELDE-, UND AKKREDITIERUNGSPROZESS -->
                        <section class="mb-8">
                            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">§7 DATENERHEBUNG, VERWENDUNG UND SPEICHERUNG IM BESTELL-, KAUF-, ANMELDE-, UND AKKREDITIERUNGSPROZESS</h2>
                            <p class="text-gray-700 dark:text-gray-300 mb-4">
                                Die Website www.tix4me.ch der 4me GmbH ermöglicht es, Tickets online zu erwerben bzw. sich für Veranstaltungen anzumelden oder zu akkreditieren.
                            </p>
                            <p class="text-gray-700 dark:text-gray-300 mb-4">
                                Für die Abwicklung der Bestellung, Akkreditierung oder Anmeldung, erhebt, verarbeitet und speichert 4me GmbH über die Website www.tix4me.ch jene Daten, die in der Bestell- Anmelde- bzw. Akkreditierungsmaske eingegeben werden. Für die Abwicklung der Bestellung bzw. der Akkreditierung werden folgende Pflichtangaben erfasst:
                            </p>
                            <ul class="list-disc list-inside text-gray-700 dark:text-gray-300 mb-4 space-y-1">
                                <li>Anrede</li>
                                <li>Vorname</li>
                                <li>Nachname</li>
                                <li>Strasse</li>
                                <li>PLZ/Stadt</li>
                                <li>Land</li>
                                <li>E-Mail</li>
                                <li>Telefon</li>
                                <li>Passwort (optional)</li>
                            </ul>
                            <p class="text-gray-700 dark:text-gray-300 mb-4">
                                Zur Abwicklung von Supportfällen sowie zwecks Vertragserfüllung, Zusendung von Tickets und Abrechnung, erhebt und speichert 4me GmbH personenbezogene Daten wie Email Adresse, Name und Vorname, Adresse sowie Geburtsdatum. Diese Daten werden dem jeweiligen Veranstalter, bei dem Sie ein Ticket gekauft oder bei dem Sie sich angemeldet bzw. akkreditiert haben, zwecks Vertragserfüllung, Zustellung weiterführender Veranstaltungsinformationen und Einlasskontrolle zur Verfügung gestellt.
                            </p>
                            <p class="text-gray-700 dark:text-gray-300 mb-4">
                                Wenn Sie uns personenbezogene Daten anderer Personen zur Verfügung stellen, z.B. Daten über den Empfänger eines Geschenks, geben Sie uns personenbezogene Daten des Empfängers bitte nur dann bekannt, wenn Sie dazu gemäss den geltenden Datenschutzgesetzen berechtigt sind und wenn die andere Person damit einverstanden ist, dass Sie uns die personenbezogenen Daten für die Zwecke der Verarbeitung zur Verfügung stellen.
                            </p>
                            <p class="text-gray-700 dark:text-gray-300 mb-4">
                                Sofern wir in Vorleistung treten, z.B. bei einem Kauf auf Rechnung, können wir zur Wahrung unserer berechtigten Interessen gegebenenfalls eine Bonitätsauskunft auf der Basis mathematisch-statistischer Verfahren bei einer Auskunftei einholen. Dies geschieht ebenfalls bei Artikeln welche einer Altersbeschränkung unterliegen. Die Bonitätsauskunft kann Wahrscheinlichkeitswerte (Score-Werte) beinhalten, die auf Basis wissenschaftlich anerkannter mathematisch-statistischer Verfahren berechnet wurden und in deren Berechnung unter anderem Adressdaten einfliessen. Ihre schutzwürdigen Interessen werden gemäss den gesetzlichen Bestimmungen berücksichtigt. In den vorangehend beschriebenen Zwecken besteht unser berechtigtes Interesse an der Datenverarbeitung im Sinne von: Art. 6 Abs. 1 lit. f DSGVO
                            </p>
                            <p class="text-gray-700 dark:text-gray-300 mb-4">
                                Schliesslich leiten wir Ihre Kreditkarteninformationen bei Kreditkartenzahlung auf der Webseite über den Payment Service Provider und Kreditkarten-Acquirer Concardis Schweiz AG, Leutschenbachstrasse 95, 8050 Zürich weiter. Wenn Sie sich für eine Kreditkartenzahlung entscheiden, werden Sie jeweils zur Eingabe aller zwingend notwendigen Informationen gebeten. Die Rechtsgrundlage der Weitergabe der Daten liegt in der Erfüllung eines Vertrages nach: Art. 6 Abs. 1 lit. b DSGVO
                            </p>
                            <p class="text-gray-700 dark:text-gray-300">
                                Betreffend die Bearbeitung Ihrer Kreditkarteninformationen durch diese Dritten bitten wir Sie, auch die Allgemeinen Geschäftsbedingungen sowie die Datenschutzerklärung Ihres Kreditkartenherausgebers zu lesen.
                            </p>
                        </section>

                        <!-- §8 DATENVERWENDUNG BEI SUPPORTFÄLLEN -->
                        <section class="mb-8">
                            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">§8 DATENVERWENDUNG UND SPEICHERUNG BEI SUPPORTFÄLLEN UND ANDERWEITIGEN ANFRAGEN</h2>
                            <p class="text-gray-700 dark:text-gray-300">
                                Die 4me GmbH gewährleistet sowohl für Ticketkäufer wie auch für Veranstalter und Businesskunden umfassenden Support. Personenbezogene Daten, welche per Kontaktformular oder per Email zugestellt wurden, werden soweit verarbeitet und genutzt, wie es für die Abwicklung der Anfrage oder des Supportfalles erforderlich ist. Eine Weiterleitung dieser Daten an Dritte erfolgt ausschliesslich, wenn dies für die Bearbeitung der Anfrage oder des Supportfalles unabdingbar ist. Die Rechtsgrundlagen hierzu finden Sie unter: Art. 6 lit. f DSGVO
                            </p>
                        </section>

                        <!-- §9 DATENSICHERHEIT -->
                        <section class="mb-8">
                            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">§9 DATENSICHERHEIT UND GEHEIMHALTUNG</h2>
                            <p class="text-gray-700 dark:text-gray-300 mb-4">
                                Die 4me GmbH ist bestrebt, die verwendeten Systeme durch technische und organisatorische Massnahmen gegen Verlust, Zerstörung Zugriff, Veränderung oder Verbreitung Ihrer Daten durch unbefugte Personen zu sichern. Bitte nehmen Sie zur Kenntnis, dass ein vollständiger Schutz gegen alle Gefahren jedoch auch trotz regelmässiger Kontrollen nicht möglich ist.
                            </p>
                            <p class="text-gray-700 dark:text-gray-300 mb-4">
                                Die Website www.tix4me.ch wird auf Servern in der Schweiz gehostet.
                            </p>
                            <p class="text-gray-700 dark:text-gray-300">
                                Zur Abwicklung unserer Kundenkommunikation setzen wir teilweise externe Dienstleister ein. Diese unterstützen uns bei der Bearbeitung von E-Mail-Anfragen und der Kundenbetreuung. Dabei können personenbezogene Daten wie Name, E-Mail-Adresse oder Veranstaltungsdaten verarbeitet werden. Eine Datenbearbeitung kann auch im Ausland erfolgen, insbesondere in Ländern, in denen nicht zwingend ein dem schweizerischen Datenschutz vergleichbares Schutzniveau besteht. In solchen Fällen stellen wir sicher, dass ein angemessener Datenschutz gewährleistet ist, z. B. durch den Abschluss von Standarddatenschutzklauseln oder vertraglich zugesicherte Garantien mit den eingesetzten Dienstleistern. Die Bearbeitung erfolgt ausschliesslich im Rahmen des vorgesehenen Zwecks und unter Einhaltung der geltenden Datenschutzgesetze.
                            </p>
                        </section>

                        <!-- §10 COOKIES -->
                        <section class="mb-8">
                            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">§10 COOKIES UND ZUGRIFFSDATEN IN SERVER-LOGFILES</h2>
                            <p class="text-gray-700 dark:text-gray-300 mb-4">
                                Cookies helfen unter vielen Aspekten, Ihren Besuch auf unserer Website einfacher, angenehmer und sinnvoller zu gestalten. Cookies sind Informationsdateien, die Ihr Webbrowser automatisch auf der Festplatte Ihres Computers speichert, wenn Sie unsere Internetseite besuchen. Wir setzen Cookies beispielsweise ein, um Ihnen die Warenkorb-Funktion über mehrere Seiten hinweg anzubieten und um Ihre Eingaben beim Ausfüllen eines Formulars auf der Website temporär zu speichern, damit Sie die Eingabe beim Aufruf einer anderen Unterseite nicht wiederholen müssen.
                            </p>
                            <p class="text-gray-700 dark:text-gray-300">
                                Die meisten Internet-Browser akzeptieren Cookies automatisch. Sie können Ihren Browser jedoch so konfigurieren, dass keine Cookies auf Ihrem Computer gespeichert werden oder stets ein Hinweis erscheint, wenn Sie ein neues Cookie erhalten. Die Deaktivierung von Cookies kann dazu führen, dass Sie nicht alle Funktionen unserer Website nutzen können. Die Rechtsgrundlagen hierzu finden Sie unter: Art. 6 Abs. 1 lit. f DSGVO
                            </p>
                        </section>

                        <!-- §11 TRACKING -->
                        <section class="mb-8">
                            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">§11 Tracking</h2>
                            <p class="text-gray-700 dark:text-gray-300 mb-4">
                                Zum Zwecke der bedarfsgerechten Gestaltung und fortlaufenden Optimierung unserer Website, sowie der Steuerung von Werbemassnahmen auf externen Plattformen nutzen wir sogenannte Tracking Links, z.B. für Google Analytics.
                            </p>

                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3 mt-6">Web Analytics Tools</h3>
                            <p class="text-gray-700 dark:text-gray-300 mb-4">
                                Zum Zwecke der bedarfsgerechten Gestaltung und fortlaufenden Optimierung unserer Website nutzen wir den Webanalysedienst von Google Analytics. In diesem Zusammenhang werden pseudonymisierte Nutzungsprofile erstellt und kleine Textdateien, die auf Ihrem Computer gespeichert sind («Cookies»), verwendet.
                            </p>

                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3 mt-6">Google Analytics</h3>
                            <p class="text-gray-700 dark:text-gray-300 mb-4">
                                Anbieter von Google Analytics ist Google Inc., ein Unternehmen der Holding Gesellschaft Alphabet Inc, mit Sitz in den USA. Vor der Übermittlung der Daten an den Anbieter wird die IP-Adresse durch die Aktivierung der IP-Anonymisierung («anonymizeIP») auf dieser Webseite innerhalb der Mitgliedstaaten der Europäischen Union oder in anderen Vertragsstaaten des Abkommens über den Europäischen Wirtschaftsraum gekürzt.
                            </p>

                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3 mt-6">Trusted Shops</h3>
                            <p class="text-gray-700 dark:text-gray-300">
                                Bei dem Aufruf des Trustbadge speichert der Webserver automatisch ein sogenanntes Server-Logfile, das z.B. Ihre IP-Adresse, Datum und Uhrzeit des Abrufs, übertragene Datenmenge und den anfragenden Provider (Zugriffsdaten) enthält und den Abruf dokumentiert. Diese Zugriffsdaten werden nicht ausgewertet und spätestens sieben Tagen nach Ende Ihres Seitenbesuchs automatisch überschrieben.
                            </p>
                        </section>

                        <!-- §12 HINWEISE ZU DATENÜBERMITTLUNGEN IN DIE USA -->
                        <section class="mb-8">
                            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">§12 Hinweise zu Datenübermittlungen in die USA</h2>
                            <p class="text-gray-700 dark:text-gray-300 mb-4">
                                Aus Gründen der Vollständigkeit weisen wir für Nutzer mit Wohnsitz oder Sitz in der Schweiz darauf hin, dass in den USA Überwachungsmassnahmen von US-Behörden bestehen, die generell die Speicherung aller personenbezogenen Daten sämtlicher Personen, deren Daten aus der Schweiz in die USA übermittelt wurden, ermöglicht.
                            </p>
                            <p class="text-gray-700 dark:text-gray-300 mb-4">
                                Ausserdem weisen wir darauf hin, dass in den USA für die betroffenen Personen aus der Schweiz keine Rechtsbehelfe vorliegen, die es ihnen erlauben, Zugang zu den sie betreffenden Daten zu erhalten und deren Berichtigung oder Löschung zu erwirken, bzw. kein wirksamer gerichtlicher Rechtsschutz gegen generelle Zugriffsrechte von US-Behörden vorliegt.
                            </p>
                            <p class="text-gray-700 dark:text-gray-300">
                                Nutzer mit Wohnsitz in einem Mitgliedstaat der EU weisen wir darauf hin, dass die USA aus Sicht der Europäischen Union nicht über ein ausreichendes Datenschutzniveau verfügt. Soweit wir in dieser Datenschutzerklärung erläutert haben, dass Empfänger von Daten (wie z.B. Google) ihren Sitz in den USA haben, werden wir durch vertragliche Regelungen sicherstellen, dass Ihre Daten bei unseren Partnern mit einem angemessenen Niveau geschützt sind.
                            </p>
                        </section>

                        <!-- §13 AUSKUNFTSRECHT -->
                        <section class="mb-8">
                            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">§13 AUSKUNFTSRECHT, RECHT AUF VERGESSEN, RECHT AUF BERICHTIGUNG, WIDERSPRUCHSRECHT UND KONTAKTMÖGLICHKEIT</h2>
                            <p class="text-gray-700 dark:text-gray-300 mb-4">
                                Grundsätzlich können die zum Zwecke der Nutzung des Angebots von der Website www.tix4me.ch gespeicherten Personendaten jederzeit selbstständig über das Benutzerkonto abgefragt und geändert werden.
                            </p>
                            <p class="text-gray-700 dark:text-gray-300 mb-4">
                                Es besteht jederzeit das Recht, Auskunft betreffend der über Sie gespeicherten Daten, Zweck der Speicherung, Ort der Speicherung, Herkunft der Daten und allfälliger Empfänger dieser Daten zu erhalten. Ebenfalls steht jederzeit das Recht auf Berichtigung der Daten sowie Löschung dieser zu, sofern diese Löschung nicht gegen vertragliche oder gesetzliche Aufbewahrungspflichten entgegensteht.
                            </p>
                            <p class="text-gray-700 dark:text-gray-300">
                                Sie können uns für die vorgenannten Zwecke über die E-Mail-Adresse <a href="mailto:info@tix4me.ch" class="text-blue-600 dark:text-blue-400 hover:underline">info@tix4me.ch</a> erreichen. Für die Bearbeitung Ihrer Gesuche können wir, nach eigenem Ermessen, einen Identitätsnachweis verlangen.
                            </p>
                        </section>

                        <!-- §14 DATENSICHERHEIT -->
                        <section class="mb-8">
                            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">§14 Datensicherheit</h2>
                            <p class="text-gray-700 dark:text-gray-300 mb-4">
                                Wir bedienen uns geeigneter technischer und organisatorischer Sicherheitsmassnahmen, um Ihre bei uns gespeicherten persönlichen Daten gegen Manipulation, teilweisen oder vollständigen Verlust und gegen unbefugten Zugriff Dritter zu schützen. Unsere Sicherheitsmassnahmen werden entsprechend der technologischen Entwicklung fortlaufend verbessert.
                            </p>
                            <p class="text-gray-700 dark:text-gray-300 mb-4">
                                Sie sollten Ihre Zugangsdaten stets vertraulich behandeln und das Browserfenster schliessen, wenn Sie die Kommunikation mit uns beendet haben, insbesondere wenn Sie den Computer gemeinsam mit anderen nutzen.
                            </p>
                            <p class="text-gray-700 dark:text-gray-300">
                                Auch den unternehmensinternen Datenschutz nehmen wir sehr ernst. Unsere Mitarbeiter und die von uns beauftragten Dienstleistungsunternehmen sind von uns zur Verschwiegenheit und zur Einhaltung der datenschutzrechtlichen Bestimmungen verpflichtet worden.
                            </p>
                        </section>

                        <!-- §15 AUFBEWAHRUNG VON DATEN -->
                        <section class="mb-8">
                            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">§15 Aufbewahrung von Daten</h2>
                            <p class="text-gray-700 dark:text-gray-300 mb-4">
                                Wir speichern personenbezogene Daten nur so lange, wie es erforderlich ist, um die oben genannten Tracking- und Analysedienste sowie die weiteren Bearbeitungen im Rahmen unseres berechtigten Interesses zu verwenden. Vertragsdaten werden von uns länger aufbewahrt, da dies durch gesetzliche Aufbewahrungspflichten vorgeschrieben ist.
                            </p>
                            <p class="text-gray-700 dark:text-gray-300 mb-4">
                                Aufbewahrungspflichten, die uns zur Aufbewahrung von Daten verpflichten, ergeben sich aus Vorschriften der Rechnungslegung und aus steuerrechtlichen Vorschriften. Gemäss diesen Vorschriften sind geschäftliche Kommunikation, geschlossene Verträge und Buchungsbelege bis zu 10 Jahren aufzubewahren.
                            </p>
                            <p class="text-gray-700 dark:text-gray-300">
                                Soweit wir diese Daten nicht mehr zur Durchführung der Dienstleistungen für Sie benötigen, werden die Daten gesperrt. Dies bedeutet, dass die Daten dann nur noch für Zwecke der Rechnungslegung und für Steuerzwecke verwendet werden dürfen.
                            </p>
                        </section>

                        <!-- AKTUALITÄT UND ÄNDERUNG -->
                        <section class="mb-8">
                            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">AKTUALITÄT UND ÄNDERUNG DER DATENSCHUTZERKLÄRUNG</h2>
                            <p class="text-gray-700 dark:text-gray-300">
                                4me GmbH behält sich das Recht vor, diese Datenschutzerklärung jederzeit zu ändern, beziehungsweise aktuellen Gesetzesänderungen, neuen Bearbeitungsmethoden oder unternehmensinternen Prozessen anzupassen.
                            </p>
                        </section>
                    </div>
                </div>
            </main>

            <!-- Footer -->
            <footer class="bg-white/80 dark:bg-gray-900/80 backdrop-blur-md border-t border-gray-200 dark:border-gray-700 mt-auto">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-10">
                    <div class="flex flex-wrap justify-center gap-4 sm:gap-0 sm:space-x-10 mb-6">
                        <Link href="/impressum" class="text-sm sm:text-base text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition-colors duration-200 font-medium">
                            Impressum
                        </Link>
                        <Link href="/datenschutz" class="text-sm sm:text-base text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition-colors duration-200 font-medium">
                            Datenschutz
                        </Link>
                        <Link href="/agbs" class="text-sm sm:text-base text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition-colors duration-200 font-medium">
                            AGBs
                        </Link>
                    </div>
                    <div class="flex justify-center mb-6">
                        <a href="https://www.grenchen.ch" target="_blank" rel="noopener noreferrer" class="transition-transform duration-200 hover:scale-105">
                            <img src="/vongrenchenfuergrenchen.svg?v=2" alt="Von Grenchen für Grenchen" class="h-14 sm:h-16 md:h-20 w-auto">
                        </a>
                    </div>
                    <div class="text-center text-xs sm:text-sm text-gray-600 dark:text-gray-400">
                        © {{ new Date().getFullYear() }} Tix4me. Alle Rechte vorbehalten.
                    </div>
                </div>
            </footer>
        </div>

        <HelpButton :steps="helpSteps" title="Datenschutz-Hilfe" />
        <CookieBanner />
    </div>
</template>
